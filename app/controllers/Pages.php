<?php

class Pages extends Controller{

	public function __construct() {
        $this->postModel = $this->model('PostModel');
    }
    

    //ALL POST PAGE 
	public function allpost($pageNo = 1,$dis_id = -1,$area_id = -1,$cat_id = -1,$bed_num = -1){


		$filterData = [
						'dis_id' => $dis_id,
						'area_id' => $area_id,
						'cat_id' => $cat_id,
						'bed_num' => $bed_num
					];
		

		$data = array();

		$data[0] = array();
		$data[1] = array();
		$data[2] = array();
		$data[3] = array();
		$data[4] = array();
		$data[5] = array();
		$data[6] = array();
		$data[7] = array(); //top ad

		$limit = 10;
		$offset = ($pageNo - 1)*$limit;

		//top ad offset & limit
		$limitTop = 2;
		$offsetTop = ($pageNo - 1)*$limitTop;

		//THIS CODE WILL RUN WHEN USER APPLY FILTER
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$filterData = [
							'dis_id' =>  isset($_POST['dis_id']) ? $_POST['dis_id'] : -1,
							'area_id' => isset($_POST['area_id']) ? $_POST['area_id'] : -1,
							'cat_id' => isset($_POST['cat_id']) ? $_POST['cat_id'] : -1,
							'bed_num' =>  isset($_POST['bed_num']) ? $_POST['bed_num'] : -1
						];



			if($filterData['dis_id'] != -1 || $filterData['bed_num'] != -1 || $filterData['cat_id'] != -1 ){
				//counting total number of post
				$count = $this->postModel->totalPostCount($filterData);

				if($count){

				}else{
					header('location:'.URLROOT.'/pages/allpost/?result=notfound');
					die();
				}
				//GETTING ALL FILTERED POST
				$allPost = $this->postModel->totalPost($offset,$limit,$filterData);


			}else{
				//USER CLICK FILTER BUTTON WITHOUT ANY SELECTION
				header('location:'.URLROOT.'/pages/allpost');
				die();
			}			
						
		//THIS WILL RUN NORMALLY	
		}else{

			//counting total number of post
			$count = $this->postModel->totalPostCount($filterData);


			//GETTING ALL POST
			$allPost = $this->postModel->totalPost($offset,$limit,$filterData);			

		}


		
		$totalPage = ceil($count/$limit);
		$noOfBtn = ceil($count/$limit);

		if($noOfBtn > 10){
			$noOfBtn = 10;
		}
		array_push($data[0], $noOfBtn);
		array_push($data[1], $pageNo);
		array_push($data[2], $totalPage);
		array_push($data[5], $filterData);

		
		//GETTING ACTIVE DISTRICT LIST
		$districtResults = $this->postModel->allDistrict();

		foreach ($districtResults as $singleDistrict) {
			array_push($data[4], $singleDistrict);
		}



		//GETTING ACTIVE CATEGORY LIST
		$catResults = $this->postModel->allCategory();

		foreach ($catResults as $singleCat) {
			array_push($data[6], $singleCat);
		}

		//GETTING ALL TOP AD
		if($this->postModel->gettingTopAds($offsetTop,$limitTop)){

			$topAds = $this->postModel->gettingTopAds($offsetTop,$limitTop);
			foreach ($topAds as $topAd) {
				array_push($data[7], $topAd);
			}

		}else{
			$data[7] = null;
		}
		
	

		if($allPost){
			foreach ($allPost as $single) {
				array_push($data[3], $single);
			}

			$this->view('userpanel/posts/allpost',$data);
		}else{
			$this->view('error');
		}

		

	}


	//HOME PAGE
	public function index(){
		$data = array();

		$data[0] = array(); //posts
		$data[1] = array(); //category

		$filterData = [
						'dis_id' => -1,
						'area_id' => -1,
						'cat_id' => -1,
						'bed_num' => -1
					];


		$recentPosts = $this->postModel->totalPost(0,5,$filterData);

		foreach ($recentPosts as $recentPost) {
			array_push($data[0], $recentPost);
		}

		//GETTING ACTIVE CATEGORY LIST
		$categoryResults = $this->postModel->allCategory();

		foreach ($categoryResults as $singleCat) {
			array_push($data[1], $singleCat);
		}



		$this->view('index',$data);
	}



	//ERROR PAGE
	public function error(){

		$this->view('error');
	}

	//MAP PAGE
	public function map(){

		$this->view('map');
	}


}
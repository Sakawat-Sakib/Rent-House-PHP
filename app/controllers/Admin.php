<?php 

class Admin extends Controller{

	//INSTANTIATE MODEL
	public function __construct() {
        $this->adminModel = $this->model('AdminModel');
        $this->postModel = $this->model('PostModel');
    }

    //**************ALL VIEW OF ADMIN*********************

	public function index(){
		$this->view('admin/index');
	}




	//ADMIN LOGIN
	public function login(){
		$data = [
            
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $adminInfo = $this->adminModel->login($data['username'], $data['password']);

                if ($adminInfo) {
                    $this->createUserSession($adminInfo);
            
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('admin/login', $data);
                }
            }

        } 

		$this->view('admin/login',$data);
	}
	//END ADMIN LOGIN VIEW**


	//ALL POSTS
	public function posts(){
		$data = array();
		$posts = $this->adminModel->allPosts();
		foreach ($posts as $post) {
			array_push($data, $post);
		}

		$this->view('admin/posts',$data);
	}


	//LOGOUT
    public function logout(){
    	session_start();
    	unset($_SESSION['admin_id']);
    	unset($_SESSION['admin_username']);
    	header('location:' . URLROOT . '/admin/login');
        die();
    }




    //ADD CATEGORY
	public function category(){

		$data = array();

		

		$frontData = [
			"category" => '',
			"categoryError" => ''
		];


		//Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $frontData = [
                'category' => ucfirst(trim($_POST['category'])),
                'categoryError' => ''
            ];

            //Validate category
            if (empty($frontData['category'])) {

                $frontData['categoryError'] = 'Please enter a category.';

            }else{

             $res = $this->adminModel->addCat($frontData['category']);

             	if($res){

             	}else{
             		$frontData['categoryError'] = 'Category already exist';
             	}

            }

        } 

        $backData = array();

		$categories = $this->adminModel->allCat();
		foreach ($categories as $category) {
			array_push($backData, $category);
		}

		array_push($data, $backData);
		array_push($data, $frontData);

		$this->view('admin/category',$data);


	}





	public function locations(){
		$data = array();

		

		$frontData = [
			"location" => '',
			"locationError" => ''
		];


		//Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $frontData = [
                'location' => ucfirst(trim($_POST['location'])),
                'locationError' => ''
            ];

            //Validate location
            if (empty($frontData['location'])) {

                $frontData['locationError'] = 'Please enter a location.';

            }else{

             $res = $this->adminModel->addLoc($frontData['location']);

             	if($res){

             	}else{
             		$frontData['locationError'] = 'location already exist';
             	}

            }

        } 

        $backData = array();

		$locations = $this->adminModel->allDis();
		foreach ($locations as $location) {
			array_push($backData, $location);
		}

		array_push($data, $backData);
		array_push($data, $frontData);

		$this->view('admin/locations',$data);
	}




	public function areas(){

		$data = array();

		//Finding available location
		$locationData = array();
		$locations = $this->adminModel->allDis();
			foreach ($locations as $location) {
				array_push($locationData, $location);
			}
		array_push($data, $locationData);


		//Submiting new area*****
		$frontData = [
			"locationId" => '',
			"area" => '',
			"locationIdError" => '',
			"areaError" => ''
		];


		
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $frontData = [
                'locationId' => ucfirst(trim($_POST['loc_id'])),
                'area' => ucfirst(trim($_POST['area'])),
                'locationIdError' => '',
                'areaError' => ''
            ];

            //Validate location
            if (empty($frontData['locationId'])) {

                $frontData['locationIdError'] = 'You must select one location';

            }
            //Validate area
            if (empty($frontData['area'])) {

                $frontData['areaError'] = 'Please enter a area.';

            }else{

             $res = $this->adminModel->addArea($frontData['locationId'],$frontData['area']);

             	if($res){

             	}else{
             		$frontData['areaError'] = 'Area already exist';
             	}

            }

        }
        array_push($data, $frontData);

        $areaData = array();
        $areas = $this->adminModel->allArea();
		foreach ($areas as $area) {
			array_push($areaData, $area);
		}

		array_push($data, $areaData);
		
		$this->view('admin/areas',$data);
	}



	public function users(){

		$data = array();
		$users = $this->adminModel->allUsers();
		foreach ($users as $user) {
			array_push($data, $user);
		}

		$this->view('admin/users',$data);


	}


	public function messages(){
		$this->view('admin/messages');
	}



	
	//ALL PENDING POST
	public function pending(){
		$data = array();
		$posts = $this->adminModel->allPendingPosts();
		foreach ($posts as $post) {
			array_push($data, $post);
		}

		$this->view('admin/pending',$data);
	}





	//**********TOOLS****************//

	//SINGLE POST
	public function singlePost($id,$table){
		$postDetails = $this->adminModel->singlePost($id,$table);
		echo json_encode($postDetails);
		
	}

	//ACTIVE OR DEACTIVE
	public function statusChange($id,$action,$table){
		$this->adminModel->changeStatus($id,$action,$table);
	}

	//DELETE ROW
	public function deleteRow($id,$table){
		$this->adminModel->deleteSingleRow($id,$table);
	}

	//ACCEPT POST
	public function acceptPost($id){
		$this->adminModel->copyToPosts($id);
	}


	//CREATE SESSION 
	public function createUserSession($adminInfo) {
		session_start();
        $_SESSION['admin_id'] = $adminInfo['id'];
        $_SESSION['admin_username'] = $adminInfo['username'];
        header('location:' . URLROOT . '/admin/index');
        die();
    }

    


	public function edit($id,$col,$val,$table){
		$this->adminModel->edit($id,$col,$val,$table);

		
	}

	public function beforeEdit($id,$col,$table){
		$editDetails = $this->adminModel->beforeEdit($id,$col,$table);
		echo json_encode($editDetails);
		
	}


	public function singleLocationArea($id){
		$areas = $this->adminModel->selectedLocationAreas($id);
		echo json_encode($areas);
	}

	public function stateChange($id,$action){
		$this->adminModel->blockStatus($id,$action);
	}

}
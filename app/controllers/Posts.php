<?php 

class Posts extends Controller{

	public function __construct() {
        $this->postModel = $this->model('PostModel');
    }



   


	//INSERTING OR UPDATING POST
	public function addingPost($pid='',$uid=''){

		$data = array();

		$formInfo = [
			'district_id' => '',
			'districtError' => '',
            'area_id' => '',
            'areaError' => '',
            'sectorNo' => '',
            'roadNo' => '',
            'houseNo' => '',
            'shortDesc' => '',
            'shortDescError' => '',
            'freeFrom' => '',
            'freeFromError' => '',
            'category_id' => '',
            'categoryError' => '',
            'bedroom' => '',
            'bedroomError' => '',
            'bathroom' => '',
            'bathroomError' => '',
            'belcony' => '-1',
            'belconyError' => '',
            'floorNo' => '',
            'floorNoError' => '',
            'size' => '',
            'price' => '',
            'priceError' => '',
            'contactNo' => '',
            'contactNoError' => '',
            'gas' => '',
            'parking' => '',
            'lift' => '',
            'wifi' => '',
            'cctv' => '',
            'fullDesc' => '',
            'img1' => '',
            'img2' => '',
            'img3' => '',
            'img4' => '',
            'img5' => '',
            'imgError' => '',
            'imgTypeError' => ''
            
		];

		//WHEN USER WANT TO EDIT POST
		if($pid != '' && $uid != ''){

			$result = $this->postModel->editPostDetails($pid,$uid);

			if($result){
				$formInfo = [
					'district_id' => $result['division_id'],
					'districtError' => '',
		            'area_id' =>  $result['area_id'],
		            'areaError' => '',
		            'sectorNo' =>  $result['sector_no'],
		            'roadNo' =>  $result['road_no'],
		            'houseNo' =>  $result['house_no'],
		            'shortDesc' =>  $result['short_desc'],
		            'shortDescError' => '',
		            'freeFrom' =>  $result['free_from'],
		            'freeFromError' => '',
		            'category_id' =>  $result['cat_id'],
		            'categoryError' => '',
		            'bedroom' =>  $result['bedroom'],
		            'bedroomError' => '',
		            'bathroom' =>  $result['bathroom'],
		            'bathroomError' => '',
		            'belcony' =>  $result['belcony'],
		            'belconyError' => '',
		            'floorNo' =>  $result['floor_no'],
		            'floorNoError' => '',
		            'size' =>  $result['size'],
		            'price' =>  $result['price'],
		            'priceError' => '',
		            'contactNo' =>  $result['contact'],
		            'contactNoError' => '',
		            'gas' =>  $result['gas'],
		            'parking' =>  $result['parking'],
		            'lift' =>  $result['lift'],
		            'wifi' =>  $result['wifi'],
		            'cctv' =>  $result['cctv'],
		            'fullDesc' =>  $result['full_desc'],
		            'img1' => $result['img_1'],
		            'img2' => $result['img_2'],
		            'img3' => $result['img_3'],
		            'img4' => $result['img_4'],
		            'img5' => $result['img_5'],
		            'imgError' => '',
		            'imgTypeError' => ''
		           
				];

			}else{
				header('location:'.URLROOT.'/pages/error');
			}

			
		}


		//THIS CODE WILL EXECUTE AFTER SUBMIT BUTTON CLICK
		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$imgTypeError = '';

			if(isset($_FILES['img1']) && $_FILES['img1']['size'] != 0){
				if($this->imgExt('img1') != true){
					$imgTypeError = '(*Upload jpg or png image)';
				}
				
			}

			if(isset($_FILES['img2']) && $_FILES['img2']['size'] != 0){
				if($this->imgExt('img2') != true){
					$imgTypeError = '(*Upload jpg or png image)';
				}
				
			}

			if(isset($_FILES['img3']) && $_FILES['img3']['size'] != 0){
				if($this->imgExt('img3') != true){
					$imgTypeError = '(*Upload jpg or png image)';
				}
				
			}

			if(isset($_FILES['img4']) && $_FILES['img4']['size'] != 0){
				if($this->imgExt('img4') != true){
					$imgTypeError = '(*Upload jpg or png image)';
				}
				
			}

			if(isset($_FILES['img5']) && $_FILES['img5']['size'] != 0){
				if($this->imgExt('img5') != true){
					$imgTypeError = '(*Upload jpg or png image)';
				}
				
			}

			
			

			$formInfo = [
				'district_id' =>  isset($_POST['district_id']) ? $_POST['district_id'] : '',
				'districtError' => isset($_POST['district_id']) ? '' : '*You must select district',

	            'area_id' =>  isset($_POST['area_id']) ? $_POST['area_id'] : '',
	            'areaError' => isset($_POST['area_id']) ? '' : '*You must select area',

	            'sectorNo' =>  (isset($_POST['sectorNo']) && $_POST['sectorNo'] !='') ?  $_POST['sectorNo'] : '--',
	            'roadNo' =>  (isset($_POST['roadNo']) && $_POST['roadNo'] !='') ?  $_POST['roadNo'] : '--',
	            'houseNo' =>  (isset($_POST['houseNo']) && $_POST['houseNo'] !='') ?  $_POST['houseNo'] : '--',

	            'shortDesc' =>  $_POST['shortDesc'],
	            'shortDescError' => empty($_POST['shortDesc']) ? '*Write a short description' : '',

	            'freeFrom' =>  $_POST['freeFrom'],
	            'freeFromError' => empty($_POST['freeFrom']) ? '*Select a date' : '',

	            'category_id' =>  isset($_POST['category_id']) ? $_POST['category_id'] : '',
	            'categoryError' => isset($_POST['category_id']) ? '' : '*Select a category',

	            'bedroom' => isset($_POST['bedroom']) ? $_POST['bedroom'] : '',
	            'bedroomError' => isset($_POST['bedroom']) ? '' : '*Select bedroom no.',

	            'bathroom' =>  isset($_POST['bathroom']) ? $_POST['bathroom'] : '',
	            'bathroomError' => isset($_POST['bathroom']) ? '' : '*Select bathroom no.',

	            'belcony' =>  isset($_POST['belcony']) ? $_POST['belcony'] : '',
	            'belconyError' => isset($_POST['belcony']) ? '' : '*Select belcony no.',

	            'floorNo' =>  isset($_POST['floorNo']) ? $_POST['floorNo'] : '',
	            'floorNoError' => isset($_POST['floorNo']) ? '' : '*Select  floor no.',

	            'size' =>  (isset($_POST['size']) && $_POST['size'] !='') ?  $_POST['size'] : '--',

	            'price' =>  $_POST['price'],
	            'priceError' => empty($_POST['price']) ? '*Enter a price' : '',

	            'contactNo' =>  $_POST['contactNo'],
	            'contactNoError' => empty($_POST['contactNo']) ? '*Enter contact no.' : '',

	            'gas' =>  isset($_POST['gas']) ? 'Yes' : 'No',
	            'parking' => isset($_POST['parking']) ? 'Yes' : 'No',
	            'lift' =>  isset($_POST['lift']) ? 'Yes' : 'No',
	            'wifi' =>  isset($_POST['wifi']) ? 'Yes' : 'No',
	            'cctv' => isset($_POST['cctv']) ? 'Yes' : 'No',
	            'fullDesc' =>  $_POST['fullDesc'],

	            'img1' => (isset($_FILES['img1']['name']) && $_FILES['img1']['name'] != '') ? rand(11111111,99999999).'_'.$_FILES['img1']['name'] : '',
	            'img2' => (isset($_FILES['img2']['name']) && $_FILES['img2']['name'] != '') ? rand(11111111,99999999).'_'.$_FILES['img2']['name'] : '',
	            'img3' => (isset($_FILES['img3']['name']) && $_FILES['img3']['name'] != '') ? rand(11111111,99999999).'_'.$_FILES['img3']['name'] : '',
	            'img4' => (isset($_FILES['img4']['name']) && $_FILES['img4']['name'] != '') ? rand(11111111,99999999).'_'.$_FILES['img4']['name'] : '',
	            'img5' => (isset($_FILES['img5']['name']) && $_FILES['img5']['name'] != '') ? rand(11111111,99999999).'_'.$_FILES['img5']['name'] : '',

	            'imgError' => (empty($_FILES['img1']['name']) && $pid == '') ? '(*You must upload at least one photo)' : '',
				'imgTypeError' => $imgTypeError
				
			];

			//EVERY THING OK
			if(empty($formInfo['districtError']) && empty($formInfo['areaError']) && empty($formInfo['shortDescError']) && empty($formInfo['freeFromError']) && empty($formInfo['categoryError']) && empty($formInfo['bedroomError']) && empty($formInfo['bathroomError']) && empty($formInfo['belconyError']) && empty($formInfo['floorNoError']) && empty($formInfo['priceError']) && empty($formInfo['contactNoError']) && empty($formInfo['imgError']) && empty($formInfo['imgTypeError'])){
				
				//INSERTING DATA
				if($pid == '' && $uid == '' ){

					// //UPLOAD IMAGE
					if(isset($formInfo['img1']) && $formInfo['img1'] != '' ){

						//IMAGE ONE
						move_uploaded_file($_FILES['img1']['tmp_name'],'asset/img/product/'.$formInfo['img1']);

						if(isset($formInfo['img2']) && $formInfo['img2'] != '' ){
							//IMAGE TWO
							move_uploaded_file($_FILES['img2']['tmp_name'],'asset/img/product/'.$formInfo['img2']);

							if(isset($formInfo['img3']) && $formInfo['img3'] != '' ){
								//IMAGE THREE
								move_uploaded_file($_FILES['img3']['tmp_name'],'asset/img/product/'.$formInfo['img3']);

								if(isset($formInfo['img4']) && $formInfo['img4'] != '' ){
									//IMAGE FOUR
									move_uploaded_file($_FILES['img4']['tmp_name'],'asset/img/product/'.$formInfo['img4']);
									
									if(isset($formInfo['img5']) && $formInfo['img5'] != '' ){
										//IMAGE FIVE
										move_uploaded_file($_FILES['img5']['tmp_name'],'asset/img/product/'.$formInfo['img5']);
										
									}
								}
							}
						}
					}

					$this->postModel->insertPost($formInfo);

					header('location:'.URLROOT.'/posts/submitPost');
			
					die();

				//UPDATING DATA
				}elseif($pid != '' && $uid != '' ){

					//IMG-1
					if(isset($formInfo['img1']) && $formInfo['img1'] !=''){

						move_uploaded_file($_FILES['img1']['tmp_name'],'asset/img/product/'.$formInfo['img1']);

					}else{
						$formInfo['img1'] = $result['img_1'];
					}

					//IMG-2
					if(isset($formInfo['img2']) && $formInfo['img2'] !=''){

						move_uploaded_file($_FILES['img2']['tmp_name'],'asset/img/product/'.$formInfo['img2']);

					}else{
						$formInfo['img2'] = $result['img_2'];
					}

					//IMG-3
					if(isset($formInfo['img3']) && $formInfo['img3'] !=''){

						move_uploaded_file($_FILES['img3']['tmp_name'],'asset/img/product/'.$formInfo['img3']);

					}else{
						$formInfo['img3'] = $result['img_3'];
					}

					//IMG-4
					if(isset($formInfo['img4']) && $formInfo['img4'] !=''){

						move_uploaded_file($_FILES['img4']['tmp_name'],'asset/img/product/'.$formInfo['img4']);

					}else{
						$formInfo['img4'] = $result['img_4'];
					}


					//IMG-5
					if(isset($formInfo['img5']) && $formInfo['img5'] !=''){

						move_uploaded_file($_FILES['img5']['tmp_name'],'asset/img/product/'.$formInfo['img5']);

					}else{
						$formInfo['img5'] = $result['img_5'];
					}


					$this->postModel->updatePost($formInfo,$pid,$uid);
					header('location:'.URLROOT.'/users/profile');
					die();
				}

				
				

			}elseif($pid != '' && $uid != ''){

				$formInfo['img1'] = $result['img_1'];
				$formInfo['img2'] = $result['img_2'];
				$formInfo['img3'] = $result['img_3'];
				$formInfo['img4'] = $result['img_4'];
				$formInfo['img5'] = $result['img_5'];
				
			}elseif($pid == '' && $uid == ''){
				
				$formInfo['img1'] = '';
				$formInfo['img2'] = '';
				$formInfo['img3'] = '';
				$formInfo['img4'] = '';
				$formInfo['img5'] = '';
			}
		}


		$districts = array();
		$categories = array();

		//GETTING ACTIVE DISTRICT LIST
		$districtResults = $this->postModel->allDistrict();
		//GETTING ACTIVE CATEGORY LIST
		$categoryResult = $this->postModel->allCategory();

		foreach ($districtResults as $res) {
			array_push($districts, $res);
		}

		foreach ($categoryResult as $res) {
			array_push($categories, $res);
		}

		//DATA FROM BACKEND
		array_push($data, $districts);
		array_push($data, $categories);

		array_push($data, $formInfo);

		$this->view('userpanel/posts/postad',$data);
	}


	//GETTING INFO ABOUT A SINGLE POST
	public function postdetails($pid,$table){
		$data = $this->postModel->singlePostDetails($pid,$table);
		if($data){
			$this->view('userpanel/posts/postdetails',$data);
		}else{
			$this->view('error');
		}

		
		
	}


	//POST SUBMITTED CONFIRMATION PAGE
	public function submitPost(){
		$this->view('userpanel/posts/postsubmit');
	}


	//USER MAP
	public function userMap(){
		$this->view('userpanel/posts/map');
	}


	//GET AREA UNDER A SELECTED DISTRICT ::AJAX
	public function selectedArea($dis_id){

		$areas = $this->postModel->selectedDistrictsArea($dis_id);

		echo json_encode($areas);

		
	}


	//PROMOTE AD
	public function promotion($pid,$uid){
		$data = array();
		
		

		$info = $this->postModel->promoteAdInfo($pid,$uid);
		$data = $info;
		


		$this->view('userpanel/posts/promotion',$data);
	}

	

	//CHECKOUT 
	public function checkout(){
	
		$price = '';

		$promote_data = [
	        
	            'packType' => '',
	            'uid' => '',
	            'pid' => ''
	        ];
		
		//Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {


            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $promote_data = [

                    'packType' => trim($_POST['option']),
                    'uid' => trim($_POST['uid']),
                    'pid' => trim($_POST['pid'])
                ];

             if($promote_data['packType'] == 'top'){
             	$price = 300;
             }elseif($promote_data['packType'] == 'highlight'){
             	$price = 150;
             }


            //===================================
            //SSL PHP CODE
                /* PHP */
				$post_data = array();
				$post_data['store_id'] = "shs615c8b7d7bccb";
				$post_data['store_passwd'] = "shs615c8b7d7bccb@ssl";
				$post_data['total_amount'] = $price;
				$post_data['currency'] = "BDT";
				$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
				$post_data['success_url'] = "http://www.bashalagbe.com/KingSizeProject/bashalagbe/posts/success";
				$post_data['fail_url'] = "http://www.bashalagbe.com/KingSizeProject/bashalagbe/posts/fail";
				$post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
				# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

				# EMI INFO
				$post_data['emi_option'] = "1";
				$post_data['emi_max_inst_option'] = "9";
				$post_data['emi_selected_inst'] = "9";

				# CUSTOMER INFORMATION
				$post_data['cus_name'] = "Test Customer";
				$post_data['cus_email'] = "test@test.com";
				$post_data['cus_add1'] = "Dhaka";
				$post_data['cus_add2'] = "Dhaka";
				$post_data['cus_city'] = "Dhaka";
				$post_data['cus_state'] = "Dhaka";
				$post_data['cus_postcode'] = "1000";
				$post_data['cus_country'] = "Bangladesh";
				$post_data['cus_phone'] = "01711111111";
				$post_data['cus_fax'] = "01711111111";

				# SHIPMENT INFORMATION
				$post_data['ship_name'] = "testshsyyzz";
				$post_data['ship_add1 '] = "Dhaka";
				$post_data['ship_add2'] = "Dhaka";
				$post_data['ship_city'] = "Dhaka";
				$post_data['ship_state'] = "Dhaka";
				$post_data['ship_postcode'] = "1000";
				$post_data['ship_country'] = "Bangladesh";

				# OPTIONAL PARAMETERS
				$post_data['value_a'] = "ref001";
				$post_data['value_b '] = "ref002";
				$post_data['value_c'] = "ref003";
				$post_data['value_d'] = "ref004";

				# CART PARAMETERS
				$post_data['cart'] = json_encode(array(
				    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
				    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
				    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
				    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
				));
				$post_data['product_amount'] = "100";
				$post_data['vat'] = "5";
				$post_data['discount_amount'] = "5";
				$post_data['convenience_fee'] = "3";

			//==========================
			# REQUEST SEND TO SSLCOMMERZ
				$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

				$handle = curl_init();
				curl_setopt($handle, CURLOPT_URL, $direct_api_url );
				curl_setopt($handle, CURLOPT_TIMEOUT, 30);
				curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
				curl_setopt($handle, CURLOPT_POST, 1 );
				curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


				$content = curl_exec($handle );

				$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

				if($code == 200 && !( curl_errno($handle))) {
					curl_close( $handle);
					$sslcommerzResponse = $content;
				} else {
					curl_close( $handle);
					echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
					exit;
				}

				# PARSE THE JSON RESPONSE
				$sslcz = json_decode($sslcommerzResponse, true );

				if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
				        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
				        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
					echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
					# header("Location: ". $sslcz['GatewayPageURL']);
					exit;
				} else {
					echo "JSON Data parsing error!";
				}

				//========================================




	            
          
        }

	
	
		
	}


	//SUCCESS
	public function success(){


		//UPDATING IN DB
        // if($this->postModel->promoteAd($promote_data)){

        // 	echo "success";
        // 	die();

        // }else{
        // 	echo "fail";
        // 	die();
        // }
        
		$this->view('userpanel/posts/success');
	}


	//FAIL
	public function fail(){
		$this->view('userpanel/posts/fail');
	}

	//GETTING IMAGE EXTENSION
	public function imgExt($imgID){
		$extension =strtolower(explode('/', $_FILES[$imgID]['type'])[1]);
		
		if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
			return true;
		}else{
			return false;
		}
	}



}

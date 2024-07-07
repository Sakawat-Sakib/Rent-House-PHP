<?php 

class PostModel {

	private $conn;

	public function __construct(){
		$db = new Database;
		$this->conn = $db->dbHandler;
	}

//***********READ & WRITE DATA ABOUT "USERS POST" FROM DB START HERE*******************


	//GIVES ALL 'ACTIVE' DISTRICT LIST 
	public function allDistrict(){

		$sql = "SELECT * FROM locations WHERE status = 1 ORDER BY location";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();


	}

	

	//GIVES ALL 'ACTIVE' CATEGORY LIST
	public function allCategory(){

		$sql = "SELECT * FROM categories WHERE status = 1 ORDER BY id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();


	}

	//GIVES LIST OF 'ACTIVE' AREA UNDER SELECTED DISTRICT
	public function selectedDistrictsArea($dis_id){

		$sql = "SELECT * FROM areas WHERE loc_id = :id && status = :value ORDER BY area ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(["id" => $dis_id,"value" => 1]);

		return $stmt->fetchAll();


	}


	//INSERTING A POST
	public function insertPost($formInfo = []){

		
		session_start();
		$user_id = $_SESSION['user_id'];

		$sql = "INSERT INTO pending(user_id,division_id,area_id,sector_no,road_no,house_no,short_desc,free_from,cat_id,bedroom,bathroom,belcony,floor_no,size,price,gas,parking,lift,wifi,cctv,full_desc,img_1,img_2,img_3,img_4,img_5,contact)
				VALUES(:user_id,:division_id,:area_id,:sector_no,:road_no,:house_no,:short_desc,:free_from,:cat_id,:bedroom,:bathroom,:belcony,:floor_no,:size,:price,:gas,:parking,:lift,:wifi,:cctv,:full_desc,:img_1,:img_2,:img_3,:img_4,:img_5,:contact)
				";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(["user_id" =>$user_id,"division_id" =>$formInfo['district_id'],"area_id" =>$formInfo['area_id'],"sector_no" =>$formInfo['sectorNo'],"road_no" =>$formInfo['roadNo'],"house_no" =>$formInfo['houseNo'],"short_desc" =>$formInfo['shortDesc'],"free_from" =>$formInfo['freeFrom'],"cat_id" =>$formInfo['category_id'],"bedroom" =>$formInfo['bedroom'],"bathroom" =>$formInfo['bathroom'],"belcony" =>$formInfo['belcony'],"floor_no" =>$formInfo['floorNo'],"size" =>$formInfo['size'],"price" =>$formInfo['price'],"gas" =>$formInfo['gas'],"parking" =>$formInfo['parking'],"lift" =>$formInfo['lift'],"wifi" =>$formInfo['wifi'],"cctv" =>$formInfo['cctv'],"full_desc" =>$formInfo['fullDesc'],"img_1" =>$formInfo['img1'],"img_2" =>$formInfo['img2'],"img_3" =>$formInfo['img3'],"img_4" =>$formInfo['img4'],"img_5" =>$formInfo['img5'],"contact" =>$formInfo['contactNo']]);
		
	}


	//UPDATE A POST
	public function updatePost($formInfo = [],$pid,$uid){
		$sql = "UPDATE pending SET division_id =:division_id,area_id =:area_id,sector_no =:sector_no,road_no =:road_no,house_no =:house_no,short_desc =:short_desc,free_from =:free_from,cat_id =:cat_id,bedroom =:bedroom,bathroom =:bathroom,belcony =:belcony,floor_no =:floor_no,size =:size,price =:price,gas =:gas,parking =:parking,lift =:lift,wifi =:wifi,cctv =:cctv,full_desc =:full_desc,img_1 =:img_1,img_2 =:img_2,img_3 =:img_3,img_4 =:img_4,img_5 =:img_5,contact =:contact WHERE id =:pid && user_id =:uid";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(["uid" =>$uid,"pid" =>$pid,"division_id" =>$formInfo['district_id'],"area_id" =>$formInfo['area_id'],"sector_no" =>$formInfo['sectorNo'],"road_no" =>$formInfo['roadNo'],"house_no" =>$formInfo['houseNo'],"short_desc" =>$formInfo['shortDesc'],"free_from" =>$formInfo['freeFrom'],"cat_id" =>$formInfo['category_id'],"bedroom" =>$formInfo['bedroom'],"bathroom" =>$formInfo['bathroom'],"belcony" =>$formInfo['belcony'],"floor_no" =>$formInfo['floorNo'],"size" =>$formInfo['size'],"price" =>$formInfo['price'],"gas" =>$formInfo['gas'],"parking" =>$formInfo['parking'],"lift" =>$formInfo['lift'],"wifi" =>$formInfo['wifi'],"cctv" =>$formInfo['cctv'],"full_desc" =>$formInfo['fullDesc'],"img_1" =>$formInfo['img1'],"img_2" =>$formInfo['img2'],"img_3" =>$formInfo['img3'],"img_4" =>$formInfo['img4'],"img_5" =>$formInfo['img5'],"contact" =>$formInfo['contactNo']]);
	}


	//GETTING ALL DETAILS ABOUT EDITING POST
 	public function editPostDetails($id,$uid){

	    $sql ="SELECT *  FROM pending WHERE id =:id && user_id = :uid";

	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id'=>$id,"uid"=>$uid]);
	    $count = $stmt->rowCount();

	    if($count > 0){

	    	$res = $stmt->fetch();
	    	return $res;

	    }else{
	    	return false;
	    }
	    
   
    }


    //GETTING ALL 'ACTIVE' ACCEPTED POST LIST OF SPECEFIC AMOUNT ::PAGES
    public function totalPost($offset,$limit,$filterData = []){

    	$condition = '';

    	$dis_con = '';
		$area_con = '';
		$cat_con = '';
		$bed_con = '';

		//WHEN USER FILTER DATA
		if($filterData['dis_id'] != -1 || $filterData['area_id'] != -1 || $filterData['cat_id'] != -1 || $filterData['bed_num'] != -1){

			//DISTRICT
			if($filterData['dis_id'] != -1){

				$dis_con = 'division_id = '.$filterData['dis_id'].' && ';

				
			//AREA
			}if($filterData['area_id'] != -1){

				$area_con = 'area_id = '.$filterData['area_id'].' &&';

			//BEDROOM	
			}if($filterData['bed_num'] != -1){
				$bed_con = 'bedroom = "'.$filterData['bed_num'].'" &&';

				
			//DISTRICT
			}if($filterData['cat_id'] != -1){
				$cat_con = 'cat_id = '.$filterData['cat_id'].' &&';

				
			}


			$condition = $dis_con." ".$area_con." ".$cat_con." ".$bed_con;

		}

	    $sql ="SELECT posts.* , categories.category , locations.location , areas.area  FROM posts
	            JOIN categories 
	            ON posts.cat_id = categories.id 
	            JOIN locations
	            ON posts.division_id = locations.id
	            JOIN areas
	            ON posts.area_id = areas.id
	            WHERE ".$condition." posts.status = 1
	            ORDER BY added_on DESC
	            LIMIT $offset,$limit"
	            ;

	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	   	$count = $stmt->rowCount();

	   	if($count > 0){
	   		return  $res = $stmt->fetchAll();
	   	}else{
	   		return false;
	   	}

	    
	        
	}



	//GETTING NUMBER OF TOTAL 'ACTIVE' ACCEPTED POST FROM ENTIRE POSTS TABLE  ::PAGES
	public function totalPostCount($filterData = []){

		$filterTxt = '';

		$dis_Txt = '';
		$area_Txt = '';
		$cat_Txt = '';
		$bed_Txt = '';

		//WHEN USER FILTER DATA
		if($filterData['dis_id'] != -1 || $filterData['area_id'] != -1 || $filterData['cat_id'] != -1 || $filterData['bed_num'] != -1){

			//DISTRICT
			if($filterData['dis_id'] != -1){

				$dis_Txt = 'division_id = '.$filterData['dis_id'].' && ';

				
			//AREA
			}if($filterData['area_id'] != -1){

				$area_Txt = 'area_id = '.$filterData['area_id'].' &&';

			//BEDROOM	
			}if($filterData['bed_num'] != -1){
				$bed_Txt = 'bedroom = "'.$filterData['bed_num'].'" &&';

				
			//DISTRICT
			}if($filterData['cat_id'] != -1){
				$cat_Txt = 'cat_id = '.$filterData['cat_id'].' &&';

				
			}


			$filterTxt = $dis_Txt." ".$area_Txt." ".$cat_Txt." ".$bed_Txt;

		}
	    
	 	$sql ="SELECT * FROM posts WHERE ".$filterTxt." status = 1";



	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $count = $stmt->rowCount();
	   
	    if($count > 0){
	    	return  $count;
	    }else{
	    	return false;
	    }
	    
	     
   
	}



	//GETTING DETAILS OF A SPECIFIC 'ACCEPTED' POST WITH POST ID
	public function singlePostDetails($pid,$table){
		if($table == 'posts' || $table == 'pending'){

			$sql ="SELECT $table.* , users.name  , categories.category , locations.location , areas.area  FROM $table
		          JOIN categories 
		          ON $table.cat_id = categories.id 
		          JOIN locations
		          ON $table.division_id = locations.id
		          JOIN areas
		          ON $table.area_id = areas.id
		          JOIN users
		          ON $table.user_id = users.id

		          WHERE $table.id = :pid";

		    $stmt = $this->conn->prepare($sql);
		    $stmt->execute(['pid'=>$pid]);
		    $count = $stmt->rowCount();

		    if($count > 0){
	    		return $stmt->fetch();
	    	}else{
	    		return false;
	    	}

		}else{
			return false;
		}
	   

	    

    }



    //LIST OF TOP ADS
    public function gettingTopAds($offset,$limit){

	    $sql ="SELECT posts.* , categories.category , locations.location , areas.area  FROM posts
	            JOIN categories 
	            ON posts.cat_id = categories.id 
	            JOIN locations
	            ON posts.division_id = locations.id
	            JOIN areas
	            ON posts.area_id = areas.id
	            WHERE posts.pro_id = 3
	            ORDER BY added_on DESC
	            LIMIT $offset,$limit";

	    
		$stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	   	$count = $stmt->rowCount();

	   	if($count > 0){
	   		return  $res = $stmt->fetchAll();
	   	}else{
	   		return false;
	   	}

  	}


    //LIST OF APPROVED POST OF A USER  ::USERS
    public function approvedPost($uid){

	    $sql ="SELECT posts.* , categories.category , locations.location , areas.area  FROM posts
	            JOIN categories 
	            ON posts.cat_id = categories.id 
	            JOIN locations
	            ON posts.division_id = locations.id
	            JOIN areas
	            ON posts.area_id = areas.id
	            WHERE posts.user_id = :uid
	            ORDER BY id DESC";

	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["uid"=>$uid]);
	    $count = $stmt->rowCount();

	    if($count > 0){

	      $res = $stmt->fetchAll();
	      echo(json_encode($res));

	    }else{

	      echo(json_encode(["message" => "Not Found"]));

	    }

  	}


  	//LIST OF PENDING POST OF A USER  ::USERS
  	public function pendingPost($uid){

	    $sql ="SELECT pending.* , categories.category , locations.location , areas.area  FROM pending
	            JOIN categories 
	            ON pending.cat_id = categories.id 
	            JOIN locations
	            ON pending.division_id = locations.id
	            JOIN areas
	            ON pending.area_id = areas.id
	            WHERE pending.user_id = :uid
	            ORDER BY id DESC";

	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["uid"=>$uid]);
	    $count = $stmt->rowCount();

	    if($count > 0){

	      $res = $stmt->fetchAll();
	      echo(json_encode($res));

	    }else{

	      echo(json_encode(["message" => "Not Found"]));

	    }

	}


	//MARKED A POST AS BOOKED OR AVAILABLE  ::USERS
	public function changeAvailability($uid,$pid,$action){

	    if($action == 'available'){
	      $state = '0';
	    }elseif($action == 'booked'){
	      $state = '1';
	    }

	    $sql = "UPDATE posts SET booked=:state WHERE id=:pid && user_id=:uid";
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["state"=>$state,"pid"=>$pid,"uid"=>$uid]);
	    $count = $stmt->rowCount();
	    
	    if($count > 0){
	    	echo json_encode(["message"=>"updated"]);
	    }else{
	    	echo json_encode(["message"=>"Not updated"]);
	    }
	    

	     
	   
	}


	//DELETE A POST BY USER  ::USERS
	public function deleteAd($uid,$pid,$table){
	    $sql = "DELETE FROM $table WHERE id = :pid && user_id =:uid";
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["pid"=>$pid,"uid"=>$uid]);
	    $count = $stmt->rowCount();
	    if($count > 0){
	     echo  json_encode(["message"=>"Deleted"]);
	    }else{
	      echo json_encode(["message"=>"Not Deleted"]);
	    }
	}


	//GETTING INFO OF PROMOTIONAL AD  ::USERS
    public function promoteAdInfo($pid,$uid){

	    $sql ="SELECT posts.* , categories.category , locations.location , areas.area  FROM posts
	            JOIN categories 
	            ON posts.cat_id = categories.id 
	            JOIN locations
	            ON posts.division_id = locations.id
	            JOIN areas
	            ON posts.area_id = areas.id
	            WHERE posts.id = :pid && posts.user_id = :uid
	            ";

	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["pid"=>$pid,"uid"=>$uid]);
	    $count = $stmt->rowCount();

	    if($count > 0){

	      $res = $stmt->fetch();
	      return $res;

	    }else{

	      return false;

	    }

  	}


  	//PROMOTING AD  ::USERS
    public function promoteAd($promote_data=[]){

    	$pid = $promote_data['pid'];
    	$uid = $promote_data['uid'];

    	$pro_id = '';

	    if($promote_data['packType'] == 'highlight'){

	    	$pro_id = 2;

	    }elseif($promote_data['packType'] == 'top'){

	    	$pro_id = 3;

	    }
	  
	  	date_default_timezone_set('Asia/Dhaka');
	  	$added_on =  date('Y-m-d H:i:s');

	  	$sql = "UPDATE posts SET pro_id = :pro_id, added_on = :added_on WHERE id = :pid && user_id = :uid ";
	  	
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(["pid"=>$pid,"uid"=>$uid,"pro_id"=>$pro_id,"added_on"=>$added_on]);
	    $count = $stmt->rowCount();

	    if($count > 0){

	      return true;

	    }else{

	      return false;

	    }

  	}
	

}
<?php

class AdminModel{

	private $conn;
	public function __construct(){
		$db = new Database;
		$this->conn = $db->dbHandler;
	}

//*********** ADMIN READ WRITE DATA FROM DB*******************//

  //ADMIN LOGIN
	public function login($username,$password) {
      $sql = 'SELECT * FROM admin_users WHERE username = :username && password = :password';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["username"=>$username,"password"=>$password]);
     	$count =  $stmt->rowCount();

     	if($count > 0){
     		return $stmt->fetch();
     	}else{
     		return false;
     	}
  }



  //GETTING ALL ACCEPTED POST 
  public function allPosts(){
    $sql = "SELECT posts.* , categories.category , locations.location FROM posts
            JOIN categories 
            ON posts.cat_id = categories.id 
            JOIN locations
            ON posts.division_id = locations.id
            ORDER BY  id DESC ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  } 

  //GETTING ALL PENDING POST
  public function allPendingPosts(){
    $sql = "SELECT pending.* , categories.category , locations.location FROM pending
            JOIN categories 
            ON pending.cat_id = categories.id 
            JOIN locations
            ON pending.division_id = locations.id
            ORDER BY added_on ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }


  //GETTING ALL DETAILS ABOUT A POST 
  public function singlePost($id,$table){

    $sql ="SELECT ".$table.".* , users.name , users.email  , categories.category , locations.location , areas.area  FROM ".$table."
          JOIN categories 
          ON ".$table.".cat_id = categories.id 
          JOIN locations
          ON ".$table.".division_id = locations.id
          JOIN areas
          ON ".$table.".area_id = areas.id
          JOIN users
          ON ".$table.".user_id = users.id

          WHERE ".$table.".id = :id

          ORDER BY added_on DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt->fetch();

  }



  //MAKE A ROW ACTIVE OR DEACTIVE
  public function changeStatus($id,$action,$table){

    if($action == 'active'){
      $status = 1;
    }
    else if($action == 'deactive'){
      $status = 0;
    }

    $sql = "UPDATE ".$table." SET status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['status'=>$status,'id'=>$id]);

    echo json_encode(['message' => 'updated']);
  }


  //DELETING A ROW
  public function deleteSingleRow($id,$table){

    $sql = "DELETE FROM  ".$table."  WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    echo json_encode(['message' => 'Deleted']);
  }


  //ACCEPT A POST & INSERT INTO POSTS TABLE 
  public function copyToPosts($id){
    $sql = "INSERT INTO posts (user_id,division_id,area_id,sector_no,road_no,house_no,short_desc,free_from,cat_id,bedroom,bathroom,belcony,floor_no,size,price,gas,parking,lift,wifi,cctv,full_desc,img_1,img_2,img_3,img_4,img_5,contact)
            SELECT user_id,division_id,area_id,sector_no,road_no,house_no,short_desc,free_from,cat_id,bedroom,bathroom,belcony,floor_no,size,price,gas,parking,lift,wifi,cctv,full_desc,img_1,img_2,img_3,img_4,img_5,contact
            FROM pending
            WHERE pending.id = :id
           ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $sql = "DELETE FROM pending WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    echo json_encode(['message' => 'copied & Deleted' ]);
  }

  //GETTING LIST OF ALL CATEGORY
  public function  allCat(){
    $sql = "SELECT * FROM categories";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }


  //GETTING LIST OF ALL DISTRICT
  public function  allDis(){
      $sql = "SELECT * FROM locations ORDER BY location";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
  }


  //GETTING LIST OF ALL AREAS
  public function  allArea(){
    $sql = "SELECT areas.* , locations.location FROM areas
            JOIN locations
            ON areas.loc_id = locations.id
            ORDER BY areas.area";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }


  //ALL USERS
  public function allUsers(){

    $sql = "SELECT * FROM users";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

  }

  //GETTING AREAS UNDER SELECTED DISTRICT
  public function selectedLocationAreas($id){
      $sql = "SELECT areas.*,locations.location FROM areas
             JOIN locations
             ON areas.loc_id = locations.id
             WHERE areas.loc_id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["id" => $id]);

      return $stmt->fetchAll();
  }


  //ADDING CATEGORY
  public function addCat($category){

    $sql = "SELECT * FROM categories WHERE category = :category";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["category" => $category]);
    $count = $stmt->rowCount();

    if($count > 0){

      return false;

    }else{

      $sql = "INSERT INTO categories(category)
              VALUES (:category)
             ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["category" => $category]);

      return true;

    }  
  }


  //ADDING DISTRICT
  public function addLoc($location){

    $sql = "SELECT * FROM locations WHERE location = :location";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["location" => $location]);
    $count = $stmt->rowCount();

    if($count > 0){

      return false;

    }else{

      $sql = "INSERT INTO locations(location)
              VALUES (:location)
             ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["location" => $location]);

      return true;

    }

    
  }

  //ADDING AREA
  public function addArea($locationId,$area){

    $sql = "SELECT * FROM areas WHERE area = :area && loc_id = :locationId";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["area" => $area,"locationId" => $locationId]);
    $count = $stmt->rowCount();

    if($count > 0){

      return false;

    }else{

      $sql = "INSERT INTO areas(loc_id,area)
              VALUES (:locationId,:area)
             ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["locationId" => $locationId,"area" => $area]);

      return true;

    } 
  }



  //EDIT A ROW
  public function edit($id,$col,$val,$table){

    $sql = "SELECT * FROM $table WHERE $col = :val";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["val" => $val]);
    $count = $stmt->rowCount();

    if($count > 0){

      echo json_encode(['message' => 'error' ]);

    }else{

      $sql = "UPDATE $table 
            SET $col = :val
            WHERE id = :id
           ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["id" => $id,"val" => $val]);

      echo json_encode(['message' => 'Updated' ]);
      
    }

  }


  //GETTING OLD INFO ABOUT EDITING ROW
  public function beforeEdit($id,$col,$table){
    $sql = "SELECT ".$col." FROM ".$table." 
            
            WHERE id = :id
           ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["id" => $id]);
    return $stmt->fetch();
  }

  //CHANGE BLOCK STATUS
  public function blockStatus($id,$action){

    if($action == 'unblock'){
      $state = 0;
    }else{
      $state  = 1;
    }

    $sql = "UPDATE users SET blocked = :state WHERE id = :id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["state"=>$state,"id"=>$id]);
    echo json_encode(['message' => 'Updated' ]);
  }



}


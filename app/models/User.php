<?php

class User{

	private $conn;

	public function __construct(){
		$db = new Database;
		$this->conn = $db->dbHandler;
	}


//***********READ & WRITE DATA ABOUT "USERS" FROM DB START HERE*******************


  //CHECKING USER ELIGIBLE TO LOGIN
	public function login($email,$password) {



        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(["email"=>$email]);
       	$res = $stmt->fetch();
        $count = $stmt->rowCount();

       	if($count > 0){

       		$hashed_pass = $res['password'];

          if (password_verify($password, $hashed_pass)){

            return $res;

          }else{

              return false;

          }

       	}else{

       		return false;
       	}
  }


  //REGISTER A USER
  public function register($data){
    $sql = "INSERT INTO users(name,email,password,status,verification_code)
            VALUES(:name,:email,:password,:status,:verification_code)
            ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["name" => $data['name'],"email" => $data['email'],"password" => $data['password'],"status" => $data['status'],"verification_code" => $data['verification_code'] ]);

    return true;
  }



  //CHECKING INSERT EMAIL BY USER ALREADY EXIST
  public function isEmailExist($email){
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["email"=>$email]);
    $count = $stmt->rowCount();

    if($count > 0){

      return true;

    }else{

      return false;

    }

  }





}
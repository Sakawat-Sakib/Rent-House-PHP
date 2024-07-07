<?php 

class Users extends Controller{


	public function __construct() {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('PostModel');
    }



	

    //********USER VIEW********//

    //USER PROFILE PAGE
    public function profile() {
         
        $this->view('userpanel/users/profile');
    }


    //USER LOGIN PAGE 
    public function login() {
            $data = [
            
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];

            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => '',
                ];
                //Validate username
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter a email.';
                }

                //Validate password
                if (empty($data['password'])) {
                    $data['passwordError'] = 'Please enter a password.';
                }

                //Check if all errors are empty
                if (empty($data['emailError']) && empty($data['passwordError'])) {
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if ($loggedInUser) {

                        $this->createUserSession($loggedInUser);
                        die();

                    } else {

                        $data['passwordError'] = 'Please enter correct info.';

                        $this->view('userpanel/users/login',$data);
                    }
                }

            }

            $this->view('userpanel/users/login',$data);
    }

    

    //USER REGISTER PAGE
    public function register() {

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'status' => '',
                'verification_code' => '',
                'nameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

          if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'status' => 'Disabled',
                    'verification_code' => md5(uniqid()),
                    'nameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                $nameValidation = "/^[a-zA-Z\s]+$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                //Validate name on letters
                if (empty($data['name'])) {
                    $data['nameError'] = 'Please enter name.';
                } elseif (!preg_match($nameValidation, $data['name'])) {
                    $data['nameError'] = 'Name can only contain letters.';
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                } else {
                    //Check if email exists.
                    if ($this->userModel->isEmailExist($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                    }
                }

               // Validate password on length, numeric values,
                if(empty($data['password'])){
                  $data['passwordError'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 8){
                  $data['passwordError'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                  $data['passwordError'] = 'Password must  have at  least one numeric value.';
                }

                //Validate confirm password
                 if (empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    }
                }


                // Make sure that errors are empty
                if (empty($data['nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register user from model function
                    if ($this->userModel->register($data)) {

                        //Redirect to the login page
                        header('location: ' . URLROOT . '/users/login?status=success');
                        die();

                    } else {
                        die('Something went wrong.');
                    }
                }
            }

            $this->view('userpanel/users/register',$data);
    }


    //CONTACT PAGE
    public function contact() {

        $data = [
            
                'name' => '',
                'nameError' => '',
                'email' => '',
                'emailError' => '',
                'message' => '',
                'messageError' => '',
                'send' => ''
            ];

       //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                    'name' => trim($_POST['name']),
                    'nameError' => '',
                    'email' => trim($_POST['email']),
                    'emailError' => '',
                    'message' => trim($_POST['message']),
                    'messageError' => '',
                    'send' => '',
                ];
            

            //Validate name
                if (empty($data['name'])) {
                    $data['nameError'] = 'Please enter your name.';
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter a email.';
                }

                //Validate message
                if (empty($data['message'])) {
                    $data['messageError'] = "Message can't be blank.";
                }


                //Check if all errors are empty
                if (empty($data['nameError']) && empty($data['emailError']) && empty($data['messageError'])) {

                    
                    $to_email = "sabrina@cuet.ac.bd";
                    $subject = "Simple Email Test via PHP";
                    $body = " 1708012 This is test email send by PHP Script";
                    $headers = "From: mdsakawatsakib@gmail.com";

                    if (mail($to_email, $subject, $body, $headers)) {

                        echo "Email successfully sent to $to_email...";

                    } else {
                        echo "Email sending failed...";
                    }

                    die();



                 
                }
        }


        $this->view('userpanel/users/contact',$data);
    }




    public function createUserSession($user) {
        
        session_start();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        header('location:' . URLROOT . '/pages/index');
    }


    public function logout() {
        
        
        session_start();

        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);


        $data = [
            
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];


        header('location:' . URLROOT . '/users/login');
    }

    
    //*******USER AJAX OPERATION ******

    public function apprvAds($uid){
        $this->postModel->approvedPost($uid);
    }


    public function pndAds($uid){
        $this->postModel->pendingPost($uid);
    }

    public function changeAvailability($uid,$pid,$action){
        $this->postModel->changeAvailability($uid,$pid,$action);
    }

    public function deleteAd($uid,$pid,$table){
        $this->postModel->deleteAd($uid,$pid,$table);
    }
   
    

}
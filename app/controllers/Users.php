<?php
class Users extends Controller{
      private $userModel;

      public function __construct(){
            $this->userModel = $this->model('M_Users');
      }

      //Register the user.....................................................................................................................
      public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  //Form is submitting
                  //Validate the data
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  //Input data
                  $data = [
                        'name' => trim($_POST['name']),
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['password']),
                        'confirm_password' => trim($_POST['confirm_password']),

                        'name_err' => '',
                        'email_err' => '',
                        'password_err' => '',
                        'confirm_password_err' => ''
                  ];

                  //Validate each input
                  //Validate name
                  if(empty($data['name'])){
                        $data['name_err'] = 'Please enter a name';
                  }

                  //Validate email
                  if(empty($data['email'])){
                        $data['email_err'] = 'Please enter an email';
                  }
                  else{
                        //Check if email is already registered or not
                        if($this->userModel->findUserByEmail($data['email'])){
                              $data['email_err'] = 'Email is already registered';
                        }
                  }

                  //Validate password
                  if(empty($data['password'])){
                        $data['password_err'] = 'Please enter a password';
                  }
                  elseif(empty($data['confirm_password'])){
                        $data['confirm_password_err'] = 'Please confirm the password';
                  }
                  else{
                        if($data['password'] != $data['confirm_password']){
                              if(empty($data['password_err']) || empty($data['confirm_password_err'])){
                                    $data['confirm_password_err'] = 'Passwords are not matching';
                              }
                        }
                  }

                  //Validation is completed and no errors then register the user
                  if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                        // Hash the password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                        //Register the user
                        if($this->userModel->register($data)){
                              redirect('Users/login');
                        }
                        else{
                              die('Something went wrong');
                        }
                  }
                  else{
                        //Load view with errors
                        $this->view('users/v_register', $data);
                  }
            }
            else{
                  //Initial Form
                  $data = [
                        'name' => '',
                        'email' => '',
                        'password' => '',
                        'confirm_password' => '',

                        'name_err' => '',
                        'email_err' => '',
                        'password_err' => '',
                        'confirm_password_err' => ''
                  ];

                  //Load view
                  $this->view('users/v_register', $data);
            }
      }

      //Login the user..........................................................................................................................
      public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  //Form is submitting
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  //Input data
                  $data = [
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['password']),

                        'email_err' => '',
                        'password_err' => ''
                  ];

                  //Validate each input
                  //Validate email
                  if(empty($data['email'])){
                        $data['email_err'] = 'Please enter an email';
                  }
                  else{
                        //Check if email is already registered or not
                        if($this->userModel->findUserByEmail($data['email'])){
                              //User is found
                        }
                        else{
                              //User is not found
                              $data['email_err'] = 'User is not found';
                        }
                  }

                  //Validate password
                  if(empty($data['password'])){
                        $data['password_err'] = 'Please enter the password';
                  }

                  //If no errors then login the user
                  if(empty($data['email_err']) && empty($data['password_err'])){
                        // Log the user
                        $loggedUser = $this->userModel->login($data['email'], $data['password']);

                        if($loggedUser){
                              //User the authenticated
                              //Create the session

                              $this->createUserSession($loggedUser);
                        }
                        else{
                              $data['password_err'] = 'Password is incorrect';
                              
                              //Load view
                              $this->view('users/v_login', $data);
                        }
                  }
                  else{
                        //Load view with errors
                        $this->view('users/v_login', $data);
                  }
            }
            else{
                  //Initial Form
                  $data = [
                        'email' => '',
                        'password' => '',

                        'email_err' => '',
                        'password_err' => ''
                  ];

                  //Load view
                  $this->view('users/v_login', $data);
            }
      }


      //Session................................................................................................................................
      public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;

            redirect('Pages/index');
      }


      //Logout the user..........................................................................................................................
      public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);

            session_destroy();

            redirect('Users/login');
      }


      //Check if the user is logged in or not.....................................................................................................
      public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                  return true;
            }
            else{
                  return false;
            }
      }
}
?>
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
                              die('User is registered');
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
            $data = [];

            $this->view('users/v_login', $data);
      }
}
?>
<?php
class Posts extends Controller{

      public $postsModel;
      public function __construct(){
           $this->postsModel = $this->model('M_Posts');
      }


      // Default method..................................................
      public function index(){
            $posts = $this->postsModel->getPosts();

            $data = [
                  'posts' => $posts
            ];

            $this->view('posts/v_index', $data);
      }


      // Create method..................................................
      public function create(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  $data = [
                        'title' => trim($_POST['title']),
                        'body' => trim($_POST['body']),

                        'title_err' => '',
                        'body_err' => ''
                  ];

                  // Validation
                  if(empty($data['title'])){
                        $data['title_err'] = 'Please enter a title';
                  }

                  if(empty($data['body'])){
                        $data['body_err'] = 'Please enter a content';
                  }

                  // Make sure no errors
                  if(empty($data['title_err']) && empty($data['body_err'])){
                        if($this->postsModel->create($data)){
                              flash('post_msg', 'Post is published');
                              redirect('Posts/index');
                        }
                        else{
                              die('Something went wrong');
                        }
                  }
                  else{
                        // Load view with errors
                        $this->view('posts/v_create', $data);
                  }
            }
            else{
                 $data = [
                       'title' => '',
                       'body' => '',

                        'title_err' => '',
                        'body_err' => ''
                 ];
                 
                 $this->view('posts/v_create', $data);
            }
      }


      // Edit method..................................................
      public function edit($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                  $data = [
                        'post_id' => $postId,
                        'title' => trim($_POST['title']),
                        'body' => trim($_POST['body']),

                        'title_err' => '',
                        'body_err' => ''
                  ];

                  // Validation
                  if(empty($data['title'])){
                        $data['title_err'] = 'Please enter a title';
                  }

                  if(empty($data['body'])){
                        $data['body_err'] = 'Please enter a content';
                  }

                  // Make sure no errors
                  if(empty($data['title_err']) && empty($data['body_err'])){
                        if($this->postsModel->edit($data)){
                              flash('post_msg', 'Post is updated');
                              redirect('Posts/v_edit');
                        }
                        else{
                              die('Something went wrong');
                        }
                  }
                  else{
                        // Load view with errors
                        $this->view('posts/v_edit', $data);
                  }
            }
            else{
                  $post = $this->postsModel->getPostById($postId);

                  // Check for owner
                  if($post->user_id != $_SESSION['user_id']){
                        redirect('Posts/index');
                  }

                  $data = [
                        'post_id' => $postId,
                        'title' => $post->title,
                        'body' => $post->body,

                        'title_err' => '',
                        'body_err' => ''
                  ];
                 
                 $this->view('posts/v_edit', $data);
            }
      }


}
?>
<?php
class M_Posts{
      private $db;

      public function __construct(){
            $this->db = new Database();
      }


      // Get all posts................................................
      public function getPosts(){
            $this->db->query('SELECT * FROM v_posts');
            
            $results = $this->db->resultSet();

            return $results;
      }


      // Get post by id................................................
      public function getPostById($postId){
            $this->db->query('SELECT * FROM v_posts WHERE post_id = :id');
            $this->db->bind(':id', $postId);

            $row = $this->db->single();

            return $row;
      }


      // Create post................................................
      public function create($data){
            $this->db->query('INSERT INTO Posts(user_id, title, body) VALUES(:user_id, :title, :body)');
            // Bind values
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            // Execute
            if($this->db->execute()){
                  return true;
            }
            else{
                  return false;

            }
      }


      // Edit post................................................
      public function edit($data){
            $this->db->query('UPDATE Posts set title = :title, body = :body WHERE id = :id');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':id', $_SESSION['post_id']);
            

            // Execute
            if($this->db->execute()){
                  return true;
            }
            else{
                  return false;

            }
      }
}
?>
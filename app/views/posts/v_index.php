<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
      <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/main.css">
      <title><?php echo SITENAME; ?></title>

</head>
<body>

      <!-- TOP NAVIGATION -->
      <?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>


      <h1>Post</h1>

      <?php flash('post_msg'); ?>

      <a href="<?php echo URLROOT?>/Posts/create/"><button class="post-create-btn">CREATE POST</button></a>



      <?php foreach($data['posts'] as $post):  ?>
      <div class="post-index-container">
            <div class="post-header">
                  <div class="post-username"><?php echo $post->user_name; ?></div>
                  <div class="post-created-at"><?php echo convertTimeToReadableFormat($post->post_created_at); ?></div>

                  <?php if($post->user_id == $_SESSION['user_id']): ?>
                        <div class="post-control-btns">
                              <a href="<?php echo URLROOT?>/Posts/edit/<?php echo $post->post_id ?>"><button class="post-control-btn1">EDIT</button></a>
                              <a href="<?php echo URLROOT?>/Posts/delete/<?php echo $post->post_id ?>"><button class="post-control-btn2">DELETE</button></a>

                        </div>
                  <?php endif; ?>


            </div>

            <div class="post-body">
                  <div class="post-title"><?php echo $post->title; ?></div>
                  <div class="post-content"><?php echo $post->body; ?></div>
            </div>

            <div class="post-footer">
                  <div class="post-like">Likes 0</div>
                  <div class="post-dislike">Dislike 0</div>
            </div>
      </div>
      <?php endforeach; ?>


</body>
</html>
      
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

      <?php foreach($data['posts'] as $post):  ?>

      <div class="post-index-container">
            <div class="post-header">
                  <div class="post-username"><?php echo $post->user_name; ?></div>
                  <div class="post-created-at"><?php echo $post->post_created_at; ?></div>
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
      
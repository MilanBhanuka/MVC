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

      <div class="post-index-container">
            <div class="post-header">
                  <div class="post-username">Milan Bhanuka</div>
                  <div class="post-created-at">04.12.2023</div>
            </div>
            <div class="post-body">
                  <div class="post-title">Title</div>
                  <div class="post-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo id facere suscipit ducimus rem minima, dolorem ipsum natus adipisci aspernatur in, ad magni esse. Ratione velit delectus provident sed ea!</div>
            </div>
            <div class="post-footer">
                  <div class="post-like">Likes 0</div>
                  <div class="post-dislike">Dislike 0</div>
            </div>
      </div>

</body>
</html>
      
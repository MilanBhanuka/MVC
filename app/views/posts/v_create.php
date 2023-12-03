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

      <!-- <h1>Posts Create</h1> -->

      <div class="post-container">
      <div class="post-header">
                  <h1>Create a post</h1>
            </div>
            <form action="<?php echo URLROOT;?>/Posts/create" method="POST">
                  <input type="text" name="title" id="title" placeholder="Title" value="<?php $data['title'];?>">
                  <span class="form-invalid"><?php echo $data['title_err'] ?></span>

                  <textarea type="text" name="body" id="body" placeholder="Content" rows="10" value="<?php $data['body'];?>"></textarea>
                  <span class="form-invalid"><?php echo $data['body_err'] ?></span>

                  <br>
                  <input type="submit" value="Post" class="post-btn">  
            </form>
      </div>

</body>
</html>
      
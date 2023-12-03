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

      <!-- LOGIN FORM -->
      <div class="form-container">
            <div class="form-header">
                  <h1>User Login</h1>
                  <b><p>Please fill the correct credentials to login.</p></b>
            </div>
            <form action="" method="Post">

                  <!-- email -->
                  <div class="form-input-title">Email</div>
                  <input type="text" name="email" id="email" class="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                  <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                  <!-- password -->
                  <div class="form-input-title">Password</div>
                  <input type="password" name="password" id="password" class="password" placeholder="Password" value="<?php echo $data['password']; ?>">
                  <span class="form-invalid"><?php echo $data['password_err']; ?></span>

                  <!-- submit -->
                  <br>
                  <input type="submit" value="Login" class="form-btn">     
            </form>

            <?php flash('reg_flash');?>
      </div>


</body>
</html>
      
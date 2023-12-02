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


      <!-- Register Form -->
      <div class="form-container">
            <div class="form-header">
                  <h1>User Sign Up</h1>
                  <b><p>Please fill out this form to register.</p></b>
            </div>
            <form action="<?php echo URLROOT?>/Users/register" method="Post">
                  
                  <!-- name -->
                  <div class="form-input-title">Name</div>
                  <input type="text" name="name" id="name" class="name" placeholder="Name" value="<?php echo $data['name']; ?>">
                  <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                  <!-- email -->
                  <div class="form-input-title">Email</div>
                  <input type="text" name="email" id="email" class="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                  <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                  <!-- password -->
                  <div class="form-input-title">Password</div>
                  <input type="password" name="password" id="password" class="password" placeholder="Password" value="<?php echo $data['password']; ?>">
                  <span class="form-invalid"><?php echo $data['password_err'] ?></span>

                  <!-- confirm password -->
                  <div class="form-input-title">Confirm Password</div>
                  <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" placeholder="Confirm Password" value="<?php echo $data['confirm_password']; ?>">
                  <span class="form-invalid"><?php echo $data['confirm_password_err'] ?></span>

                  <!-- submit -->
                  <br>
                  <input type="submit" value="Register" class="form-btn">
                  
            </form>
      </div>


</body>
</html>
      
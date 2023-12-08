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


                  <!-- Profile image -->
                  <div class="form-drag-area">
                        <div class="icon">
                              <img src="<?php echo URLROOT; ?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder" width="90px" height="90px" id="profile_image_placeholder">
                        </div>
                        <div class="right-content">
                              <div class="description">Drag & Drop to Upload File</div>
                              <div class="form-upload">
                                    <input type="file" name="profile_image" id="profile_image" class="profile_image" accept="image/*" style="display:none">
                                    Browse File
                              </div>
                        </div>
                  </div>
                  
                  <div class="form-validation">
                        <div class="profile-image-validation">
                              <img src="<?php echo URLROOT; ?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="20px" height="20px">
                              Select a Profile Picture
                        </div>
                  </div>

                  
                  
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

<!-- javascript for profile image -->
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/components/imageUpload/imageUpload.js"></script>

</body>
</html>
      
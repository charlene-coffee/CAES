<?php
 
 require 'backend/authenticator.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("links.php");?>

 <style>
  #main {
  margin-top: 60px;
  padding: 20px 30px;
  transition: all 0.3s;
}

@media (max-width: 1199px) {
  #main {
    padding: 20px;
  }
}
 </style>

</head>

<body>
    <?php include("headerpage.php");?>
<!-- Profile Edit Form -->
<main id="main" class="main">
<label> <strong> EDIT PROFILE </strong>  </label>
                  
             <form id="saveProfileForm" >
                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="first_name" type="text" class="form-control" id="first_name" placeholder="First Name">
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middle_name" type="text" class="form-control" id="middle_name" placeholder="Middle Name">
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Surname Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="surname" type="text" class="form-control" id="surname" placeholder="Surname">
                      </div>
                    </div> 
                    

                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="number" type="text" class="form-control" id="number" placeholder="Number">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="text-center">
                      <button  id="saveChangeProfile" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                   
                </form><!-- End Profile Edit Form -->

    <?php include("script.php");?>
 
</body>
</main>
</html>
       
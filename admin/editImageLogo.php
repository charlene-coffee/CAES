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
  .profileBorder{
    border-radius: 100% !important;
    width: 134px;
    border: 2px solid black;
    padding: 55px;
    

  }

</style>
 

</head>
<body>
    <?php include("headerpage.php");?>
    <div class="content">
        <div class="row" style="padding-left: 71px ; padding-top: 30px ;font-size: 30px ; font-family: pambata ">
        <div class="label">
          IMAGE/LOGO
        </div>

    </div>
   
    <div class="row" style="padding-top: 60px">
            <div class="col-lg-2"></div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> 
                           
                           <?php
                           if(empty($_SESSION['image'])){ 
                            ?>

                        <div class="profileBorder">
                            <i class="fa-regular fa-user fa-2x" style=" width: 26px; height: fit-content;"></i> 
                        </div>
                            <?php
                            }else {
                            ?>
                            
                        <img src="<?php echo $base_url."//admin//backend//user-image//".$_SESSION["image"]; ?>" width="50"  height="175" alt="Profile" class="rounded-circle"style="width: 150px">
                             <?php
                            }
                                ?>

                        <h2 style="font-family: pambata"><?php echo $_SESSION["user_name"]; ?></h2>
                        <div class="pt-2">
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addImageModal">UPLOAD
                            </button>
                            <button type="button" class="btn btn-danger" id="removeImageBtn" >REMOVE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> 
                    <?php
                           if(empty($_SESSION['logo'])){ 
                            ?>
                        <div class="profileBorder">
                            <i class="fa-regular fa-user fa-2x" style=" width: 26px; height: fit-content;"></i> 
                        </div>
                        <?php
                            }else {
                            ?>
                        <img src="<?php echo $base_url."//admin//backend//logo//".$_SESSION["logo"]; ?>" width="50"  height="175" alt="Profile" class="rounded-circle"style="width: 150px">
                        <?php
                            }
                                ?>

                        <h2 style="font-family: pambata">School Logo</h2>
                        <div class="pt-2">
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addlogoModal">UPLOAD
                            </button>

                            <button type="button" class="btn btn-danger" id="removelogoBtn" >REMOVE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>    
    </div>
 <!-- modal for image -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
            
                    <form id="imageForm">
                            <div class="modal-header">
                            <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                            </div>
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">FILE</label>
                                            <input type="file" class="form-control-file" name="file">
                                        </div>
                                
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit" id="saveImage">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </form>
            </div>
    </div>
</div>
<!--  end modal for image -->

<!-- modal for logo -->
<div class="modal fade" id="addlogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
            
                    <form id="logoForm">
                            <div class="modal-header">
                            <h5 class="modal-title" id="addlogoModalLabel">Add Logo</h5>
                            </div>
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">FILE</label>
                                            <input type="file" class="form-control-file" name="file">
                                        </div>
                                
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit" id="savelogo">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </form>
            </div>
    </div>
</div>
<!--  end modal for logo -->
        
    <?php include("script.php");?>
<script>

     // submit the image
     $("#imageForm").on('submit', function(e) {
        e.preventDefault();
         $.ajax({
                      url: "../admin/backend/imageUpload.php",
                      type: "post",
                      data: new FormData(this),
                      contentType: false,
                      cache: false,
                      dataType:"text",
                      processData: false,  
                       
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log('sample  '+data);
                          data=JSON.parse(data)
                          console.log("Response:  "+data);
                          if (data.status==200){
                            
                            Swal.fire({
                            title: "Success", 
                            text: "Successfuly Uploaded!", 
                            icon: "success"
                            }).then(function(){ 
                                location.reload();
                            }
                            );

                          }else {
                            Swal.fire(
                          'Failed!',
                          'Failed Upload.',
                          'error'
                          ) 
                          }
                             
                      },
                      complete: function(xhr, textStatus) {
                          console.log(xhr.status);
                      },
                      error: function (request, status, error) {
                          alert(request.responseText);
                      }
                      
                            
                    });

          });

           // submit the logo
     $("#logoForm").on('submit', function(e) {
        e.preventDefault();
         $.ajax({
                      url: "../admin/backend/uploadLogo.php",
                      type: "post",
                      data: new FormData(this),
                      contentType: false,
                      cache: false,
                      dataType:"text",
                      processData: false,  
                       
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log('sample  '+data);
                          data=JSON.parse(data)
                          console.log("Response:  "+data);
                          if (data.status==200){
                            
                            Swal.fire({
                            title: "Success", 
                            text: "Successfuly Uploaded!", 
                            icon: "success"
                            }).then(function(){ 
                                location.reload();
                            }
                            );

                          }else {
                            Swal.fire(
                          'Failed!',
                          'Failed Upload.',
                          'error'
                          ) 
                          }
                             
                      },
                      complete: function(xhr, textStatus) {
                          console.log(xhr.status);
                      },
                      error: function (request, status, error) {
                          alert(request.responseText);
                      }
                      
                            
                    });

          });

          $("#removeImageBtn").click(function(){

      
Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Update it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
                    url: "../admin/backend/removeImage.php",
                    type: "post",
                    success: function(data, textStatus, xhr) {
                        console.log(xhr.status);
                        console.log("Response:  "+data);
                            Swal.fire(
                        'Updated!',
                        'Successfully Updated.',
                        'success'
                        ) 
                        // location.reload();
                    },
                    complete: function(xhr, textStatus) {
                        console.log(xhr.status);
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }
                    
                          
                  });

        }else{
          console.log('cancel')
        }
      })
});


$("#removelogoBtn").click(function(){
    console.log('sample');
      
Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Update it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
                    url: "../admin/backend/removeLogo.php",
                    type: "post",
                    success: function(data, textStatus, xhr) {
                        console.log(xhr.status);
                        console.log("Response:  "+data);
                            Swal.fire(
                        'Updated!',
                        'Successfully Updated.',
                        'success'
                        ) 
                        location.reload();
                    },
                    complete: function(xhr, textStatus) {
                        console.log(xhr.status);
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }
                    
                          
                  });

        }else{
          console.log('cancel')
        }
      })
});
         

          
</script>
</body>
</html>
       
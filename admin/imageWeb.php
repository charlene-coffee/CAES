<?php require 'backend/authenticator.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("links.php");?>


</head>
<body>
<?php include("headerpage.php");?>
<div class="content">
    <div class="row" style="padding-left: 71px ; padding-top: 30px ;font-size: 30px ; font-family: pambata">
        <div class="label">
                IMAGES OF SCHOOL
        </div>

    </div>
    <div class="row">
        <div class="col-8 text-center"> </div>
        <div class="col-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal"><i class="fa-solid fa-upload"></i> Add</button>
        <button type="button" class="btn btn-danger" id="removeImageBtn"> <i class="fa-solid fa-trash"></i> Remove</button>
        </div>
        <div class="col-12" style=" padding:   5px 30px;">
            
        <table id="imageTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image Description</th>
                        <th>Image Filename</th>
                        <th>Uploaded by:</th>
                    </tr>
                </thead>

                
                
            </table>
        </div>
    </div>
    <div class="row" style="padding: 0px 30px;">
    
    </div>

</div>
<!-- modal for add -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id=imageForm>
      <div class="modal-header">
        <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <label for="file">IMAGE FILE</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            <div class="form-outline">
                <textarea class="form-control" name="image_desc" rows="4"></textarea>
                <label class="form-label" for="textAreaExample"> Image Description</label>
            </div>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="saveImage">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


<?php include("script.php");?>
<script>
var imagetable= $('#imageTable').DataTable({
     bPaginate: false,
     bLengthChange: false,
     bFilter: true,
     bInfo: false,
     bAutoWidth: false,
     ajax: {
                      url: "../admin/backend/getImageSchool.php",
                      type: "post",
                      dataSrc: 'data'
    },
    columns:  [
                {data:'id'},
                {data:'image_desc'},
                {data:'image_filename'},
                {data:'uploaded_by'}
                

    ]
    });

    $("#imageForm").on('submit', function(e) {
    e.preventDefault();
    
         $.ajax({
                      url: "../admin/backend/imageSchoolUpload.php",
                      type: "post",
                      data: new FormData(this),
                      contentType: false,
                      cache: false,
                      dataType:"text",
                      processData: false,  
                       
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log("Response:  "+data);
                          if (data==="success"){
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

 // code for select row
  $('#imageTable tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            imagetable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#removeImageBtn").on('click', function(event) {
      var data =imagetable.row('.selected') .data();
      if (data===undefined) {
       return;
      }
       Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Remove it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                      url: "../admin/backend/imageSchoolRemove.php",
                      type: "post",
                      data:{
                        id: data.id,
                        filename: data.filename 
                       },
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log("Response:  "+data);
                              Swal.fire(
                          'Removed!',
                          'Successfully Removed.',
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
    
                          } else if (
                          /* Read more about handling dismissals below */
                          result.dismiss === Swal.DismissReason.cancel
                        ) {
                          Swal.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                          )
                        }
                      }) 

    });


 </script>


    
</body>
</html>
       
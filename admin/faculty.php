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

 

</head>
<body>
    <?php include("headerpage.php");?>
<div class="content">
    <div class="row " style="padding-left: 71px ; padding-top: 30px ;font-size: 30px ; font-family: pambata ">
         <div class="label ">
               FACULTY
        </div>

    </div>
    <div class="row">
        <div class="col-8 text-center"> </div>
        <div class="col-4"> 
        <button id="addFaculty" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFacultyModal"><i class="fa-solid fa-user-plus"></i> Add</button>
        <button type="button" class="btn btn-danger" id="removeFacultyBtn"> <i class="fa-solid fa-trash"></i> Remove</button>
        </div>
        <div class="col-12" style=" padding:   5px 30px;">
            
        <table id="facultyTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
               
               <thead>
                    <tr>
                     <th>FACULTY</th>
                
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row" style="padding: 0px 30px;">
    
    </div>

</div>

<!-- modal for Faculty -->
<div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
            
                    <form id="facultyForm">
                            <div class="modal-header">
                            <h5 class="modal-title" id="addFacultyModalLabel">Add Logo</h5>
                            </div>
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">FILE</label>
                                            <input type="file" class="form-control-file" name="file">
                                        </div>
                                
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit" id="saveFaculty">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </form>
            </div>
    </div>
</div>
<!--  end modal for Faculty -->
        
    <?php include("script.php");?>
   <script>
var facultytable= $('#facultyTable').DataTable({
     bPaginate: false,
     bLengthChange: false,
     bFilter: true,
     bInfo: false,
     bAutoWidth: false,
     scrollX: true,
     ajax: {
                      url: "../admin/backend/getFaculty.php",
                      type: "post",
                      dataSrc: 'data'
    },
    columns:  [
             
                {data:'faculty'}
                
    ],
    initComplete: function( settings, json ) {
          var count=facultytable.data().count();
                    if(count>=1){
                        $("#addFaculty").hide();
                    } else {
                      $("#addFaculty").show();
                    }
        }
    });
    
   

           // submit the faculty
     $("#facultyForm").on('submit', function(e) {
        e.preventDefault();
         $.ajax({
                      url: "../admin/backend/uploadFaculty.php",
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

  
 // code for select row
 $('#facultyTable').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
          facultytable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    })

$("#removeFacultyBtn").click(function(){
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
                    url: "../admin/backend/removeFaculty.php",
                    type: "post",
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

        }else{
          console.log('cancel')
        }
      })
});
         

          
</script>

</body>
</html>
       
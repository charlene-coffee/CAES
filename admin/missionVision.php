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
                MISSION AND VISION
        </div>

    </div>
    <div class="row">
        <div class="col-8 text-center"> </div>
        <div class="col-4"> 
        <button id="addMV" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMVModal"><i class="fa-solid fa-user-plus"></i> Add</button>
        <button type="button" class="btn btn-success"id="editMVBtn"><i class="fa-solid fa-user-pen"></i> Edit</button>
        </div>
        <div class="col-12" style=" padding:   5px 30px;">
            
        <table id="missionVisiontable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
               
               <thead>
                    <tr>
                     <th>Mission</th>
                     <th>Vision </th>  
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row" style="padding: 0px 30px;">
    
    </div>

</div>


<!-- ADD Modal -->

<div class="modal fade" id="addMVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMVModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formMV">
                <div class="modal-body" id="memo">
                
                <div class="form-group">
                        <label for="mission">Mission</label>
                            <textarea type="text" id="mission" name="mission" class="form-control" cols="30" rows="5"> </textarea>
                 </div>
                    <div class="form-group">
                        <label for="vision">Vision</label>
                        <textarea type="text" id="vision" name="vision" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="userId" class="form-control">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveMV">Save changes</button>

                </div>
                </form>
            </div>
        </div>
    </div>

<!-- updateModal -->
<div class="modal fade" id="updateMVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateMVModalLabel">Update Mission/Vission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
        
         <div class="form-group">
            <label for="mission">Mission</label>
            <input type="email" class="form-control" id="upMission" aria-describedby="emailHelp" placeholder="Mission" required>
        </div>
        
        <div class="form-group">
            <label for="vision">Vision</label>
            <input type="text" class="form-control" id="upVision" placeholder="Vision"required>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateMVBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <?php include("script.php");?>

<script>
var missionVisiontable= $('#missionVisiontable').DataTable({
     bPaginate: false,
     bLengthChange: false,
     bFilter: true,
     bInfo: false,
     bAutoWidth: false,
     scrollX: true,
     ajax: {
                      url: "../admin/backend/getMissionVision.php",
                      type: "post",
                      dataSrc: 'data'
    },
    columns:  [
             
                {data:'mission'},
                {data:'vision'}
    ],
    initComplete: function( settings, json ) {
          var count=missionVisiontable.data().count();
                    if(count>=1){
                        $("#addMV").hide();
                    } else {
                      $("#addMV").show();
                    }
        }
    });
    
    
    // submit
    $("#formMV").on('submit', function(e) {
    e.preventDefault();
      console.log ('sample');
         $.ajax({
                      url: "../admin/backend/updateMissionVision.php",
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
  $('#missionVisiontable').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
          missionVisiontable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#editMVBtn").on('click', function(event) {
      var data =missionVisiontable.row('.selected') .data(); 
      console.log(data)
      if (data===undefined) {
       return;
      }
      
      $("#updateMVModal #mission").val(data.mission);
      $("#updateMVModal #vision").val(data.vision);
      $("#updateMVModal").modal();

    });

    // edit
    $("#updateMVBtn").on('click', function(event) {
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
              console.log($('#mission').val());
              $.ajax({
                      url: "../admin/backend/updateMissionVision.php",
                      type: "post",
                      data:{ 
                      
                        mission:$('#upMission').val(),
                        vision:$('#upVision').val()
                        

                       },
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
       
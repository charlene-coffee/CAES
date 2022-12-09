
<?php require 'backend/authenticator.php';
 ?><!DOCTYPE html>
<html lang="en">
<head>
  <title>website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("links.php");
   
   $mission="";
   $vision="";
  
  
  ?>

<style>
  .text-wrap{
    white-space:normal;
}
.width-200{
    width:300px;
}
</style>
</head>
<body>
<?php include("headerpage.php");?>
<div class="content">
    <div class="row" style="padding-left: 71px ; padding-top: 30px ;font-size: 30px ; font-family: pambata ">
        <div class="label">
               CAES PROFILE
        </div>

    </div>
    <div class="row">
        <div class="col-8 text-center"> </div>
        <div class="col-4">
        <button  id="addBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProfileModal"><i class="fa-solid fa-upload"></i> Add</button>
        <button type="button" class="btn btn-success"id="editprofileBtn"><i class="fa-solid fa-user-pen"></i> Edit</button>
        <button type="button" class="btn btn-danger" id="removeMVBtn"> <i class="fa-solid fa-trash"></i> Remove</button>
        </div>
        <div class="col-12" style=" padding:   5px 30px;">
            
        <table id="profilesTable" class="table table-striped table-bordered  nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <!-- <th>Logo</th> -->
                        <th>Faculty</th>
                        <!-- <th>Mission</th>
                        <th>Vission</th> -->
                        <th>Address</th>
                        <th>Landline</th>
                        <th>Cell No.</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>

                </tr>
                </thead>

                
                
            </table>
        </div>
    </div>
    <!-- <div class="row" style="padding: 0px 30px;">
    
    </div> -->

</div>
<!-- Add MODAL -->
<div class="modal fade" id="addProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id=form>
      <div class="modal-header">
        <h5 class="modal-title" id="addAnnounceModalLabel">Add Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <label for="file">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <!-- <div class="form-group">
                <label for="file">Logo</label>
                <input type="file" class="form-control-file" name="logo">
            </div> -->
            <div class="form-group">
                <label for="file">Address</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label for="file">Landline</label>
                <input type="tel" class="form-control" name="landline">
            </div>
            <div class="form-group">
                <label for="file">Cellphone No.</label>
                <input type="number" class="form-control" name="cell_no">
            </div>
            <!-- <div class="form-outline">
                <textarea class="form-control" name="vission" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Vission</label>
            </div> -->
            <!-- <div class="form-outline">
                <textarea class="form-control" name="mission" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Mission </label>
            </div> -->
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit" id="saveProfile">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- updateModal -->
<div class="modal fade" id="updateprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id=form>
      <div class="modal-header">
        <h5 class="modal-title" id="updateprofileeModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                <label for="file">ID</label>
                <input type="text" class="form-control" name="id"id="id" readonly>
            </div>
            <div class="form-group">
                <label for="file">Name</label>
                <input type="text" class="form-control" name="name"id="name">
            </div>

            <!-- <div class="form-group">
                <label for="file">Logo</label>
                <input type="file" class="form-control-file" name="logo" id="logo">
            </div> -->
            <div class="form-group">
                <label for="file">Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="file">Landline</label>
                <input type="tel" class="form-control" name="landline"id="landline">
            </div>
            <div class="form-group">
                <label for="file">Cellphone No.</label>
                <input type="number" class="form-control" name="cell_no"id="cell_no">
            </div>
            <!-- <div class="form-outline">
                <textarea class="form-control" name="vission" id="vission"rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Vission</label>
            </div>
            <div class="form-outline">
                <textarea class="form-control" name="mission" id="mission" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Mission</label>
            </div> -->
      
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateProfileBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include("script.php");?>
<script>

var profilestable= $('#profilesTable').DataTable({
     bPaginate: false,
     bLengthChange: false,
     bFilter: true,
     bInfo: false,
     bAutoWidth: false,
     scrollX: true,
     ajax: {
                      url: "../admin/backend/getProfile.php",
                      type: "post",
                      dataSrc: 'data'
    },
    columns:  [
                {data:'id'},
                {data:'name'},
                {data:'faculty'},
                {data:'address'},
                {data:'landline'},
                {data:'cellphone'},
                {data:'created_date'},
                {data:'updated_date'}
                

    ],
    columnDefs: [
            {
                target: 0,
                visible: false,
                
            },
            {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap'>" + data + "</div>";
                    },
                    targets: 2,
                }
        ],
        
        initComplete: function( settings, json ) {
          var count=profilestable.data().count();
                    if(count>=1){
                        $("#addBtn").hide();
                    } else {
                      $("#addBtn").show();
                    }
        }
    });
    // submit
    $("#form").on('submit', function(e) {
    e.preventDefault();
    
         $.ajax({
                      url: "../admin/backend/saveProfile1.php",
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
  $('#profilesTable tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            profilestable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#editprofileBtn").on('click', function(event) {
      var data =profilestable.row('.selected') .data(); 
      var count=profilestable.data().count();
      if(count==0){
              return false;
      }
      
      console.log(data)
      if (data===undefined) {
       return;
      }
      $("#updateprofileModal #id").val(data.id);
      $("#updateprofileModal #name").val(data.name);
      // $("#updateprofileModal #logo").text(data.logo);
      $("#updateprofileModal #address").val(data.address);
      // $("#updateprofileModal #mission").val(data.mission);
      // $("#updateprofileModal #vission").val(data.vission);
      $("#updateprofileModal #landline").val(data.landline);
      $("#updateprofileModal #cell_no").val(data.cell_no);
      
      $("#updateprofileModal").modal();

    });

    // edit
    $("#updateProfileBtn").on('click', function(event) {
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
                      url: "../admin/backend/updateprofile.php",
                      type: "post",
                      data:{ 
                        mission:$('#updateprofileModal #mission').val(),
                        vission:$('#updateprofileModal #vission').val(),
                    
                       },
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
  //  remove row
    $("#removeMVBtn").on('click', function(event) {
      var data =profilestable.row('.selected') .data();
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
                      url: "../admin/backend/removeProfile.php",
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
       
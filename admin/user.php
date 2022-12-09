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
                USERS
        </div>

    </div>
    <div class="row">
        <div class="col-8 text-center"> </div>
        <div class="col-4"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal"><i class="fa-solid fa-user-plus"></i> Add</button>
        <button type="button" class="btn btn-success"id="editUserBtn"><i class="fa-solid fa-user-pen"></i> Edit</button>
        <button type="button" class="btn btn-danger" id="removeUserBtn"> <i class="fa-solid fa-trash"></i> Remove</button>
        </div>
        <div class="col-12" style=" padding:   5px 30px;">
            
        <table id="usersTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>UserId</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Role</th>
                    </tr>
                </thead>

                
                
            </table>
        </div>
    </div>
    <div class="row" style="padding: 0px 30px;">
    
    </div>

</div>


<!-- ADD Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="User Name" required>
        </div>
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Password"required>
        </div>
        <div class="form-group">
            <label for="password2">Re-enter Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Password"required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="show_hide_password">
            <label class="form-check-label" id="showHideLable" for="show_hide_password">Show Password</label>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" placeholder="Role"required>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveUser">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- updateModal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateeUserModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
        <div class="form-group">
            <label for="userId">User ID</label>
            <input type="email" class="form-control" id="userId" aria-describedby="emailHelp" placeholder="User Name"readonly>
        </div>
         <div class="form-group">
            <label for="username">User Name</label>
            <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="User Name" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" placeholder="Password"required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" placeholder="Role"required>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateUserBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <?php include("script.php");?>
 <script>

var userstable= $('#usersTable').DataTable({
     bPaginate: false,
     bLengthChange: false,
     bFilter: true,
     bInfo: false,
     bAutoWidth: false,
     ajax: {
                      url: "../admin/backend/getUsers.php",
                      type: "post",
                      dataSrc: 'data'
    },
    columns:  [
                {data:'userId'},
                {data:'username'},
                {data:'password'},
                {data:'role'}
                

    ],
    columnDefs: [
            {
                target: 2,
                visible: false,
                
            }
            
        ]
    });
   
   
    $(document).ready(function() {
    $("#show_hide_password ").on('click', function(event) {
       if ( $("#password1 ").attr('type')=="password") {
        $('#password1').attr('type', 'text');
        $('#password2').attr('type', 'text');  
        $('#showHideLable').text('Hide Password');  
       } else {
        $('#password1').attr('type', 'password');
        $('#password2').attr('type', 'password');
        $('#showHideLable').text('Show Password'); 
       } 
    });


    $("#saveUser ").on('click', function(event) {
        if ( $("#password1 ").val()!=$("#password2 ").val()) {
            Swal.fire(
                      'Warning',
                      'Password Not Match',
                      'warning'
                  )
              return false;
        } else {
       

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Save it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                      url: "../admin/backend/insertUser.php",
                      type: "post",
                      data:{ 
                        user_name:$('#username').val(),
                        password:$('#password1').val(),
                        role:$('#role').val()
                       },
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log("Response:  "+data);
                              Swal.fire(
                          'Saved!',
                          'User has been saved.',
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
     } 
    });

    $('#usersTable tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            userstable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#editUserBtn").on('click', function(event) {
      var data =userstable.row('.selected') .data(); 
      console.log(data)
      if (data===undefined) {
       return;
      }

      $("#updateUserModal #userId").val(data.userId);
      $("#updateUserModal #username").val(data.username);
      $("#updateUserModal #password").val(data.password);
      $("#updateUserModal #role").val(data.role);

      $("#updateUserModal").modal();

    });


    $("#updateUserBtn").on('click', function(event) {
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
                      url: "../admin/backend/updateUser.php",
                      type: "post",
                      data:{ 
                        user_name:$('#updateUserModal #username').val(),
                        password:$('#updateUserModal #password').val(),
                        role:$('#updateUserModal #role').val(),
                        user_id:$('#updateUserModal #userId').val()
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

    $("#removeUserBtn").on('click', function(event) {
      var data =userstable.row('.selected') .data();
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
                      url: "../admin/backend/removeUser.php",
                      type: "post",
                      data:{
                        user_id: data.userId 
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



});

 </script>
</body>
</html>
       
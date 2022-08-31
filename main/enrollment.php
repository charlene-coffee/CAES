<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enrollment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
 
  <style>


      .upper-part{ 
          padding-top: 10px ;
          padding-bottom: 10px  ;
          border: 0px solid black; 
          height: 175px ;
      
      }      
     
      
  </style>
</head>
<body>
    <div class="container-fluid">
        <div class="upper-part">
            <img src="../image/CAESLOGO.png" width="150" style="float: left;">
        <b> <H1 style="float:left ; padding-left:10px;padding-top: 50px;font-family:serif;">CALAMBA ADVENTIST ELEMENTARY SCHOOL</H1>
        </b>
        </div>
         <div class="navigation" style="width: 100%;">
             
           <nav class="navbar navbar-expand navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="../main/index.html">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../main/enrollment.html">ENROLLMENT <span class="sr-only">(current)</span></a>
                            </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                            <div class="dropdown-menu" aria-labelledby="aboutus">
                              <a class="dropdown-item" href="../main/faculty.html">Faculty & Staff</a>
                              <a class="dropdown-item" href="../main/mission-vision.html">Mission & Vission</a>
                              <a class="dropdown-item" href="#">Photos</a>
                            </div>
                          </li>
                          
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="contact" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONTACT</a>
                            <div class="dropdown-menu" aria-labelledby="contact">
                              <a class="dropdown-item" href="#">LANDLINE : 049-545-7891</a>
                             <a class="dropdown-item" href="#">CELLPHIONE NO:0935-781-1124</a>
                             <a class="dropdown-item" href="#">ADDRESS: 603 Elepaño II
                              Subdivision, Barangay Tres, Calamba city, Laguna</a>
                             
                            </div>
                          </li>
                          
                    </ul>
                    <div class="dropdown" style="float: right ;">
                        <button class="btn btn-primary dropdown-toggle"type="button" id="LMS" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          LMS
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">STUDENT</a>
                          <a class="dropdown-item" href="#">ADMIN</a>
                       
                        </div>
                      </div>
                   
                    </div>
              </nav>
        </div>
        <div class="container-fluid" style="padding-top:10px ;">
            <form id="enrollmentform">
                <div class="form-row">
                    <div class="form-group col-md-5">
                 <label for="inputfirstname">First Name</label> 
                    <input type="text" class="form-control" name="firstname" id="inputfirstname" placeholder="First name" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="inputlastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname"id="inputlastname" placeholder="Last name" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputmiddle">MI.</label>
                    <input type="text" class="form-control"name="middlename" id="inputmiddle" placeholder="Middle Initial" required>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                 <label for="inputEmail4">Email</label> 
                    <input type="email" class="form-control" name="email"id="inputEmail" placeholder="Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputcontact">Contact Number</label>
                    <input type="number" class="form-control" name="contactnumber" id="inputcontact" placeholder="contact" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" name="address"id="inputAddress" placeholder="1234 Main St" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city"id="inputCity"required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputProvince">Province</label>
                    <input type="text" class="form-control" name="province"id="inputProvince" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zip"id="inputZip" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT</button required>
              </form>
        </div>
      
        
    </div>
  

    <script src="../resources/jquery/jquery.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>

    <script>
      $("#enrollmentform").submit(function(event){

                // Prevent default posting of form - put here to work in case of errors
                event.preventDefault();

                // setup some local variables
                var $form = $(this);

                // Let's select and cache all the fields
                var $inputs = $form.find("input, select, button, textarea");

                // Serialize the data in the form
                var serializedData = $form.serialize();

                var applicantEmail=$("#inputEmail").val();


                // Fire off the request to /form.php
                request = $.ajax({
                    url: "../database/saveApplicants.php",
                    type: "post",
                    data: serializedData
                });

                    console.log(applicantEmail);
                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    // Log a message to the console
                    console.log("Hooray, it worked!");
                    alert("SUCCESSFULY SUBMITTED");
                  
                    $.ajax({
                      url: "../email/email.php",
                      type: "post",
                      data:{ emailAddress: applicantEmail },
                      success: function(data, textStatus, xhr) {
                          console.log(xhr.status);
                          console.log("Response:  "+data);
                      },
                      complete: function(xhr, textStatus) {
                          console.log(xhr.status);
                      },
                      error: function (request, status, error) {
                          alert(request.responseText);
                      }
                      
                            
                    });
                });


                

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    console.error(
                        "The following error occurred: "+
                        textStatus, errorThrown
                    );
                });

               
                

});

    </script>

    
</body>
</html>
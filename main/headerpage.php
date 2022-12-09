
<div class="upper-part ">
  <div class= "row" style="margin-right:0"> 
  <div class="col-6  col-sm-8 logo-caes" >  
       <img src="../image/download.png" width="45" style=" float:left; padding-top: 5px; padding-right: 5px" >
       <img src="../image/CAESLOGO.png" width="45" style=" float:left; padding-top: 5px; padding-right: 5px" >
       <b> <div style=" font-family:pambata; font-size:30px; padding-top: 7px;  padding-left: 7px; float:left">CAES</div> </b>
    
    </div>
    <div class="col-6 col-sm-4" style="padding-top: 10px; color: #00539cff;  "  >
    <i class="fa-brands fa-square-youtube fa-2x youtube-icon"></i>
    <i class="fa-brands fa-square-twitter fa-2x"style="float:right ;padding-right: 5px"></i>
    <i class="fa-brands fa-square-instagram fa-2x"style="float:right;padding-right: 5px "></i>
    <i class="fa-brands fa-square-facebook  fa-2x" style="float:right ;padding-right: 5px"></i>
   



    </div>

  </div>
  
</div>
 <div class="navigation" style="width: 100%; padding: 0px">            
           <nav class="navbar navbar-expand navbar-dark"style=" background-color:#00539cff ; color: white">
                  <div class="collapse navbar-collapse" id="caes-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                             <a class="nav-link" href="../main/index.php">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                            <div class="dropdown-menu mustard" aria-labelledby="aboutus">
                               <a class="dropdown-item" href="../main/embed.php">Faculty & Staff</a>
                              <a class="dropdown-item" href="../main/mission-vision.php">Mission & Vission</a>
                            </div>
                          </li>
                          <?php 
                        include("./config.php");
                        require 'DbConnect.php';

                        $sql = "SELECT * FROM caes_profiles ";
                        $result = $conn->query($sql);
                    

                        if ($result->num_rows > 0){ 
                            while ($row = $result->fetch_assoc()) {
                        ?>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="contact" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONTACT</a>
                            <div class="dropdown-menu  dropdown-menu-right mustard" aria-labelledby="contact" >
                             <a class="dropdown-item" href="#" >LANDLINE :<?php echo $row ['landline'] ?> </a>
                             <a class="dropdown-item" href="#">CELLPHONE NO:<?php echo $row ['cellphone'] ?></a>
                            </div>
                            <?php
                            
                          }
                   }
                   $conn->close();
                   ?>
                          </li>
                          
                          <li class="nav-item ">
                              <a class="nav-link" href="https://www.google.com/maps/place/Calamba+Adventist+Elementary+School/@14.206145,121.16171,13z/data=!4m5!3m4!1s0x0:0xfc219c49ffbdff05!8m2!3d14.2063114!4d121.1616117?hl=en-US"  target="_blank"> MAP</a>

                          </li>
                    </ul>
                    <div class="dropdown" style="float:right;">
                        <button class="btn btn-primary btn-sm"type="button" id="LMS" > 
                          <a style="color: white ;" href="../../main2/School/LMS/login.html"> LMS</a>
                        </button>              
                      </div>
                   
                  </div>
              </nav>
        </div>
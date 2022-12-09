
<?php include("links.php");
include("./config.php");
?>

 <div class="navigation" style="width: 100%; padding: 0px">            
           <nav class="navbar navbar-expand navbar-dark"style=" background-color:#e9ecef; color: black">
                  <div class="collapse navbar-collapse" id="caes-nav">

                          <div class="upper-part ">
                              <div class= "row" style="margin-right:0"> 
                                  <div class="col-6  col-sm-8 logo-caes" >  
                                      <img src="../image/download.png" width="45" style=" float:left; padding-top: 5px; padding-right: 5px" >
                                      <img src="../image/CAESLOGO.png" width="45" style=" float:left; padding-top: 5px; padding-right: 5px" >
                                      <b> <div style=" font-family:pambata; font-size:30px; padding-top: 7px;  padding-left: 7px; float:left">CAES</div> </b>
                                    
                                    </div>
                                </div>
                            
                          </div>

                          <div class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                              <img src="<?php echo $base_url."//admin//backend//user-image//".$_SESSION["image"]; ?>" width="30" height="30" style=" border-radius: 50%; padding-buttom: 10px" >
                                  <span class="d-none d-lg-inline-flex">
                                    <?php echo $_SESSION["user_name"]; ?>

                                  </span>
                              </a>
                              <div class="dropdown-menu  dropdown-menu-right ">
                                  <a href="../admin/backend/destroy.php" class="dropdown-item">Log Out</a>
                              </div>
                          </div>


                  </div>
            </nav>
</div>

    <header class="header">
          <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">
            <div class="float-right" style="height: 20px"> <a href="#" class="button-right"></a> </div>
        </nav>
    </header>

      <div class="main">
        <aside  style=" height: 100vh; position: fixed">
            <div class="sidebar left ">

             <p style="font-family:pambata; font-size: 20px; padding-left:20px; padding-top: 20px; white">
             CALAMBA ADVENTIST ELEMENTARY SCHOOL</p>
                        <hr>
                <!-- <div class="user-panel">
                    <div class="pull-left info">
                    
                    </div>
                    
              </div> -->
                
                
             <ul class="list-sidebar bg-default">
                <li > 
                    <a href="../admin/user.php" class="collapsed active " ><i class="fa-solid fa-user fa-2x"></i> <span class="nav-label" style="font-family:pambata; font-size: 20px;"> USERS </span>  </a>
                </li>
                <li > 
                    <a href="../admin/editImageLogo.php" class="collapsed active" ><i class="fa-solid fa-pen-to-square  fa-2x"></i> <span class="nav-label"style="font-family:pambata; font-size: 20px;"> EDIT IMAGE / LOGO</span>  </a>
                </li>
                <li > 
                    <a href="../admin/announcement.php" class="collapsed active " > <i class="fa-solid fa-scroll fa-2x"></i><span class="nav-label" style="font-family:pambata; font-size: 20px;">ANNOUNCEMENT </span> </a>
                </li>
                <li > 
                    <a href="../admin/website.php" class="collapsed active" > <i class="fa fa-th-large fa-2x"></i> <span class="nav-label" style="font-family:pambata; font-size: 20px;"> WEBSITE </span>  </a>
                </li>
                <li > 
                    <a href="../admin/missionVision.php" class="collapsed active" > <i class="fa-solid fa-flag fa-2x"></i> <span class="nav-labelfa-2x" style="font-family:pambata; font-size: 20px;"> MISSION AND VISION </span>  </a>
                </li>

                
                </li>
            </ul>
             
            </div>

    
        </aside>
        </div>
        
        </div>




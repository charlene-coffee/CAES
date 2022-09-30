<?php session_start();
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
                                  <!-- <img class="rounded-circle me-lg-2" src="person-icon.jpg" alt="" style="width: 40px; height: 40px;"> -->
                                  <span class="d-none d-lg-inline-flex">
                                    <?php echo $_SESSION["user_name"]; ?>

                                  </span>
                              </a>
                              <div class="dropdown-menu  dropdown-menu-right ">
                                  <a href="login.php" class="dropdown-item">Log Out</a>
                              </div>
                          </div>


                  </div>
            </nav>
</div>

    <header class="header">
          <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">
            <div class="float-right"> <a href="#" class="button-right"><span class="fa fa-fw fa-bars " style="color:white"></span></a> </div>
        </nav>
    </header>

      <div class="main">
        <aside  style=" height: 100vh; position: fixed">
            <div class="sidebar left ">
                <div class="user-panel">
                <div class="pull-left info">
                    <p>CAES ADMIN</p>
                </div>
                </div>

                <ul class="list-sidebar bg-defoult">
                <li> 
                    <a href="../admin/user.php" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> USERS </span>  </a>
                </li>
                <li> 
                    <a href="../admin/announcement.php" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label">ANNOUNCEMENT </span> </a>
                </li>
                <li> 
                    <a href="#" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> WEBSITE </span>  </a>
                </li>
                
                
                </ul>
            </div>
        </aside>
        </div>

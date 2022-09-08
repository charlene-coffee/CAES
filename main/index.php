<!DOCTYPE html>
<html lang="en">
<head>
  <title>website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("links.php");?>

 
  <style>
  
      .image-style{
        height: 450px; 
        width: 1500px;
      }
      .section-1{

        height: 500px;
        background-image: url("https://www.feu.edu.ph/wp-content/themes/feu_theme2019/assets/images/hero_1.jpg");
        background-position: center 11.8581%;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
        /* z-index: 0; */
        
      }
      .overlay{
        background: #20733636;
        overflow: hidden;
        height:100%;
        z-index: 1;
        position: relative;
      }

      .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#00539cff;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
}

      
  </style>
</head>
<body>


        <?php include("headerpage.php");?>
        <section class="section-1" data-bg-overlay="#207336" data-pages="parallax"> 
          <div class="overlay">
            <div classs="container" style="z-index:2 ;width: 100%; overflow: hidden; text-align:center ; position:absolute "> 
          
                <div class="row">
                  <div class="col-3">

                  </div>
                  <div class="col-6" style="font-family: pambata; color: white "> 
                  <img class="logo-class" src="../image/CAESLOGO.png" width="230"  >
                      <h2>CALAMBA ADVENTIST ELEMENTARY SCHOOL</h2>
                      <h6 style="font-family: arial">THE SCHOOL THAT LEADS TO JESUS</h6>
                  </div>
                  <div class="col-3">

                  </div>
                </div>
            </div>
          
         </div>

        </section>


        <div style=" background-color:#00539cff ; height : 10px ; width : 100% " > </div>
          <div class="container" style="padding-top: 50px">
           <div class="row">
                  <div class="col-12 col-sm-6" style=" padding-top : 10px; padding-bottom: 10px"> 
                    <div class="text-center "  style= " padding: 20px ;font-family:pambata1; font-size:60px; border: 5px solid #FFDB58"> 
                      <b>WHY CHOOSE ADVENTIST EDUCATION?</b>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="text-center" style= "font-family:pambata; font-size:25px; padding: 10px">
                          
                          <span style= "font-family:pambata; font-size:40px;" >Because ,</span>
                          it offer holistic education prepares our young people not just
                          for success in this life but for eternity.

                          It Demonstrate respect, Integrity, Truthfulness, 
                          Perseverance, Responsible, Caring, Courage And Problem Solving.
                          Students are Equipped with Life Skills to be Productive Citizens of the World.
                
                    </div>

                   
                  </div>
                    
                  
           </div>
           
          </div>
          <div style="padding-top: 50px">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 image-style" src="../image/announcement 1.jpg" alt="First slide" >
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 image-style" src="../image/announcement2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 image-style" src="../image/student.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 image-style" src="../image/announcement.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div>
          
          <?php include("footer.php");?>
    </div>
    <?php include("script.php");?>

    <!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "102935255417585");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    
</body>
</html>
       
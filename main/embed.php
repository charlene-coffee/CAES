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

        <?php 
                        include("./config.php");
                        require 'DbConnect.php';


                        $sql = "SELECT faculty FROM caes_profiles";
                        $result = $conn->query($sql);
                        $count=0;
                        $active ="";

                        

                        if ($result->num_rows > 0){ 
                            while ($row = $result->fetch_assoc()) {
                              $count=$count+1;

                              if($count ==1){
                                $active ="active";
                              }else{
                                $active="";
                              }
 
                        ?>

        <embed class="dropdown-item" src="<?php echo $base_url."/admin/backend/faculty/".$row['faculty']."#toolbar=0&navpanes=0&scrollbar=0"; ?>" width="800px" height="1000px" />

         <?php
                            
                          }
                   }
                   $conn->close();
                   ?>

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
       
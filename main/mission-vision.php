<!DOCTYPE html>
<html lang="en">
<head>
  <title>mission-vission</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("links.php");?>
 
</head>
<body>
    
    <?php include("headerpage.php");?>
        <div class="container-fluid" style=" background: #FFDB58; padding-bottom: 10px ; padding-top: 0px">     
                    
                <center>  
                <?php 
                        include("./config.php");
                        require 'DbConnect.php';

                        $sql = "SELECT * FROM caes_profiles ";
                        $result = $conn->query($sql);
                    

                        if ($result->num_rows > 0){ 
                            while ($row = $result->fetch_assoc()) {
                        ?>

                
                <div class="col-xs-12 col-sm-6">
                    <H1 style="font-family: pambata; font-size :50px; padding-top:  30px"> MISSION</H1>
                    <p class="mv-fontsize" >
                        <?php
                        echo $row ['mission']
                        
                        ?>
                    </p>  
                    
                    <H1 style="font-family: pambata; font-size :50px; padding-top: 30px;" >VISION</H1>
                    <p class="mv-fontsize"> 
                       <?php
                       echo $row ['vision']
                       ?>
                    </p>

                    <?php
                            
                        }
                 }
                 $conn->close();
                 ?>
                    
                        
                    <H1 style="font-family: pambata; font-size :50px; padding-top:  30px">CAES PHILOSOPHY</H1>
                    <p class="mv-fontsize">
                            God the Creator and Sustainer of the Earth, and the entire universe is the source of all knowledge and wisdom
                    </p>

                    <H1 style="font-family: pambata; font-size :50px; padding-top:  30px">CALAMBA HYMN</H1>
                            
                    <p style="margin:0" class="mv-fontsize">
                            Sa Baybay ng Look ng Laguna
                              Bayan kang tangi sa ganda
                              Duyan ka ng mga bayaning
                              Sa bansa’y nagbigay puri.
                              Ang burol mo at kapatagan
                              Ay hitik sa kasaysayan
                              O kalan at bangang aming sinta
                              At kadluan ng pag-asa
                              O bayang mahal, sa lahi’y dangal
                              Alay namin sa iyo ang buhay
                              At laging hangad ang iyong pag-unlad
                              Kadakilaang walang kupas
                              Langit ng mga pangarap
                              Ang paglaya ay hiyas
                              O Calambang Mahal, ating itanghal

                              Tanging lingkod ng (Iba) Inang Bayan (2X)

                              (Ulitin lahat)
                      </p>       
                      
                      
                  </div>   
                </center>         
                
        </div>
       
  
    <?php include("footer.php");?>
    <script src="../resources/jquery/jquery.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>
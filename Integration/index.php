<?php

 
session_start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }


?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <div class="page-header">
         <div class="row">
            <div class="col-sm-6 p-t-30">
               <h3>Integrations and connected apps</h3>
               <span class="f-14 light-font">Supercharge your workflow and connect the tool you use every day.</span>
               
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                         
                        <div class="row"> 
                             
                               <div class="col-md-4">
                                <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search...." />
                                
                             </div>
                             <div class="col-md-3">
                               
                                
                             </div>
                             <div class="col-md-3">
                                
                             </div>
                                 <div class="col-md-2">
                                     <input type="button" name="pick" value="Custom integration" id="refresh" class="btn btn-md btn-primary f-right ref" />
                                 </div>
                            </div><br>
                            <hr>
                              <div class="media"><img class="img-fluid rounded-circle me-3" src="https://img.icons8.com/color/344/shopify.png" alt="">
                      <div class="media-body"><span><h6>Shopify</h6></span>
                        <p class="f-14 light-font">Build your business with Shopify to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-success btn-sm mt-3" type="button">Connected</button>
                    </div><hr>
                     <div class="media"><img class="img-fluid rounded-circle me-3" src="https://img.icons8.com/color/344/ebay.png" alt="">
                      <div class="media-body"><span><h6>Ebay</h6></span>
                        <p class="f-14 light-font">Build your business with Ebay to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-outline-success btn-sm mt-3" type="button">Connect</button>
                    </div><hr>
                     <div class="media"><img class="img-fluid  me-3" src="https://cdn.worldvectorlogo.com/logos/marketplace-facebook.svg" alt="">
                      <div class="media-body"><span><h6>Facebook</h6></span>
                        <p class="f-14 light-font">Build your business with Facebook to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-outline-success btn-sm mt-3" type="button">Connect</button>
                    </div><hr>
                    <div class="media"><img class="img-fluid  me-3" src="https://img.icons8.com/ios-filled/344/etsy.png" alt="">
                      <div class="media-body"><span><h6>etsy</h6></span>
                        <p class="f-14 light-font">Build your business with Shopify to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-outline-success btn-sm mt-3" type="button">Connect</button>
                    </div><hr>
                    <div class="media"><img class="img-fluid me-3" src="https://img.icons8.com/color/344/depop-logo.png" alt="">
                      <div class="media-body"><span><h6>Depop</h6></span>
                        <p class="f-14 light-font">Build your business with Shopify to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-outline-success btn-sm mt-3" type="button">Connect</button>
                    </div><hr>
                     <div class="media"><img class="img-fluid me-3" src="https://img.icons8.com/cute-clipart/344/woocommerce.png" alt="">
                      <div class="media-body"><span><h6>Woocommerce</h6></span>
                        <p class="f-14 light-font">Build your business with Shopify to sell online, offline, and everywhere in between</p>
                      </div>
                      <button class="btn btn-outline-success btn-sm mt-3" type="button">Connect</button>
                    </div>
                            </div>
                            
                      <!-- paste your code -->
                      
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          
          
       
        </div>
        <!-- footer start-->
        <script>
            
            (function(){
 
  
  $("#cart").on("click", function() {
    $(".onhover-show-div1").fadeToggle( "fast");
  });
  
})();
        </script>

<?php include ("../include/footer.php"); ?>
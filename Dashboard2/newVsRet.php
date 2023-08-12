<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <!--<div class="container-fluid">-->
   <!--   <div class="page-header">-->
   <!--      <div class="row">-->
   <!--       <div class="col-md-4">-->
   <!--           <h3 class=" modal-title"> Courier Status Report</h3>-->
               
   <!--         </div>-->
   <!--      <div class="col-md-4 mt-3">-->
        
   <!--      </div>-->
   <!--      <div class="col-md-2">-->
   <!--         <div class="form-group ">-->
   <!--                       <label class="col-sm-3 col-form-label">From</label>-->
   <!--                       <div class="">-->
   <!--                         <div class="input-group">-->
   <!--                           <input class=" form-control digits" id="fromdate" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">-->
   <!--                         </div>-->
   <!--                       </div>-->
   <!--                     </div>-->
            
   <!--      </div>-->
   <!--      <div class="col-md-2">-->
   <!--         <div class="form-group ">-->
   <!--                       <label class="col-sm-3 col-form-label">To</label>-->
   <!--                       <div class="">-->
   <!--                         <div class="input-group">-->
   <!--                           <input class=" form-control digits" type="date" id="todate" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">-->

   <!--                         </div>-->
   <!--                       </div>-->
   <!--                     </div>-->
   <!--      </div>-->
         
   <!--     </div>-->
   <!--   </div>-->
   <!--</div>-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                  
              <iframe width="1200" height="900" src="https://lookerstudio.google.com/embed/reporting/cae4c399-738d-4bca-a062-b4753e8b3b06/page/eMhTD" frameborder="0" style="border:0" allowfullscreen></iframe>
                  
                </div>
              </div>
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
            </div>
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
             
                
        
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>


            
<!--            (function(){-->
 
  
<!--  $("clickT").on("click", function() {-->
<!--    $(".onhover-show-div1").fadeToggle( "fast");-->
<!--  });-->
  
<!--})();-->
        </script>
        
        
        
        
<?php include ("../include/footer.php"); ?>
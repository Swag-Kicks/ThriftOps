<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   date_default_timezone_set("Asia/Karachi");
   error_reporting(0);
   
   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
       $cr=$_SESSION['id'];
       
       $pr="Select * from User Where Dept_ID=5 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
        $resu2 = mysqli_num_rows( mysqli_query($mysql, $pr));
        // $rowq1 =mysqli_fetch_array($resu2);
        // $dept=$rowq1['Dept_ID'];
        //echo $dept;
        if($resu2<1)
        {
            echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
        }   
   }
   else 
   {
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   


   
   ?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->
<style>

    iframe {
        overflow-x: hidden;
  display: block; /* Make the iframe a block-level element */
  width: 100%; /* Set the width to 100% of its container */
  height: 300px; /* Set a fixed height or adjust it to fit your needs */
  border: none; /* Remove the border */
}

#loading-message {
  display: none; /* Hide the message by default */
  position: absolute; /* Position the message absolutely */
  top: 50%; /* Set the top position to the middle of the page */
  left: 50%; /* Set the left position to the middle of the page */
  transform: translate(-50%, -50%); /* Center the message horizontally and vertically */
  font-size: 1.4rem; /* Set the font size */
  color: #333; /* Set the text color */
  font-weight:500;
}
  #loading-message {
    /* Add CSS transitions to fade in/out */
    transition: opacity 0.5s ease-in-out;
  }
  #my-iframe {
    /* Add CSS transitions to fade in/out */
    transition: opacity 0.5s ease-in-out;
  }
  td {
    text-align-last: center;
}

th {
    text-align-last: center;
}
</style>
<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-4">
              <h3 class=" modal-title">Batches </h3>
               
            </div>
            <div class="col-md-4 mt-3">
           
         </div>
         <div class="col-md-2">
            
            
         </div>
         <div class="col-md-2">
             <!--<a href="#" name="new" id="btnmodalnew" class="btn btn-primary-light m-l-15 f-right"> New</a>-->
         </div>
         
        </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                  
                <div class="">
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;">
               
                <div class="col-md-4 p-r-20" style="margin-top:30px;">
                  
               <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Search . . . .">
  </div>

                          
                        
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                
                 <select class="form-control form-select form-control-secondary f-left" id="ven">
                           <option disabled selected value="">Filter By Vendor</option>
                              <?php
                                 $records = mysqli_query($mysql, "SELECT * FROM `Vendor`"); 
                                 while($data = mysqli_fetch_array($records))
                                 {
                                     echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                                 }   
                                 ?> 
                          
                        </select>
                        
                </div>
                  <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
                 <select class="form-control form-select form-control-secondary f-left" id="type">
                           <option disabled="" selected="" value="">Filter by Type</option>
                              <option value="Cash">Cash</option>
                              <option value="Percentage">Percentage</option> 
                          
                        </select>
                </div>
                 <div class="col-md-2 text-end " style="margin-top:34px;">
                <a href="#" id="ref" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary" >Refresh</a>
                </div>
              </div>
              
            <div class="table-responsive">
                
                <div id="dynamic_content"></div>
                  </div>
              
        
                </div>
                
             <!--PURCHASE ORDER start-->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
      <div class="modal-content" >
        <div class="modal-body" style="padding: 2rem;padding-top: 3em;">
         <div class="form-group">
                         
                     
        
     
           <div class="row">
                                 <div class="col-md-6 ">
                                     <img src="../assets/images/print/print">
                                 </div>
                                 <div class="col-md-6 f-right t-r">
                                     <h3 id="batchpreview"><b></b></h3>
                                 </div>
                                 
                             </div>
                             <br><br>
                             <div id="loading-message"><i class="fa fa-spin fa-spinner"></i> Loading barcodes...</div>
                             <div id="dynamic_content1"></div>
                            
                     
    
        <div class="modal-footer">
          
          <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
          <a href="#" target = "_blank" class="btn btn-primary pull-right" id="poprint">Print</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--PURCHASE ORDER end--> 
        
             <!--<div id="newmodal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
             <!--         <div class="modal-dialog modal-dialog-centered">-->
             <!--           <div class="modal-content">-->
             <!--             <div class="" ><br>-->
                            <!--<h4 class="modal-title" id="mySmallModalLabel">Add Attribute</h4>-->
             <!--               <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>-->
             <!--             </div>-->
             <!--             <div class="modal-body">-->
             <!--                   <div class="mb-3">-->
             <!--                                   <label class="col-form-label pt-0"> Name</label>-->
             <!--                                   <input class="form-control" id="name"  name="name" placeholder="Enter New  Name">-->
             <!--                                </div>-->
                                             
             <!--                                <button class="btn btn btn-primary-light">ADD</button>-->
             <!--             </div>-->
             <!--           </div>-->
             <!--         </div>-->
             <!--       </div>    -->
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>



<script>
    var header = document.getElementById("currentbutton");
    var btns = header.getElementsByClassName("btn-primary-light");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("curent");
      if(current[0] != undefined){
      current[0].className = current[0].className.replace(" curent", "");
      }
      this.className += " curent";
      });
}

 
</script>
<!--TABLE STYLE FOR SERIAL NUMBERS-->

<script>
    $(document).ready(function(){
        $("#btnmodal").click(function(){
            $("#myModal").modal('toggle');
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#btnmodalnew").click(function(){
            $("#newmodal").modal('toggle');
        });
    });
</script>
 <script>
  // Get the loading message and iframe elements
  var loadingMessage = document.getElementById("loading-message");
  var myIframe = document.getElementById("my-iframe");
  
  // Show the loading message and hide the iframe by default
  loadingMessage.style.opacity = "1";
  myIframe.style.opacity = "0";
  
  // Fade out the loading message and fade in the iframe when it's loaded
  myIframe.onload = function() {
    loadingMessage.style.opacity = "0";
    myIframe.style.opacity = "1";
  };
  
  
</script>

<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '',vendor,type)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query,vendor:vendor,type:type},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var vendor = document.getElementById("ven").value; 
      var type = document.getElementById("type").value; 
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query,vendor,type);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });
    
    $(document).on('click', '#ref', function(){
       
        toastr.info('Refreshed!');
        document.getElementById("ven").value='';
        document.getElementById("type").value='';
        load_data(1);
    });
    
    $(document).on('click', '#ven', function(){
      var vendor = document.getElementById("ven").value;
      var type = document.getElementById("type").value;
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query,vendor,type);
    });
    
    $(document).on('click', '#type', function(){
      var vendor = document.getElementById("ven").value;
      var type = document.getElementById("type").value;
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query,vendor,type);
    });
    
    $(document).on('click', '#btnmodal', function(){
        var batch=$(this).attr('batch');
        $('#myModal').modal('toggle');
        $('#batchpreview').html('Batch #'+batch);
        var val="<iframe id='my-iframe' src='../Batches/View.php?var1="+batch+"' ></iframe>";
        var a = document.getElementById('poprint'); 
        a.href = "Print.php?var1="+batch;
        $('#dynamic_content1').html(val);
         
        
    
    });
   

  });
</script>
        
        
<?php include ("../include/footer.php"); ?>
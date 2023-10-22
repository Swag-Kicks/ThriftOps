<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->
<style>
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
              <h3 class=" modal-title">Load Sheet Logs</h3>
               
            </div>
            <div class="col-md-4 mt-3">

         </div>
         <div class="col-md-2">
            
            
         </div>
         <div class="col-md-2">
            
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
                    
             
                
                 <select class="form-control form-select form-control-secondary f-left" >
                           <option disabled="" selected="" value="">Filter by status</option>
                              <option value="1"></option><option value="2"></option> 
                          
                        </select>
                </div>
                 <div class="col-md-5 text-end " style="margin-top:34px;">
                <a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary" >Refresh</a>
                 <a href="#" name="pick" id="btnmodal" class="btn btn-primary-light m-l-15 f-right">Generate  New</a>
                </div>
              </div>
              
        <div class="row" style="background-color:#F9FCFF;margin:0.8px">
               
                <div class="col-md-10 p-r-20">
                  
               <div class=" " style="margin-top:10px;margin-bottom:25px;" id="currentbutton">
                <a href="#" id="newupload" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent">Call Courier</a>
                <a href="#" id="return" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Trax </a>
                 <a href="#" id="ordercancel" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Postex </a>
                <a href="#" id="transefer" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Leopard</a>
                 <a href="#" id="ordercancel" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Rider </a>
                <a href="#" id="transefer" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Self Delivery</a>
                </div>
                        
                </div>
               
                
              </div>
              
        <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Loadsheet ID</th>
                          <th scope="col">Total Orders</th>
                          <th scope="col">Handed Over by</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status </th>
                          <th scope="col"> </th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#74596</td>
                          <td>300</td>
                          <td>Hamza</td>
                          <td>2022-11-19</td>
                          <td>N/A</td>
                          <td><a href="#" data-role="prview" data-id="76"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a></td>
                          <th scope="row"><i data-feather="download"></i></th>
                        </tr>
                        <tr>
                            <td>#74596</td>
                          <td>300</td>
                          <td>Hamza</td>
                          <td>2022-11-19</td>
                          <td>N/A</td>
                          <td><a href="#" data-role="prview" data-id="76"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a></td>
                          <th scope="row"><i data-feather="download"></i></th>
                        </tr>
                        <tr>
                         <td>#74596</td>
                          <td>300</td>
                          <td>Hamza</td>
                          <td>2022-11-19</td>
                          <td>Picked</td>
                          <td><a href="#" data-role="prview" data-id="76"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a></td>
                          <th scope="row"><i data-feather="printer"></i></th>
                        </tr>
                        <tr>
                          <td>#74596</td>
                          <td>300</td>
                          <td>Hamza</td>
                          <td>2022-11-19</td>
                          <td>Picked</td>
                          <td><a href="#" data-role="prview" data-id="76"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a></td>
                          <th scope="row"><i data-feather="download"></i></th>
                        </tr>
                        <tr>
                          <td>#74596</td>
                          <td>300</td>
                          <td>Hamza</td>
                          <td>2022-11-19</td>
                          <td>N/A</td>
                          <td><a href="#" data-role="prview" data-id="76"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a></td>
                          <th scope="row"><i data-feather="download"></i></th>
                        </tr>
                      </tbody>
                    </table>
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
                                     <img src="https://backup.thriftops.com/assets/images/print/print">
                                 </div>
                                 <div class="col-md-6 f-right t-r">
                                     <h3><b>Load Sheet</b></h3>
                                 </div>
                                 
                             </div>
                        
                       <br><br>
                       <div class="row">
                       
                    <div class="col-md-6">
                        <label class="Pon f-18">Load Sheet #&nbsp;<lable style="font-weight: bold;">00001</label></label><br>
                       
                        
                        <label class="Pon f-18">Date:&nbsp;<lable style="font-weight: bold;">22/11/2022</label></label><br><br>
                        <label class="Pon f-18">Courier:&nbsp;<lable style="font-weight: bold;">PostEx</label></label><br>

                    </div>
                  
                   <div class="col-md-6 f-right t-r" >
                        <h4><b>Swagkicks</b></h4>
                      <label class="f-18">B-165, Block D,<br>North Nazimabad,<br> Karachi</label>
                  </div>
              </div>
       <table class="table table-striped">
                      <thead class="table-inverse table-striped">
                      <tr class="text-center">
                            <td scope="col">SNO</td>
                            <td scope="col">SKU</td>
                            <td scope="col">Order Ref</td>
                            <td scope="col">Tracking#</td>
                            <td scope="col">Items QTY</td>
                            <td scope="col">Date</td>
                            <td scope="col">Amount</td>
                            
                            
                       </tr>
                      </thead>
                    
                        
                        
                                       <tbody class="text-center">
                                        <tr>
                                          <td>1</td>
                                          <td>Sk-12345</td>
                                          <td>#60131</td>
                                           <td>1245151234161</td>
                                          <td>3</td>
                                          <td>22/11/2022</td>
                                          <td>8910</td>
                                          
                                          
                                                                        
                                     </tr>
                                        </tbody>
                                                    
                        
                        
                                      <tbody class="text-center">
                                        <tr>
                                          <td>1</td>
                                          <td>Sk-12345</td>
                                          <td>#60131</td>
                                           <td>1245151234161</td>
                                          <td>3</td>
                                          <td>22/11/2022</td>
                                          <td>8910</td>
                                          
                                                                        
                                     </tr>
                                        </tbody>
                                                    
        </table>
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

        
        
        
<?php include ("../include/footer.php"); ?>
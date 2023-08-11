<?php  
session_Start();
include_once("../include/mysql_connection.php");
$cr=$_SESSION['id'];
// echo "<script>alert($cr);</script>";
?>

<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->
<style>
   
</style>
<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-6">
              <h3 class=" modal-title">QC Rejected Articles</h3>
                
               
            </div>
            <div class="col-md-6"> 
           
             
         </div>
         <div class='col-md-3 mt-3'>
   
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
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-md-8 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Not Uploaded<span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Repaired<span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft<span id="cancelc"></span> </a></li>


                  
                
                    </ul>
                </div>
                <div class="col-md-4 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="bulkstatus" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="dstatus">Adjust Status</option>
                                  <option value="dquantity">Adjust Quantity</option>
                                  <option value="dfetch">Fetch Status</option>
                                 
                                  
                            </select>
                            </li>
                        
                            <li><button class="dropbtn"><i class="icon-reload" id="ref"></i></button></li>

                            <li><div class="dropdown" >
                            <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit" class="form-control">
                                  <option>10</option>
                                  <option>20</option>
                                  <option>50</option>
                                  <option>100</option>
                                  <option>500</option>
                                  <option>All</option>
                            </select>
                            <a  style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                             <select id="sort" class="form-control">
                                  <option>DESC</option>
                                  <option>ASC</option>
                           </select>
                          </div>
                        </div>
                        </li>
                            <li><button class="dropbtn"><i class="icon-import" id="excel" onclick="fnExcelReport();"></i></button></li>
                          
                            
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
    <table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;">
        <thead>
            <tr id="test" style="background-color:#E0E3EC;" role="row">
                <!--<th class="res"></th>-->
                <th class="res">
                    <br>
                    <input class="checkbox1" id="allcb" type="checkbox" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >SKU
                    <br>
                    <input id="sku" type="text" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Product
                    <br>
                    <input id="title" type="text" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Image
                    <br>
                    <input id="city" type="text " style="visibility: hidden;" >
                </th>
                <th class="res" id="quantity" tabindex="0" aria-controls="example" rowspan="1" colspan="1">QTY&nbsp;<i class="fa fa-sort"></i>
                    <br>
                    <input id="tracking" type="text" style="visibility: hidden;"   >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Vendor 
                    <br>
                    <select class='form-control form-select form-control-secondary f-left' id='ven'>
                        <option disabled selected value=''></option>
                        <!-- PHP code for fetching vendors removed -->
                    </select>
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Batch 
                    <br>
                    <select class='form-control form-select form-control-secondary f-left' name="lot" id="lot">
                        <option disabled selected value=''></option>
                        <!-- PHP code for fetching lots removed -->
                    </select>
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Rejected by
                    <br>
                    <input id="number" type="text"  >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status 
                    <br>
                    <select class='form-control form-select form-control-secondary f-left' id='status'>
                        <option disabled selected value=''></option>
                        <option value='active'>Active</option>
                        <option value='draft'>Draft</option>
                        <option value='archive'>Archive</option>
                    </select>
                </th>
                <th class="res" id="date" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date&nbsp;<i class="fa fa-sort"></i>
                    <br>
                    <input type="text" style="visibility: hidden;" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"> 
                   

            	<br>
              <input type="text" style="visibility: hidden;" >
            </th>
            <th></th>
            </tr>    
            </thead>
            </table>
            </div>
                </div>
                
            
        
          
            
      </div>
   </div>
    <!--Quantity modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="quantity_modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Adjust Quantity</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                    <input class="form-control" type="number"  id="quanval"  name="removedby" aria-describedby="emailHelp">
                                </div>
                                <a href="#" data-role="conf_save" id="upquan" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Quantity modal-->
                         
                         
                          <!--Status modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="status_modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Adjust Status</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="statval" required>
                                               <option value="" disabled selected >Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="draft">Draft</option>
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="upstat" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Status modal-->
   
                      <!--Barcode modal--> 
                         <div class="modal fade" id="barcodeModalCenter" tabindex="-1" aria-labelledby="barcodeModalCenter" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Scan QR Code</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                    <img src="barcode-scan.gif" class=" " id="qrcodeimage" > 
                                               <input class="form-control" type="text" name="barcode" id="barcode" aria-describedby="barcode" onkeyup="searchBarcode()" placeholder="Enter QR Code" style="opacity:0;" >
                                                
                                             </div>
                                              <!--<a href="#" data-role="conf_save" id="upstat" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Search</a>-->
                                              <!--<button type="button" class="btn btn-outline-primary pull-right" id="modclear" onclick="ResetBarcode()" data-bs-dismiss="modal">NEW </button>-->
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Barcode modal-->
   
</div>


<?php include ("../include/footer.php"); ?>
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
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-4">
              <h3 class=" modal-title">Packed List</h3>
               
            </div>
            <div class="col-md-4 mt-3">
            
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" id="fromdate" onchange="ChangeDate()" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" id="todate" onchange="ChangeDate()" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">

                            </div>
                          </div>
                        </div>
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
                <div class="col-md-6 " style="margin-top:34px;" id="currentbutton">
                <a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light " >Recieve</a>
                <a href="Create"  onclick="PickedList()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent" >Pack</a>
                 <a href="Create" onclick="NotfoundList()" name="pick"  id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Extra Items </a>
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="change" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="Reason for deallocation">Deallocate</option>
                                 
                                  
                            </select>
                            </li>
                        
                            <li><button class="dropbtn" onclick="window.location.reload();"><i class="icon-reload" id="ref"></i></button></li>

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
          <div class="row" style="background-color:#F9FCFF;margin:0.8px;">
                <div class="col-md-9 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Ready <span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Packed <span id="confirmc"></span> </a></li>
       
                    </ul>
                </div>
                </div>
                
           
        
              
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>
 <div class="row">
                <div class="col-md-4">

                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
              </div>
               <div class="col-md-4">

                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
              </div>
              <div class="col-md-4">

                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
                <div class="card card-hidden ">
                    <div class="card-header1 greyh">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>#65710</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 setting-list">
                        <i class="icofont icofont-simple-down minimize-card"></i>
                    </div>
                        </div>
                        
                    </div>
                    <div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>karachi</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="card-body padding" style="display:none;">
                        <div class="productpack">
                            <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.4000</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        <div class="form-group row">
                          <div class="media">
                          <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>
                                    <span class="notetext">Rs.4000</span><br>
                                    <span><b>Rs.400</b></span></div>
                                         <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>
                                        </div>
                                         <div class="col-sm-2">
                                         <h6>1</h6></div>
                                    </div>
                                    </div>
                              </div>
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>This is a sample text. Dispatch advice would be displayed here.</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>
                       </div>
                                            </div>
                    
                </div>
              </div>
               
            </div>
            <!-- <div class="row">-->
            <!--    <div class="col-md-4">-->

            <!--    <div class="card card-hidden ">-->
            <!--        <div class="card-header1 greyh">-->
            <!--            <div class="row">-->
            <!--                <div class="col-sm-1">-->
            <!--                    <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>-->
            <!--                </div>-->
            <!--                <div class="col-sm-9">-->
            <!--                    <h5 class="mb-0 h6">-->
            <!--                    <b>#65710</b>-->
            <!--                     </h5>-->
            <!--                </div>-->
            <!--                <div class=" col-sm-1 setting-list">-->
            <!--            <i class="icofont icofont-simple-down minimize-card"></i>-->
            <!--        </div>-->
            <!--            </div>-->
                        
            <!--        </div>-->
            <!--        <div class="row pt-3 pb-2 greyh1">-->
            <!--            <div class="col-sm-1"></div>-->
            <!--            <div class="col-sm-4"><b>karachi</b></div>-->
            <!--            <div class="col-sm-2"></div>-->
            <!--            <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>-->
            <!--            <div class="col-sm-1"></div>-->
            <!--        </div>-->
            <!--        <div class="card-body padding" style="display:none;">-->
            <!--            <div class="productpack">-->
            <!--                <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.4000</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.400</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            </div>-->
                        
            <!--        <div class="mxl-3 pt-2">-->
            <!--         <h5 class="font-weight-bold">Dispatch Advice:</h5> -->
            <!--         <span>This is a sample text. Dispatch advice would be displayed here.</span>-->
            <!--         </div>-->
            <!--        <div class="modal-footer mxl-3">-->
                         
            <!--             <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>-->
            <!--             <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>-->
            <!--           </div>-->
            <!--                                </div>-->
                    
            <!--    </div>-->
            <!--  </div>-->
            <!--   <div class="col-md-4">-->

            <!--    <div class="card card-hidden ">-->
            <!--        <div class="card-header1 greyh">-->
            <!--            <div class="row">-->
            <!--                <div class="col-sm-1">-->
            <!--                    <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>-->
            <!--                </div>-->
            <!--                <div class="col-sm-9">-->
            <!--                    <h5 class="mb-0 h6">-->
            <!--                    <b>#65710</b>-->
            <!--                     </h5>-->
            <!--                </div>-->
            <!--                <div class=" col-sm-1 setting-list">-->
            <!--            <i class="icofont icofont-simple-down minimize-card"></i>-->
            <!--        </div>-->
            <!--            </div>-->
                        
            <!--        </div>-->
            <!--        <div class="row pt-3 pb-2 greyh1">-->
            <!--            <div class="col-sm-1"></div>-->
            <!--            <div class="col-sm-4"><b>karachi</b></div>-->
            <!--            <div class="col-sm-2"></div>-->
            <!--            <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>-->
            <!--            <div class="col-sm-1"></div>-->
            <!--        </div>-->
            <!--        <div class="card-body padding" style="display:none;">-->
            <!--            <div class="productpack">-->
            <!--                <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.4000</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.400</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            </div>-->
                        
            <!--        <div class="mxl-3 pt-2">-->
            <!--         <h5 class="font-weight-bold">Dispatch Advice:</h5> -->
            <!--         <span>This is a sample text. Dispatch advice would be displayed here.</span>-->
            <!--         </div>-->
            <!--        <div class="modal-footer mxl-3">-->
                         
            <!--             <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>-->
            <!--             <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>-->
            <!--           </div>-->
            <!--                                </div>-->
                    
            <!--    </div>-->
            <!--  </div>-->
            <!--   <div class="col-md-4">-->

            <!--    <div class="card card-hidden ">-->
                    
                   
            <!--         <details class="packlist fade-in-forward" >-->
            <!--          <summary class="drop"> <div class="card-header11 greyh" onclick="myFunction()">-->
            <!--            <div class="row">-->
            <!--                <div class="col-sm-1">-->
            <!--                    <i class="fa fa-circle st-inprogress" style="font-size:24px;"></i>-->
            <!--                </div>-->
            <!--                <div class="col-sm-9">-->
            <!--                    <h5 class="mb-0 h6">-->
            <!--                    <b>#TEST</b>-->
            <!--                     </h5>-->
            <!--                </div>-->
            <!--                <div class=" col-sm-1 ">-->
            <!--            <i  onclick="myFunction(this)"  id="iconswitch" class="fa fa-angle-double-down"></i>-->
            <!--        </div>-->
            <!--            </div>-->
                        
            <!--        </div><div class="row pt-3 pb-2 greyh1">-->
            <!--            <div class="col-sm-1"></div>-->
            <!--            <div class="col-sm-4"><b>karachi</b></div>-->
            <!--            <div class="col-sm-2"></div>-->
            <!--            <div class="col-sm-4"><b class="f-right">LP23197519231</b></div>-->
            <!--            <div class="col-sm-1"></div>-->
            <!--        </div></summary>-->
            <!--          <div class="card-body padding">-->
            <!--            <div class="productpack">-->
            <!--                <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.4000</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            <div class="form-group row">-->
            <!--              <div class="media">-->
            <!--              <img class="img-75 img-fluid m-r-20" alt="" src="../assets/images/social-app/post-6.png">-->
            <!--                    <div class="media-body">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-sm-9"><h6 class="d-block">SK-S12451</h6><br>-->
            <!--                        <span class="notetext">Rs.4000</span><br>-->
            <!--                        <span><b>Rs.400</b></span></div>-->
            <!--                             <div class="col-sm-1"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button>-->
            <!--                            </div>-->
            <!--                             <div class="col-sm-2">-->
            <!--                             <h6>1</h6></div>-->
            <!--                        </div>-->
            <!--                        </div>-->
            <!--                  </div>-->
                              
                            
            <!--            </div> -->
            <!--            </div>-->
                        
            <!--        <div class="mxl-3 pt-2">-->
            <!--         <h5 class="font-weight-bold">Dispatch Advice:</h5> -->
            <!--         <span>This is a sample text. Dispatch advice would be displayed here.</span>-->
            <!--         </div>-->
            <!--        <div class="modal-footer mxl-3">-->
                         
            <!--             <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Print Label</button>-->
            <!--             <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;">Pack</a>-->
            <!--           </div>-->
            <!--                                </div>-->
            <!--        </details>-->
                    
                    
            <!--    </div>-->
               
            <!--  </div>-->
               
            <!--</div>-->


<script>
function myFunction() {
  var element = document.getElementById("iconswitch");
   if (element.classList.contains("fa-angle-double-down")) {
      element.classList.remove("fa-angle-double-down");
      element.classList.add("fa-angle-double-up");
    } else {
      element.classList.remove("fa-angle-double-up");
      element.classList.add("fa-angle-double-down");
    }
}
</script>

<style>
    i.fa {
  
  cursor: pointer;
  user-select: none;
}

.fa:hover {
  color: darkblue;
}
</style>

        
        
        
<?php include ("../include/footer.php"); ?>
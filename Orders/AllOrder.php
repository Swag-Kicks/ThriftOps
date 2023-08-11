<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->
<div class="page-body-wrapper horizontal-menu">
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title"> All Order</h3>
               
            </div>
            <div class="col-md-4">
             <button  name="pick"  id="addorder" class="btn btn-primary-light m-l-15 f-right" >Add Orders</button>
         </div>
         <div class="col-md-2">
            <div class="form-group f-right">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                              <div class="input-group-text" data-target="#dt-minimum" data-toggle="datetimepicker"><i class="fa fa-calendar-o"> </i></div>
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
            <div class="form-group f-right">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">
                              <div class="input-group-text" data-target="#dt-minimum" data-toggle="datetimepicker"><i class="fa fa-calendar-o"> </i></div>

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
               <div class="">
                  <div class="">
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-md-9 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a onclick="typeAll()" class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All</a></li>
                      <li class="nav-item"><a onclick="typeSupplier()" class="nav-link" id="totalSuppliers" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Pending</a></li>
                      <li class="nav-item"><a onclick="typePeer()" class="nav-link" id="totalPeer" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Confirmed</a></li>
                  <li class="nav-item"><a onclick="typeSeller()" class="nav-link" id="totalSeller" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Cancelled</a></li>
                  <li class="nav-item"><a onclick="typeSeller()" class="nav-link" id="totalSeller" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">On-Hold</a></li>
                  <li class="nav-item"><a onclick="typeSeller()" class="nav-link" id="totalSeller" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Reattempted</a></li>

                  
                
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
           
                            <li><button class="dropbtn"><i class="icon-reload" onclick="history.go(0);"></i></button></li>
                            <li><button class="dropbtn"><i class="icon-import" id="btnExport" onclick="fnExcelReport();"></i></button></li>
                            <li><div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            <a href="#" onclick="show10()">10</a>
                            <a href="#" onclick="show20()">20</a>
                            <a href="#" onclick="show50()">50</a>
                            <a href="#" onclick="show10()">100</a>
                            <a  style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                            <a href="#" onclick="asc()">ASC</a>
                            <a href="#" onclick="desc()">DEC</a>
                          </div>
                        </div>
                        </li>
                            <li><button class="dropbtn"><i class="icon-settings"></i></button></li>
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
              <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;"><table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;"><thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 306.188px;text-align: center;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Orders
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Type: activate to sort column ascending">Customer
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Contact: activate to sort column ascending">City
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Stock Keeping: activate to sort column ascending">Item(s)
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Fullfillment: activate to sort column ascending">Amount
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Fullfillment: activate to sort column ascending">Status
            	<br>
            	<input type="text" style="width:130px;">
            </th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Batches: activate to sort column ascending">Date
            	<br>
            	<input type="text" style="width:130px;visibility: hidden;" >
            </th>
             <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 305.128px;text-align: center;" aria-label="Batches: activate to sort column ascending">Action
            	<br>
            	<input type="text" style="width:130px;visibility: hidden;">
            </th>
            </tr>    
            </thead></table></div>
                </div>
         </div>
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>


<?php include ("../include/footer.php"); ?>
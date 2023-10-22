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
         <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title">packlist</h3>
               
            </div>
            <div class="col-md-4 mt-2">
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" id="fromdate" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" id="todate" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">

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
                <div class="col-md-9 " style="margin-top:34px;">
                <a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light " >Recieve</a>
                <a href="Create"  onclick="PickedList()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent" >Pack</a>
                 <a href="Create" onclick="NotfoundList()" name="pick"  id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Extra Items </a>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
           
                            <li><button class="dropbtn"><i class="icon-reload" id="ref"></i></button></li>
                            <li><button class="dropbtn"><i class="icon-import" id="excel" onclick="fnExcelReport();"></i></button></li>
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
                            <li><button class="dropbtn"><i class="icon-settings"></i></button></li>
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
        <div class="dataTables_scrollHeadInner table table-hover" id="allproduct" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
        <table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
                 <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >
            	<br>
            	<input id="" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order#
            	<br>
            	<input id="customer" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Tracking
            	<br>
            	<input id="city" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Courier
            	<br>
            	<input id="items" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Customer
            	<br>
            	<input id="amount" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">City
            	<br>
            	<input type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Item(s)
            	<br>
            	<input type="text"  >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount
            	<br>
            	<input type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            </tr>    
            </thead>
           
    
                
              



    
    <tbody id="tbody" style="text-align:center">
    <tr>
    
      <td><i class="fa fa-circle st-inprogress" style="font-size:24px;"></i></td>
      <td>1</td>
      <td>#74596</td>
      <td>K12412513151</td>
      <td>Leopard</td>
      <td>RAZA<br>0314 222444</td>
      <td>Karachi </td>
      <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="4983931437242"><summary>1 Items</summary></details></td>
      <td>2799</td>
       
      <td>12/04/2023</td>
      
     <td><a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light " >Print</a></td>
     <td><a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary " >Pack</a></td>
       
    </tr>
    </tbody>
   <tbody id="tbody" style="text-align:center">
    <tr>
    
      <td><i class="fa fa-circle st-done" style="font-size:24px;"></i></td>
      <td>1</td>
      <td>#74596</td>
      <td>K12412513151</td>
      <td>Leopard</td>
      <td>RAZA<br>0314 222444</td>
      <td>Karachi </td>
      <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="4983931437242"><summary>1 Items</summary></details></td>
      <td>2799</td>
       
      <td>12/04/2023</td>
      
     <td><a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light " >Print</a></td>
     <td><a href="Create" onclick=" fetchTable()" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary " >Pack</a></td>
       
    </tr>
    </tbody>
 
    
    
</table>


         </div>
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>



        
        
        
<?php include ("../include/footer.php"); ?>
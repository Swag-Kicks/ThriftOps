<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>




<!--Data Table-->


<!-- Page Body Start-->

<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
            <div class="">
                  <div class="row">
          <div class="col-md-4 mt-4">
              <h3 class=" modal-title"><b>Returns</b> </h3>
               
            </div>
            <div class="col-md-4 mt-4">
             <a class="btn btn-primary-light m-l-15 f-right mt-2"  style="background-color:#FFFFFF"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-original-title="" title="">Initiate Return</a>
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" id="fromdate" onchange="ChangeDate()" name="fromdate" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" onchange="ChangeDate()" id="todate"  name="todate" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">

                            </div>
                          </div>
                        </div>
         </div>
         
        </div>
            </div>
         </div>
          <!--<button onclick="asc();"> EXPORT </button>-->
         <div class="col-sm-12">
          <div  class="modal fade show" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" aria-modal="true" role="dialog" >
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                              
                            <h4 class="modal-title" id="myLargeModalLabel"><b>Initiate a Return</b></h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" id="target">
                              <style>
                                  .cardshadow {
                                           box-shadow: 3px 3px rgb(8 36 0 / 7%);
                                      
                                  },
                                       
                                       .inputborder{
                                          border-color: 2px solid black;
                                           
                                       }
                              </style>
                              <div class="row">
                             <div class="card col-md-7" >
                                  
               
                      
                      <div class="card-body cardshadow ">
                                         <div class="row">
                                             <div class="mb-3 col-sm-8">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Order#</label>
                                                 <input class="form-control" type="text"  name="orderno" aria-describedby="" placeholder="Order no">
                                                
                                              
                                             </div>
                                               <div class=" col-sm-4">
                                                 <label class="col-form-label pt-0 invisible" for="exampleInputEmail1" ><></label>
                                                 <button class="btn btn-primary f-right" type="button"  onclick="fetchOrder()" style="font-size: 12px;" >Fetch Details</button>
                                              
                                             </div>
                                             </div>
                                             <div class="col-md-12 row" >
                                              <div id="orderdetails">
                                                  
                                              </div>
                                                 
                                                 
                                                 
                                             <div id="orderfooter">
                                                 
                                             </div>    
                                            
                                                 
                                             </div>
                                             
                                             
                                           
                                            
                                                         <div class="col-md-12 row" id="customerdetails" style="display:none" >
                                        <div class="col-md-6"> <label class="col-form-label pt-0" for="exampleInputEmail1">Customer</label>  <input style="background-color:" class="form-control" type="text"  name="customer" aria-describedby=""  disabled><br/> <label class="col-form-label pt-0" for="exampleInputEmail1">Contact</label></label><input class="form-control" type="text"  name="contact" aria-describedby="" disabled></div>
                                        <div class="col-md-6">   <label class="col-form-label pt-0" for="exampleInputEmail1">Order Date</label> <input class="form-control" type="text"  name="odate" aria-describedby="" disabled><br/>  <label class="col-form-label pt-0" for="exampleInputEmail1">Return Eligibility</label><input class="form-control" type="text"  name="returnE" aria-describedby="" disabled></div>
                                             </div>
                                             
                                                 
                                                 
                                             
                                                   
                                            
                                       
                                             </div>
                   
                   
                   
                   
                        
                   
                   
                   
                              </div>
                               <div class="card col-md-5" >
                                  
                
                      
                      <div class="card-body cardshadow ">
                                         <div class="col-sm-12 row">
                                             <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Return Type</label>
                                                 <select class="form-control form-select" name="returntype" id="returntype" onchange="changeselect()"  >
                                                   <option value=" " disabled selected>Select Return Type </option>
                                                   <option value="1">Refund</option>
                                                   <option value="2">Exchange</option>
                                                    
                                                </select>
                                               
                                              
                                             </div>
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                             
                                             <div class="card-body cardshadow "  id="accountdetails" >
                                                        <h6>Account Details</h6>
                                                        <br/>
                                         <div class="mb-3 col-sm-12 row">
                                             <div class=" mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Mode of Payment</label>
                                                 <select class="form-control form-select" id="moc" name="moc"  >
                                                   <option value=" " disabled selected >Select Return Type </option>
                                                   <option value="Easypaisa">Easypaisa</option>
                                                   <option value="Jazzcash">Jazzcash</option>
                                                    
                                                </select>
                                               
                                              
                                             </div>
                                               <div class="mb-3 col-sm-6">
                                               
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Account Number</label>
                                                <input class="form-control" type="text"  name="cnumber" aria-describedby="" placeholder="Order no">
                                               
                                              
                                             </div>
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                           
                                           
                                           
                                            <div class="card-body cardshadow "  id="exchangedetails"  >
                                                        <h6>Exchange Order</h6>
                                                        <br/>
                                         <div class="mb-3 col-sm-12 row">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Order Number</label>
                                                <input class="form-control" type="text"  name="exchangeO" aria-describedby="" placeholder="Order no">
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                             
                   
                                 
                              </div>
                                    </div>
                              <div style="float:right;">
                                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                      <button class="btn btn-primary" type="button" id="initbutton"  onclick="initReturn()" >Initiate</button>
                                      
                                     
                              </div>
                              
                          </div>
                        </div>
                      </div>
                    </div>
               
            <div class="card">
                    
               <div class="">
              
                  <div class="tab-content" id="top-tabContent">
             
                     <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-12">
                              <div class="row">
                                 <div class="col-sm-12" style="background: #f5f7fb;">
                                    <div class="card">
                                        


  <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-sm-6 "  style="margin-top:30px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a onclick="typeAll(fromdate,todate,50);" class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><b>All</b></a></li>
                      <!--<li class="nav-item"><a onclick="" class="nav-link" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><b>Refund</b></a></li>-->
                      <li class="nav-item"><a onclick="exchangeList(fromdate,todate,50)" class="nav-link"  data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><b>Exchange</b></a></li>
                  <li class="nav-item"><a onclick="conflictlist(60,fromdate,todate,'Wrong_Item')" class="nav-link"  data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><b>Conflict/Lost</b></a></li>
                
                    </ul>
                </div>
                <div class="col-sm-6 p-r-30" style="margin-top:30px;">
                    
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
           
                            <li ><button class="dropbtn"><i class="icon-reload" onClick="history.go(0);"></i></button></li>
                            <li ><button class="dropbtn"><i class="icon-import" id="btnExport" onclick="fnExcelReport();"></i></button></li>
                            <li ><div class="dropdown">
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
                            <li ><button class="dropbtn"><i class="icon-settings"></i></button></li>
                            
                    
                    </ul>
                   
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
              <div id="allreturns">
                <table id="example" class="dataTable no-footer css-serial"  role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
        
             
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Ticket #
            	<br>
            	<input id="SSKU" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #
            	<br>
            	<input id="globalorder" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Customer
            	<br>
            	<input id="city" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Items(s)
            	<br>
            	<input id="items" type="text" style="visibility: hidden;" >
            </th>
            <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Ticket #-->
            <!--	<br>-->
            <!--	<select class="form" id="search3">-->
            <!--        <option disabled selected></option>-->
            <!--        <option value="Empty">Empty</option>-->
            <!--        <option value="Filled">Filled</option>-->
                   
            <!--    </select>-->
            <!--</th>-->
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount Due
            	<br>
            	<input id="tracking" type="text" >
            </th>
            <!-- <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #-->
            <!--	<br>-->
            <!--    <input id="SORDER" type="text" >-->
            <!--</th>-->
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status
            	<br>
                <input id="items" type="text"  >
            </th>
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
          
       
           
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body">
                
            </tbody>
            </table>

</div>


 <div id="allexchange">
                <table id="example" class="dataTable no-footer css-serial"  role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
        
             
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Ticket #
            	<br>
            	<input id="SSKU" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #
            	<br>
            	<input id="globalorder" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Customer
            	<br>
            	<input id="city" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Items(s)
            	<br>
            	<input id="items" type="text" style="visibility: hidden;" >
            </th>
            <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Ticket #-->
            <!--	<br>-->
            <!--	<select class="form" id="search3">-->
            <!--        <option disabled selected></option>-->
            <!--        <option value="Empty">Empty</option>-->
            <!--        <option value="Filled">Filled</option>-->
                   
            <!--    </select>-->
            <!--</th>-->
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount
            	<br>
            	<input id="tracking" type="text" >
            </th>
            <!-- <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #-->
            <!--	<br>-->
            <!--    <input id="SORDER" type="text" >-->
            <!--</th>-->
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type
            	<br>
                <input id="items" type="text"  >
            </th>
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">New Order#
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
            
            
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
          
       
           
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body2">
                
            </tbody>
            </table>

</div>



<div id="conflicttable">
     <table id="example" class="dataTable no-footer css-serial"  role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
        
            <!--   <th class="res" tabindex="0" aria-controls="example"  style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1"  aria-sort="ascending" >-->
            	
            <!--</th>-->
          <th class="res" tabindex="0" aria-controls="example" rowspan="1"  style="border-right:2px solid #D2D2D2" colspan="1"  aria-sort="ascending" >SKU
            	<br>
            	<input id="SSKU" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1"  style="border-right:2px solid #D2D2D2" colspan="1">Product
            	<br>
            	<input id="search2" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1"  style="border-right:2px solid #D2D2D2" colspan="1">Image
            	<br>
            	<input id="city" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1"  style="border-right:2px solid #D2D2D2" colspan="1">Amount
            	<br>
            	<input id="items" type="text" style="visibility: hidden;" >
            </th>
            <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Ticket #-->
            <!--	<br>-->
            <!--	<select class="form" id="search3">-->
            <!--        <option disabled selected></option>-->
            <!--        <option value="Empty">Empty</option>-->
            <!--        <option value="Filled">Filled</option>-->
                   
            <!--    </select>-->
            <!--</th>-->
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" style="border-right:2px solid #D2D2D2" colspan="1">Ticket #
            	<br>
            	<input id="tracking" type="text" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1"  style="border-right:2px solid #D2D2D2" colspan="1">Order #
            	<br>
                <input id="globalorder" type="text" >
            </th>
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" style="border-right:2px solid #D2D2D2" colspan="1">Tracking id
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
            
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" style="border-right:2px solid #D2D2D2" colspan="1">Status
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
          
          <th class="res" tabindex="0" aria-controls="example" rowspan="1"  colspan="1">Date
            	<br>
                <input id="items" type="text" style="visibility: hidden;" >
            </th>
           
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body3">
                
            </tbody>
            </table>
</div>

    <!--       <table  id="example"  >-->
    <!--        <thead>-->
    
    <!--  <tr id="test" style="background-color:#F4F5F8;">-->
          
    <!--    <th>Ticket #</th>-->
    <!--    <th>Order #</th>-->
    <!--    <th>Customer</th>-->
    <!--    <th>Item(s)</th>-->
    <!--    <th>Amount</th>-->
    <!--      <th>Type</th>-->
    <!--        <th>Status</th>-->
    <!--          <th>Date</th>-->
    <!--      <th></th>-->

    <!--  </tr> -->
    <!--</thead>-->
    <!--    <tbody id="table_body">-->

    <!--    </tbody>-->
              
     
    <!--</table>-->
   
                                 </div>
                              
                        </div>
                     </div>
                   
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>

<!--CUSTOM JS-->







  

<!--(WASAY Scripts) Don't Change it-->

<!--SIKANDAR NOT ALLOWED-->


<style>
    .dataTables_length,.dataTables_filter{
        
        display:none;
    }
</style>

<script>


 const ChangeDate = () =>{
        
        
        
          let fromdate = $('#fromdate').val()
         let todate = $('#todate').val()
         
         
      
      
      typeAll(fromdate,todate,50);
       
       
       
 }
 
 
 
    $("#allexchange").hide();
    $("#conflicttable").hide()




const exchangeList = (FD,TD,l) => {
    
    console.log("EXCHANGE SELECTED")
    
    $("#allreturns").hide();
    $("#allexchange").show();
    $("#conflicttable").hide()
    //alert("hello")
      document.getElementById("table_body2").innerHTML = ''
    var settings = {
  "url": "https://backup.thriftops.com/Return/Api/exchange.php?fd="+FD+"&td="+TD+"&limit="+l,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
   
  console.log(response);
  var rows = JSON.parse(response);
  
  var groupBy = function(xs, key) {
  return xs.reduce(function(rv, x) {
    (rv[x[key]] = rv[x[key]] || []).push(x);
    return rv;
  }, {});
};
var groubedByOrders = groupBy(rows, 'Order_Number')
// console.log("JRESD", JRES)
console.log("groubedByOrders",groubedByOrders);
  
  
  Object.getOwnPropertyNames(groubedByOrders)
      .reverse() 
      .forEach(function(p){
         test(groubedByOrders[p]);
      });
      
      function test(p) { 
    //console.log("hello",p);
          
             document.getElementById("table_body2").innerHTML +=`
                        <tr style="text-align:center;">
                             <td>#21374</td>
                              <td>${p[0].Order_Number}</td>
                              <td>${p[0].Name}</td>
                              <td ><details>
  <summary>Items</summary>
  <div id="${p[0].Order_Number}">
  
  <div>

</details></td>

                              <td>${p[0].Total}</td>
                             
                                 <td >Exchange</td>
                                 <td>${p[0].Exchange}</td>
                                                                  <td id="type${p[0].Order_Number}"></td>
                                <td>${p[0].Date}</td>
                         </tr > `;
                         
                         
                         const key = 'SKU';

const arrayUniqueByKey = [...new Map(p.map(item =>
  [item[key], item])).values()];

var NSKU = p[0].Order_Number
var TYPE = "type"+NSKU


 let b = {};

arrayUniqueByKey.forEach(el => {
    b[el.Item_Status] = (b[el.Item_Status] || 0) + 1;
})

console.log(b);



var TBR = b.TBR
console.log(TBR)

 console.log("arrayUniqueByKey",arrayUniqueByKey)
 
 
 if (TBR == arrayUniqueByKey.length ){
     
      document.getElementById(TYPE).innerHTML =  ` <p>TBR</p> `
     
 }else{
      document.getElementById(TYPE).innerHTML =  ` <p>Partially Recieved</p> `
 }
 
 
 
 
  for (var i = 0; i < arrayUniqueByKey.length; i++) {
      document.getElementById(NSKU).innerHTML +=  ` <p>${arrayUniqueByKey[i].SKU}</p> 
 `
      
  }
          
          
          
      }
  
  

  
});

    
}

















 
  
const typeAll = (FD,TD,l) => {
    
    
    $("#allreturns").show();
    $("#allexchange").hide();
    $("#conflicttable").hide()
    //alert("hello")
      document.getElementById("table_body").innerHTML = ''
    var settings = {
  "url": "https://backup.thriftops.com/Return/Api/returns.php?fd="+FD+"&td="+TD+"&limit="+l,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
   
  console.log(response);
  var rows = JSON.parse(response);
  
  var groupBy = function(xs, key) {
  return xs.reduce(function(rv, x) {
    (rv[x[key]] = rv[x[key]] || []).push(x);
    return rv;
  }, {});
};
var groubedByOrders = groupBy(rows, 'Order_Number')
// console.log("JRESD", JRES)
console.log("groubedByOrders",groubedByOrders);
  
  
  Object.getOwnPropertyNames(groubedByOrders)
      .reverse() 
      .forEach(function(p){
         test(groubedByOrders[p]);
      });
      
      function test(p) { 
    //console.log("hello",p);
          
             document.getElementById("table_body").innerHTML +=`
                        <tr style="text-align:center;">
                             <td>#21374</td>
                              <td>${p[0].Order_Number}</td>
                              <td>${p[0].Name}</td>
                              <td ><details>
  <summary>Items</summary>
  <div id="${p[0].Order_Number}">
  
  <div>

</details></td>

                              <td>${p[0].Total}</td>
                             
                                 <td id="type${p[0].Order_Number}"></td>
                                <td>${p[0].Date}</td>
                         </tr > `;
                         
                         
                         const key = 'SKU';

const arrayUniqueByKey = [...new Map(p.map(item =>
  [item[key], item])).values()];

var NSKU = p[0].Order_Number
var TYPE = "type"+NSKU


 let b = {};

arrayUniqueByKey.forEach(el => {
    b[el.Item_Status] = (b[el.Item_Status] || 0) + 1;
})

console.log(b);



var TBR = b.TBR
console.log(TBR)

 console.log("arrayUniqueByKey",arrayUniqueByKey)
 
 
 if (TBR == arrayUniqueByKey.length ){
     
      document.getElementById(TYPE).innerHTML =  ` <p>TBR</p> `
     
 }else{
      document.getElementById(TYPE).innerHTML =  ` <p>Partially Recieved</p> `
 }
 
 
 
 
  for (var i = 0; i < arrayUniqueByKey.length; i++) {
      document.getElementById(NSKU).innerHTML +=  ` <p>${arrayUniqueByKey[i].SKU}</p> 
 `
      
  }
          
          
          
      }
  
  

  
});

    
}


typeAll(fromdate,todate,50);







const conflictlist = (l,fd,td,status) => {
    
    $("#allreturns").hide();
    $("#allexchange").hide();
    $("#conflicttable").show()
   document.getElementById("table_body3").innerHTML = ''
    var limit = l
    
    var settings = {
  "url": "https://backup.thriftops.com/Return/Api/recieve.php?limit="+limit+"&fd="+fd+"+&td="+td+"&status="+status,
  "method": "GET",
  "timeout": 0,
};

//<td >  <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
$.ajax(settings).done(function (response) {
  console.log(response);
  var rows = JSON.parse(response);
      let tableData = "";
                    rows.forEach((values => {
                        tableData += `
                        <tr style="text-align:center;" >
                            
                             <td>${values.SKU}</td>
                             <td>${values.Title}</td>
                             <td><img src="${values.Image_1}" height="50" width="50" /></td>
                             <td>${values.Total}</td>
                             <td>#31121</td>
                              <td>${values.Order_Number}</td>
                                <td>${values.Tracking}</td>
                                  <td>${values.Item_Status}</td>
                                      <td>${values.Date}</td>
                                  <td><select class="mark" onchange="changeselect()" >
                                          <option>
                                          </option>
                                          <option value="1">Mark as Received</option>
                                          <option value="2">Wrong Item Received</option>
                <option>
                                          </option>
                                        </select></td>
                                    
                                
                                
                        </tr > `;

                    }))
                    document.getElementById("table_body3").
                        innerHTML = tableData;
  
});

    
}







//export excel
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>  <th>Name</th><th>Type</th><th>Contact</th><th>Stock Keeping</th><th>Fullfillment</th><th>Batches</th></tr>";
    var textRange; var j=0;
    tab = document.getElementById('table_body'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true);
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}


                                         
                                         
                                         
                                          
const initReturn = () =>{
    
    
   var status =  $("#returntype option:selected").text();
   
   
  var moc = $("select[name=moc]").val();
    //alert(moc)
      var ordernumber = $("input[name=orderno]").val();
        var customer = $("input[name=customer]").val();
         var contact = $("input[name=cnumber]").val();
              var exchange = $("input[name=exchangeO]").val();
         
        
      
      
      var concat = "#"+ordernumber
    var form = new FormData();
form.append("oid", concat);
form.append("status", status);
form.append("exchange", exchange);



var settings = {
  "url": "https://backup.thriftops.com/Return/Api/init.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

// $.ajax(settings).done(function (response) {
//   console.log(response);
//   alert("customer",customer)
//   alert("Order Initaited")
//   addBank(customer,moc,contact,concat)
 
// });

$.ajax(settings).done(function (response) {
  //console.log(response);
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Return Initiated Successfully',
  showConfirmButton: false,
  timer: 1500
})
  
  
});

}





</script>
<!--FOR TABLE-->
<style>
   
    tfoot {
     display: table-header-group;
}
th{
text-align:center;

}
</style>

<script>
 $("#updateButton").hide();
var addSerialNumber = function () {
    var i = 1
    $('table tr').each(function(index) {
        $(this).find('td:nth-child(1)').html(index+1);
    });
};

addSerialNumber();



          






</script>




<script>
    
























$("#accountdetails").hide();
$("#exchangedetails").hide();


const changeselect = () =>{
    
      var selectvalue = $("select[name=returntype]").val();
  
      if(selectvalue == "1"){
         
         
          $("#accountdetails").show();
$("#exchangedetails").hide();
          
      }else if(selectvalue == "2"){
          
          
          
             $("#exchangedetails").show();
             $("#accountdetails").hide();
          
      }
    
}




const fetchOrder = () =>{
    
    
    
       var ordernumber = $("input[name=orderno]").val();

    
    var settings = {
  "url": "https://backup.thriftops.com/Return/Api/fetchorder.php?order=%23"+ordernumber,
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
  var JRES = JSON.parse(response)
  
       $("#customerdetails").removeAttr("style");
      $("input[name=customer]").val(JRES[0].Name);
      $("input[name=odate]").val(JRES[0].Date);
      $("input[name=returnE]").val();
      $("input[name=contact]").val(JRES[0].Contact);
        $("input[name=cnumber]").val(JRES[0].Contact);
      
  
    
    var price = parseInt(JRES[0].Total)
    

var someDate = new Date(JRES[0].Date);
someDate.setDate(someDate.getDate() + 70); //number  of days to add, e.x. 15 days
var dateFormated = moment(someDate).format('DD-MM-YYYY')

var todayDate = new Date()
var todayDate2 = moment(todayDate).format('DD-MM-YYYY')
console.log(   typeof(todayDate2)   );



var today = moment(todayDate2),
     specifiedDate = moment(dateFormated);
     console.log("ttt",today.isAfter(specifiedDate))
// if(today.isAfter(specifiedDate)){
//   console.log("Not Eligible");
// }else{
//   console.log("Eligible");
// };


//console.log(typeof(dateFormated));
    
    
  
    if (today.isAfter(specifiedDate)){
          $("input[name=returnE]").val("Eligible");
    }else{
       $("input[name=returnE]").val("Eligible");
      /// $("#initbutton").prop("disabled", true);
       
    }
    
    
    
    for (var i = 0; i < JRES.length; i++) {
        
        
        
        console.log("JRES",JRES)
            // document.getElementById("orderdetails").innerHTML = ''
           document.getElementById("orderdetails").innerHTML +=   `<hr>
                                                 <div class="media mb-3">
                                                <input style="height:15px;width:15px;align-self: center;" type="checkbox">
                                                <img class="img-cstm1 ms-4 me-4" alt="" title="" src="${JRES[i].Image_1} ">
                                                  <div class="media-body mt-2">
                                                      <span><b>${JRES[i].Title} </b></span><br>
                                                      <span>${JRES[i].SKU}</span>
                                                
                                                  </div>
                                                  <p class="f-14"><b>${JRES[i].Price}</b></p>
                                                </div>
                                           <hr/>
                                              
                                              `
        
        
        
    }
   document.getElementById("orderfooter").innerHTML = ''
        document.getElementById("orderfooter").innerHTML =  `<div class="col-md-8">
                                                    
                                                </div>
                                                <div class="">
                                                    <span style="position:relative;left:201%%" class=" col-from-label f-right"><b>Total</b>  Rs: ${JRES[0].Total}</span>
                                                
                                                </div>`
  
  
  
});
    
}

var timer;
$("#globalorder").keyup(function() {
    clearTimeout(timer);
    timer = setTimeout(function() {
        var ordernum = $('#globalorder').val()
       
           
           SingleOrder(ordernum);
        
    }, 250);
});



const SingleOrder = (ordernum) =>{
                 document.getElementById("table_body").innerHTML =''
    
    var form = new FormData();
form.append("oid", ordernum);

var settings = {
  "url": "https://backup.thriftops.com/Return/Api/singleorder.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
   console.log(response);
  var rows = JSON.parse(response);
  
  var groupBy = function(xs, key) {
  return xs.reduce(function(rv, x) {
    (rv[x[key]] = rv[x[key]] || []).push(x);
    return rv;
  }, {});
};
var groubedByOrders = groupBy(rows, 'Order_Number')
// console.log("JRESD", JRES)
console.log("groubedByOrders",groubedByOrders);
  
  
  Object.getOwnPropertyNames(groubedByOrders)
      .reverse() 
      .forEach(function(p){
         test(groubedByOrders[p]);
      });
      
      function test(p) { 
    //console.log("hello",p);
          
             document.getElementById("table_body").innerHTML +=`
                        <tr style="text-align:center;">
                             <td>#21374</td>
                              <td>${p[0].Order_Number}</td>
                              <td>${p[0].Name}</td>
                              <td ><details>
  <summary>Items</summary>
  <div id="${p[0].Order_Number}">
  
  <div>

</details></td>
                              <td>${p[0].Total}</td>
                              
                                 <td id="type${p[0].Order_Number}"></td>
                                <td>${p[0].Date}</td>
                         </tr > `;
                         
                         
                         const key = 'SKU';

const arrayUniqueByKey = [...new Map(p.map(item =>
  [item[key], item])).values()];

var NSKU = p[0].Order_Number
var TYPE = "type"+NSKU


 let b = {};

arrayUniqueByKey.forEach(el => {
    b[el.Item_Status] = (b[el.Item_Status] || 0) + 1;
})

console.log(b);



var TBR = b.TBR
console.log(TBR)

 console.log("arrayUniqueByKey",arrayUniqueByKey)
 
 
 if (TBR == arrayUniqueByKey.length ){
     
       document.getElementById(TYPE).innerHTML +=  ` <p>TBR</p> `
     
 }else{
      document.getElementById(TYPE).innerHTML +=  ` <p>Partially Recieved</p> `
 }
 
 
 
 
  for (var i = 0; i < arrayUniqueByKey.length; i++) {
       document.getElementById(NSKU).innerHTML =  ` <p>${arrayUniqueByKey[i].SKU}</p> 
 `
      
  }
          
          
          
      }
  
});
    
}



function addBank(btitle,bname,baccount,onumber){
     
     

var form = new FormData();
form.append("title", btitle);
form.append("bank_name", bname);
form.append("account_no", baccount);
form.append("user_id",onumber);
form.append("user_type", "Refund");
form.append("refundStatus", "Due");


var settings = {
  "url": "https://backup.thriftops.com/Return/Api/addrefund.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
});

}




</script>






 <script>
        $(document).ready(function($){
    var url = window.location.href;
    $('li a[href="'+url+'"]').addClass('active');
});


 $(document).ready(function() {
      $.ajax({
        url: "../ShopifyPush/api/gip.php",
        method: "GET",
        success: function(data) {
          //$("#ip").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          //$("#ip").html("Error: " + textStatus + " - " + errorThrown);
        }
      });
    });





</script>    






<!-- footer start-->
<?php include("../include/footer.php");?>

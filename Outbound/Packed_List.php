<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
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
             <select onchange="changeWarehouse()" id="SelectW" class="form-select w-50 f-right">
                                
                                 
                                  
                            </select>
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
          <!--<button onclick="searchDate()">Search</button>-->
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
                <a  onclick="Receivelist(100)"  class="btn btn-primary-light curent" >Receive</a>
                <a   onclick="PackCards(td,fd)"  class="btn btn-primary-light">Pack</a>
                 <a   onclick="extraitems(10)" class="btn btn-primary-light" >Extra Items </a>
                 <a   onclick="ReceivedItems(100)" class="btn btn-primary-light" >Received </a>
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <!--<li>-->
                            <!--    <select id="change" class="form-select">-->
                            <!--      <option value="" selected disabled>Bulk Action</option>-->
                            <!--      <option value="Reason for deallocation">Deallocate</option>-->
                                 
                                  
                            <!--</select>-->
                            <!--</li>-->
                            <li><input id="SpackO" onkeyup="SearchOrder()" class=" form-control" placeholder="Search Order" /></li>
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
              
              <div class="col-md-12 row"  id="packcards">
                
                     
              </div> 
              
       
            <div id="receiveID" >
        <table class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;" id="example">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
              <th class="res">
            	<br>
            	 <input class="checkbox1" id="" type="checkbox" >
            </th>
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Image
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">SKU
            	<br>
          	<input id="SKUSEARCH" type="text"  >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #
            	<br>
            	<input id="ORDERSEARCH" type="text"  >
            </th>
              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Picked By
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date Time
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body">
                
            </tbody>
            </table>
           </div> 
           
           
            <div id="ExtraID" >
        <table class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;" id="example2">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
              <th class="res">
            	<br>
            	 <input class="checkbox1" id="" type="checkbox" >
            </th>
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Image
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">SKU
            	<br>
            <input id="city" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #
            	<br>
            	<input id="tracking" type="text"  >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date Time
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body">
                
            </tbody>
            </table>
           </div> 
            
            
            
            
          <!--   <table class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;" id="ExtraItems" >-->
          <!--    <thead>-->
    
          <!--<tr id="test" style="background-color:#E0E3EC;" role="row">-->
          <!--    <th class="res">-->
          <!--  	<br>-->
          <!--  	 <input class="checkbox1" id="" type="checkbox" >-->
          <!--  </th>-->
          <!--     <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno-->
          <!--  	<br>-->
          <!--  	<input id="ordernum" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Image-->
          <!--  	<br>-->
          <!--  	<input id="ordernum" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">SKU-->
          <!--  	<br>-->
          <!--  <input id="city" type="text">-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status-->
          <!--  	<br>-->
          <!--  	<input id="tracking" type="text"  >-->
          <!--  </th>-->
          <!--    <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type-->
          <!--  	<br>-->
          <!--    <input id="tracking" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--   <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date Time-->
          <!--  	<br>-->
          <!--    <input id="tracking" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">-->
          <!--  	<br>-->
          <!--    <input id="tracking" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
            

          <!--   <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">-->
          <!--  <th></th>-->
          <!--  </tr>    -->
          <!--  </thead>-->
          <!--  <tbody id="table_body2">-->
                
          <!--  </tbody>-->
          <!--  </table>-->
        
        
         
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
        
                <!--changestatus modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Reason for deallocation</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="couriestat" required>
                                               <option value="" disabled selected >Select</option>
                                                <option value="">Damaged</option>
                                                <option value="">Required for Marketing Content</option>
                                                 <option value="">Required for Outdoor Event</option>
                                                 <option value="">For Walk in Customer</option>
                                                 <option value="">On Request</option>
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;" >Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--end changestatus modal-->
                         
                          
                    <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Reason For Not Picking</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div style="margin-left:30%">
                             <button type="button" class="btn btn-outline-primary" onclick="MarkExtraDB(Active_OID,'QC_Rejected')" >QC REJECTED &nbsp; </button><br/><br/>
                              <button type="button" class="btn btn-outline-primary" onclick="MarkExtraDB(Active_OID,'Cancel')" >CANCEL ITEM &nbsp; </button><br/><br/>
                               <button type="button" class="btn btn-outline-primary" onclick="MarkExtraDB(Active_OID,'Not_Found')">NOT FOUND &nbsp;</button><br/>
                                <!--<button type="button" class="btn btn-outline-primary" id="modclear" data-bs-dismiss="modal">QC REJECTED</button>-->
                          </div>
                        </div>
                      </div>
                    </div>
            
      </div>
   </div>
   
   <!--<a href="#" class="btn btn-lg btn-primary" id="sentMessage" data-toggle="modal" data-target="#largeModal">Click to open Modal</a>-->
   <!-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">-->
   <!--   <div class="modal-dialog modal-lg">-->
   <!--     <div class="modal-content">-->
   <!--       <div class="modal-header">-->
   <!--         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
   <!--         <h4 class="modal-title" id="myModalLabel">Large Modal</h4>-->
   <!--       </div>-->
   <!--       <div class="modal-body">-->
   <!--         <h3>Modal Body</h3>-->
   <!--       </div>-->
   <!--       <div class="modal-footer">-->
   <!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
   <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
   <!--       </div>-->
   <!--     </div>-->
   <!--   </div>-->
   <!-- </div>-->
   
   <!-- Container-fluid Ends-->
   
</div>
<script>
 $("#SpackO").hide();
const showModal = (link) => {
//     $("#iframeId").prop("src", link);
    
//   $('#printlabel').modal('show');

window.open (link,
"mywindow","menubar=1,resizable=1,width=600,height=600");

console.log(link)
}

$('#change').change(function(){
  var title = $(this).val();
  $('.modal-title1').html(title);
  $('#modal').modal('show');
});

// const fetchTable = (fd,td) =>{
    
 
//       $("#RecieveTable").show()
//     $("#ExtraItems").hide()
//      $("#packcards").hide()
//       $("#theDataTable").show()
// var settings = {
//   "url": "https://backup.thriftops.com/Outbound/api/PackList.php?fd="+fd+"&td="+td,
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {

//   var rows = JSON.parse(response);
//   console.log(rows)
   

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Order_Number} </td>
//                               <td>${values.Name}</td>
//                               <td>Sneakers</td>
//                                   <td>${values.Date}</td>
//                                   <td><img src="thumbs-up.png" /><img src="thumbs-down.png" style="margin-left:15px;"/></td>
                                 
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
// });
// }

// fetchTable()






function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'> <th></th><th></th><th></th> <th>SKU</th><th>Order #</th><th>Date Time</th></tr>";
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


   function Warehouse(){
        
        var settings = {
      "url": "https://backup.thriftops.com/Warehouse/api/warehouse.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
      
    
    
      for (var i = 0; i < data.length; i++) {
    
           
        var select = document.getElementById("SelectW");
        var option = document.createElement("option");
        option.text = data[i].Location;
        option.value = data[i].SK_Format;
        select.add(option);
       
    }
    });
        
    }
    
   
    
    const myTimeout2 = setTimeout( Warehouse(), 500);
    
     const changeWarehouse = () =>{
        let prefix = $('#SelectW').val()
        
        var settings = {
  "url": "https://backup.thriftops.com/Warehouse/api/WarehousePick.php?wh="+prefix,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {

  var rows = JSON.parse(response);
  console.log(rows)
    for(j = 0 ; j < rows.length ; j++) {
        
        
    }

       let tableData = "";
                    rows.forEach((values => {
                        
                     
                        tableData += `
                        <tr>
                            <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
                             <td></td>
                            <td><img src="${values.Image_1}" height="65" width="65"/></td>
                           <td>${values.Items}</td>
                             <td>${values.order_num} </td>
                                   <td>${values.DateTime}</td>
                                
                             
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});
        
        
        
        
       
    }
    
    const searchDate = () =>{
        
          let fromdate = $('#fromdate').val()
         let todate = $('#todate').val()
         document.getElementById('packcards').innerHTML = ''
       PackCards(todate,fromdate)
       
    }
    
    
    const ChangeDate = () =>{
        
        
           let prefix = $('#SelectW').val()
          let fromdate = $('#fromdate').val()
         let todate = $('#todate').val()
       console.log(fromdate,todate,prefix)
       
    //   fetchTable(fromdate,todate);
        
       
         
        var settings = {
  "url": "https://backup.thriftops.com/Warehouse/api/WarehousePick.php?wh="+prefix+"&sd="+fromdate+"&ed="+todate,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {

  var rows = JSON.parse(response);
  console.log(rows)
    for(j = 0 ; j < rows.length ; j++) {
        
        
    }

       let tableData = "";
                    rows.forEach((values => {
                        
                     
                        tableData += `
                        <tr>
                            <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
                             <td></td>
                            <td><img src="${values.Image_1}" height="65" width="65"/></td>
                           <td>${values.Items}</td>
                             <td>${values.order_num} </td>
                                   <td>${values.DateTime}</td>
                                
                             
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});
       
       
       
        
    }





var fd =document.getElementById('fromdate').value;
var td = document.getElementById('todate').value;




const PackCards =(td,fd) =>{
    
    $("#SpackO").show();
    
    $("#ExtraID").hide()
    
    
    document.getElementById('packcards').innerHTML = ''
     $("#receiveID").hide()
    $("#packcards").show()
    
    
    var settings = {
  "url": "https://backup.thriftops.com/Outbound/api/packscreenapi.php?td="+td+"&fd="+fd,
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
var JRES = JSON.parse(response)
var JRES2 = JSON.parse(response)
console.log("NEW RES",JRES)





var groupBy = function(xs, key) {
  return xs.reduce(function(rv, x) {
    (rv[x[key]] = rv[x[key]] || []).push(x);
    return rv;
  }, {});
};
var groubedByOrders = groupBy(JRES, 'Order_Number')
// console.log("JRESD", JRES)
console.log("groubedByOrders",groubedByOrders);


// let obj = JRES.find(o => o.Order_Number === '#43247');

// console.log(obj);

var okeys = Object.keys(groubedByOrders)

  
if( $('button').prop( "disabled")){
  	$('button').prop( "title", "Test When Disabled" );
  }
//   style="columns:2;-webkit-columns:2;-moz-columns:2"

var initial_count = 0


function test(p) { 
    console.log("hello",p);
initial_count ++    
console.log(initial_count)

var remainder = initial_count % 3;
console.log("remainder",remainder)

  var ordernumber = p[0].Order_Number
   var ordernumberL = ordernumber.substring(1);
    var pdflink =  p[0].Pdf_link.toString();


  document.getElementById('packcards').innerHTML += `
 
            <div class="col-md-4">

                <div class="card card-hidden" >
                    
                   
                     <details class="packlist" >
                      <summary class="drop"> <div class="card-header1 greyh" onclick="myFunction()">
                        <div class="row">
                            <div class="col-sm-1" id="maincircle${p[0].Order_Number}">
                               
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>${p[0].Order_Number}</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 ">
                        <i  id="iconswitch" onclick="myFunction(this)" class="fa fa-angle-down"></i>
                    </div>
                        </div>
                        
                    </div><div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>${p[0].City}</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">${p[0].Tracking}</b></div>
                        <div class="col-sm-1"></div>
                    </div></summary>
                 
                   
                      <div class="card-body padding">
                        <div class="productpack" id="${p[0].Order_Number}">
                        
                        
                        
                        
                     
               
                        
                        
                
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>${p[0].Dispatch_Advise}</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <a target="_blank" href="print_pdf.php?GETID=${ordernumberL}" id="printlab" class="btn btn-outline-primary pull-left">Print Label</a>
                         <button href="#"  id="button${ordernumber}" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" onclick="packOrder('${ordernumber}')"  disabled  title="Ready to Pack" >Pack</button>
                         
                       </div>
                                            </div>
                    </details>
                    
                    
                </div>
               
              </div>
  
  
  `

// if (remainder == 0){
// //x is a multiple of y
// } else {
// //x is not a multiple of y
// }



    
    
  
 //$("#iframeId").prop("src", url);
    
   





  
const key = 'SKU';

const arrayUniqueByKey = [...new Map(p.map(item =>
  [item[key], item])).values()];




 console.log("arrayUniqueByKey",arrayUniqueByKey)
 
 
 let b = {};

arrayUniqueByKey.forEach(el => {
    b[el.Item_Status] = (b[el.Item_Status] || 0) + 1;
})

console.log(b);

var Confirmed = b.Confirmed
var Hold = b.Hold
var Booked = Confirmed

var Received = b.Received
var Recieved = b.Recieved
var Picked = b.Picked
var NotFound = b.Not_Found

//


var maincircle = "maincircle"+p[0].Order_Number
var packButton = "button"+p[0].Order_Number





 if(Received ===  arrayUniqueByKey.length || Received > Confirmed || Received > Picked || Recieved ==  arrayUniqueByKey.length || Recieved > Confirmed || Recieved > Picked  ){
       document.getElementById(maincircle).innerHTML = ' '
      document.getElementById(maincircle).innerHTML += ` <i class="fa fa-circle st-done" style="font-size:24px;"></i>`
     
     document.getElementById(packButton).disabled = false;
   
    
    
 }else if (Confirmed ==  arrayUniqueByKey.length || Confirmed > Received || Received > Picked ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: Grey!important;font-size:24px;'></i>` 
     
 }
 else if (Hold ==  arrayUniqueByKey.length || Hold > Received || Hold > Picked ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: Grey!important;font-size:24px;'></i>` 
     
 }
 
 
 else if (Picked ==  arrayUniqueByKey.length || Picked > Confirmed || Picked > Received ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle st-inprogress' style='font-size:24px;'></i>` 
     
 }
 else {
     
      document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: #D00000!important;font-size:24px;'></i>` 
     
 }
 
 
 



  for (var i = 0; i < arrayUniqueByKey.length; i++) {
     
     
     
    
     
     
     
     
     
     var statusP = arrayUniqueByKey[i].Item_Status
         var oid = p[0].Order_Number

      if( statusP== 'Picked'){
   
   
              
          var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class="fa fa-circle st-inprogress clr-stats" style="font-size:24px;"></i>`
          
      }else if( statusP== 'Received' || statusP == 'Recieved') {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class="fa fa-circle st-done clr-stats" style="font-size:24px;"></i>`
          
      }
      else if( statusP== 'Not Found' || statusP== 'Cancel' || statusP== 'QC Reject' || statusP== 'Not_Found' || statusP== 'QC_Rejected' ) {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class='fa fa-circle clr-stats' style='color: #D00000!important;font-size:24px;'></i>`
          
      }
         else if( statusP== 'Booked' || statusP== 'Confirmed' ||  statusP== 'Hold') {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class='fa fa-circle clr-stats' style='color: Grey!important;font-size:24px;'></i>`
          
      }
      
   
     
      document.getElementById(oid).innerHTML += ` 
         <div class="form-group row">
                          <div class="media" id="${skuss}"> 
                          <img class="img-75 img-fluid m-r-20 m-l-40" alt="" height="150" width="150" src="${arrayUniqueByKey[i].Image_1}" style="
    max-width: 125px;">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">${arrayUniqueByKey[i].SKU}</h6><br>
                                    <span class="notetext">Rs.${arrayUniqueByKey[i].Total}</span><br>
                                    <span><b>Rs.${arrayUniqueByKey[i].Price}</b></span></div>
                                       
                                        
                                    </div>
                              </div>
      `
      
  }

 
    
}

Object.getOwnPropertyNames(groubedByOrders)
      .reverse() 
      .forEach(function(p){
         test(groubedByOrders[p]);
      });





});
    
    
    
            
    
}


const SearchOrder = ()=>{
      var onum = $("#SpackO").val()
    //   var newonum = onum.substring(1);
     SinglePackCards(onum);
}



const SinglePackCards =(Oval) =>{
    
    $("#SpackO").show();
    
    $("#ExtraID").hide()
  
     var onum = Oval
    
    
    
    document.getElementById('packcards').innerHTML = ''
     $("#receiveID").hide()
    $("#packcards").show()
    
    
    var settings = {
  "url": "https://backup.thriftops.com/Outbound/api/singleorderpack.php?onum="+onum,
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
var JRES = JSON.parse(response)
var JRES2 = JSON.parse(response)
console.log("NEW RES",JRES)





var groupBy = function(xs, key) {
  return xs.reduce(function(rv, x) {
    (rv[x[key]] = rv[x[key]] || []).push(x);
    return rv;
  }, {});
};
var groubedByOrders = groupBy(JRES, 'Order_Number')
// console.log("JRESD", JRES)
console.log("groubedByOrders",groubedByOrders);


// let obj = JRES.find(o => o.Order_Number === '#43247');

// console.log(obj);

var okeys = Object.keys(groubedByOrders)

  
if( $('button').prop( "disabled")){
  	$('button').prop( "title", "Test When Disabled" );
  }
//   style="columns:2;-webkit-columns:2;-moz-columns:2"

var initial_count = 0


function test(p) { 
    console.log("hello",p);
initial_count ++    
console.log(initial_count)

var remainder = initial_count % 3;
console.log("remainder",remainder)

  var ordernumber = p[0].Order_Number
   var ordernumberL = ordernumber.substring(1);
    var pdflink =  p[0].Pdf_link.toString();


  document.getElementById('packcards').innerHTML += `
 
            <div class="col-md-4">

                <div class="card card-hidden" >
                    
                   
                     <details class="packlist" >
                      <summary class="drop"> <div class="card-header1 greyh" onclick="myFunction()">
                        <div class="row">
                            <div class="col-sm-1" id="maincircle${p[0].Order_Number}">
                               
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-0 h6">
                                <b>${p[0].Order_Number}</b>
                                 </h5>
                            </div>
                            <div class=" col-sm-1 ">
                        <i  id="iconswitch" onclick="myFunction(this)" class="fa fa-angle-down"></i>
                    </div>
                        </div>
                        
                    </div><div class="row pt-3 pb-2 greyh1">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4"><b>${p[0].City}</b></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4"><b class="f-right">${p[0].Tracking}</b></div>
                        <div class="col-sm-1"></div>
                    </div></summary>
                 
                   
                      <div class="card-body padding">
                        <div class="productpack" id="${p[0].Order_Number}">
                        
                        
                        
                        
                     
               
                        
                        
                
                              
                            
                        </div> 
                        </div>
                        
                    <div class="mxl-3 pt-2">
                     <h5 class="font-weight-bold">Dispatch Advice:</h5> 
                     <span>${p[0].Dispatch_Advise}</span>
                     </div>
                    <div class="modal-footer mxl-3">
                         
                         <a target="_blank" href="print_pdf?GETID=${ordernumberL}" id="printlab" class="btn btn-outline-primary pull-left">Print Label</a>
                         <button href="#"  id="button${ordernumber}" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" onclick="packOrder('${ordernumber}')"  disabled  title="Ready to Pack" >Pack</button>
                         
                       </div>
                                            </div>
                    </details>
                    
                    
                </div>
               
              </div>
  
  
  `

// if (remainder == 0){
// //x is a multiple of y
// } else {
// //x is not a multiple of y
// }



    
    
  
 //$("#iframeId").prop("src", url);
    
   





  
const key = 'SKU';

const arrayUniqueByKey = [...new Map(p.map(item =>
  [item[key], item])).values()];




 console.log("arrayUniqueByKey",arrayUniqueByKey)
 
 
 let b = {};

arrayUniqueByKey.forEach(el => {
    b[el.Item_Status] = (b[el.Item_Status] || 0) + 1;
})

console.log(b);

var Confirmed = b.Confirmed
var Hold = b.Hold
var Booked = Confirmed

var Received = b.Received
var Recieved = b.Recieved
var Picked = b.Picked
var NotFound = b.Not_Found

//


var maincircle = "maincircle"+p[0].Order_Number
var packButton = "button"+p[0].Order_Number





 if(Received ===  arrayUniqueByKey.length || Received > Confirmed || Received > Picked || Recieved ==  arrayUniqueByKey.length || Recieved > Confirmed || Recieved > Picked  ){
       document.getElementById(maincircle).innerHTML = ' '
      document.getElementById(maincircle).innerHTML += ` <i class="fa fa-circle st-done" style="font-size:24px;"></i>`
     
     document.getElementById(packButton).disabled = false;
   
    
    
 }else if (Confirmed ==  arrayUniqueByKey.length || Confirmed > Received || Received > Picked ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: Grey!important;font-size:24px;'></i>` 
     
 }
 else if (Hold ==  arrayUniqueByKey.length || Hold > Received || Hold > Picked ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: Grey!important;font-size:24px;'></i>` 
     
 }
 
 
 else if (Picked ==  arrayUniqueByKey.length || Picked > Confirmed || Picked > Received ) {
     
       document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle st-inprogress' style='font-size:24px;'></i>` 
     
 }
 else {
     
      document.getElementById(maincircle).innerHTML = ' '
     document.getElementById(maincircle).innerHTML += ` <i class='fa fa-circle' style='color: #D00000!important;font-size:24px;'></i>` 
     
 }
 
 
 



  for (var i = 0; i < arrayUniqueByKey.length; i++) {
     
     
     
    
     
     
     
     
     
     var statusP = arrayUniqueByKey[i].Item_Status
         var oid = p[0].Order_Number

      if( statusP== 'Picked'){
   
   
              
          var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class="fa fa-circle st-inprogress clr-stats" style="font-size:24px;"></i>`
          
      }else if( statusP== 'Received' || statusP == 'Recieved') {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class="fa fa-circle st-done clr-stats" style="font-size:24px;"></i>`
          
      }
      else if( statusP== 'Not Found' || statusP== 'Cancel' || statusP== 'QC Reject' || statusP== 'Not_Found' || statusP== 'QC_Rejected' ) {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class='fa fa-circle clr-stats' style='color: #D00000!important;font-size:24px;'></i>`
          
      }
         else if( statusP== 'Booked' || statusP== 'Confirmed' ||  statusP== 'Hold') {
          
           var skuss =   "icon"+arrayUniqueByKey[i].SKU
      document.getElementById(oid).innerHTML += ` <i class='fa fa-circle clr-stats' style='color: Grey!important;font-size:24px;'></i>`
          
      }
      
   
     
      document.getElementById(oid).innerHTML += ` 
         <div class="form-group row">
                          <div class="media" id="${skuss}"> 
                          <img class="img-75 img-fluid m-r-20 m-l-40" alt="" height="150" width="150" src="${arrayUniqueByKey[i].Image_1}" style="
    max-width: 125px;">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-9"><h6 class="d-block">${arrayUniqueByKey[i].SKU}</h6><br>
                                    <span class="notetext">Rs.${arrayUniqueByKey[i].Total}</span><br>
                                    <span><b>Rs.${arrayUniqueByKey[i].Price}</b></span></div>
                                       
                                        
                                    </div>
                              </div>
      `
      
  }

 
    
}

Object.getOwnPropertyNames(groubedByOrders)
      .reverse() 
      .forEach(function(p){
         test(groubedByOrders[p]);
      });





});
    
    
    
            
    
}

const bDisplay = () =>{
    $("#itrblock").removeAttr("style")
}

</script>
<script>
function myFunction() {
  var element = document.getElementById("iconswitch");
  element.classList.toggle("fa-angle-double-up");
}
</script>

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


function myFunction() {
  var element = document.getElementById("iconswitch");
   if (element.classList.contains("fa-angle-down")) {
      element.classList.remove("fa-angle-down");
      element.classList.add("fa-angle-up");
    } else {
      element.classList.remove("fa-angle-up");
      element.classList.add("fa-angle-down");
    }
}



const packOrder = (orderId) =>{
    
    var noid = orderId.substring(1);
    
    var form = new FormData();
form.append("oid", noid);



var settings = {
  "url": "https://backup.thriftops.com/Outbound/api/packOrder.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
  toastr.success('Order Packed')
  PackCards(td,fd)

});


}


// const extraItems = () =>{
    
//      $("#RecieveTable").hide()
//     $("#ExtraItems").show()
//     var settings = {
// //   "url": "https://backup.thriftops.com/Outbound/api/extraItems.php?td="+td+"&fd="+fd,
//     "url": "https://backup.thriftops.com/Outbound/api/extraItems.php?td=2022-04-07&fd=2022-04-07",
  
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
 
  
 
    
//       var rows = JSON.parse(response);
//   console.log(rows)
   

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Status} </td>
//                               <td>Sneakers</td>
//                                   <td>${values.Date}</td>
//                                   <td><img src="arrowforward.png"/></td>
                                 
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body2").
//                         innerHTML = tableData;
    
    

    
  
// });

// }



// const ReceivedItems = () =>{
    
//      $("#RecieveTable").hide()
//     $("#ExtraItems").show()
//     var settings = {

//     "url": "https://backup.thriftops.com/Outbound/api/ReceivedOrders.php",
  
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
 
  
 
    
//       var rows = JSON.parse(response);
//   console.log(rows)
   

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Status} </td>
//                               <td>Sneakers</td>
//                                   <td>${values.Date}</td>
                                   
                                 
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body2").
//                         innerHTML = tableData;
    
    

    
  
// });

// }

//⚠️ init dont change values

var ReceiveLimit = 0
var PackLimit = 0
var ExtraItems = 0
var ReceivedLimit =0




// function extraitems(limit){
//     alert("EXTRA");
// }


 
 function extraitems(limit)
    {
        
        // alert("")
         $("#SpackO").hide();

         $("#receiveID").hide() 
         $("#packcards").hide() 
         $("#ExtraID").show() 
         
         var fd  =document.getElementById('fromdate').value;
var  td = document.getElementById('todate').value;


                
        
 ReceiveLimit = 0
 PackLimit = 0
 ExtraItems = 1
ReceivedLimit =0
        
        var table = $('#example2').DataTable();

//clear datatable
table.clear().draw();

//destroy datatable
table.destroy();
         var lim = parseInt(limit)
var t=$("#example2").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
         pageLength: lim,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
  "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
    
    
     

        
      $.ajax({
        url:"https://backup.thriftops.com/Outbound/api/extraItems.php?fd="+fd+"&td="+td,
        method:"POST",
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >",[i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].Category_ID,response[i].Date ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }
    













// init ends


  document.getElementById('limit').addEventListener('change', function() {
  console.log('You selected: ', this.value);
  
  
  if(toPICKlimit === 1){
        load_data(1,this.value)
  }else if(pickedlimit === 1){
      PickedList(1,this.value)
  }else if(notFOUNDlimit === 1){
      NotfoundList(1,this.value)
  }
  
//   load_data(1,this.value)



   


console.log("toPICK",toPICKlimit ,"PickedList",pickedlimit,"NotfoundList",notFOUNDlimit )
     
    });   




  
    
    
    
  function ReceivedItems(limit)
    {
        
 $("#SpackO").hide();
         $("#receiveID").show() 
         $("#packcards").hide() 
          $("#ExtraID").hide()
         var td =document.getElementById('fromdate').value;
var fd = document.getElementById('todate').value;


                
        
 ReceiveLimit = 0
 PackLimit = 0
 ExtraItems = 0
ReceivedLimit =1
        
        var table = $('#example').DataTable();

//clear datatable
table.clear().draw();

//destroy datatable
table.destroy();
         var lim = parseInt(limit)
var t=$("#example").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
         pageLength: lim,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
   "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
    
    
     

        
      $.ajax({
        url:"https://backup.thriftops.com/Outbound/api/ReceivedOrders.php",
        method:"POST",
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >",[i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Status,"SNEAKERS",response[i].Date ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }
    
        function Receivelist(limit)
    {
        
         $("#SpackO").hide();
         $("#receiveID").show() 
         $("#packcards").hide() 
          $("#ExtraID").hide()
         var fd =document.getElementById('fromdate').value;
var td = document.getElementById('todate').value;


                
        
 ReceiveLimit = 0
 PackLimit = 0
 ExtraItems = 0
ReceivedLimit =1
        
        var table = $('#example').DataTable();

//clear datatable
table.clear().draw();

//destroy datatable
table.destroy();
         var lim = parseInt(limit)
var t=$("#example").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
         pageLength: lim,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
   "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
    
        
 $("#packcards").hide();
        
      $.ajax({
        url:"https://backup.thriftops.com/Outbound/api/PackList.php?fd="+fd+"&td="+td,
        method:"POST",
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
   t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >" ,"<b>"+[i+1]+"</b>" , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].Picked_by,response[i].Category_ID,response[i].Date,"<img src='thumbs-up.png' onclick='MarkReceived("+response[i].id+")' /><img src='thumbs-down.png' onclick='MarkExtra()' style='margin-left:15px;'/>" ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }

    
    
    
    $(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';

Receivelist(fd,td,100)
 $("#ExtraID").hide()
 
    var t=$("#example").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
   "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
  
    function Receivelist(limit)
    {
        
        var td =document.getElementById('fromdate').value;
var fd = document.getElementById('todate').value;

        
    ReceiveLimit = 1
 PackLimit = 0
 ExtraItems = 0
ReceivedLimit =0
        
 $("#packcards").hide();
        
      $.ajax({
        url:"https://backup.thriftops.com/Outbound/api/PackList.php?fd="+fd+"&td="+td,
        method:"POST",
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("PackList",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                  t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >" ,"<b>"+[i+1]+"</b>" , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].Picked_by,response[i].Category_ID,response[i].Date,"<img src='thumbs-up.png' onclick='MarkReceived("+response[i].id+")' /><img src='thumbs-down.png' onclick='MarkExtra("+response[i].id+")' style='margin-left:15px;'/>" ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }






 });
 
 
 var Active_OID = ""
 
 
 const MarkExtra = (oid) =>{
     
     $('#largeModal').modal('show');
     Active_OID = oid
    //  alert(Active_OID)
     
 }
 
 const  MarkExtraDB = (oid,status) =>{
//   alert(oid)
  // alert(status)
   
   
   
        var form = new FormData();
form.append("oid", oid);
form.append("status", status);

var settings = {
  "url": "https://backup.thriftops.com/Outbound/api/extraMark.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log("response11",response)
  Active_OID = ""
  //document.location.reload();
  Receivelist(11);
  toastr.error("Extra Item");
});
   
   
   
   
 }
 
 
 const MarkReceived = (id) =>{
     var form = new FormData();
form.append("oid", id);


var settings = {
  "url": "https://backup.thriftops.com/Outbound/api/ReceiveMark.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  
  Receivelist(11);
  toastr.success("RECEIVED");
});
 }
 
 
 
  $("#SKUSEARCH").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(4)").text();
            
            // console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#ORDERSEARCH").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(5)").text();
            
            // console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});
 
 

 
 
 
 




</script>
<!--TABLE STYLE FOR SERIAL NUMBERS-->
<style>


td{
    text-align:center;
}




</style>


        
        
        
<?php include ("../include/footer.php"); ?>
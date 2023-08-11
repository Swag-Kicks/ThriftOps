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
              <h3 class=" modal-title">Pick List</h3>
               
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
                <a href="Create" onclick="load_data(1,10)" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent" >To Pick</a>
                <a href="Create"  onclick="PickedList(1,10)" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Picked </a>
                 <a href="Create" onclick="NotfoundList(1,10)" name="pick"  id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Not Found </a>
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <!--<li>-->
                            <!--    <select id="change" class="form-select"  onchange="Picked(this);">-->
                            <!--      <option value="" selected disabled>Bulk Action</option>-->
                            <!--      <option value="Reason for deallocation">Pick</option>-->
                            <!--      <option value="Reason for deallocation">Not Found</option>-->
                                 
                                  
                            <!--</select>-->
                            <!--</li>-->
                        
                            <li><button class="dropbtn" onclick="window.location.reload();"><i class="icon-reload" id="ref"></i></button></li>

                              <li><div class="dropdown" >
                            <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit" class="form-control">
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                  <option value="500">500</option>
                                  <option value="1000">All</option>
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
        <table id="example" class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
               <!--<th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2"  rowspan="1" colspan="1"  aria-sort="ascending" >-->
               <!--                            <input style="height:20px;width:20px;" type="checkbox" name="select-all" id="select-all" />-->
               <!--                        </th>-->
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
            <input id="SSEARCH" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order #
            	<br>
            	<input id="OSEARCH" type="text"  >
            </th>
            
                <th class="res" tabindex="0" aria-controls="example" id="alo" rowspan="1" colspan="1">Allocation
            	<br>
            	<input id="AloSEARCH" type="text"  >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date Time
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body" style="text-align:center">
                
            </tbody>
            </table>
            </div>
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
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>
<script>

    //Functions initialzer
    
    var toPICKlimit = 0
    var pickedlimit = 0
    var notFOUNDlimit = 0

$('#change').change(function(){
  var title = $(this).val();
  $('.modal-title1').html(title);
  $('#modal').modal('show');
});

// const fetchTable = () =>{
// var settings = {
//   "url": "https://backup.thriftops.com/Warehouse/api/Topicklist.php",
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {

//   var rows = JSON.parse(response);
//   console.log(rows)
//     for(j = 0 ; j < rows.length ; j++) {
        
        
//     }

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Order_Number} </td>
//                                   <td>${values.DateTime}</td>
//                                       <td> <select class="mark"  onchange="Picked(this);" >
//                                  <option ></option>
//                                  <option value="${values.id}">Pick</option>
//                                           <option value="${values.id}">QC Rejected</option>
//                                           <option value="${values.id}">Not Found</option>
                                          
//                                         </select></td>
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
// });
// }

// fetchTable()

// const PickedList = () =>{
// var settings = {
//   "url": "https://backup.thriftops.com/Warehouse/api/pickedList.php",
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {

//   var rows = JSON.parse(response);
//   console.log(rows)
//     for(j = 0 ; j < rows.length ; j++) {
        
        
//     }

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Order_Number} </td>
//                                   <td>${values.DateTime}</td>
                                
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
// });
// }

// const NotfoundList = () =>{
// var settings = {
//   "url": "https://backup.thriftops.com/Warehouse/api/notfoundList.php",
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {

//   var rows = JSON.parse(response);
//   console.log(rows)
//     for(j = 0 ; j < rows.length ; j++) {
        
        
//     }

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
//                              <td></td>
//                             <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                           <td>${values.SKU}</td>
//                              <td>${values.Order_Number} </td>
//                                   <td>${values.DateTime}</td>
//                                       <td> <select class="mark"  onchange="Picked(this);" >
//                                  <option ></option>
                              
//                                           <option value="${values.id}" >Mark as Found</option>
//                                           <option disabled=disabled></option>
                                          
//                                         </select></td>
                                
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
// });
// }





function Picked(sel)
{
     var optionsText = sel.options[sel.selectedIndex].text;
if(optionsText === "Mark as Found"){
    console.log("Mark as Found")
        var form = new FormData();
form.append("id", sel.value);
form.append("status", "Booked");

var settings = {
  "url": "https://backup.thriftops.com/Warehouse/api/mark.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
     toastr.success("Founded")
 NotfoundList(1,10);
});
    
}else{
        var form = new FormData();
form.append("id", sel.value);

//const resultValue = (optionsText === "Pick") ? "Picked" : "QC_Rejected";

const resultValue = (optionsText === "Pick") ? "Picked" : 
               (optionsText === "QC Rejected") ? "QC_Rejected" :
               (optionsText === "Not Found") ? "Not Found" :
               "Not Found";




// alert(resultValue)
form.append("status", resultValue);

// alert(optionsText)

var settings = {
  "url": "https://backup.thriftops.com/Warehouse/api/mark.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 load_data(1,10);
 toastr.success(resultValue)
});
    
}


    
    
 
}

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
                             <td></td>
                            <td><img src="${values.Image_1}" height="65" width="65"/></td>
                           <td>${values.SKU}</td>
                             <td>${values.Order_Number} </td>
                                   <td>${values.DateTime}</td>
                                
                             
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});
        
        
        
        
       
    }
    
    
    const ChangeDate = () =>{
        
        
           let prefix = $('#SelectW').val()
          let fromdate = $('#fromdate').val()
         let todate = $('#todate').val()
       console.log(fromdate,todate,prefix)
       
       
         
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
                            
                             <td></td>
                            <td><img src="${values.Image_1}" height="65" width="65"/></td>
                           <td>${values.SKU}</td>
                             <td>${values.Order_Number} </td>
                                   <td>${values.DateTime}</td>
                                
                             
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});
       
       
       
        
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
</script>
<!--TABLE STYLE FOR SERIAL NUMBERS-->
<style>
/*   .css-serial {*/
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
/*}*/

/*.css-serial td:nth-child(2):before {*/
/*    font-weight:bold;*/
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
/*}*/

td{
    text-align:center;
}
</style>


<script>



$(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';


  load_data();
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
  
    function load_data()
    {
        
           toPICKlimit = 1
     pickedlimit = 0
     notFOUNDlimit = 0
        
        $("#alo").show();
 
        
      $.ajax({
        url:"https://backup.thriftops.com/Warehouse/api/Topicklist.php",
        method:"POST",
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ [i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].name,response[i].DateTime,"<select class='mark'  onchange='Picked(this);' ><option ></option><option value='"+response[i].id+"'>Pick</option><option value='"+response[i].id+"'>QC Rejected</option><option value='"+response[i].id+"'>Not Found</option></select>" ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }






 });



    
    

   function PickedList(page,limit)
    {
        
               $("#alo").hide();
        
          toPICKlimit = 0
     pickedlimit = 1
     notFOUNDlimit = 0
        
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
        url:"https://backup.thriftops.com/Warehouse/api/pickedList.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ [i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].DateTime ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }




   function NotfoundList(page,limit)
    {
        
               $("#alo").hide();
      toPICKlimit = 0
     pickedlimit = 0
     notFOUNDlimit = 1
        
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
        url:"https://backup.thriftops.com/Warehouse/api/notfoundList.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([[i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].DateTime, "<td> <select class='mark'  onchange='Picked(this);' ><option ></option><option value='"+response[i].id+"' >Mark as Found</option><option disabled=disabled></option></select></td>" ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }



$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 


</script>


<script>
    

    
    
    
    
    
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

  
      function load_data(page,limit)
    {
        var toPICKlimit = 1
    var pickedlimit = 0
    var notFOUNDlimit = 0
    
           $("#alo").show();
    
     var lim = parseInt(limit)
        var table = $('#example').DataTable();

//clear datatable
table.clear().draw();

//destroy datatable
table.destroy();
        
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
        url:"https://backup.thriftops.com/Warehouse/api/Topicklist.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ [i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].Order_Number,response[i].DateTime,"<select class='mark'  onchange='Picked(this);' ><option ></option><option value='"+response[i].id+"'>Pick</option><option value='"+response[i].id+"'>QC Rejected</option><option value='"+response[i].id+"'>Not Found</option></select>" ]).draw(false);           
            }
            
         
        }
      
      });
      
      
      
      
      
    }

    
 $("#OSEARCH").on("keyup", function() {
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

$("#AloSEARCH").on("keyup", function() {
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


 $("#SSEARCH").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(3)").text();
            
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


        
        
        
<?php include ("../include/footer.php"); ?>
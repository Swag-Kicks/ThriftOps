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
          <div class="col-md-8">
              <h3 class=" modal-title">Swag Warehouse</h3>
               
            </div>
            <div class="col-md-4">
             <!--<a href="Create"  name="pick"  class="btn btn-primary-light mleft arrow f-right" ><i class="fa fa-angle-right"></i></a>-->
             <!--<a href="Create"  name="pick"  class="btn btn-primary-light mleft arrow f-right" ><i class="fa fa-angle-left"></i></a>-->
             <!--     <select class="form-select w-50 f-right" id="SelectW" onchange="changeWarehouse()"></select>-->
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
                <a href="Create"  name="pick" onclick="load_data(1)" id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent" >Allocated Items</a>
                <a href="Create"  name="pick" onclick="dealocation(1)" id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Deallocated Items </a>
                <a href="Create"  name="pick" onclick="all_racks(1)" id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >All Racks</a>
              
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
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
        <table id="example" class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead id="thead1">
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
               <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2"  rowspan="1" colspan="1"  aria-sort="ascending" >
                                           <input style="height:20px;width:20px;" type="checkbox" name="select-all" id="select-all" />
                                       </th>
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Image
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Items
            	<br>
            <input id="search"  type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Location
            	<br>
            	<input id="search2" type="text"  >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product Type 
            	<br>
            		<input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Allocation Date
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            
            
            
            <thead id="thead2">
    
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
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Items
            	<br>
            <input id="search"  type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Reason
            	<br>
            	<input id="search2" type="text"  >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">POC
            	<br>
            		<input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Dealocation Date-->
            <!--	<br>-->
            <!--  <input id="tracking" type="text" style="visibility: hidden;" >-->
            <!--</th>-->

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            </th>
            </tr>    
            </thead>
             <tbody id="table_body" style="text-align:center;">

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
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" name="reason" required>
                                               <option value="" disabled selected >Select</option>
                                                <option value="Damaged">Damaged</option>
                                                <option value="Required for Marketing Content">Required for Marketing Content</option>
                                                 <option value="Required for Marketing Content">Required for Outdoor Event</option>
                                                 <option value="For Walk in Customer">For Walk in Customer</option>
                                                 <option value="On Request">On Request</option>
                                                </select>
                                                
                                                 <input class="form-control" type="text"  id="coitems"   name="removedby"  placeholder="Enter POC" aria-describedby="emailHelp">
                                             </div>
                                              <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;" onclick="Dealocate()" >Save</a>
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

$('#change').change(function(){
  var title = $(this).val();
  $('.modal-title1').html(title);
  $('#modal').modal('show');
});



// VIEW ALLOCATION
// const ViewAllocation = ()=>{
//     document.getElementById("table_body").innerHTML = '';

// var params = new window.URLSearchParams(window.location.search);
// var id = params.get('id');
// var rn = params.get('rn');




// var settings = {
//   "url": "https://sys.thriftops.com/Warehouse/api/singleRackAllocation.php?id="+id+"&rn="+rn,
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
//   //console.log(response);
  
//     var rows = JSON.parse(response);
//     console.log("rows",rows)
    
    
    
    
//     for(j = 0 ; j < rows.length ; j++) {
        
        
//     }

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                           <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.Rack_ID}" ></td>
//                             <td></td>
//                              <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                               <td>${values.SKU}</td>
//                               <td>${values.name}</td>
//                                 <td>${values.Name}</td>
//                                 <td>${values.Filled_at}</td>
//                                 <td> <select class="mark"  onchange="getval(this);" >
                              
//                                  <option ></option>
//                                           <option value="${values.SKU}">Dealocate</option>
//                                           <option disabled="disabled"></option>
                                          
//                                         </select></td>
                             
                                
                              
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
  
  
  
  
  

// });
// }
// ViewAllocation()
//DEALOCATIN
function autoallocation(id,sku){
    
    var form = new FormData();
form.append("id", id);
form.append("sku", sku);

var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/autoalocate.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 //ViewAllocation()
console.log(response)
dealocation(1)
});    
    
    
}





var itemValue = ""

function getval(sel)
{
    
    
    
    
     $('#modal').modal('show');    
    itemValue = sel.value;
}

const Dealocate = ()=>{
    // alert(itemValue)
    
              var reason = $("select[name=reason]").val();
                var removedby = $("input[name=removedby]").val();
    
    var form = new FormData();
form.append("reason", reason);
form.append("removedby", removedby);
form.append("sku", itemValue);
var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/dealocation.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 //ViewAllocation()
   $('#modal').modal('hide');
   load_data(1)
});
    
    
    
    
    
    
}

// const viewDealocation = () =>{
// // $("#thead1").hide();
// // $("#thead2").show();

    

// // var params = new window.URLSearchParams(window.location.search);
// // var id = params.get('id');
// // var rn = params.get('rn');




// var settings = {
//   "url": "https://sys.thriftops.com/Warehouse/api/dealocateditems.php?id="+id+"&rn="+rn,
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
//   //console.log(response);
  
//     var rows = JSON.parse(response);
//     console.log(rows)
    
    
    
    
//     for(j = 0 ; j < rows.length ; j++) {
        
        
//     }

//       let tableData = "";
//                     rows.forEach((values => {
                        
                     
//                         tableData += `
//                         <tr>
//                           <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.Rack_ID}" ></td>
//                             <td></td>
//                              <td><img src="${values.Image_1}" height="65" width="65"/></td>
//                               <td>${values.Pre_SKU}</td>
//                               <td>${values.name}</td>
//                                 <td>${values.Name}</td>
//                                 <td>${values.Filled_at}</td>
                                
                             
                                
                              
                             
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
  
  
  
  
  
  

// });
    
    
    
// }




$("#search").on("keyup", function() {
    var value = $(this).val().toLocaleUpperCase();;

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(4)").text();
            
            console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});


$("#search2").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(5)").text();
            
            console.log(id,value)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});



$(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';

$("#thead2").hide();
  load_data(1);
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
  
    function load_data(page)
    {
        
        $("#thead2").hide();
        $("#thead1").show();
        
var params = new window.URLSearchParams(window.location.search);
var id = params.get('id');
var rn = params.get('rn');
        
        
      $.ajax({
        url:"https://sys.thriftops.com/Warehouse/api/singleRackAllocation.php?id="+id+"&rn="+rn,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            
             response.sort((a, b) => a.name.localeCompare(b.name));
            for(var i=0; i<response.length; i++)
            {
                t.row.add([  "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >" ,[i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].name,response[i].Name ,response[i].Filled_at ,"<select class='mark'  onchange='getval(this);' ><option ></option><option value='"+response[i].SKU+"'>Dealocate</option><option disabled='disabled'></option></select>"]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }






 });




    function load_data(page)
    {
        
        
        $("#head2").hide();
        $("#head1").show();
        console.log("HIDEN")
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

        
        
var params = new window.URLSearchParams(window.location.search);
var id = params.get('id');
var rn = params.get('rn');
        
        
      $.ajax({
        url:"https://sys.thriftops.com/Warehouse/api/singleRackAllocation.php?id="+id+"&rn="+rn,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            $("#head2").hide();
        $("#head1").show();
            var response=JSON.parse(data);
            console.log("response",response)
            var fill='';
             response.sort((a, b) => a.name.localeCompare(b.name));
            for(var i=0; i<response.length; i++)
            {
              t.row.add([  "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].id+"' >" ,[i+1] , "<img src='"+response[i].Image_1+"' height='65' width='65'/>",response[i].SKU,response[i].name,response[i].Name ,response[i].Filled_at ,"<select class='mark'  onchange='getval(this);' ><option ></option><option value='"+response[i].SKU+"'>Dealocate</option><option disabled='disabled'></option></select>"]).draw(false);
               
            }
            
         
        }
      
      });
    }
    
    
       function all_racks(page)
    {
        
        
        $("#head2").hide();
        $("#head1").show();
        console.log("HIDEN")
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

        
        
var params = new window.URLSearchParams(window.location.search);
var id = params.get('id');
var rn = params.get('rn');
        
        
      $.ajax({
        url:"https://sys.thriftops.com/Warehouse/api/allracks.php?id="+id+"&rn="+rn,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            $("#head2").hide();
        $("#head1").show();
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
             response.sort((a, b) => a.name.localeCompare(b.name));
            for(var i=0; i<response.length; i++) {
  var imageSrc = response[i].Image_1 || "https://sys.thriftops.com/ShopifyPush/imageicon.png";
  t.row.add([
    "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].Rack_ID+"' >",
    [i+1],
    "<img src='"+imageSrc+"' height='65' width='65'/>",
    response[i].SKU,
    response[i].name,
    response[i].Name,
    response[i].Filled_at,
    "<select class='mark' onchange='getval(this);' ><option ></option><option value='"+response[i].SKU+"'>Dealocate</option><option disabled='disabled'></option></select>"
  ]).draw(false);
}

            
         
        }
      
      });
    }
    
    
    
    
    function dealocation(page)
    {
        
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
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],"language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='150' width='150' />"
    }
    });

        
        
$("#thead1").hide();
$("#thead2").show();

    

var params = new window.URLSearchParams(window.location.search);
var id = params.get('id');
var rn = params.get('rn');



        
        
      $.ajax({
        url: "https://sys.thriftops.com/Warehouse/api/dealocateditems.php?id="+id+"&rn="+rn,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            $("#head2").hide();
        $("#head1").show();
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                  t.row.add([
  `<input class="checkbox1" type="checkbox" id="cBox" value="${response[i].id}">`,
  [i+1],
  `<img src="${response[i].Image_1}" height="65" width="65"/>`,
  response[i].SKU,
  response[i].reason,
  response[i].Removed_By,
   response[i].Name,
//   response[i].Filled_at,
  `<select class="mark" onchange="autoallocation(${response[i].Warehouse_ID}, '${response[i].SKU}' , ${response[i].id})">
     <option></option>
     <option value="${response[i].SKU}">Auto-Allocate</option>
     <option disabled="disabled"></option>
   </select>`
]).draw(false);
            }
            
         
        }
      
      });
      
      
      
      
      
    }
    
    
    
    
    
    function autoallocation(wid,sku,id){
    
    var form = new FormData();
form.append("wid", wid);
form.append("sku", sku);
form.append("id", id);


console.log("WID",wid , "sku",sku,"id",id)

var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/autoalocate.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 //ViewAllocation()
console.log(response)
dealocation(1)
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
 td img {
    width: 100px;
    height: 100px;
    transition: all .2s ease-in-out; /* adds a smooth transition effect */
  }
  td:hover img {
    transform: scale(5); /* increases the image size by 20% */
    position: relative;
    z-index: 1; /* brings the magnified image to the front */
  }

</style>

        
        
        
<?php include ("../include/footer.php"); ?>
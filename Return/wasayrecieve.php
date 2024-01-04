<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="paging.js"></script> 



<!--Data Table-->


<!-- Page Body Start-->

<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
            <div class="">
      <div class="row">
         <div class="col-md-4">
            <h2 style="margin-top:7%">
            <b>Receive Returning Items</b> </h3>
         </div>
         <div class="col-md-4 mt-15">
            <!--<select class="m-l-15 f-right form-select" style="width:40%;margin-top:7.1%;" name="bulkactions" onchange="changeselect()" >-->
            <!--    <option>Bulk Action</option >-->
            <!--    <option value="1" >Mark as received</option>-->
            <!--    <option value="2" >Send to Warehouse</option>-->
            <!--    </select>-->
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
          <!--<button onclick="asc();"> EXPORT </button>-->
         <div class="col-sm-12">
          <div class="modal fade bd-example-modal-lg p-t-10" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                              
                            <h4 class="modal-title" id="myLargeModalLabel"><b>Add Vendor</b></h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        


<script>



function asc(){
    var table = $('#example').DataTable({
         "bDestroy": true,
          order: [[2, 'asc']],
    });
}

function desc(){
    var table = $('#example').DataTable({
         "bDestroy": true,
        order: [[2, 'desc']],
    });
}

function show10(){
    typeAll(10)
}

function show20(){
  typeAll(20)
}

function show50(){
 typeAll(50)
}

function show100(){
  typeAll(100)
}



 

      $('#example').dataTable( {
    "paging": true
} );
</script>
      <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-sm-6 "  style="margin-top:30px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a onclick="ShowAll(60,td,fd)" class="nav-link active"  data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">All</a></li>
                      <li class="nav-item"><a onclick=" typeAll(60,fd,td,'TBR')" class="nav-link"  data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">To Be Received</a></li>
                      <li class="nav-item"><a onclick=" typeAll(60,fd,td,'Received')" class="nav-link"  data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Received</a></li>

                  <li class="nav-item"><a onclick="typeAll(60,fd,td,'Wrong_Item')" class="nav-link"  data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Conflict</a></li>
                
                    </ul>
                </div>
                <div class="col-sm-6 p-r-30" style="margin-top:30px;">
                    
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
                                <!--<li> <select class="form-control form-select" name="returntype" id="returntype" onchange="changeselect()"  >-->
                                <!--                   <option value=" " disabled selected>Bulk Actions</option>-->
                                <!--                   <option value="1">Marked as Processed</option>-->
                                                  
                                                    
                                <!--                </select></li>-->
           
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
            <tbody id="table_body">
                
            </tbody>
            </table>
   
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
    
    tfoot {
     display: table-header-group;
}

/*.dataTables_wrapper table.dataTable tbody td, .dataTables_wrapper table.dataTable tbody th {*/
/*    background-color: #fff;*/
/*    border-left: 0px !important ;*/
/*    border-right: 0px !important ;*/
/*    border-bottom: 2px !important ;*/
/*    border-top: 0px !important ;*/
/*}*/

table{
width:100%;
overflow-x:auto;
display:block;
}
</style>

<!--FOR TABLE-->


<script>

// var fd =document.getElementById('fromdate').value;
// var td = document.getElementById('todate').value;


var fd = '0000-00-00';
var td = '0000-00-00';

 const ChangeDate = () =>{
        
        
        
          let fromdate = $('#fromdate').val()
         let todate = $('#todate').val()
         
         
     ShowAll(60,fromdate,todate)
       
       
       
 }


$("#SSKU").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();
            
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


$("#SORDER").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(7)").text();
            
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

  
const typeAll = (l,fd,td,status) => {
   document.getElementById("table_body").innerHTML = ''
    var limit = l
    
    var settings = {
  "url": "https://sys.thriftops.com/Return/Api/recieve.php?limit="+limit+"&fd="+fd+"+&td="+td+"&status="+status,
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
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});

    
}



const ShowAll = (l,fd,td) => {
      document.getElementById("table_body").innerHTML = ''
    var limit = l
    
    var settings = {
  "url": "https://sys.thriftops.com/Return/Api/recieveAll.php?limit="+limit+"&fd="+fd+"+&td="+td,
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
                                  <td><select class="mark" id="recTABLE"  onchange="changeselect(this,${values.id})">
  <option value="" selected disabled>Select an option</option>
  <option value="1" >Mark as Received</option>
  <option value="2">Wrong Item Received</option>
</select></td>
                                    
                                
                                
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
  
});

    
}






 ShowAll(60,fd,td)











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


                                         
                                         
                                         
                                          






</script>






<script>
    








// Watch it if you're still here ('https://www.youtube.com/shorts/dOtMlUmTQm4')














// var settings = {
//   "url": "https://sys.thriftops.com/Vendor2/api/countTypes.php?type=Peer",
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
 
//  var JSONRES = JSON.parse(response)
 
//   document.getElementById("totalPeer").innerText =  "Peers ("+JSONRES[0].total + ")"
 
// });


// var settings = {
//   "url": "https://sys.thriftops.com/Vendor2/api/countTypes.php?type=Seller",
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
 
//  var JSONRES = JSON.parse(response)
 
//   document.getElementById("totalSeller").innerText =  "Sellers ("+JSONRES[0].total + ")"
 
// });


// var settings = {
//   "url": "https://sys.thriftops.com/Vendor2/api/countTypes.php?type=Supplier",
//   "method": "POST",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
 
//  var JSONRES = JSON.parse(response)
 
//   document.getElementById("totalSuppliers").innerText =  "Suppliers ("+JSONRES[0].total + ")"
 
// });




const markReceived = (value) => {
//   var checkedCheckbox = document.querySelector('.checkbox1:checked');
//   if (checkedCheckbox !== null) {
   // var checkedValue = checkedCheckbox.value;

    var form = new FormData();
    form.append("oid", value);
    
    var settings = {
      "url": "https://sys.thriftops.com/Return/Api/markReceived.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form
    };
    
    $.ajax(settings).done(function (response) {
      toastr.success("Received")
  ShowAll(60,td,fd)
    });
//   } else {
//       toastr.error("PLEASE SELECT CHECKBOX")
//     console.log('No checked checkboxes found.');
//   }
}




const wrongItem = (value) => {

    
    var form = new FormData();
    form.append("oid", value);
    
    var settings = {
      "url": "https://sys.thriftops.com/Return/Api/wrongItem.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form
    };
    
    $.ajax(settings).done(function (response) {
      toastr.error("Wrong Item");
      ShowAll(60,td,fd);
    });
 
}


  function changeselect(select,extra) {
      
      
      var idV = extra
    //   alert(extra)
      
     
    if (select.value === "1") {
        
        //alert(idV)
      // Code to mark item as received
        markReceived(idV)
      
    } else if (select.value === "2") {
        //alert(idV)
        wrongItem(idV)
      // Code for wrong item received
    }
  }


// const changeselect = (val) =>{
    
    
//     console.log("Clicked")
//       var selectvalue = $("#recTABLE").val();
//   var newval = val
  
//       if(selectvalue == "1"){
//           markReceived(newval)
          
          
//       }else if(selectvalue == "2"){
         
//          wrongItem(newval)  //alert("warehouse")
          
//       }
    
// }






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
  "url": "https://sys.thriftops.com/Return/Api/singleorder.php",
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
      let tableData = "";
                    rows.forEach((values => {
                        tableData += `
                        <tr style="text-align:center;" >
                            <td >  <input class="checkbox1" type="checkbox" id="cBox" value="${values.id}" ></td>
                             <td>${values.SKU}</td>
                             <td>${values.Title}</td>
                             <td><img src="${values.Image_1}" height="50" width="50" /></td>
                             <td>${values.Total}</td>
                             <td>#31121</td>
                              <td>${values.Order_Number}</td>
                                <td>${values.Tracking}</td>
                                  <td>${values.Item_Status}</td>
                                      <td>${values.Date}</td>
                                  <td><select class="mark"  id="mark">
                                          <option disabled="" selected="">
                                          </option>
                                          <option value="Received">Mark as Received</option>
                                          <option value="Wrong Item">Wrong Item Received</option>
                
                                        </select></td>
                                    
                                
                                
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;

  
});
    
}


</script>

<script>
	$('#table_body').paging({limit:5});

</script>





<!-- footer start-->
<?php include("../include/footer.php");?>

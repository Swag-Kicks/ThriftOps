<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row mt-3">
          <div class="col-md-6">
              <h3 class=" modal-title">Warehouse</h3>
               
            </div>
            <div class="col-md-6">
             <a href="Create"  name="pick"  id="addorder" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light m-l-15 f-right" >Add New</a>
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
                <div class="col-md-6 " style="margin-top:34px;">
              <!--<ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">-->
              <!--        <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Unbooked<span id="unbookedb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="dis_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Dispatched <span id="dispatchedb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="ins_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">InTransit<span id="intransitb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="del_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Delivered<span id="deliveredb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="ret_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Returned<span id="returnedb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="loss_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Conflict/Lost<span id="lostb"></span></a></li>-->

                  
                
              <!--      </ul>-->
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="change" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="Change Allocation Status">Change Allocation Status</option>
                                  <option  value="Change Status" >Change Status</option>
                                  
                            </select>
                            </li>
                        
                            <li><button class="dropbtn" onclick="fetchTable()"><i class="icon-reload" id="ref"></i></button></li>

                              <li><div class="dropdown" >
                            <button class="dropbtn" ><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit"  class="form-control">
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
        <div style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
              
    <!--    <table id="example" class="dataTable table no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;">-->
          
    <!--          <thead >-->
   
    <!--      <tr id="test" style="background-color:#E0E3EC;" role="row">-->
    <!--           <th class="res">-->
            
    <!--        	 <input class="checkbox1" onclick="toggle(this);"  type="checkbox" >-->
    <!--        </th>-->
    <!--         <th>Sno</th>-->
    <!--    <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Warehouse<input  id="newtd" /></th>-->
    <!--      <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Racks<input  id="newtd" /></th>-->
    <!--              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Capacity<input  id="newtd" /></th>-->
    <!--                 <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Allocation<input  id="newtd"  type="text" list="allocation" ><datalist id="allocation">-->
    <!--  <option value="Enabled">-->
    <!--  <option value="Disabled">-->
    <!--</datalist></th>-->
    <!--                    <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Status<input  id="newtd" /></th>-->
    <!--                        <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Primary Vendor<input  id="newtd" /></th>-->
    <!--                          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" ><br/>Date<input  id="newtd" type="date" /></th>-->
        <!--<th id="newtd">Racks</th>-->
        <!--<th id="newtd">Capacity</th>-->
        <!--<th id="newtd">Allocation</th>-->
        <!--  <th id="newtd">Status</th>-->
        <!--    <th id="newtd">Primary Vendor </th>-->
        <!--  <th id="newtd">Datee</th>-->
          <!--     <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno-->
          <!--  	<br>-->
          <!--  	<input id="ordernum" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Warehouse-->
          <!--  	<br>-->
          <!--  	<input id="newtd" type="text" >-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Racks-->
          <!--  	<br>-->
          <!--  	<input id="customer" type="text">-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Capacity-->
          <!--  	<br>-->
          <!--  	<input id="city" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Allocation-->
          <!--  	<br>-->
          <!--  	<input id="items" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          <!--  <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status-->
          <!--  	<br>-->
          <!--  	<select class="form" id="courier">-->
          <!--          <option disabled selected></option>-->
          <!--          <option value="PostEx">PostEx</option>-->
          <!--          <option value="Leopard">Leopard</option>-->
          <!--          <option value="Call Courier">Call Courier</option>-->
          <!--          <option value="Trax">Trax</option>-->
          <!--          <option value="Rider">Rider</option>-->
          <!--          <option value="Self">Self Deliver</option>-->
          <!--      </select>-->
          <!--  </th>-->
          <!--   <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Primary Vendor -->
          <!--  	<br>-->
          <!--  	<input id="tracking" type="text" >-->
          <!--  </th>-->
          <!--   <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date-->
          <!--  	<br>-->
          <!--      <input id="items" type="text" style="visibility: hidden;" >-->
          <!--  </th>-->
          
           
          <!--   <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">-->
          <!--  <th></th>-->
    <!--        </tr>    -->
    <!--        </thead>-->
            
    <!--    <tbody id="table_body">-->

    <!--    </tbody>-->
    <!--        </table>-->
       <table id="example" class="dataTable no-footer css-serial"  role="grid" style="margin-left: 0px; width: 1787.12px;">
                                 <thead>
                                    <tr id="test" style="background-color:#E0E3EC;" role="row">
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2"  rowspan="1" colspan="1"  aria-sort="ascending" >
                                           <input style="height:20px;width:20px;" type="checkbox" name="select-all" id="select-all" />
                                       </th>
                                        <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2"  rowspan="1" colspan="1"  aria-sort="ascending" >Sno
                                       </th>
                                       <th class="res" tabindex="0"  aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1"  aria-sort="ascending" >Warehouse
                                          <br>
                                          <input id="WSEARCH" type="text" style="margin:10px;">
                                       </th>
                                       <th class="res" tabindex="0"  aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Racks
                                       <br>
                                       
                                           <input id="search2"  type="text"> 
                                       </th>
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Capacity
                                          <br>
                                          <input id="city" type="text" style="visibility: hidden;" >
                                       </th>
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Allocation
                                          <br>
                                          <input id="items" type="text"  >
                                       </th>
                                       <!--<th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Ticket #-->
                                       <!--	<br>-->
                                       <!--	<select class="form" id="search3">-->
                                       <!--        <option disabled selected></option>-->
                                       <!--        <option value="Empty">Empty</option>-->
                                       <!--        <option value="Filled">Filled</option>-->
                                       <!--    </select>-->
                                       <!--</th>-->
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Status
                                          <br>
                                          <input id="tracking" type="text" >
                                       </th>
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Primary Vendor
                                          <br>
                                          <!--<input id="VSEARCH" type="text" >-->
                                       </th>
                                       <th class="res" tabindex="0" aria-controls="example" style="border-right:2px solid #D2D2D2" rowspan="1" colspan="1">Date
                                          <br>
                                          <input id="items" type="text"  >
                                       </th>
                                     
                                       <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
                                       </th>
                                       <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody id="table_body" style="background-color:#F6F6F6;">
                                 </tbody>
                              </table>
                              
                              <div id="pagination"></div>
            </div>
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
                  <!--new wearhouse-->
                <div id="exampleModalCenter" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Add Warehouse</h3>
                          </div>
                          
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="row">
                           <br>
                                 <div class="col-md-3 m-b-10">&nbsp;&nbsp;&nbsp;
                                     <label id="prshow">&nbsp;&nbsp;&nbsp;<b></b></label>
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                            <div class="px-2">
                                <div class="mleft"><h5>Details</h5></div>
                                
                                <div class="col-sm-12 row p-4">
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Location Name*</label>
                                                <input class="form-control" type="text" name="location" id="cuname" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">POC*</label>
                                                <input class="form-control" type="text" name="poc" id="ornum" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Address</label>
                                                <input class="form-control" type="text" name="address" id="coitems" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Allocation*</label>
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" name="allocation" id="couriestat" required>
                                                   <option value="" disabled selected >Select Allocation</option>
                                                    <option value="Enabled">Enabled </option>
                                                    <option value="Disabled">Disabled</option>    
                                                </select>
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Status*</label>
                                               <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" name="status" required>
                                               <option value="" disabled selected >Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                                
                                                </select>
                                             </div>       
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label">Vendor</label>
                                                <select class=" form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10 js-example-placeholder-multiple" multiple="multiple" id="SelectV" >
                                                  <option value="">-- SELECT VENDOR ---</option>
                                                  
                                                </select>
                                             <!--   <div class="mb-3 col-sm-6">-->
                                             <!--<label class="col-form-label pt-0" for="exampleInputEmail1">Capacity</label>-->
                                             <!--  <input class="form-control" type="text" name="capacity" id="coitems" aria-describedby="emailHelp">-->
                                             <!--</div>   -->
                            
                                         
                                        
                                              
                         
                       </div>
                            </div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" onclick="addWarehouse()" >Create</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
                <!--new wearhouse--> 
              
                         
                        
                         
                         
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
     <!--changestatus modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Change Status</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="couriestat" name="status1"  required>
                                               <option value="" disabled selected >Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                               
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;" onclick="changeStatus()">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--end changestatus modal-->
    <!--NEW MODAL WASAY-->
                         
                                     <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal2" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Change Status</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="couriestat" name="status2"  required>
                                               <option value="" disabled selected >Select</option>
                                                <option value="Enabled">Enabled</option>
                                                <option value="Disabled">Disabled</option>
                                               
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;" onclick="changeStatusA()">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
   
</div>

<style>
    button {
  background-color: #fff;
  border: 1px solid #ddd;
  color: #333;
  cursor: pointer;
  padding: 5px 10px;
  margin-right: 5px;
}

button.active {
  background-color: red;
  border-color: crimson;
  color: #fff;
}
</style>


<script>



// const addVendors = () =>{
    
//   var vendors = $("#SelectV").val()
//     console.log(vendors)
    
// }

















    //DATATABLE PAGINATION
    
    
    
    
    
    
document.getElementById('limit').addEventListener('change', function() {
  console.log('You selected: ', this.value);
  
  load_data2(1,this.value)
  //show(this.value)
});  


   





  
    

    
</script>


<script>


//WASAY CUSTOM CODE PAGINATIOIN WITHOUT DATATABLES

$(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';


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
  ], "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
  
    function load_data(page)
    {
      $.ajax({
        url:"api/warehouse.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
          console.log(data);
            var response=JSON.parse(data); 
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].Warehouse_ID+"' >" ,[i+1], "<a href='Open_warehouse.php?id="+response[i].Warehouse_ID+"'><b>"+response[i].Location.toUpperCase()+"</b></a>" ,response[i].Racks , response[i].Capacity , response[i].Allocation , response[i].Status, "<details><summary>See all vendors</summary><p>"+ response[i].Vendor+"</p></details>", response[i].DateTime ]).draw(false);
                // fill +="<tr><td>"+response[i].Name+"</td><td>"+response[i].Type+"</td><td>"+response[i].Address+"</td><td>"+response[i].Contact+"</td><td>"+response[i].Percentage+"</td></tr>";
                // fill +="<tr><td>${response[i].Name}</td><td>${response[i].Type}</td><td>${response[i].Address}</td><td>${response[i].Contact}</td><td>${response[i].Percentage}</td></tr>";
                     
                //table.innerHTML+=fill;
            }
            
        //   t.row.add$('#dynamic_content').append(fill);   
        }
      
      });
    }







   
  
















    
    
//      let table = document.getElementById('example');
// let rowsPerPage = 11;
// let currentPage = 1;

// function showTableRows(page) {
//   let start = (page - 1) * rowsPerPage;
//   let end = start + rowsPerPage;

//   for (let i = 1; i < table.rows.length; i++) {
//     if (i < start || i >= end) {
//       table.rows[i].style.display = 'none';
//     } else {
//       table.rows[i].style.display = '';
//     }
//   }
// }



// function generatePaginationButtons() {
//   let numPages = Math.ceil(table.rows.length / rowsPerPage);

//   let pagination = document.getElementById('pagination');
//   pagination.innerHTML = '';

//   for (let i = 1; i <= numPages; i++) {
//     let button = document.createElement('button');
//     button.innerHTML = i;
//     button.addEventListener('click', function() {
//       showTableRows(i);
//       currentPage = i;
//       updateActiveButton();
//     });
//     pagination.appendChild(button);
//   }
// }

// function updateActiveButton() {
//   let buttons = document.getElementById('pagination').getElementsByTagName('button');
//   for (let i = 0; i < buttons.length; i++) {
//     if (buttons[i].innerHTML == currentPage) {
//       buttons[i].classList.add('active');
//     } else {
//       buttons[i].classList.remove('active');
//     }
//   }
// }

// showTableRows(currentPage);
// generatePaginationButtons();
// updateActiveButton();

  
    
    // Setup - add a text input to each footer cell
    $('#example thead #test th #newtd').each( function () {
        var title = $(this).text();
        $(this).append( '<br><input type="text" style="width:130px;"  />' );
    } );
    
     
 
    // DataTable
    // var table = $('#example').DataTable({
    //      pagingType: 'full_numbers',
    //   scrollX: true
    // });
 
    // Apply the search
    // table.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.header() ).on( 'keyup change', function () {
    //         if ( that.search() !== this.value ) {
    //             that
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );
} );

$('#change').change(function(){
  var title = $(this).val();
  
  if (title == "Change Allocation Status"){
      $('.modal-title1').html(title);
  $('#modal2').modal('show');
  }else{ 
  $('.modal-title1').html(title);
  $('#modal').modal('show');    
  }
  
});



//CUSTOM SCRIPT (WASAY) DATABLES!!!

// const fetchTable = () =>{
   
// var settings = {
//   "url": "https://sys.thriftops.com/Warehouse/api/warehouse.php",
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {

//   var rows = JSON.parse(response);
//     // for(j = 0 ; j < rows.length ; j++) {
        
        
//     // }

//       let tableData = "";
//                     rows.forEach((values => {
                        
//                         getSingleRacks(values.Warehouse_ID)
//                         tableData += `
//                         <tr>
//                             <td> <input class="checkbox1" type="checkbox" id="cBox" value="${values.Warehouse_ID}" ></td>
//                              <td></td>
//                              <td style="width:2%"><a href="Open_warehouse.php?id=${values.Warehouse_ID}"><b>${values.Location.toUpperCase()}</b></a></td>
//                           <td>${values.Racks}</td>
//                              <td>${values.Filled} / ${values.Capacity}</td>
//                               <td>${values.Allocation}</td>
//                              <td>${values.Status}</td>
//                                  <td><details>
//   <summary>See all vendors</summary>
//   <p>${values.Vendor}</p>
// </details></td>
//                                   <td style="width:3%">${values.DateTime}</td>
//                                   <td>  <select class="mark" name="'.$row["Order_ID"].'" id="mark">
//                                           <option disabled selected>
//                                           </option>
//                                           <option value="Open">Open</option>
//                                           <option value="Change Status">Change Status</option>
//                                           <option value="Edit">Edit</option>
//                                         </select></td>
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
                        
                        
//                         toastr.info("Refreshed")
  
// });
// }
// fetchTable()


const addWarehouse = () =>{
 
 var vendors = $("#SelectV").val()
 
 
 
     var location = $("input[name=location]").val();
       var poc = $("input[name=poc]").val();
         var address = $("input[name=address]").val();
           var allocation = $("select[name=allocation]").val();
             var status = $("select[name=status]").val();
              var vendor = vendors;
                var capacity = $("input[name=capacity]").val();
              
              
              
    var form = new FormData();
form.append("location", location);
form.append("poc", poc);
form.append("address",address);
form.append("allocation", allocation);
form.append("status", status);
form.append("vendor", vendor);
form.append("capacity", capacity);
var settings = {
  "url": "api/addWarehouse.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
  Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Warehouse Updated Successfully',
  showConfirmButton: false,
  timer: 1500
})
fetchTable()
    
});
}




const changeStatus = ()=>{

      var status = $("select[name=status1]").val();
 
var array = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
var newArray = array.filter((value)=>value!='on');


 
  
 var form = new FormData();
form.append("ids", newArray);
form.append("status", status);

var settings = {
  "url": "api/updateStatus.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  
  fetchTable()
    $('#modal').modal('hide');
  
});
 
 
}


const changeStatusA = ()=>{
     var status = $("select[name=status2]").val();
 
var array = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
var newArray = array.filter((value)=>value!='on');


 
 
  
 var form = new FormData();
form.append("ids", newArray);
form.append("status", status);

var settings = {
  "url": "api/updateAlo.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  
  fetchTable()
  $('#modal2').modal('hide');
});
 
 
}



function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}


//export excel
const  fnExcelReport = () =>
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>  <th></th><th></th><th>Name</th><th>Racks</th><th>Capacity</th><th>Allocation</th><th>Status</th><th>Primary Vendor</th><th>Date</th></tr>";
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


//SHOW VENDORS
       function Vendors(){
        
        var settings = {
      "url": "api/vendors.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
    
    
      for (var i = 0; i < data.length; i++) {
    
           
        var select = document.getElementById("SelectV");
        var option = document.createElement("option");
        option.text = data[i].Name;
        option.value = data[i].Vendor_ID;
        select.add(option);
       
    }
    });
        
    }
       const myTimeout2 = setTimeout( Vendors(), 500);


const getSingleRacks = (rid) =>{
    var id = rid
    var settings = {
  "url": "api/getSingleRack.php?id="+id,
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
 
  var JRES = JSON.parse(response)
  var racks = JRES[0].racks;
   
   
  updateWarehouseRack(rid,racks)
  //fetchTable()
   
});
    
}

 
 
 
 const updateWarehouseRack = (wid,rid) =>{
     var form = new FormData();
     
     
     
form.append("id", wid);
form.append("racks", rid);

var settings = {
  "url": "api/updateRack.php",
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
 
 
 
 
 $("#WSEARCH").on("keyup", function() {
    var value = $(this).val().toUpperCase();;

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


 $("#VSEARCH").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(8)").text();
            
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


// Listen for click on toggle checkbox
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

<!--TABLE STYLE FOR SERIAL NUMBERS-->
<style>
//   .css-serial {
//   counter-reset: serial-number;  /* Set the serial number counter to 0 */
// }

// .css-serial td:nth-child(2):before {
//     font-weight:bold;
//   counter-increment: serial-number;  /* Increment the serial number counter */
//   content: counter(serial-number);  /* Display the counter */
// }

td{
    text-align:center;
}

</style>


<script>
        function load_data2(page,limit)
    {
      
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
        url:"api/warehouse.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data); 
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ "<input class='checkbox1' type='checkbox' id='cBox' value='"+response[i].Warehouse_ID+"' >" ,[i+1], "<a href='Open_warehouse.php?id="+response[i].Warehouse_ID+"'><b>"+response[i].Location.toUpperCase()+"</b></a>" ,response[i].Racks , response[i].Filled , response[i].Allocation , response[i].Status, "<details><summary>See all vendors</summary><p>"+ response[i].Vendor+"</p></details>", response[i].DateTime ]).draw(false);
               
            }
            
      
        }
      
      });
    }
</script>



<script>
// mobiscroll.select('#multiple-select', {
//     inputElement: document.getElementById('my-input'),
//     touchUi: false
// });
</script>        
        
        
<?php include ("../include/footer.php"); ?>
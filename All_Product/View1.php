 <?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-6">
              <h3 class=" modal-title">All Products</h3>
                
               
            </div>
            <div class="col-md-6">
            <a href="Add_Orders.php" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right">Add via Barcode</a>
             <a href="Add_Orders.php" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right">Add New</a>
             
         </div>
         <div class='col-md-3 mt-3'>
    <select class='form-control form-select form-control-secondary f-left' id='location'>
      <option disabled selected value=''>Filter By Warhouse</option>";
            <?php 
            $records = mysqli_query($mysql, "SELECT * FROM `Warehouse`");                              
            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['Warehouse_ID'] ."'>" .$data['Location'] ."</option>";
               
            
            }
              ?>              
        </select>
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
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All (97.5K)<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Active & Instock (23.2K) <span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Active & OOS (200) <span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="can_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft & OOS (49k)     <span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="hold_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft & Instock (20)<span id="holdc"></span> </a></li>
                      

                  
                
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="change" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="Reason for deallocation">Deallocate</option>
                                 
                                  
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
  <table  class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;" id="crud_table">
        <thead style="text-align:center">

    <tr id="test" style="background-color:#E0E3EC;" role="row">
        <th class="res">
        <br>
         <input class="checkbox1" id="allcb" type="checkbox" >
      </th>
         <th class="res"  >SKU
        <br>
        <input id="ordernum" type="text" >
      </th>
    <th class="res"  >Product
        <br>
        <input id="ordernum" type="text" >
      </th>
      <th class="res" >Image
        <br>
      <input id="city" type="text " style="visibility: hidden;" >
      </th>
      <th class="res" >QTY
        <br>
        <input id="tracking" type="text" style="visibility: hidden;"   >
      </th>
      <th class="res" >Vendor 
        <br>
          <select class='form-control form-select form-control-secondary f-left' id='location'>
          <option disabled selected value=''></option>";
      <?php 
      $records = mysqli_query($mysql, "SELECT * FROM `Vendor`");                              
      while($data = mysqli_fetch_array($records))
      {
          echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
         
      
      }
        ?>              
  </select>
      </th>
      <th class="res" >Batch 
        <br>
          <select class='form-control form-select form-control-secondary f-left' name="Lot" id="Lot">
             <option disabled selected value=''></option>";
      <?php 
      $records = mysqli_query($mysql, "SELECT * FROM `LOT`");                              
      while($data = mysqli_fetch_array($records))
      {
          echo "<option value='". $data['id'] ."'>" .$data['Number'] ."</option>";
         
      
      }
        ?>              
  </select>
      </th>
       <th class="res" >Location
       <br>
        <input id="tracking" type="text"  >
        </th>
       
        <th class="res" >Status 
        <br>
        <select class='form-control form-select form-control-secondary f-left' id='status'>
            <option disabled selected value=''></option>";
            <option value='active'>Active</option>";
            <option value='draft'>Draft</option>";
            <option value='archieve'>Archieve</option>";
            </select>
      </th>
      <th class="res" >Date
       <br>
        <input type="text" style="visibility: hidden;" >
        </th>
       <th class="res" > 
        <br>
        <input type="text" style="visibility: hidden;" >
      </th>
      <th></th>
      </tr>    
      </thead>
      <tbody id="dynamic_content" style="text-align:center;border: none;"></tbody>
      </table>
      </div>
            <!--<div class="table-responsive" id="dynamic_content">-->
            <!--    </div>-->
                
                
        
          
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>
<script>
var from;
var to;
function JSDropDown() {
            var x = document.getElementById("limit").options.length;
            document.getElementById("limit").size = x;
            
            var y = document.getElementById("sort").options.length;
            document.getElementById("sort").size = y;
            
        }
        var g=$("#crud_table").DataTable
            ({
                searching: false,
                ordering: false,
                lengthChange: false,
                info: false,
                
            });
   
   $(document).ready(function(){
       
       
    $(document).on('click', '#allcb', function()
    {
		$('[name="check[]"]').prop('checked', this.checked);
	});
     load_data(1);
     function load_data(page, query = '', limit, status, vendor, lot)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{page:page, query:query, limit:limit, status:status, vendor:vendor, lot:lot},
         success:function(data)
         {
            var response=JSON.parse(data); 
            // console.log(response);
            var fill=''; 
            $('#crud_table').DataTable({
                
            }).destroy();
            for(var i=0; i<response.length-1; i++)
            {
              // t.row.add([response[i].check , response[i].sku , response[i].title , response[i].img , response[i].quantity, response[i].vendi, response[i].lot], response[i].rack, response[i].sttatus,response[i].datetime, response[i].select).draw(false);
                // fill +="<tr><td>"+response[i].Name+"</td><td>"+response[i].Type+"</td><td>"+response[i].Address+"</td><td>"+response[i].Contact+"</td><td>"+response[i].Percentage+"</td></tr>";
                // fill +="<tr><td>${response[i].Name}</td><td>${response[i].Type}</td><td>${response[i].Address}</td><td>${response[i].Contact}</td><td>${response[i].Percentage}</td></tr>";
                
                // var $tr = $('<tr></tr>')
                // // $tr.append("<td class='details-control'></td>");
                // $tr.append("<td >" +response[i].check+ "</td>");
                // $tr.append("<td >" +response[i].skuu+ "</td>");
                // $tr.append("<td >" +response[i].title+ "</td>");
                // $tr.append("<td >" +response[i].img+ "</td>");
                // $tr.append("<td >" +response[i].quantity+ "</td>");
                // $tr.append("<td >" +response[i].vendi+ "</td>");
                // $tr.append("<td >" +response[i].lot+ "</td>");
                // $tr.append("<td >" +response[i].rack+ "</td>");
                // $tr.append("<td >" +response[i].sttatus+ "</td>");
                // $tr.append("<td >" +response[i].datetime+ "</td>");
                // $tr.append("<td >" +response[i].select+ "</td>");
                fill += `<tr><td>${response[i].check}</td><td>${response[i].skuu}</td></tr>`;
            //     fill +="<td >" +response[i].skuu+ "</td>";
            //     fill +="<td >" +response[i].title+ "</td>";
            //     fill +="<td >" +response[i].img+ "</td>";
            //     fill +="<td >" +response[i].quantity+ "</td>";
            //     fill +="<td >" +response[i].vendi+ "</td>";
            //     fill +="<td >" +response[i].lot+ "</td>";
            //     fill +="<td >" +response[i].rack+ "</td>";
            //     fill +="<td >" +response[i].sttatus+ "</td>";
            //     fill +="<td >" +response[i].datetime+ "</td>";
            //     fill +="<td >" +response[i].select+ "</td>";
            //     fill+='</tr>`;                
                
                //$("#crud_table").find('tbody').append($tr);         
                //table.innerHTML+=fill;
            }
            g.DataTable({
                // searching: false,
                // ordering: false,
                // lengthChange: false,
                // info: false,
                
            }).draw();
            
            //$('#crud_table').columns.adjust().draw()
           document.getElementById("dynamic_content").innerHTML =fill;
         }
       });
     }
     
     
      $(document).on('click', '#close', function()
     {
         // var editorText = CKEDITOR.instances.editor1.setData('');
         // $('#txt1').val('');
         // $('#txt2').val('');
         // $('#trackingDiv').html(editorText);
         // $('#txt3').val('');
         // $('#txt4').val('');
         // $('#txt5').val('');
     });
     
     $(document).on('click', '.page-link', function()
     {
       var vendor = document.getElementById("location").value;
       var lot = document.getElementById("Lot").value;
       var limit = document.getElementById("limit").value;
       var status = document.getElementById("status").value;
    var page = $(this).data('page_number');
       var query = $('#search_box').val();
       load_data(page, query, limit,status,vendor,lot);
       
     });
   
   //for limit
   $(document).on('click', '#limit', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
       var query = $('#search_box').val();
       var status = document.getElementById("status").value;
       load_data(page, query, limit, status, vendor, lot);
     });
     
     
     //vendor
     $(document).on('click', '#location', function()
   {
    var vendor = document.getElementById("location").value; 
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor);
     });
     
     //lot
     $(document).on('click', '#Lot', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor,lot);
     });
     
     $(document).on('click', '#allcb', function()
     {
   $('[name="cb[]"]').prop('checked', this.checked);
   });
   
     $('#search51').keyup(function()
     {
       var query = $('#search51').val();
       load_data(1, query,1);
     });
     
     //active:draft
     $(document).on('click', '#status', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor,lot);
     });
     
      $(document).on('click', '#refresh', function(){
        
         toastr.info('Refreshed');
         load_data(1);
     });
     
     
     $(document).on('click', '#excel', function()
     {
         var excel_data = $('#tbody').html();
         $("table").tableToCSV();
          
     }); 
   
   });
</script>
<script>
var details = [...document.querySelectorAll('details')];
document.addEventListener('click', function(e) {
  if (!details.some(f => f.contains(e.target))) {
    details.forEach(f => f.removeAttribute('open'));
  } else {
    details.forEach(f => !f.contains(e.target) ? f.removeAttribute('open') : '');
  }
})


</script>

        
        
        
<?php include ("../include/footer.php"); ?>
<?php  
session_Start();
include_once("../include/mysql_connection.php");
$cr=$_SESSION['id'];
// echo "<script>alert($cr);</script>";
?>

<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<style>
   
</style>
<!--<div class="page-body-wrapper horizontal-menu">-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-6">
              <h3 class=" modal-title">QC Rejected Articles</h3>
                
               
            </div>
            <div class="col-md-6"> 
           
             
         </div>
         <div class='col-md-3 mt-3'>
   
        </div>
         
        </div>
      
      </div>
   </div>
  
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                  
                <div class="">
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-md-8 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Not Uploaded<span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Repaired<span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="d_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft<span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="qc_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">QC Reject <span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="wash_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Washing<span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="rep_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Replica<span id="cancelc"></span> </a></li>


                  
                
                    </ul>
                </div>
                <div class="col-md-4 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="bulkstatus" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="dstatus">Repaired</option>
                                  <option value="dfetch">Update Status</option>
                                 
                                  
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
    <table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;">
        <thead>
            <tr id="test" style="background-color:#E0E3EC;" role="row">
                <!--<th class="res"></th>-->
                <th class="res">
                    <br>
                    <input class="checkbox1" id="allcb" type="checkbox" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >SKU
                    <br>
                    <input id="sku" type="text" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Product
                    <br>
                    <input id="title" type="text" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Image
                    <br>
                    <input id="city" type="text " style="visibility: hidden;" >
                </th>
                <th class="res" id="quantity" tabindex="0" aria-controls="example" rowspan="1" colspan="1">QTY&nbsp;
                    <br>
                    <input id="tracking" type="text" style="visibility: hidden;"   >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Vendor 
                    <br>
                    <select class='form-control form-select form-control-secondary f-left' id='ven'>
                        <option disabled selected value=''></option>
                         <?php 
                        $records = mysqli_query($mysql, "SELECT * FROM `Vendor`");                              
                        while($data = mysqli_fetch_array($records))
                        {
                            echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                           
                        
                        }
                          ?>              
                    </select>
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Batch 
                    <br>
                    <select class='form-control form-select form-control-secondary f-left' name="lot" id="lot">
                        <option disabled selected value=''></option>
                     <?php 
                        $records = mysqli_query($mysql, "SELECT * FROM `SKU` GROUP BY Batch_ID");                              
                        while($data = mysqli_fetch_array($records))
                        {
                            echo "<option value='". $data['Batch_ID'] ."'>" .$data['Batch_ID'] ."</option>";
                           
                        
                        }
                          ?>              
                    </select>
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Rejected by
                    <br>
                    <input id="number" type="text"  >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status 
                    <br>
                     <input type="text" style="visibility: hidden;" >
                    <!--<select class='form-control form-select form-control-secondary f-left' id='status'>-->
                    <!--    <option disabled selected value=''></option>-->
                    <!--    <option value='active'>Active</option>-->
                    <!--    <option value='draft'>Draft</option>-->
                    <!--    <option value='archive'>Archive</option>-->
                    <!--</select>-->
                </th>
                <th class="res" id="date" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date&nbsp;
                    <br>
                    <input type="text" style="visibility: hidden;" >
                </th>
                <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"> 
                   

            	<br>
              <input type="text" style="visibility: hidden;" >
            </th>
            <th></th>
            </tr>    
            </thead>
            </table>
            </div>
                </div>
                
            
        
          
            
      </div>
   </div>

                  <!--Status modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="status_modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Adjust Status</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="statval" required>
                                               <option value="" disabled selected >Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="draft">Draft</option>
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="upstat" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Status modal-->
                            <div id="dynamic_content"></div>

   
</div>
<script>

function JSDropDown() 
{
    var x = document.getElementById("limit").options.length;
    document.getElementById("limit").size = x;
    
    var y = document.getElementById("sort").options.length;
    document.getElementById("sort").size = y;
            
}

$(document).ready(function()
{
    var cond="all";
    load_data(1,'10','','','',cond);
   function load_data(page, limit, sort, vendor, lot, cond)
    {
           $.ajax({
             url:"fetch.php",
             method:"POST",
             data:{page:page, limit:limit, sort:sort, vendor:vendor, lot:lot, cond:cond},
             success:function(data)
             {
               $('#dynamic_content').html(data);
             }
           });
    }
         
       
         
    $(document).on('click', '#ref', function()
    {
                                
        toastr.info('Refreshed');
        var items = $('#items').val("");
        var drop=$("#bulkstatus").val("");
        var limit=document.getElementById("limit").value='10';
        var sort=document.getElementById("sort").value='DESC';
        $('input[id=allcb]').trigger('click'); 
        var cond="all";
        load_data(1,'10','','','',cond);
    });
    
    $(document).on('click', '.page-link', function()
    {
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
                  
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //not uploaded
        $(document).on('click', '#pen_ord', function()
        {
            cond='notupload';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //repaired
        $(document).on('click', '#conf_ord', function()
        {
            cond='repair';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //draft
        $(document).on('click', '#d_ord', function()
        {
            cond='draft';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //qc
        $(document).on('click', '#qc_ord', function()
        {
            cond='qc';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //washing
        $(document).on('click', '#wash_ord', function()
        {
            cond='wash';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //replica
         $(document).on('click', '#rep_ord', function()
        {
            cond='replica';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //for default page load 
        load_data(page,limit,sort,vendor,lot,cond);
             
    });
    
            
    //limit 
    $(document).on('click', '#limit', function()
    {
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
                  
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //not uploaded
        $(document).on('click', '#pen_ord', function()
        {
            cond='notupload';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //repaired
        $(document).on('click', '#conf_ord', function()
        {
            cond='repair';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //draft
        $(document).on('click', '#d_ord', function()
        {
            cond='draft';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //qc
        $(document).on('click', '#qc_ord', function()
        {
            cond='qc';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //washing
        $(document).on('click', '#wash_ord', function()
        {
            cond='wash';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //replica
         $(document).on('click', '#rep_ord', function()
        {
            cond='replica';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //for default page load 
        load_data(page,limit,sort,vendor,lot,cond);
    });
        
    //sort 
    $(document).on('click', '#sort', function(){
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
                  
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //not uploaded
        $(document).on('click', '#pen_ord', function()
        {
            cond='notupload';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //repaired
        $(document).on('click', '#conf_ord', function()
        {
            cond='repair';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //draft
        $(document).on('click', '#d_ord', function()
        {
            cond='draft';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //qc
        $(document).on('click', '#qc_ord', function()
        {
            cond='qc';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //washing
        $(document).on('click', '#wash_ord', function()
        {
            cond='wash';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //replica
         $(document).on('click', '#rep_ord', function()
        {
            cond='replica';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //for default page load 
        load_data(page,limit,sort,vendor,lot,cond);
    });
        
          
    $(document).on('click', '#ven', function()
    {
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
                  
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //not uploaded
        $(document).on('click', '#pen_ord', function()
        {
            cond='notupload';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //repaired
        $(document).on('click', '#conf_ord', function()
        {
            cond='repair';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //draft
        $(document).on('click', '#d_ord', function()
        {
            cond='draft';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //qc
        $(document).on('click', '#qc_ord', function()
        {
            cond='qc';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //washing
        $(document).on('click', '#wash_ord', function()
        {
            cond='wash';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //replica
         $(document).on('click', '#rep_ord', function()
        {
            cond='replica';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //for default page load 
        load_data(page,limit,sort,vendor,lot,cond);
    }); 
    
    $(document).on('click', '#lot', function()
    {
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
                  
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //not uploaded
        $(document).on('click', '#pen_ord', function()
        {
            cond='notupload';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //repaired
        $(document).on('click', '#conf_ord', function()
        {
            cond='repair';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //draft
        $(document).on('click', '#d_ord', function()
        {
            cond='draft';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //qc
        $(document).on('click', '#qc_ord', function()
        {
            cond='qc';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //washing
        $(document).on('click', '#wash_ord', function()
        {
            cond='wash';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //replica
         $(document).on('click', '#rep_ord', function()
        {
            cond='replica';
            load_data(page,limit,sort,vendor,lot,cond);
        });
        //for default page load 
        load_data(page,limit,sort,vendor,lot,cond);
    });
    
    // $(document).on('click', '#status', function()
    // {
    //     var location = document.getElementById("location").value;
    //     var vendor = document.getElementById("ven").value;
    //     var lot = document.getElementById("lot").value;
    //     var limit=document.getElementById("limit").value;
    //     var sort=document.getElementById("sort").value;
    //     var status = document.getElementById("status").value;
    //     var page = $(this).data('page_number');
                  
    //     //condition
    //     //all
    //     $(document).on('click', '#all_ord', function()
    //     {
    //         cond='all';
    //         load_data(page,limit,sort,status,vendor,lot,cond,location);
    //     });
    //     //activein
    //     $(document).on('click', '#pen_ord', function()
    //     {
    //         cond='activein';
    //         load_data(page,limit,sort,status,vendor,lot,cond,location);
    //     });
    //     //activeout
    //     $(document).on('click', '#conf_ord', function()
    //     {
    //         cond='activeout';
    //         load_data(page,limit,sort,status,vendor,lot,cond,location);
    //     });
    //     //draftin
    //     $(document).on('click', '#can_ord', function()
    //     {
    //         cond='draftout';
    //         load_data(page,limit,sort,status,vendor,lot,cond,location);
    //     });
    //     //draftout
    //     $(document).on('click', '#hold_ord', function()
    //     {
    //         cond='draftin';
    //         load_data(page,limit,sort,status,vendor,lot,cond,location);
    //     });
    //     //for default page load 
    //     load_data(page,limit,sort,status,vendor,lot,cond,location);
    // });
    
    //condition
    //all
    $(document).on('click', '#all_ord', function()
    {
        cond='all';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;

        var page = $(this).data('page_number');
        
        load_data(page,limit,sort,vendor,lot,cond);
    });
    //not uploaded
    $(document).on('click', '#pen_ord', function(){
        cond='notupload';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
        load_data(page,limit,sort,vendor,lot,cond);
    });
    
    //repaired
    $(document).on('click', '#conf_ord', function(){
        cond='repair';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
        load_data(page,limit,sort,vendor,lot,cond);
    });
    //draft
    $(document).on('click', '#d_ord', function(){
        cond='draft';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
        load_data(page,limit,sort,vendor,lot,cond);
    });
    //qc
    $(document).on('click', '#qc_ord', function(){
        cond='qc';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
         load_data(page,limit,sort,vendor,lot,cond);
    });
    //washing
    $(document).on('click', '#wash_ord', function(){
        cond='wash';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
        
        load_data(page,limit,sort,vendor,lot,cond);
        
    }); 
    //replica   
    $(document).on('click', '#rep_ord', function(){
        cond='replica';
        var vendor = document.getElementById("ven").value;
        var lot = document.getElementById("lot").value;
        var limit=document.getElementById("limit").value;
        var sort=document.getElementById("sort").value;
        var page = $(this).data('page_number');
        load_data(page,limit,sort,vendor,lot,cond);
    });

   
});
</script>
<?php include ("../include/footer.php"); ?>
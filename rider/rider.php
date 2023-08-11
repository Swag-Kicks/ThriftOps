<?php  
   session_Start();
   ?>
<?php include ("include/header.php"); ?>
<?php include_once("include/mysql_connection.php");  ?>
<?php include ("include/loader.php"); ?>
<!-- Page Body Start-->

<!-- Container-fluid starts-->
<style>
    header.main-nav {
    display: none;
}
.page-main-header.close_icon {
    display: none;
}

a#lastclear {
    padding-left: 0;
}

i.icofont.icofont-brand-whatsapp {
    font-size: 24px;
    color: #128C7E!important;
}

svg.feather.feather-phone-call {
    color: #047bbd;
}

i.icon-check {
    font-size: 24px;
    color: #d42a2a !important;
    position: relative;
    left: 10px;

}



.table-responsive {
    overflow-x: hidden;
}

a {
    color: black;
}

</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
<div class="row project-cards">
<div class="col-md-12 project-list">
</div>
<div class="col-sm-12">
   <div class="card">
      <div class="table-responsive">
         <div>
          <!--Status modal-->
   
                      <!--Barcode modal--> 
            <div>
            <div>
               <div>
                  <div style="padding: 5px;padding-top: 3em;">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-12 center">
                              <img src="../assets/images/logo-b.png">
                           </div>
                             
                        </div>
                        <br><br>
                        <div class="row">
                           <div class="col-md-12" style="margin-bottom: 40px;" >
                              </label>
                               <div class="input-group-prepend">
                                      
                                    <input class="form-control" type="text" name="ordernum" id="ordernum" aria-describedby="barcode" placeholder="Search Order Number" >
                                  </div>
                              </div>
                              <br>
                        </div>
                        <div id="dynamic_content">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                         <!--Barcode modal-->
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>

<script>

  $(document).ready(function(){
  
     load_data(1);
     function load_data(page,ordernum)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{
             page:page, 
             ordernum:ordernum
         },
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
     
     $('#ordernum').change(function(){
           var query = $('#ordernum').val();
           load_data(1, query);
     });
     

     $(document).on('click', '#ref', function(){
        
         toastr.info('Refreshed!');
         load_data(1);
     });
     
     
     
     $(document).on('click', '.page-link', function()
     {
      var page = $(this).data('page_number');
       var query = $('#ordernum').val();
      load_data(page,query);
       
       
       });
       
     $(document).on('click', '.qc_data', function(){
      var $ele = $(this).parent().parent();
      var id = $(this).attr("id"); 
      var order = $(this).attr("ord");
    
        $.ajax({  
                    url:"qc.php",  
                    method:"POST",  
                    data:{id:id,order:order},  
                    success:function(data)
                    {  
                        toastr.info('Marked Successfully!')
                        $ele.fadeOut(500,function(){
                        $(this).remove();
                        });
                       load_data(1);
                    }  

                });
        });
    
   
   });
</script>
<?php include ("../include/footer.php"); ?>
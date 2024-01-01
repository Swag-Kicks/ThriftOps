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
                        <!--update tracking-->
                                <div id="Update" class="modal fade" role="dialog">
                                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                                     <div class="modal-content">
                                       <div class="modal-header p-t-20">
                                             <div class="col-md-8 p-l-15">
                                          <h3 class="modal-title">Update Shipping Reason</h3>
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
                                           
                                         
                                          <label class="col-md-2">Message</label>
                                            <div class="col-md-4 p-l-30 p-r-40"> 
                                            <textarea class="form-control" id="message" row="20" col="203"></textarea>   
                                            </div>
                                          
                                        <br>
                                      
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                                         <a href="#" data-role="conf_save" id="upd" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" disabled>Update</a>
                                       </div>
                                     </div>
                                   
                      </div>
                   </div>
                   
                         </div>
                        <!--update tracking-->
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
       
    $(document).on('click', '.qc_data', function()
    {
        var $ele = $(this).parent().parent();
        var id = $(this).attr("id"); 
        var order = $(this).attr("ord");
        var stats = $("td select[name=stat]").val();
        
        if((stats=='Returned')||(stats=='Loss/Conflict'))
        {
            $('#Update').modal('toggle');
             $(document).on('click', '#upd', function()
            {
                 var message=document.getElementById("message").value;
                  $.ajax({  
                            url:"qc.php",  
                            method:"POST",  
                            data:{id:id,order:order,stats:stats,message:message},  
                            success:function(data)
                            {  
                                toastr.info('Marked Successfully!')
                                 $('#Update').modal('toggle');
                                $ele.fadeOut(500,function(){
                                $(this).remove();
                                });
                              load_data(1);
                            }  
        
                        }); 
            });
        }
        else
        {
            $.ajax({  
                    url:"qc.php",  
                    method:"POST",  
                    data:{id:id,order:order,stats:stats},  
                    success:function(data)
                    {  
                        toastr.info('Marked Successfully!')
                        $ele.fadeOut(500,function(){
                        $(this).remove();
                        });
                      load_data(1);
                    }  

                });
        }
    });
    
   
   });
</script>
<?php include ("../include/footer.php"); ?>
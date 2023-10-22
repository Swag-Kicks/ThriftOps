
<?php include ("../include/header.php"); ?>
<?php include ("../include/sidebar.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5 class="card-title">Rack View</h5>
                    </div>
                    <div class="card-body">
                       <div class="e-table">
                           <div class="row"> 
                             <div class="col-md-6">
                                <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
                             </div>
                             <div class="col-md-6">
                        
                       <a href="../Rack/Manual_Allocation"> <input type="button" value="Allocate Article" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>
                         <input type="button" name="pick" value="⟳ Refresh" id="refresh" class="btn btn-primary f-right ref">
                     </div>
                            </div>
                             <div class="table-responsive" id="dynamic_content">
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
        <!-- footer start-->
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
        
        
      });
      
      
    }
    
    $(document).on('click', '.pick_data', function(){
       var $ele = $(this).parent().parent();
       var id = $(this).attr("id"); 
       var order = $(this).attr("ord");
        $.ajax({  
                    url:"pick.php",  
                    method:"POST",  
                    data:{id:id,order:order},  
                    success:function(data)
                    {  
                        toastr.success('Picked Successfully!');
                        $ele.fadeOut(900,function(){
                        $(this).remove();
                        });
                        load_data(1);
                    }
                });
        });
                    
       $(document).on('click', '.not_data', function(){
       var $ele = $(this).parent().parent();
       var id = $(this).attr("id"); 
       var order = $(this).attr("ord");
    
        $.ajax({  
                    url:"not.php",  
                    method:"POST",  
                    data:{id:id,order:order},  
                    success:function(data)
                    {  
                        toastr.error('Marked Successfully!');
                        $ele.fadeOut(900,function(){
                        $(this).remove();
                        });
                        load_data(1);
                    }  
        });
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
                        toastr.warning('Marked Successfully!')
                        $ele.fadeOut(900,function(){
                        $(this).remove();
                        });
                        load_data(1);
                    }  

                });
        });
     $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });
    
    
    
    
    
    $(document).on('click', '.ref', function(){
        toastr.info('Refreshed!');
        load_data(1);
     });

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });  
   
      
});
   



   
  
  
  
 
   

</script>
<?php include ("../include/footer.php"); ?>

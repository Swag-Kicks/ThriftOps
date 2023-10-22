<?php include ("../include/header.php"); ?>

<div class="col-md-12" style="margin-top: 150px;">
    <h2 class="mb-0" style="text-align: center;">Product Type View</h2>
    </br>
<div class="card">
<div class="card-body">
<div class="row">
   <div class="card-body">
      <div class="e-table">
         <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
         </div>
         <input type="button" name="pick" value="⟳" id="refresh" class="btn btn-md btn-primary ref" />
         <div class="table-responsive" id="dynamic_content">
         </div>
      </div>
   </div>
</div>
</body>
</html>
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
   
     $(document).on('click', '.page-link', function(){
       var page = $(this).data('page_number');
       var query = $('#search_box').val();
       load_data(page, query);
     });
   
     $('#search_box').keyup(function(){
       var query = $('#search_box').val();
       load_data(1, query);
     });
     
     $(document).on('click', '.ref', function(){
       
        toastr.info('Refreshed!');
        load_data(1);
    });
   
   });
</script>
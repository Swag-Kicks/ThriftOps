

<?php include ("../include/header.php"); ?>
<?php include ("../include/sidebar.php"); ?>
        <!-- Page body start-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    
                    <div class="card-body">
                      <div class="">
      <h3 align="left">Lot Data</h3>
      <br />
      <div class="card">
        <div class="card body">
            <br>
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
          </div>
          <div class="col-md-6">
           <button  class="btn btn-md btn-primary ref " id="refresh" name="pick"><i class="fa fa-spin fa-refresh"></i></button>   
          <!--<input type="button" name="pick" value="⟳" i class=" btn btn-md btn-primary ref" />-->
          </div>
          <br>
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
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

<?php include ("../include/footer.php"); ?>
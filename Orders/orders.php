<?php include ("../include/header.php"); ?>
<?php include ("../include/sidebar.php"); ?>
<?php include ("../include/mysql_connection1.php"); ?>
<script>
    $(document).ready(function(){
		 $("#div_allorders").load("All_Orders");
    });
 
 
</script>
        
        <div class="page-body">
          
          <div class="container-fluid">
            <div class="select2-drpdwn">
              <div class="row">
                
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      
                        <div id="div_allorders"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        

<?php include ("../include/footer.php"); ?>
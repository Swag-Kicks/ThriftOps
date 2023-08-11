<?php

 
session_start();
// include_once("../include/mysql_connection.php"); 
// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=13 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }


?>


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
                    
                    <div class="card-body">
                      <div class="col-md-12" style="margin-top: 150px;">
    <h2 class="mb-0" style="text-align: center;">Onboard Section</h2>
    </br>
<div class="card">
<div class="card-body">
<div class="row">
   <div class="card-body">
      <div class="e-table">
          <div class="row">
               <div class="col-md-6">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
         </div>
         <div class="col-md-6">
         <input type="button" name="pick" value="⟳ Refresh"  id="refresh" class="btn btn-md btn-primary ref" />
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
    
    $(document).on('click', '.mark_data', function(){
       var $ele = $(this).parent().parent();
       var id = $(this).attr("id"); 
        $.ajax({  
                    url:"save.php",  
                    method:"POST",  
                    data:{id:id},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            load_data(1);
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
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
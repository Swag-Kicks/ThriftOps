<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>


<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">

    <div class="container">
      <h3 align="center">Vender View</h3>
      <br />
      <div class="card">

        <div class="card-body">
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
          </div>
          <input type="button" name="pick" value="⟳" id="refresh" class="btn btn-md btn-primary ref" />
            <table class="custom-tab" id="crud_table">
              <thead style="text-align:center">
              <tr>
                    <td><b>Vendor Name</b></td>
                    <td><b>Vendor Type</b></td>
                    <td><b>Vendor Address</b></td>
                    <td><b>Vendor Contact</b></td>
                    <td><b>Vendor Percentage</b></td>
               </tr>
              </thead>
              <tbody style="text-align:center" id="dynamic_content"></tbody>
              </table>
              <!--<div align="center">-->
              <!--    <ul class="pagination">-->
                
              <!--        <li class="page-item disabled">-->
              <!--          <a class="page-link" href="#">Previous</a>-->
              <!--        </li>-->
                      
              <!--      <li class="page-item active">-->
              <!--        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>-->
              <!--      </li>-->
                    
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="2">2</a></li>-->
                      
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="3">3</a></li>-->
                      
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="4">4</a></li>-->
                      
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="5">5</a></li>-->
                      
              <!--        <li class="page-item disabled">-->
              <!--            <a href="#">...</a>-->
              <!--        </li>-->
                      
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="163">163</a></li>-->
              <!--        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="2">Next</a></li>-->
              <!--    </ul>-->

              <!--  </div>-->
          <!--<div class="table-responsive" id="dynamic_content">-->
            
          </div>
        </div>
      </div>
    </div>
</div>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>-->
<script>
  $(document).ready(function(){
    
    load_data(1);
    var t=$("#crud_table").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
        info: false,
    });
  
    function load_data(page)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data); 
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([response[i].Name , response[i].Type , response[i].Address , response[i].Contact , response[i].Percentage ]).draw(false);
                // fill +="<tr><td>"+response[i].Name+"</td><td>"+response[i].Type+"</td><td>"+response[i].Address+"</td><td>"+response[i].Contact+"</td><td>"+response[i].Percentage+"</td></tr>";
                // fill +="<tr><td>${response[i].Name}</td><td>${response[i].Type}</td><td>${response[i].Address}</td><td>${response[i].Contact}</td><td>${response[i].Percentage}</td></tr>";
                     
                //table.innerHTML+=fill;
            }
            
        //   t.row.add$('#dynamic_content').append(fill);   
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
    $('#crud_table').on( 'page.dt', function () {
        var info = t.page.info();
        console.log(info);
        // $('#pageInfo').html( 'Showing page: '+info.page+' of '+info.pages );
    } );

  });
</script>
<?php include ("../include/footer.php"); ?>
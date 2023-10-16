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
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                   <iframe width="1600" height="1200" src="https://lookerstudio.google.com/embed/reporting/475e05c9-dccf-4cbb-82f7-a8865a5ad61f/page/9I9YD" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
            </div>
      </div>
   </div>
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
  $(document).ready(function(){
      
      
    var cond="Pick";
    load_data(1,'10');
    
    var count=0;
    function load_data(page, limit,sort,from,to)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page,  limit:limit, sort:sort, from:from, to:to},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }
   
  

    $(document).on('click', '.page-link', function()
    {

      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      
      //for default page load 
      load_data(page,limit,sort,from,to);
 
    });
        
    //limit 
    $(document).on('click', '#limit', function(){
    
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      
      //for default page load 
      load_data(page,limit,sort,from,to);
    });
    
    //sort 
    $(document).on('click', '#sort', function(){
    
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      
      //for default page load 
      load_data(page,limit,sort,from,to);
    });
    
    //date
    $("#fromdate").change(function()
    {
      var page = $(this).data('page_number');
      //others
      from=document.getElementById("fromdate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
        $("#todate").change(function()
        {
            to=document.getElementById("todate").value;
            //for default page load 
            load_data(page,limit,sort,from,to);
        });
    });
    
    
    $(document).on('click', '#ref', function()
    {
        
        toastr.info('Refreshed');
        from=document.getElementById("fromdate").value='';
        to=document.getElementById("todate").value='';
        var limit=document.getElementById("limit").value='10';
        var sort=document.getElementById("sort").value='DESC';
        load_data(1,'10');
     });

  });
  
 //export excel
function fnExcelReport()
{
    
    var tab_text="<table border='2px'>";
    var textRange; var j=0;
    tab = document.getElementById('allproduct'); // id of table
    
    
    

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   
        console.log();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    tab_text= tab_text.replace(/<select[^>]*>|<\/select>/gi, ""); // reomves select params
    tab_text= tab_text.replace(/Confirm Hold Cancel/gi, ""); // reomves select params
    
    
    // tab_text= tab_text.replace(/Confirm/gi,"");
    // tab_text= tab_text.replace(/Hold/gi,"");
    // tab_text= tab_text.replace(/Cancel/gi,"");
     

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true);
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

  
</script>
<script>
            
            (function(){
 
  
  $("clickT").on("click", function() {
    $(".onhover-show-div1").fadeToggle( "fast");
  });
  
})();
        </script>
        
        
        
        
<?php include ("../include/footer.php"); ?>
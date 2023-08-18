
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
                      
                    </div>
                    <div class="card-body">
                        <div class="row">
                  <div class="col-md-4 p-15">
                       <h5 class="card-title">Rack View</h5>
                      
                  </div>
                  <div class="col-md-8">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" style="float:right;">Add Rack</button>
                       <a href="Rack_Insert.php"> <input type="button" value="Create Rack" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>
                        <a href="Manual_Allocation.php"> <input type="button" value="Allocate Article" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>
                     
                     </div>
                     
                            
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Rack</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="card-body cardshadow">
                                          <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Warehouse*</label>
                                                          <input class="form-control  " type="number" name="quantity" placeholder="Enter Quantity">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Rack Number*</label>
                                                          <input class="form-control " type="text" name="made"   aria-describedby="emailHelp" placeholder="Enter Made in">
                                                   </div>
                                               </div>
                                               
                                                  <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Columns*</label>
                                                          <input class="form-control "  name="quantity"  minlength="1" maxlength="2"  onkeyup="creategrid();"  onkeypress="return isNumberKey(event);"   id="column"  creategrid()  placeholder="Enter Column">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Rows*</label>
                                                          <input class="form-control " type="text"  id="row"  minlength="1" maxlength="2" onkeyup="creategrid();"  onkeypress="return isNumberKey(event);"   aria-describedby="emailHelp" placeholder="Enter Row">
                                                   </div>
                                               </div>
                                               
                                                  <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Layers</label>
                                                          <input class="form-control " type="number" name="Layers" id="layers"   placeholder="Enter Layers">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Category*</label>
                                                          <input class="form-control " type="text" name="made"   aria-describedby="emailHelp" placeholder="Enter Made in">
                                                   </div>
                                               </div>
                                    </div>
                                
                                     <div class="card-body cardshadow">
                                           <div id="container" class="container Conrack"></div> 
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
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        
<style>
    table {
  border: 1px solid black;
  table-layout: fixed;
  width: 100px;

}

th,
td {
  border: 3px solid black;
  width: 50px;
  overflow: hidden;
}
hr{
    background-color:grey;
    width:100%;
}

</style>

        
        <style>
               .cardshadow{
                    box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.2), 0px 0px 1px rgba(9, 30, 66, 0.31);
                }
                
                .inputblack{
                 border:1px solid grey;   
                    
                }
        </style>
        <script>
        
      
        function creategrid(){
             var layers = document.getElementById('layers').value;
            var row = document.getElementById('row').value;
            var column = document.getElementById('column').value;
            if(row == '' || row == 'null' ){
                // alert('Enter row value');
            }
            if(column == '' || column == 'null' ){
                //alert('Enter column value');
            }
            var output = '<div >'+'<table border="1"  class="table">'
            function createTable(row, column){
                for(var i = 1; i <= row; i++){
                    output += '<tr>'
                    for(var j = 1;j <= column; j++){
                        output += '<td style="border:1px solid black;"></td>'
                    }
                    output += '</tr>'
                }
                output += '</div>'+'</table>'
                document.getElementById('container').innerHTML=output;
            }   
            createTable(row,column); 
        };
        //Enter Only Numeric Value
        function isNumberKey(my_event){
          
            var charCode = (my_event.which) ? my_event.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                {
                    alert("Enter Only Numbers");
                    return false;
                }
            return true;
            
           
        }
  

</script>


<?php include ("../include/footer.php"); ?>
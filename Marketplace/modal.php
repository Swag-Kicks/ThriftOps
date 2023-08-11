<html lang="en">
  <head>
    <title>Modal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  </head>
 <!-- <style>-->
 <!--      body {-->
 <!--       color: #566787;-->
	<!--	background: #f5f5f5;-->
	<!--	font-family: 'Varela Round', sans-serif;-->
	<!--	font-size: 13px;-->
	<!--}-->
	<!--.delete {-->
 <!--       color: #F44336;-->
 <!--   }-->
	<!--.edit {-->
 <!--       color: #FFC107;-->
 <!--   }-->
	/* Modal styles */
	<!--.modal .modal-dialog {-->
	<!--	max-width: 900px;-->
	<!--}-->
	<!--.modal .modal-header, .modal .modal-body, .modal .modal-footer {-->
	<!--	padding: 20px 30px;-->
	<!--}-->
	<!--.modal .modal-content {-->
	<!--	border-radius: 3px;-->
	<!--}-->
	<!--.modal .modal-footer {-->
	<!--	background: #ecf0f1;-->
	<!--	border-radius: 0 0 3px 3px;-->
	<!--}-->
 <!--   .modal .modal-title {-->
 <!--       display: inline-block;-->
 <!--   }-->
	<!--.modal .form-control {-->
	<!--	border-radius: 2px;-->
	<!--	box-shadow: none;-->
	<!--	border-color: #dddddd;-->
	<!--}-->
	<!--.modal textarea.form-control {-->
	<!--	resize: vertical;-->
	<!--}-->
	<!--.modal .btn {-->
	<!--	border-radius: 2px;-->
	<!--	min-width: 100px;-->
	<!--}	-->
	<!--.modal form label {-->
	<!--	font-weight: normal;-->
	<!--}	-->


 <!-- </style>-->
  
  <body>
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            
            <div class="col-sm-6">
            <br><br>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            </div>
          </div>
        </div>
       
       
      </div>
    </div>
   
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Edit Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Textbox1</label>
                <input type="text" class="form-control" id="txt1" required>
              </div>
              <div class="form-group">
                <label>Textbox2</label>
                <input type="text" class="form-control" id="txt2" required>
              </div>
              <div class="form-group">
                <label>Textbox3</label>
                <input type="text" class="form-control" id="txt3" required>
              </div>
              <div class="form-group">
                <label>Textbox3</label>
                <select class="form-control  " name="dropdownmanu" id="dd1"  require>
                  <option value="" disabled>Select dropdownmanu</option>
                                                        <option value="dv1">dropdownmanu1 </option>
                                                        <option value="dv2">dropdownmanu2</option>
                                                        <option value="dv3">dropdownmanu3</option>
                                                        
                                                        
                                                         </select>
              </div>
              <div class="form-group">
                <label>Textbox3</label>
                <select class="form-control  " name="dropdownmanu" id="dd2"  require>
                  <option value="" disabled>Select dropdownmanu</option>
                                                        <option value="dv1">dropdownmanu1 </option>
                                                        <option value="dv2">dropdownmanu2</option>
                                                        <option value="dv3">dropdownmanu3</option>
                                                        
                                                        
                                                         </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="" placeholder="Preview" id="editor1" name="edi"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-info" value="Save">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Delete Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this Product?</p>
              <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete">
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
      if(this.checked){
        checkbox.each(function(){
          this.checked = true;                        
        });
      } else{
        checkbox.each(function(){
          this.checked = false;                        
        });
      } 
    });
    checkbox.click(function(){
      if(!this.checked){
        $("#selectAll").prop("checked", false);
      }
    });
  });
  
    </script>
    <script type="text/javascript">
      CKEDITOR.replace( 'editor1' );
  
          var editorText = CKEDITOR.instances.editor1.getData();
          $('#trackingDiv').html(editorText);
      
  </script> 
  </body>
</html>

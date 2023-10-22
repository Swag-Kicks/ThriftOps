<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>

    <title>Document</title>
</head>
<body>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css');
.sortable {
  padding: 0;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.sortable li {
			float: left;
			width: 120px;
			height: 120px;
    overflow:hidden;
    border:1px solid red;
			text-align: center;
      margin:5px;
		}
	li.sortable-placeholder {
			border: 1px dashed #CCC;
			background: none;
		}
    </style>
    

 <form action="/upload" class="dropzone" drop-zone="" id="file-dropzone"></form>
    <ul class="visualizacao sortable dropzone-previews" style="border:1px solid #000">
      
    </ul>
<div class="preview" style="display:none;">
  <li>
    <div>
    <div class="dz-preview dz-file-preview">
      <img data-dz-thumbnail />
    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
    <div class="dz-success-mark"><span>✔</span></div>
    <div class="dz-error-mark"><span>✘</span></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
  </div>
    </div>
  </li>  
</div>

    
</body>
</html>

<script>
  $(document).ready(function(){
 $('.sortable').sortable();
   
});

//DropzoneJS snippet - js
 function new(){
  // instantiate the uploader
  $('#file-dropzone').dropzone({ 
    url: "/upload",
    maxFilesize: 100,
    paramName: "uploadfile",
    maxThumbnailFilesize: 99999,
    previewsContainer: '.visualizacao', 
    previewTemplate : $('.preview').html(),
    init: function() {
      this.on('completemultiple', function(file, json) {
       $('.sortable').sortable('enable');
      });
      this.on('success', function(file, json) {
        alert('aa');
      });
      
      this.on('addedfile', function(file) {
       
      });
      
      this.on('drop', function(file) {
        console.log('File',file)
      }); 
    }
  });
};
$(document).ready(function() {});
</script>
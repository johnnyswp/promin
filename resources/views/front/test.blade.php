<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pamela</title>
	<link rel="stylesheet" href="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<style type="text/css" media="screen">
		body{
			background-repeat: no-repeat;
		    background-color: #bdace2;
		    background-size: 50%;
		    background-position: top center;
		}
	</style>
	<script src="http://dev.promin.mx/asset_admin/vendors/jquery/dist/jquery.min.js" type="text/javascript" ></script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
</head>
<body>
<input id="fileUpload" type="file" multiple />
<div id="image-holder"></div>
<script>
$(document).ready(function() {
	$("#fileUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     var image_holder = $("#image-holder");
     
     image_holder.empty();
     
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
     
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);

                var fd = new FormData();    
				
				fd.append( 'file', $(this)[0].files[i]);

				$.ajax({
				  url: 'http://dev.promin.mx/test',
				  data: fd,
				  processData: false,
				  contentType: false,
				  type: 'POST',
				  success: function(data){
				    console.log('Imagen Ok');
				  }
				});
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
});
	
</script>
</body>
</html>
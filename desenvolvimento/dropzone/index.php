<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  
  

 <!--Dropzone-->
 <script src="dropzone.js"></script>
 <link rel="stylesheet" href="dropzone.css">



  <script src="compress.js"></script>

</head>


<body>






<form action="/file-upload" class="dropzone">
  <div class="fallback">
    <input id="file" name="file" type="file" accept="image/*">
  </div>
</form>


<script>
    document.getElementById("file").addEventListener("change", function (event) {
	compress(event);
});
</script>
  


</body>




</html>





 

  




		

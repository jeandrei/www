<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
   
  <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
  <link rel="stylesheet" href="css/style.css">

   <!--Javascript funções-->
  <script src="js/main.js"></script>

  <script type="text/javascript">
function compressImage(file, MAX_WIDTH, MAX_HEIGHT, format, response) {
    var img = document.createElement("img");

    var reader = new FileReader();    
    reader.onload = function(e) {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");

        var width  = img.width;
        var height = img.height;

        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
        }

        canvas.width = width;
        canvas.height = height;

        ctx.drawImage(img, 0, 0, width, height);

        response(
            canvas.toDataURL("image/" + format).replace(/^data[:]image\/(.*);base64,/, "")
        );
    };
    reader.readAsDataURL(file);
}

function uploadAjax(data, fileName, success, error)
{
    var oReq = new XMLHttpRequest();

    oReq.open("POST", "upload.php?filename=" + fileName, true);
    oReq.onreadystatechange = function() {
        if (oReq.readyState === 4) {
            if (oReq.status === 200) {
                success(oReq.responseText);
            } else {
                error(oReq.status);
            }
        }
    };
    oReq.send(data);
}

function enviar() {
    var filesToUpload = document.getElementById('input').files;

    //Gerar imagem com tamanho normal
    compressImage(filesToUpload[0], 800, 600, "jpeg", function(resource) {
        uploadAjax(resource, filesToUpload[0].name, function(response) {
            if (response === "OK") {
                alert("sucesso");
            } else {
                alert("Ajax: " + response);
            }
        }, function(errStatus) {
            alert("erro: " + errStatus);
        });
    });

    //Gerar imagem com thumb
    compressImage(filesToUpload[0], 150, 150, "jpeg", function(resource) {
        uploadAjax(resource, filesToUpload[0].name.replace(/\.([a-zA-Z0-9]+)$/, "_thumb.$1"), function(response) {
            if (response === "OK") {
                alert("sucesso");
            } else {
                alert("Ajax: " + response);
            }
        }, function(errStatus) {
            alert("erro: " + errStatus);
        });
    });
}
</script>

</head>


<body>
  
<p>
    <input type="file" value="" id="input">
    <input type="button" value="Enviar" id="send">
</p>

<script type="text/javascript">
document.getElementById('send').onclick = enviar;
</script>

</body>



<!--jquery-->
<script src="js/jquery-3.3.1.min.js"></script> 

<!--jquery mask-->
<script src="js/jquery.mask.js" data-autoinit="true"></script>


<!--Botstrap main-->
<script src="js/bootstrap.min.js"></script>
</html>





 

  




		

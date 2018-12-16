<?php ini_set('default_charset', 'utf-8'); ?>
<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="br">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <!--Botstrap main-->
    <script src="<?php echo URLROOT; ?>/public/js/bootstrap.min.js"></script>
    <!--Javascript funções-->
    <script src="<?php echo URLROOT; ?>/public/js/main.js"></script>
     <!--jquery-->
    <script src="<?php echo URLROOT; ?>/public/js/jquery-3.3.1.min.js"></script> 
    <!--jquery mask-->
    <script src="<?php echo URLROOT; ?>/public/js/jquery.mask.js" data-autoinit="true"></script> 
    <title><?php echo SITENAME; ?></title>
</head>
<body>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<!-- a linha abaixo inicia um container do bootstrap ela vai fechr no arquivo footer.php-->
<div class="container">   

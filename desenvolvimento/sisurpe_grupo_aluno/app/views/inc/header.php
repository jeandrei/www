<?php ini_set('default_charset', 'utf-8');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SITENAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--Font Awesome CDN-->
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css"> 

  <!--jquery-->
  <script src="<?php echo URLROOT; ?>/js/jquery-3.1.1.js"></script> 

  <!--jquery validation-->
  <script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script> 

  <!--jquery mask-->
  <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script> 

  <!--Botstrap main-->
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    
  <!--Javascript funções-->
  <script src="<?php echo URLROOT; ?>/js/main.js"></script>  
  
</head>
<body>
<?php //require APPROOT . '/views/inc/navbar.php'; ?>
<!-- a linha abaixo inicia um container do bootstrap ela vai fechr no arquivo footer.php-->
<?php include APPROOT . '/views/inc/navbar.php'; ?>
  <div class="container">   
 

<!DOCTYPE html>
<html>
<head>
	<title>Sharebord</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>   
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>shares">Shares <span class="sr-only">(current)</span></a>
          </li> 
        </ul>

        <ul class="navbar-nav mr-sm-2">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Register <span class="sr-only">(current)</span></a>
          </li> 
        </ul>
        <!--
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>-->
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead"><?php require($view) ;?></p>
      </div>

    </main><!-- /.container -->

</body>
</html>
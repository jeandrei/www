<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Script Error</title>
  </head>
  <body>
    <div id="menu">
     	<a href="index.php">Home</a>
     	<a href="index.php?p=aboutus">About us</a>
     	<a href="index.php?p=contactus">Contact us</a>
     	<a href="index.php?p=news">News</a>
    </div>

    <div id="content">
    	<?php
    	$pages_dir = 'pages';//diretório onde se encontram as páginas 
    	if (!empty($_GET['p']))
    	{
    		$pages = scandir($pages_dir, 0);// pega a partir do primeiro valor do scan        
    		unset($pages[0], $pages[1]);
        //se der um print_r($pages): o resultado será Array([0]=>.[1]=>..[2]=>aboutus.inc.php[3]=>contactus.inc.php...)
        //então removemos array 0 e 1 com o comando acima unset($pages[0], $pages[1]); e como resultado temos
        //Array([2]=>aboutus.inc.php[3]=>contactus.inc.php...)

    		$p = $_GET['p'];

    		if (in_array($p.'.inc.php', $pages))
    		{
    			include($pages_dir.'/'.$p.'.inc.php');
    		}
    		else
    		{
    			echo "Sorry, page not found.";
    		}
    	}
    	else
    	{
    		include($pages_dir.'/home.inc.php');
    	}

    	?>    	
    </div>
  </body>
</html>

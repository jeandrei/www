<?php
include_once ('head.php');
include_once ('cabecalho.php');
//include_once ('menu.php');



    	$pages_dir = 'paginas';//diretório onde se encontram as páginas 
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
    		//include_once ('slides.php');
            include($pages_dir.'/home.inc.php');
    	}

    	

include_once ('inferior.php');
include_once ('bottom.php');
?>
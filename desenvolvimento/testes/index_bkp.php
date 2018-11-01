<?php

ob_start(); 
include("init.php"); 

$users = User::find_all_users();
	foreach ($users as $user) {
    echo $user->username . "<br>";
}
//var_dump($users);

//***************************************************************************************
echo "<hr>";

$sql = ("SELECT * FROM users");
$result = $database->query($sql);
//var_dump($result);
foreach ($result as $key => $res)
	{
		echo "<br>";
		echo "key " . $key . " " . $res['username'];		
	}


$usuario = new User();


//*************************************************************************************
echo "<hr>Método find_this_query(SELECT * FROM users) <br>";
$result = $usuario->find_this_query("SELECT * FROM users");
foreach ($result as $usuario){
	echo $usuario->username ." ". $usuario->id . "<br>";	
}
//var_dump($result);
//*************************************************************************************
echo "<hr>Método find_all_users<br>";
$result = $usuario->find_all_users();
foreach ($result as $usuario){
	echo $usuario->username ." ". $usuario->id . "<br>";	
}
//*************************************************************************************
echo "<hr>Método instantiation($the_record)<br>";
$result = $usuario->instantiation($usuario);

echo("<br><hr>");
var_dump($usuario);
?>

<?php

//magic methods que nos permite acessar propriedades através dos métodos mesmo eles sendo declarados como private
class Post{
	private $name;

	public function __set($name, $value){
		echo 'Setting '. $name. ' to <strong>'.$value.'</strong><br />';
		$this->name = $value;
	}

	public function __get($name){
		echo 'Getting '. $name. ' <strong>'.$this->name.'</strong><br />';	
	}

	public function __isset($name){
		echo 'is '.$name. ' set?<br />';
		return isset($this->name);
	}
}

$post = new Post;
$post->name = 'testing';//setando o valor da variável vai executar __set
//echo $post->name;//exibindo o valor da variável vai executar __get
var_dump(isset($post->name));

?>

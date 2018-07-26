<?php
abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request =$request;
	}//construct

	public function executeAction(){
		return $this->{$this->action}();
	}//executeAction

	protected function returnView($viewmodel, $fullview){
		$view = 'views/'.strtolower(get_class($this)). '/' . $this->action. '.php';
		//vai montar o seguinte em view **views/Home/index.php** Home é o nome da classe que sempre
		//colocamos em letra maiúscula mas a pasta é com nome em letra minúscula logo 
		//transformo tudo em letra minúscula com o strtolower para ficar **views/home/index.php**
		if($fullview){
			require('views/main.php');
		}else {
			require($view);
		}//if($fullview)
	}//returnView
}//class Controller

?>
<?php
class People{
	public $person1 = 'Mike';
	public $person2 = 'Shelly';
	public $person3 = 'Jeff';

	protected $person4 = 'John';
	private $person5 = 'Jen';
	
	function interateObject(){
		foreach ($this as $key => $value) {
			print "$key => $value\n";
		}
	}
}

$people = new People;
echo "Chamado pela função dentro da classe tem acesso as propriedades protected e private<br>";
$people->interateObject();
echo "<br>Chamado fora da classe não tem acesso as propriedades protected e private<br>";
foreach ($people as $key => $value) {
	print "$key => $value\n";
}

?>
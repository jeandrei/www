<?php
/*
Polimorfismo é uma forma de nomear métodos com mesmo nome
mesmo realizando operações diferentes.
Com o objetivo de facilitar a compreensão e facilitar a escrita de códigos.
De acordo com o principio do polimorfismo, métodos em classes diferentes
que executam ações similares, devem ter o mesmo nome.
No exemplo abaixo, para calcular áreas de objetos sempre iremos usar
ó método calcArea(), porém cada objeto é calculado com uma formula diferente
ex:circulo, retangulo, quadrado.
Logo a mesma função não daria certo
*/

//1º Criamos uma interface

interface Shape{
	public function calcArea(); // tem que ser public
}

// 2º Criamos a classe e extendemos a interface Shape
class Circle implements Shape
{
	private $radius;
	
	function __construct($radius)
	{
		$this->radius = $radius;
	}

	//calcula a área do circulo
	public function calcArea()
	{
		return $this->radius * $this->radius * pi();
	}
}

// 2º Criamos outra classe e extendemos a interface Shape
class Rectangle implements Shape
{
	private $width;
	private $height;
	
	function __construct($width, $height)
	{
		$this->width = $width;
		$this->height = $height;
	}

	//calcula a área do circulo
	public function calcArea()
	{
		return $this->width * $this->height;
	}
}

?>
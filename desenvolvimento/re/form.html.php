<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Editing Author" />
	<title>Regular Expressions</title>
</head>
<body>
	<h1>Regular Expressions</h1>
	<form action="?check" method="post">
		
		<div>
			<label for="regexp1">
			<input type="radio" name="regexp" id="regexp1" value="/PHP/"
			<?php echo ($regexp == "/PHP/") ? "checked" : null; ?>/>/PHP/ procura por PHP case-sencitive
			</label>		
		</div>

		<div>
			<label for="regexp2">
			<input type="radio" name="regexp" id="regexp2" value="/PHP/i"
			<?php echo ($regexp == "/PHP/i") ? "checked" : null; ?>/>/PHP/i procura por PHP case-insencitive
			</label>		
		</div>

		<div>
			<label for="regexp3">
			<input type="radio" name="regexp" id="regexp3" value="/^era/"
			<?php echo ($regexp == "/^era/") ? "checked" : null; ?>/>
			/^era/ O caractere ^ indica que a expressão deve iniciar com a string dada ex: tem que ter era no inicio 
			</label>		
		</div>

		<div>
			<label for="regexp4">
			<input type="radio" name="regexp" id="regexp4" value="/fim$/"
			<?php echo ($regexp == "/fim$/") ? "checked" : null; ?>/>
			/fim$/ O caractere $ indica que a expressão deve terminar com a string ex: amor sem fim
			</label>		
		</div>

		<div>
			<label for="regexp5">
			<input type="radio" name="regexp" id="regexp5" value="/abc*/"
			<?php echo ($regexp == "/abc*/") ? "checked" : null; ?>/>
			/abc*/ Deve iniciar com ab. O c antes do asterisco quer dizer que pode ter 0 ou mais c então é indiferente ter ou não ter
			</label>		
		</div>

		<div>
			<label for="regexp6">
			<input type="radio" name="regexp" id="regexp6" value="/abc+/"
			<?php echo ($regexp == "/abc+/") ? "checked" : null; ?>/>
			 /abc+/ cadeia com "ab" seguido de um ou vários "c" ("abc", "abcc" ...)
			</label>		
		</div>

		<div>
			<label for="regexp7">
			<input type="radio" name="regexp" id="regexp7" value="/^PH.*/"
			<?php echo ($regexp == "/^PH.*/") ? "checked" : null; ?>/>
			/^PH.*/ (^PH deve iniciar com PH) (. pode ter qualquer string depois do PH) (* pode ter zero ou mais caracteres antes do *)
			</label>		
		</div>

		<br>

		<div>
			<label for="digrex">
			Digite sua Expressão Regular
			<input type="text" name="digrex" id="digrex" value="<?php echo $digrex; ?>"/>
			</label>		
		</div>
		

		<div>
			<input type="text" name="texto" id="texto" value="<?php echo $texto; ?>">
			<input type="submit" value="Check">
			<br>
			<?php echo $output_re;?>
		</div>	

	</form>
</body>
</html>

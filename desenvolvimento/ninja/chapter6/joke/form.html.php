<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<title>Add Joke</title>
	<style type="text/css">
		textarea{
			display: block;
			width: 100%;
		}
	</style>
</head>
<body>
	<form action="?" method="post"><!-- ? no action evita a string da consulta na hora de submeter ser mostrada -->
		<div>
			<label for="joketext">Type your joke here:</label>
			<textarea id="joketext" name="joketext" rows="3" cols="40">				
			</textarea>			
		</div>
		<dir><input type="submit" value="Add"></dir>		
	</form>
</body>
</html>
<?php
	include 'includes/dbh.inc.php';
	include 'includes/user.inc.php';
	include 'includes/viewuser.inc.php';
	//include 'includes/viewfirstuser.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$users = new ViewUser();
		$users->showAllUsers();		
		$users->showFirstUser();
		$users->showLastUser();
	?>
</body>
</html>
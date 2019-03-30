<?php

?>
<html>
<head>
	<title>This is Document</title>
</head>
<body>
	<form action = "php_insert_update_delete_search.php" method = "post">
		<input type = "number" name = "id" placeholder = "ID">
		<input type = "text" name = "fname" placeholder = "FistName">
		<input type = "text" name = "lname" placeholder = "LastName">
		<input type = "number" name = "age" placeholder = "Age">
		<div>
			<input type = "submit" name = "insert" value = "Add">
			<input type = "submit" name = "update" value = "Update">
			<input type = "submit" name = "delete" value = "Delete">
			<input type = "submit" name = "search" value = "Find">
		</div>
	</form>
</body>
</html>
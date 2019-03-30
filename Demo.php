<html>
<head>
	<?php
		if(isset($_POST["submit"])){
			if(!empty($_POST['address'])){
				echo "The form is empty";
				return false;
			}
		}
	?>
	<script>
		function validate(){
			var Tsontso = document.forms["Otris"]["address"].value;
				if(Tsontso == ""){
					alert("Please fill in the form");
					return false;
				}
		}
	</script>
</head>
<body>
	<form name = "Otris" onsubmit="return validate();" action = "Tson.php" method = "post">
		<input type = "text" name = "address">
			<br/>
		<input type = "submit" value = "Submit" name = "submit">
    </form>
</body>
</html>
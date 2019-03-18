<!DOCTYPE html>
<html>

<head>
<!-- Bootstrap CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div id="content">
        <div id="column1">
        </div>
        <div id="sub_content">
            <?php
			include_once('connection.php');
			$sql = "SELECT * FROM alladds";
			$result = mysqli_query($db_login,$sql);
			while ($row = mysqli_fetch_array($result)){
					echo "<div id='img_div'>";
						echo "<section id = 'main_section'>";
							echo "<div id = 'image'>";
								echo "<img src = '".$row['image']."'>";
							echo "</div>";
							echo "<div id = 'head'>";
								echo "<p>".$row['text']."</p>";
							echo "</div>";
							echo "<div id = 'footer'>";
								echo "<p>".'Contact Number '.$row['pnum']."</p>";
							echo "</div>";
							echo "<div id = 'mid'>";
								echo "<p>".'RS  '.$row['price']."</p>";
							echo "</div>";
						echo "</section>";
					echo "</div>";
				
			}
			
		?>
        </div>
        <div id="column3">
            <?php
		?>
        </div>

</body>

</html>
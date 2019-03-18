
<!DOCTYPE html>
<html>
<head>
</head>
<style>


#content #column1 {
 width: 220px;
 float: left;
 }
#content #sub_content {
  width: 840px;
  float: left;
  margin: 0;
  padding: 0;
  margin-left:220px;
}
#content #column3{
	width: 230px;
	float: left;	
}
#img_div{
	width:600px;
	height:220px;
	padding:5px;
	margin:15px auto;
	border: 1px solid #cbcbcb;
	display: -webkit-box;
	-webkit-box-orient: vertical;
}

img{
		float:left;
		margin:5px;
		width:300px;
		height:190px;
		border: 1px solid black;
}

#head{
		border: 1px solid green;
		width:225px;
		height:80px;
		margin-left:315px;
		margin-top:5px;
}
#mid{
		border: 1px solid green;
		margin-top:5px;
		width:225px;
		margin-left:315px;
	
}
#footer{
		border: 1px solid green;
		text-align:left;
		width:225px;
		margin-left:315px;
		margin-top:5px;
		margin-bottom:5px;
}
#main_section{
		border: 1px solid blue;
		-webkit-box-flex: 1;
}

</style>
<body>
<div id = "content">
	<div id = "column1">
		<?php
		?>
	</div>
	<div id = "sub_content" >
		<?php
			$db = mysqli_connect("localhost","root","","login");
			$sql = "SELECT * FROM alladds";
			$result = mysqli_query($db,$sql);
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
	<div id  = "column3">
		<?php
		?>
</div>

</body>
</html>
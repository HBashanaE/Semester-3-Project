<?php
	$db = mysqli_connect("localhost","root","","login");
	$sql = "SELECT * FROM alladds";
	$result = mysqli_query($db,$sql);
	while ($row = mysqli_fetch_array($result)){
			$image ="<img src = '".$row['image']."'>";
			$text = $row['text'];
			$pnum = $row['pnum'];
	}
	
?>
<!DOCTYPE html>
<html>
<head>
</head>
<style>
#content{
		width:550px;
		height:160px;
		margin:20px auto;
		border: 1px solid #cbcbcb;
		display: -webkit-box;
		-webkit-box-orient: horizontal;
		
}
#main_section{
		border: 1px solid blue;
		-webkit-box-flex: 1;
}
img{
	display:block;
	float:left;
	margin:10px;
	width:300px;
	height:140px;
	border:1px solid black;
}

#footer{
		border: 1px solid green;
		text-align:left;
		width:225px;
		margin-left:315px;
		margin-top:10px;
}
#head{
		border: 1px solid green;
		width:225px;
		height:80px;
		margin-top:10px;
		margin-left:315px;
}
#mid{
		border: 1px solid green;
		margin-top:10px;
		width:225px;
		margin-left:315px;
	
}
</style>
<body>
<form method = "GET" action = "loadimage.php">
<div id = "content">
	<section id = "main_section">
		<div id = "image">
			<?php
				echo $image;
			?>
		</div>
		<article>
			<header id = "head">
				<?php
					echo $text;
				?>
			</header>
			<header id = "mid">
				<?php
					echo "Price : RS.200/=";
				?>
			</header>
			<footer id = "footer">
				<?php
					echo "Contact_Number :  ".$pnum;
				?>
			</footer>
		</article>
	</section>
	
</div>
</form>
</body>
</html>
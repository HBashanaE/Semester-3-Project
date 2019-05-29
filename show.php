
<!DOCTYPE html>
<html>
<head>
	<title>All Adds</title>
</head>
<style>


#content #column1 {
 width: 260px;
 float: left;
 }
#content #sub_content {
  background-color: #aaa;
  width: 800px;
  float: left;
  margin: 1px;
  padding: 1px;
  margin-left:220px;
}
#content #column3{
	width: 230px;
	float: left;	
}
#img_div{
	width:800px;
	height:400px;
	display:block;
	margin:15px auto;
	border: 1px solid #cbcbcb;
	display: -webkit-box;
	-webkit-box-orient: horizontal;
}

img{
		float:left;
		margin:5px;
		width:400px;
		height:252px;
		border: 1px solid black;
}

#head{
		display: -webkit-box;
		border: 1px solid green;
		width:370px;
		height:126px;
		margin-left: 415px;
		margin-top:5px;
}
#mid{
		display:block;
		border: 1px solid green;
		margin-top:5px;
		width:275px;
		margin-left:415px;
	
}
#footer{
		display:block;
		border: 1px solid green;
		text-align:left;
		width:275px;
		margin-left:415px;
		margin-top:5px;
		margin-bottom:5px;
}
#main_section{
		border: 1px solid blue;
		-webkit-box-flex: 1;
		
}
.btn-group button {
  background-color: #4CAF50; /* Green background */
  color: white; /* White text */
  padding: 5px 10px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
   /* Float the buttons side by side */
   width:100px;
   margin-top:0.5px;
}
.btn-group{
	margin-top:15px;
	border:1px solid black;
	
}
input[type=text]{
	width:100px;
	height:22px;
	margin-left:415px;
}
#valid{
	width: 100px;
	height: 100px;
	background-color:yellow;
}
select{
	width:400px;
}
#cata_box{
	border:1px solid black;
	width:400px;
	float:right;
	margin-top:5px;
	
}
#cata_box1{
	border: 1px solid black;
	width:390px;
	margin-top:8px;
	
}
#ID{
	width:100px;
	border:1px solid black;
	float:right;
	margin-right:70px;
	margin-top:5px;
}
#title{
	height: 40px;
	border: 1px solid black;
	text-align: center;
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
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "login";
			$conn = new mysqli($servername,$username,$password, $dbname);
			$db = mysqli_connect("localhost","root","","login");
			$sqlp = "SELECT * FROM alladds";
			$result = mysqli_query($db,$sqlp);
			while ($row = mysqli_fetch_array($result)){
					echo "<div id='img_div'>";
						echo "<section id = 'main_section'>";
							echo "<div id = 'title'>";
								echo "<p>".$row['title']."</p>";
							echo "</div>";
							echo "<div id = 'image'>";
								echo "<img src = '".$row['image']."'>";
							echo "</div>";
							echo "<div id = 'head'>";
								echo "<p>".$row['text']."</p>";
							echo "</div>";
							echo "<div id = 'footer'>";
								echo "<p>".'Rs '.$row['price']."</p>";
							echo "</div>";
							echo "<div id = 'mid'>";
								echo "<p>".'Contact Number  '.$row['pnum']."</p>";
							echo "</div>";
							
							echo "<div class='btn-group'>";
							
								echo "<form method = 'GET'>";
									echo "<input type = 'text' name = 'name' placeholder = 'name'>";
									echo "<button>".'Accept'."</button>";
									echo "<div id = 'ID'>";
										echo $row['id'];
									echo "</div>";
									echo "</br>";
									echo "<div id = 'cata_box'>";
										echo "<select name = 'list1>";
											echo "<option value=''>".Select_catagory__."</option>";
											echo "<option value='Electrical'>".Electrical."</option>";
											echo "<option value='clean'>".Clean."</option>";
											echo "<option value='tent'>".Tent."</option>";
										echo "</select>";
									
								echo "</form>";
								echo "</div>";
								echo "<div id= 'cata_box1'>";
										echo "Coustermer_category-------:".$row['catagory'];
								echo "</div>";
							
								
								//echo "<form method = 'post'>";
									//echo "<>"
								$ID = $_GET['name'];
								$id = $row['id'];
								if($ID==$id){
									if(!isset($_GET['list1'])){
									$image = $row['image'];
									$text = $row['text'];
									$price = $row['price'];
									$tnum = $row['pnum'];
									$list = $row['catagory'];
									$title = $row['title'];
									$sqli = "INSERT INTO showadds(image,title,catagory, text,price,pnum) VALUES ('$image','$title','$list','$text','$price','$tnum');";
									mysqli_query($db,$sqli);
									//$sql = "DELETE FROM alladds WHERE id = $id ";
									//mysqli_query($db,$sql);
									if ($conn->query($sqli) == TRUE){
										echo "<div id = 'valid'>";
											echo "record added".$row['id'];
										echo "</div>";
									}else {
										echo "error adding rexcord".$conn->error;
									}
									$conn->close();
									}
									/*if($row['catagory']==Null){
										$image = $row['image'];
										$text = $row['text'];
										$price = $row['price'];
										$tnum = $row['pnum'];
										$list = $_GET['list1'];
										$sqli = "INSERT INTO showadds(image,catagory, text,price,pnum) VALUES ('$image','$list','$text','$price','$tnum');";
										mysqli_query($db,$sqli);
									}*/
									
								}	
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
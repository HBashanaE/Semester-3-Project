
<!DOCTYPE html>
<html>
<head>
    <title>Electrical</title>
</head>
<style>
body{
    background-color:	#7FFF00;
}
#content{
    border:1px solid #00FA9A;
    display:block;
}
#content #column1 {
 width: 75px;
 float: left;
 }
#content #sub_content {
  background-color:#00BFFF	;
  width: 805px;
  float: left;
  margin: 1px;
  padding: 1px;
  margin-left:220px;
  border:3px solid #00FA9A;
}
#content #column3{
	width: 230px;
	float: left;	
}
#img_div{
	width:800px;
	height:300px;
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
		height:136px;
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
}
input[type=text]{
	width:100px;
	height:22px;
	margin-left:415px;
}
#valid{
	width: 100px;
	height: 100px;
}
ul li a{
    text-decoration: none;
    font-family: Georgia;
    background-color:#5c755e;
    color:white;
    display:block;
    width:175px;
    margin: 5px;
    padding:10px;
    border: 1px solid #00FA9A;
    border-radius: 2px;
    text-align: center;
    height: 25px;
    line-height:25px;
}
ul{
    background-color:	#87CEFA;
    width:245px;
    height:350px;
    border:3px solid #00FA9A;
}
</style>
<body>
<div id = "content">
	<div id = "column1">
		<?php
            echo "<ul>";
                echo "<li><a href = 'showadds.php'>".'Home'."</a></li>";
                echo "<li><a href = ''>".'Clean'."</a></li>";
                echo "<li><a href = ''>".'Tent'."</a></li>";
                echo "<li><a href = ''>".'bla..bla'."</a></li>";
                echo "<li><a href = ''>".'bla..bla'."</a></li>";
            echo "</ul>";
		?>
	</div>
	<div id = "sub_content" >
		<?php
		
			$db = mysqli_connect("localhost","root","","login");
			$sql = "SELECT * FROM showadds";
			$result = mysqli_query($db,$sql);
			while ($row = mysqli_fetch_array($result)){
                $elec = $row['catagory'];
                if($elec=='Electrical'){
					echo "<div id='img_div'>";
						echo "<section id = 'main_section'>";
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
						echo "</section>";
                    echo "</div>";
                }
				
			}
			
		?>
	</div>
	<div id  = "column3">
		<?php
			
		?>
</div>

</body>
</html>

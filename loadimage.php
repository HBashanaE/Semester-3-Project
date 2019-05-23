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
					echo "For each patient, the OPD maintains a patient file. The file is opened on the first day that the patient visits the OPD. The patient class should have the functionality to return the information in the file as a string, to any external application that requests these details. Moreover, the system should maintain the number of files that have been created. At each visit, a clinical record is created and is added to the patient's file. Each clinical record has a section to record the medical history, where the medical history consists of the set of symptoms reported by the patient during the visit. In addition to the medical history, the clinical record may also contain a drug details section, if the patient is prescribed any medicine. The drug details section records the list of drugs prescribed for the patient during a visit. Patients are categorised as adults and children. Children are further categorised as baby, toddler, pre-schooler and grade-schooler. A child's file also contains a section for vaccine details, where details of each vaccine given to the child are recorded. However, currently there are no vaccines for grade-schoolers. Moreover, the method of vaccination for a baby is different from the method of vaccination for a toddler and a pre-schooler";
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
"<p>".$row['text']."</p>"
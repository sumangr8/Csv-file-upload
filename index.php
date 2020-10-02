<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="jquery.js"></script>
	<script src="js1.js"></script>
	<script src="js2.js"></script>
</head>
<body>
<div class="container">
	<div class="col-xl-6">
		<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label>File Upload : </label>
				<input type="file" name="f1" class="form-control">
			</div>
			<input type="submit" name="submit" value="Import" class="btn btn-success">
		</form>


	</div>
</div>
<!-- start file upload -->
<?php
if(isset($_POST["submit"]))
{
	$filename=$_FILES["f1"]["tmp_name"];// temp file name
	if($_FILES["f1"]["size"] > 0) //if file empity na ho
	{
		$file=fopen($filename, 'r');
		while(($getdata=fgetcsv($file,1000,","))!==FALSE)
		{
			$con=mysqli_connect("localhost","root","","signup");
			$qry=mysqli_query($con,"insert into login (id,name,email,password) values('','".$getdata[1]."','".$getdata[2]."','".$getdata[3]."')");
		}
	}
}
?>
<!-- end file upload -->



</body>
</html>
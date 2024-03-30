<?php
include 'filesLogic.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
	form
	{
		width:30%;
		margin: 100px auto;
		padding: 30px;
		border: 1px solid #555;
	}

	input
	{
		width:100%;
		padding: 5px 10px;
		display:block;
		border: 1px solid #f1e1e1;;
	}

	button
	{
		border:none;
		padding: 10px;
		border-radius:5px;
	}

	table
	{
		width:60%;
		border-collapse: collapse;
		margin: 100px auto;
	}
	th,td{
		height: 50px;
		vertical -align: center;
		border: 1px solid black;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="form">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<h3>Upload File</h3>
				<input type="file" name="myfiles"><br>
				<button type="submit" name="save">upload</button>
			</form>
		</div>
	</div>
</body>
</html>
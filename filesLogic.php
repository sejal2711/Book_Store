<?php

$conn = mysqli_connect('localhost','root','','team-up');

if(isset($_POST['save']))
{
	$filename = $_FILES['myfiles']['name'];

	$destination = 'books/'.$filename;

	$extension = pathinfo($filename, PATHINFO_EXTENSION);

	$file = $_FILES['myfiles']['tmp_name'];

	$size = $_FILES['myfiles']['size'];

	if(!in_array($extension, ['zip','pdf','docx']))
	{
		echo "<center>File extension must be .zip .pdf or .docx</center>";
	}else if($_FILES['myfiles']['size'] > 1000000000000000)
	{
		echo "<center>File too large</center>";
	}else
	{
		if(move_uploaded_file($file, $destination)){

			$sql = "INSERT INTO `classroom`(`name`, `size`, `downloads`) VALUES ('$filename','$size', '0')";

			if(mysqli_query($conn, $sql)){
				echo "<center>File Uploaded successfully</center>";
			}else{
				echo "<center>Failed to upload file.</center>";
			}
		}
	}
}

?>
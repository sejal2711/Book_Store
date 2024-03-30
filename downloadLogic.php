<?php
$conn = mysqli_connect('localhost','root','','team-up');

$sql = "SELECT * FROM classroom";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// ****************** File Upload ************************

if(isset($_POST['save']))
{
	$filename = $_FILES['myfiles']['name'];

	$destination = 'books/'.$filename;

	$extension = pathinfo($filename, PATHINFO_EXTENSION);

	$file = $_FILES['myfiles']['tmp_name'];

	$size = $_FILES['myfiles']['size'];

	if(!in_array($extension, ['zip','pdf','docx']))
	{
		echo "<h4>File extension must be .zip .pdf or .docx</h4>";
	}else if($_FILES['myfiles']['size'] > 1000000000000000)
	{
		echo "<h4>File too large</h4>";
	}else
	{
		if(move_uploaded_file($file, $destination)){

			$sql = "INSERT INTO `teacher_uploaded_file`(`name`, `size`, `downloads`) VALUES ('$filename','$size', '0')";

			if(mysqli_query($conn, $sql)){
				echo "<h4>File Uploaded successfully</h4>";
			}else{
				echo "<h4>Failed to upload file.</h4>";
			}
		}
	}
}

// ***************** File Download ***************

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM classroom WHERE ID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'books/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('books/' . $file['name']));
        readfile('books/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE classroom SET downloads=$newCount WHERE ID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

?>
<?php

print_r($_FILES);
$conn = new mysqli("localhost","root","password","mydb");
if($conn->connect_error){
	die("Error connecting:". $conn->connect_error);
}

$name = $_FILES['fileToUpload']['name'];

$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
$type =finfo_file($finfo,  $_FILES['fileToUpload']['tmp_name']);//'fileToUpload']['tmp_name'] work on server side, $type =finfo_file($finfo, $name); $name works on website

$data = file_get_contents( $_FILES['fileToUpload']['tmp_name']);
$data = $conn->real_escape_string($data);

$sql = "insert into assign5pictures(pictureName,pictureContent) 
               values('$name', '$data')";

if($conn->query($sql) === TRUE) {
	echo 'File added to table';
}else{
	echo 'there was a problem: ' .$conn->error;
}
			   
$conn->close();			   
?>
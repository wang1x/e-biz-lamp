
<a href="logout.php"> Log out </a>
</br>
</br>
<?php
include_once("functions.php");
session_start();
if(isset($_SESSION['username'])){

$servername="localhost";
$username="root";
$password="password";
$mydb="mydb";

$conn = new mysqli($servername,$username,$password,$mydb);
if($conn->connect_error){
 die("connection failed".$conn->connect_error);
}

$sql = "select * from user";
$result = $conn->query($sql);
echo "<table border=1>";
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
echo "<tr>
      <td>".$row['id']."</td>
	  <td>".$row['username']."</td>
	  <td>" .md5($row['password'])."</td>
	  <td>".$row['picfile']."</td>
	  <td> <a href='userupdate.php?item=".$row['id']."'>Update </td>
	  <td> <a href='userDisplay.php?delete=".$row['id']."'>Delete</a> </td>
	  </tr>";
}
}
}
else {
 header("Location: login.php");
}

if(isset($_GET['delete'])){
$sql = "delete from user where id=". $_GET['delete'];

$conn = db();
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

}




?>
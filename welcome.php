
<a href="userDisplay.php"> View All Users </a>
</br>
<a href="logout.php"> Log out </a>
</br>
<?php
session_start();
if(isset($_SESSION['username'])){
echo "Welcome :" .$_SESSION['username'];
}
else {
header("Location: register.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title></title>
     <style>

     html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }
	   body {
            display: table;
        }

        .my-block {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
     </style>
	 <script>

</script>
<?php
include_once("functions.php");
$error="";
if(count($_POST)>0 && isset($_POST['submit'])){
if(strlen($_POST['fname'])>0 && strlen($_POST['passwd'])>0 ){

$username = $_POST['fname'];
$password = md5( $_POST['passwd']);

$conn = db();

		$result = $conn->query("select * from user where username='".$username."' and password='".$password."'");

		if($result->num_rows>0){
			
			session_start();
            $_SESSION['username'] =$username;
			header("Location: welcome.php");
			exit();			
		}
		else {
		   $error= "username or password is not correct";
		}
		
}
else {

echo "please fill the form";
}
}


?>







		
</head>
<body>

<div class="my-block">
<a href="register.php"> Not a member, please register </a>
</br>
</br>

<font color="blue">
Please log in:
</font>
<form aciton="login.php"  method="POST">
  
  User Name:<input type="text" name="fname"><br><br>
  Password :<input type="password" name="passwd"><br><br>
  
  </br>
  <input type="submit" name="submit" value="submit" />
 
  
 
</form>
<font color="red">
<?php echo $error; ?>
</font>
</div>

  
</body>
</html>

<?php 
  $con = mysqli_connect("localhost","root","","socket_user");
  // Check connection
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if (isset($_POST['submit'])){
        $name = $_POST['name']; 
        $pass = $_POST['pass'];
       $sql = "SELECT * FROM users WHERE Username='$name' AND Pass='$pass'";
        $exe = mysqli_query($con,$sql);
        while ($fetch = mysqli_fetch_object($exe)){
          echo $name = $fetch->Username;
          echo $pass = $fetch->Pass;
        }
        session_start();
      echo  $_SESSION["name"]=$name;
        header("location:index.php");
        echo "ohk";
  }else{
  	echo "Sorry WRONG NUMBER";
  }
?>
<!DOCTYPE>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
	Username:-<input type="text" name="name">
	Password:-<input type="Password" name="pass">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>
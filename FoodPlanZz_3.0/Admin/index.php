<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body class="indexBody">
    <header class="adminLogin">
        <form action="" method="post">
            <p>
                <input type="text" name="user" id="user" placeholder="Username" required />
            </p>
            <p>
                <input type="password" name="pass" id="pass" placeholder="Password" required />
            </p>
            <p><input id="btn" type="submit" value="Login" /></p>
        </form>
    </header>
    <footer class="buttom">
        <a href="../index.php">FOOD PLANZz<br />HOME PAGE</a>
    </footer>
</body>

</html>

<?php
if(isset($_POST['user'])){
  include '../buildconnection.php';      
  $conn=connection();
  if(!$conn){
    echo"Connection Error";
  }
  else{
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $sql="SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password' ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows==1)
    {
      $_SESSION['user']=$username;
      
      header('Location:home.php');
    }
    else{
      echo"<script>window.alert('invalid username or password')</script>";
    }
  }
}
?>
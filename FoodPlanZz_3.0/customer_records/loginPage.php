<?php  
 session_start();  
 if(isset($_SESSION["customer"]))  
 {  
      header("location:../index.php");  
 }  
 
 ?>
<?php

$flag=true;
if(isset($_POST['userpassword'])){
    include '../buildconnection.php';
    $userpassword=$_POST['userpassword'];
    $useremail=$_POST['useremail'];
    
    $conn=connection();
    if(!$conn){
        echo"Connection error due to ".mysqli_connect_error();
    }
    else{
        $f_query="SELECT * FROM `customer` where email='$useremail' and password='$userpassword';";
        
        $cart_Query="SELECT SUM(quantity) FROM `cart` where userEmail='$useremail';";

        $find=mysqli_query($conn,$f_query);
        $cart=mysqli_query($conn,$cart_Query);
        $cartcount = $cart->fetch_assoc();
        // echo $cartcount ['SUM(quantity)'];
        if($cartcount!=NULL){
            $_SESSION['cartCount']=$cartcount['SUM(quantity)'];
        }
        //  print_r($row);
        // exit();
        if($find->num_rows==1)
        {
            $_SESSION['customer']=$useremail;
            $_SESSION['LoginStatus2']='LogOut';
            $_SESSION['LoginStatus2']='LogOut';
            $flag=true;
            header('Location:../index.php');
        }
        else{
            $flag=false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <form action="loginPage.php" method="post">
            <div>
                <img class='logo' src="../images/Logo/Logo.png" alt="Logo">
            </div>
            <div>
                <input class="signup-input" type="email" name="useremail" id="useremail" placeholder="Email" required>
            </div>
            <div>
                <input class="signup-input" type="password" name="userpassword" id="userpassword" placeholder="Password" required>
            </div>
            <div>
                <p <?php if($flag==true)echo"hidden";?> style="color: red;">wrong details !<br>Enter again or <a href="signupPage.php">click here </a>to create new account</?php>
            </div>
            <div>
                <input type="submit" value="Login" id="hsubmit">
            </div>
            <div id="login-link">
                <a href="./signupPage.php" >OPEN SIGNUP PAGE</a>
        </div>
        </form>
    </div>
</body>
</html>
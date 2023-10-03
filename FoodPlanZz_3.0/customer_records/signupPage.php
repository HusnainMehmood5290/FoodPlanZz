<?php  
 session_start();  
 if(isset($_SESSION["customer"]))  
 {  
      header("location:../index.php");  
 }  
 
 ?>
<?php
if(isset($_POST['usertel'])){
    include '../buildconnection.php';
    $username=$_POST['username'];
    $userpassword=$_POST['userpassword'];
    $useremail=$_POST['useremail'];
    $usertel=$_POST['usertel'];
    $flag=false;
    $conn=connection();
    if(!$conn){
        echo"Connection error due to ".mysqli_connect_error();
    }
    else{
        $f_query="SELECT * FROM `customer` where email='$useremail';";
        $find=mysqli_query($conn,$f_query);
        if($find->num_rows==1)
        {
            $flag=true;
        }
        else if($find->num_rows==0 )
        {
            $query="INSERT INTO `customer` ( `username`, `email`, `password`, `telephone`) VALUES ('$username', '$useremail', '$userpassword', '$usertel');";
            $result=mysqli_query($conn,$query);
            if($result){
                $flag=false;
                header('location:./loginPage.php');
            }
            else{
                echo"There is error while inserting customer";
            }
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-UP Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    function checkpass(){
        var p1=document.getElementById('userpassword').value;
        var p2=document.getElementById('userpassword2').value;
        if(p1===p2){ //this will click hidden submit to proces
            document.getElementById('submit').click();
        }
        else{
            document.getElementById("notify").hidden = false;
            document.getElementById('notify').innerHTML="Password doesn't Match";
        }
    }
</script>
<body>
    
    <div class="signup-container">
        <div>
            <img class='logo' src="../images/Logo/Logo.png" alt="Logo">
        </div>
        <form action="" method="post">
        <div >
            <input class="signup-input" type="text" name="username" id="username" placeholder="Full Name" required>
        </div>
        <div >
            <input class="signup-input" type="email" name="useremail" id="useremail" placeholder="Email" required>
        </div>
        <div>
            <label for="email" style="color: red;" <?php if(!isset($flag))echo"hidden";else echo''?> >Already exists try an other email or <a href="./loginPage.php">click here to login</a> with this email</label>
        </div>
        <div >
            <input class="signup-input" type="password" name="userpassword" id="userpassword" placeholder="Password" required>
            <p hidden id="notify" style="color: red;"></p>
        </div>
        <div >
            <input class="signup-input" type="password" name="userpassword2" id="userpassword2" placeholder="Confirm Password" required>
        </div>
        <div >
            <input class="signup-input" type="tel" name="usertel" id="usertel" placeholder="+92..." required>
        </div>
            <p>Accept all <a href=""> term and condition</a> <input type="checkbox" required></p>
            <input type="button" value="Register" id="hsubmit" onclick="checkpass()">
            <input type="submit" hidden value="submit" id="submit" onclick="checkpass()">
        </form>
        <div id="login-link">
                <a href="./loginPage.php" >OPEN LOGIN PAGE</a>
        </div>
    </div>
</body>
</html>
<!-- CREATE TABLE `assignment2web`.`customer` ( `username` VARCHAR(55) NOT NULL , `email` VARCHAR(55) NOT NULL , `password` INT NOT NULL , `telephone` VARCHAR(20) NOT NULL , PRIMARY KEY (`email`)) ENGINE = InnoDB; -->

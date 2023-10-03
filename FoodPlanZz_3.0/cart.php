<?php  
session_start();  
if(!isset($_SESSION["customer"]))
{
 header("location:customer_records\loginPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<script >


  function generateBill(price) {
    var quantity=document.getElementById("quantity").value;
    var bil=quantity*price;
    document.getElementById("calcBill").value=bil;
    document.getElementById("ForphpQuantity").value=quantity;
    document.getElementById("cartBtn").style.display='block';
  }
</script>
<style>
  *{
    text-transform:capitalize;
    text-decoration: none;
  }    
  .btn_data>input{
    width: 100%;
    margin: 4px;
    padding: 11px
  }
  #cartBtn{
    background-color: rgb(51 166 66);
    color: white;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    border: 1px solid #767676;
    padding: 11px;
    cursor: pointer;
  }
  #cartBtn:hover{
    background-color: #ccc;
    color: black;
  }
</style>
<body>
      <div class="header">
        <a href="#">FOOD PLANZz</a>
        <ul>
          <a href=""><li>Cart</li></a>
          <div class="Item_count"><li><!-- I use it to count the cart data  -->
            <?php   
              if(!isset($_SESSION['cartCount']))
              echo '0'; 
              else echo $_SESSION['cartCount'];
              ?>
              </li></div>
          <a href="./index.php"><li>Home</li></a>
          <a href="./about.php"><li>About</li></a>
          <?php
              $_SESSION['LoginSatus1']='Login';  
              if(!isset($_SESSION['LoginStatus2'])){
                echo "<a href='./customer_records\loginPage.php'><li>";
                echo $_SESSION['LoginSatus1'];
              }
              else {
                echo "<a href='./Logout.php'><li>";
                echo $_SESSION['LoginStatus2'];
              }
              ?>
          </li></a>
        </ul>
      </div>
      <div class="product" style='margin-left: auto;
    margin-right: auto;
    width: 25%;
        margin-top: 50px;'>
    <?php
        $id=$_GET["id"];
        include './buildconnection.php';
        
        $conn=connection();
        $sql="select * from addfood where `serial #`=$id";
        $result=$conn->query($sql); if($result->num_rows>0) { $sr=0;
          while($row = $result->fetch_assoc()) { $sr++; 
            $foodName=$row['foodname'];
            $foodImg=$row['image'];
            echo "
      <div 
        style='
          border-left: 2px solid;
          border-bottom: 2px solid;
          border-radius: 2px;
          box-shadow: 0px 0px 20px #ccc;
          margin: 4px;
          text-align: center;
          text-transform: capitalize;
        '>
          <img width='150px' height='150px' class='foodimg'
          src='./images/".$row['image']."' alt='image'>
        <div>Name: ".$row['foodname']."</div>
        ".$fooName=$row['foodname']."
        <div>type: ".$row['type']."</div>
        <div>Price: ".$row['price']." RS</div>
        <div>rating: ".$row['rating']."</div>
        <label style='color: red;'>Enter Quantity</label>
        <input id='quantity' type='number' min='1' max='50' value='1'/>
        </div>
        <Form method='post'>
        <div class='btn_data'>
        <input type='text' name='total_price' id='calcBill' placeholder='Total BILL:' readonly />
        <input style='cursor: pointer;' type='button' name='generateBil' value='generate Bil'  onclick='generateBill(457)' required/>
        <a >
        <input hidden id='ForphpQuantity' type='number' name='quantity' min='1' max='50' value='1'/>
        <input type='submit' value='Add to cart' id='cartBtn' name='cartBtn2' hidden/></a>
        </Form>
        <div>
      "; } } else{ echo"NO DATA ADDED"; }


      if(isset($_POST['cartBtn2'])){
        $userMail=$_SESSION['customer'];
        $quantity=$_POST['quantity'];
        $t_price=$_POST['total_price'];
        $_SESSION['cartCount']+=$quantity;
        echo "$userMail<br>$quantity<br>$foodName<br>$foodImg<br>$t_price";
        $sql = "INSERT INTO `cart` (`userEmail`, `quantity`, `foodname`, `foodImg`,`total_price`) VALUES ('$userMail', '$quantity', '$foodName', '$foodImg','$t_price');";
        
        
        if(mysqli_query($conn, $sql))
        {
            echo"data stored sucess";
            header('Location:index.php');
          }
          else{
            echo"There is an error";
          }
      }
?>
    </div>
    
</body>
</html>
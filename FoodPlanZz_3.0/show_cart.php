<?php  
session_start();  
if(!isset($_SESSION["customer"]))
{
 header("location:customer_records\loginPage.php");
}
?>
<style>
.container{
    width: 23%;
    height: 43%;
    float: left;
    border-left: 2px solid;
    border-bottom: 2px solid;
    border-radius: 2px;
    box-shadow: 0px 0px 20px #ccc;
    margin: 4px;
    text-align: center;
    text-transform: capitalize;
}
.row{
    margin-top:6px;
}
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Show cart</title>
    <link rel="stylesheet" href="index_style.css" />
  </head>
  <body>
    <div class="cover">
      <div class="header">
        <a href="#">FOOD PLANZz</a>
        <ul>
          <a href=""><li>Cart</li></a>
          <div class="Item_count"><li>
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
      <div class="cover-center">
        <h2 id="about">👇Your Cart👇</h2>
      </div>
    </div>
    </div>
  </body>
</html>

<?php
    include './buildconnection.php';
    
    $conn=connection();
    $sql="select * from cart";
    $result=$conn->query($sql); if($result->num_rows>0) { $sr=0;
    while($row = $result->fetch_assoc()) { $sr++;
      
        echo "
      <div class='container'>
        <div>
          <img width='150px' height='150px' class='foodimg'
          src='./images/".$row['foodImg']."' alt='image'>
        </div>

        <div class='row'>Name: ".$row['foodname']."</div>
        <div class='row'>Quantity: ".$row['quantity']."</div>
        <div class='row'>Total Price: ".$row['total_Price']."</div>
        <Form method='GET'>
        <div hidden class='row'><input name=quantity type='' value='".$row['quantity']."'></div>
        <div hidden class='row'><input name=cart_id type='' value='".$row['cartId']."'></div>
        <div class='row'><button name='deleteBtn'>Delete</button></div>
        </Form>

      </div>
      "; } 
    }
    else{ echo"<div style='text-align: center;font-size: 26px;line-height: 35px;'>o hi poor person😂<br>🙏please buy some food for yourself<br>I will pay for you<br>Enjoy🥱</div>"; 
    } 

    // For delete data
    if(isset($_GET['deleteBtn'])){
        $cart_ID= $_GET['cart_id'];
        $quantity= $_GET['quantity'];
        $query = "DELETE FROM cart WHERE `cart`.`cartId` = $cart_ID";
        if($conn->query($query))
        {
            $_SESSION['cartCount']-=$quantity;
        
            header("Location:./show_cart.php");
        }
    }
?>
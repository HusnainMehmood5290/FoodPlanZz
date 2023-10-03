
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <div class="cover">
      <div class="header">
        <a href="#">FOOD PLANZz</a>
        <ul>
          <a href="show_cart.php"><li>Cart</li></a>
          <div class="Item_count">
            <li><!-- I use it to count the cart data  -->
            <?php  
              session_start();  
              if(!isset($_SESSION['cartCount']))
              echo '0'; 
              else echo $_SESSION['cartCount'];
              ?>
              </li></div>
          <a href=""><li >Home</li></a>
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
        <h2>IF YOU ARE GENIOUS YOU WILL TRY OUR FOOD</h2>

        <a href="#stylefood">Let's TRY</a>
      </div>
    </div>
    <div>
        <?php
include 'buildconnection.php';

$conn=connection();
$sql="select * from addfood";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    $sr=0;
    while($row = $result->fetch_assoc())
    {
        $sr++;
        echo "
        <a class='foodBtn' href='./cart.php?id=".$row['serial #']."'>
        <div class='stylefood' id='stylefood'>
        <div>
        <img width='150px' height='150px' class='foodimg' src='images/".$row['image']."' alt='image'>
        </div>

        <div class='name'><strong>Name:</strong> ".$row['foodname']."</div>
        <div><strong>type:</strong> ".$row['type']."</div>
        <div><strong>Price:</strong> ".$row['price']." RS</div>
        <div><strong>rating:</strong> ".$row['rating']."</div>
        <div class='veiwProduct'>Select</div>
        
        </div>
        </a>
        ";
        }
    }
    else{
        echo"NO DATA ADDED";
    }
?>
    </div>
</body>
</html>
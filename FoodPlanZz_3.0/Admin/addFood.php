<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>
<?php
    if(isset($_POST['rating'])){
        include '../buildconnection.php';
        $foodname=$_POST['foodname'];
        $type=$_POST['type'];
        $imageName=$_FILES['image']['name']; 
        $imageTmp=$_FILES['image']['tmp_name']; 
        $price=$_POST['price'];
        $rating=$_POST['rating'];
    
        $location="../images/".$imageName;
        $conn=connection();
        // echo "food Name : ".$foodname;
        // echo "<br>quantity : ".$quantity;
        // echo "<br>type : ".$type;
        // echo "<br>imageName : ".$imageName;
        // echo "<br>imageTmp : ".$imageTmp;
        // echo "<br>price : ".$price;
        // echo "<br>rating : ".$rating;

        if(!$conn){
          echo "Error due to".mysqli_connect_error();
        }
        else{
          move_uploaded_file($imageTmp,$location);
        
          $sql = "INSERT INTO `addfood` (`serial #`, `foodname`, `type`, `image`, `price`, `rating`) VALUES (NULL, '$foodname', '$type', '$imageName', '$price','$rating');";

        
          if(mysqli_query($conn, $sql))
          {
            echo"data stored sucess";
            header('Location:home.php');
          }
          else{
            echo"There is an error";
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
    <title>Login Page</title>
    <link rel="stylesheet" href="..\style.css">
</head>

<body class="addfood">
    <form action="addFood.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2" align="center ">
                    <img src="../images/Logo/Logo.png" style="background-color: rgb(180, 169, 156);" alt="LOGO">
                </td>
            </tr>
            <tr class="image">
                <td> <label for="image">Provide image of food</label></td>
                <td><input type="file" name="image" id="image"></td>
            </tr>

            <tr class="foodname">
                <td>
                    <label for="foodname">FoodName</label>
                </td>
                <td>
                    <input type="text" name="foodname" id="foodname" placeholder="Enter Food name">
                </td>
            </tr>
            <tr class="price">
                <td> <label for="price">Price</label></td>
                <td><input type="number" name="price" id="price" placeholder="Enter Price pkr."></td>
            </tr>

            <tr>
                <td> <label for="rating">Give rating</label></td>
                <td>
                    <input type="radio" name="rating" id="1" value="1">
                    <input type="radio" name="rating" id="2" value="2">
                    <input type="radio" name="rating" id="3" value="3">
                    <input type="radio" name="rating" id="4" value="4">
                    <input type="radio" name="rating" id="5" value="5">
                </td>
            </tr>

            <tr class="type">
                <td><label for="type">What type of food is?</label></td>
                <td>
                    <select name="type" id="type">
                        <option value="FastFood">FastFood</option>
                        <option value="organicfood">organicfood</option>
                        <option value="Dairy">Dairy</option>
                        <option value="Protein">Protein</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="submit-btn" colspan="2">
                    <input class="submit-btn" type="submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<!-- CREATE TABLE `assignment2web`.`addfood` (`serial #` INT NOT NULL AUTO_INCREMENT , `foodname` VARCHAR(20) NOT NULL , `type` VARCHAR(20) NOT NULL , `image` VARCHAR(45) NOT NULL , `price` DECIMAL NOT NULL , `rating` INT NOT NULL , PRIMARY KEY (`serial #`)) ENGINE = InnoDB; -->
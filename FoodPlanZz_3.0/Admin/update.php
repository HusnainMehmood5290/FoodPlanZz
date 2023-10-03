<?php
    if(isset($_POST['id']))
    {
        include '../buildconnection.php';
        $foodname=$_POST['foodname'];
        $type=$_POST['type'];
        $imageName=$_FILES['image']['name']; 
        $imageTmp=$_FILES['image']['tmp_name']; 
        $price=$_POST['price'];
        $rating=$_POST['rating'];
        $id=$_POST['id'];
        $oldimage=$_POST['oldImage'];
        $location="../images/".$imageName;
        $conn=connection();

        // echo "Id : ".$id;
        // echo "food Name : ".$foodname;
        // echo "<br>type : ".$type;
        // echo "<br>imageName : ".$imageName;
        // echo "<br>imageTmp : ".$imageTmp;
        // echo "<br>price : ".$price;
        // echo "<br>rating : ".$rating;
        
        if(!$conn){
            echo "Error due to".mysqli_connect_error();
        }
        else
        {
            if($_FILES['image']['size']>0)
            {
                move_uploaded_file($imageTmp,$location);
                $sql = "UPDATE `addfood` SET `foodname` = '$foodname', `type` = '$type', `image` = '$imageName', `price` = '$price', `rating` = '$rating' WHERE `addfood`.`serial #` = $id;";
            }
            else
            {
                $sql = "UPDATE `addfood` SET `foodname` = '$foodname', `type` = '$type', `image` = '$oldimage', `price` = '$price', `rating` = '$rating' WHERE `addfood`.`serial #` = $id;";
            }    
            if(mysqli_query($conn, $sql))
            {
              echo'image'.$imageName;
              echo'image'.$_GET;
              header('Location:./edit.php');
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
    <form action="./update.php" method="post" enctype="multipart/form-data">
        <table>
                <?php
                    if(!isset($_GET['rating']))
                    {
                        header('Location:home.php');
                    }
                ?>
            <tr>
                <td colspan="2" align="center ">
                    <img src="../images/Logo/Logo.png"  style="background-color: rgb(180, 169, 156);"alt="LOGO">
                </td>
            </tr>
            <tr>
                <td><input hidden type="text" name='oldImage' id='oldImage' value='<?php  if(isset($_GET['image'])) echo $_GET["image"];?>'></td>
                <td><img width='120px' height='60px' <?php  if(isset($_GET['image'])) echo 'src=../images/'.$_GET["image"];?>></td>
                
            </tr>
            <tr class="image">
                <td> <label for="image">Change the image =></label></td>
                <td><input type="file" name="image" id="image" ></td>
            </tr>

            <tr class="foodname">
                <td>
                    <label for="foodname">FoodName</label>
                </td>
                <td>
                    <input type="hidden" name="id" value=<?php  if(isset($_GET['id'])) echo $_GET['id']; ?>>
                    <input type="text" name="foodname" id="foodname" placeholder="Enter Food name" value=<?php  if(isset($_GET['foodname'])) echo $_GET['foodname']; ?>>
                </td>
            </tr>
            <tr class="price">
                <td> <label for="price">Price</label></td>
                <td><input type="number" name="price" id="price" placeholder="Enter Price pkr." value=<?php  if(isset($_GET['price'])) echo $_GET['price']; ?>></td>
            </tr>

            <tr >
                <td> <label for="rating">Give rating</label></td>
                <td>
                    <?php
                    if(isset($_GET['rating'])){
                        for ($i=1; $i <=5; $i++) { 
                           if($_GET['rating']==$i){
                            echo"<input type='radio' name='rating' id='$i' value='$i' checked='checked'>";    
                           } 
                           else{
                            echo"<input type='radio' name='rating' id='$i' value='$i'>";
                           }
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr class="type">
                <td><label for="type">What type of food is?</label></td>
                <td>
                    <select name="type" id="type" selected=<?php  if(isset($_GET['type'])) echo $_GET['type']; ?>>
                        <?php 
                          if($_GET['type']=='FastFood'){
                            echo"<option value='FastFood' selected>FastFood</option>
                            <option value='organicfood'>organicfood</option>
                            <option value='Dairy'>Dairy</option>
                            <option value='Protein'>Protein</option>";  
                          }
                          else if($_GET['type']=='organicfood'){
                            echo"<option value='FastFood'>FastFood</option>
                            <option value='organicfood' selected>organicfood</option>
                            <option value='Dairy'>Dairy</option>
                            <option value='Protein'>Protein</option>";  
                          }
                          else if($_GET['type']=='Dairy'){
                            echo"<option value='FastFood'>FastFood</option>
                            <option value='organicfood' >organicfood</option>
                            <option value='Dairy' selected>Dairy</option>
                            <option value='Protein'>Protein</option>";  
                          }
                          else if($_GET['type']=='Protein'){
                            echo"<option value='FastFood'>FastFood</option>
                            <option value='organicfood' >organicfood</option>
                            <option value='Dairy' >Dairy</option>
                            <option value='Protein' selected>Protein</option>";  
                          }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
            <?php
            if(isset($_GET['rating'])){
                echo"
                    <td class='submit-btn' colspan='2' >
                    <input class='submit-btn' type='submit' value='UPDATE' >
                </td>";
            }
            ?>
            </tr>
        </table>
    </form>
</body>

</html>

<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>
<!-- Add FOOD -->
<?php
$inertflag=false;
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
        if(!$conn){
          echo "Error due to".mysqli_connect_error();
        }
        else{
          move_uploaded_file($imageTmp,$location);
        
          $sql = "INSERT INTO `addfood` (`serial #`, `foodname`, `type`, `image`, `price`, `rating`) VALUES (NULL, '$foodname', '$type', '$imageName', '$price','$rating');";

        
          if(mysqli_query($conn, $sql))
          {
           $inertflag=true;
          }
          else{
            echo"There is an error";
          }
        }
        $conn->close(); } ?>
<!DOCTYPE html>
<html lang="en" style="background: linear-gradient(to right, #9200ff, #ffff00)">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <script>
    function hidecontent() {
        document.getElementById("userfood").style.display = "none";
        document.getElementById("form").style.display = "none";
        document.getElementById("insertSucess").style.display = "none";       
    }
    function showform() {
        hidecontent();
        document.getElementById("form").style.display = "block";
    }

    function showuserfood() {
         document.getElementById("showtouser").click() = true;
    }
  </script>

  <body>
    <div class="Home-body">
      <ul class="home-header">
        <li>
          <a class="Home-User" href="home.php">
            <?php echo $_SESSION["user"]; ?>
          </a>
        </li>
        <li><a href="Logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="home-sideBar">
      <ul>
        <li>Food Section</li>
        <button onclick="showform()">
          <li>Add Food</li>
        </button>
        <button onclick="showuserfood()">
          <li>How user's see</li>
          <!-- I use a form here that deal with javascript to show food through php -->
          <form hidden method="post">
            <input type="submit" name="showtouser" id="showtouser" />
          </form>
          <form hidden method="post">
            <input type="submit" name="hidetouser" id="hidetouser" />
          </form>
          <!-- form end -->
        </button>
        <button onclick="window.location.href='./edit.php'">
          <li>Make changes</li>
        </button>
        <li>Admin Section</li>
        <button href="#">
          <li>View Admins</li>
        </button>
        <button href="#">
          <li>Update/delete Admin</li>
        </button>
        <button href="#">
          <li>New Admins</li>
        </button>
        <li>Customer Section</li>
        <button href="#">
          <li>View Customers</li>
        </button>
        <button href="#">
          <li>Update/delete Customer</li>
        </button>
        <button href="#">
          <li>New Customer</li>
        </button>
      </ul>
    </div>
    <p  id="insertSucess"style="text-align: center; color:green;font-size: 30px;" <?php if($inertflag)echo"";else if(!$inertflag)echo"hidden";?> >Data inserted sucessfully</p>
    <div class="form" id="form" hidden>
      <form action="" method="post" enctype="multipart/form-data">
        <table>
          <tbody>
            <tr>
              <td colspan="2" align="center ">
                <img
                  src="../images/Logo/Logo.png"
                  style="background-color: rgb(180, 169, 156)"
                  alt="LOGO" />
              </td>
            </tr>
            <tr class="image">
              <td><label for="image">Food Image</label></td>
              <td><input type="file" name="image" id="image" required /></td>
            </tr>

            <tr class="foodname">
              <td>
                <label for="foodname">FoodName</label>
              </td>
              <td>
                <input
                  type="text"
                  name="foodname"
                  id="foodname"
                  placeholder="Enter Food name"
                  required />
              </td>
            </tr>
            <tr class="price">
              <td><label for="price">Price</label></td>
              <td>
                <input
                  type="number"
                  name="price"
                  id="price"
                  placeholder="Enter Price pkr."
                  required />
              </td>
            </tr>

            <tr>
              <td><label for="rating">Give rating</label></td>
              <td>
                <input type="radio" name="rating" id="1" value="1" required />
                <input type="radio" name="rating" id="2" value="2" />
                <input type="radio" name="rating" id="3" value="3" />
                <input type="radio" name="rating" id="4" value="4" />
                <input type="radio" name="rating" id="5" value="5" />
              </td>
            </tr>

            <tr class="type">
              <td><label for="type">What type of food is?</label></td>
              <td>
                <select name="type" id="type" required>
                  <option value="">--Select--</option>
                  <option value="FastFood">FastFood</option>
                  <option value="organicfood">organicfood</option>
                  <option value="Dairy">Dairy</option>
                  <option value="Protein">Protein</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="submit-btn" colspan="2">
                <input class="submit-btn" id="submit-btn" type="submit" />
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div id="userfood">
      <?php
            if(isset($_POST['showtouser'])){
            include '../buildconnection.php';
            
            $conn=connection();
            $sql="select * from addfood";
            $result=$conn->query($sql); if($result->num_rows>0) { $sr=0;
      while($row = $result->fetch_assoc()) { $sr++; echo "
      <div
        style='
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
        '>
        <div>
          <img width='150px' height='150px' class='foodimg'
          src='../images/".$row['image']."' alt='image'>
        </div>

        <div>Name: ".$row['foodname']."</div>
        <div>type: ".$row['type']."</div>
        <div>Price: ".$row['price']." RS</div>
        <div>rating: ".$row['rating']."</div>
      </div>
      "; } } else{ echo"NO DATA ADDED"; } } ?>
    </div>
  </body>
</html>

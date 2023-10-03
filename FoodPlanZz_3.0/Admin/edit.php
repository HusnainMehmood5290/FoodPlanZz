<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>
<?php
ob_start();
include '../buildconnection.php';

$conn=connection();
$sql="select * from addfood";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    echo "
    <style>
    *{
        margin:0;
        padding:0;
        font-weight: bold;
    }
    .Home-body {
  font-size: 30px;
  font-weight: 700px;
  line-height: 30px;
  font-family: 'Open Sans', sans-serif;
}
.home-header {
  overflow: hidden;
  background-color: #2c3338;
  list-style: none;
  height: 60px;
  color: white;
}

.home-header > li > a {
  text-decoration: none;
  float: left;
  text-transform: uppercase;
  color: white;
  margin: 15px;
}
.home-header > li:nth-child(2) > a {
  margin-top: 10px;
  text-transform: none;
  float: right;
  color: white;
  font-size: 25px;
  border-radius: 20px;
  padding: 5px;
  background-color: teal;
}
table{
    margin-left: auto;
    margin-right: auto;
    margin-top: 4px;
    background-color: #dfdfdf9c;
    color: #931515;
    font-size: 21px;

}
body{
    background-image:url('./Assests/back.jpg');
   
    background-size: 18% 50%;
}
.btnDelete{
    background-color: #d90404f2;
    width: 75px;
    height: 36px; 
    cursor:pointer;   
}
.btnDelete:hover{
    background-color: #ff0000;
    
}
.btnUpdate{
    background-color:#05d80cf2;
    cursor:pointer;   
    width: 75px;
    height: 36px;
}
.btnUpdate:hover{
    background-color:#00ff08;
}
    </style>
    <div class='Home-body'>
        <ul class='home-header'>
            <li>
                <a class='Home-User' href='home.php'>
                    Home Page
                </a>
            </li>
            <li><a href='Logout.php'>Logout</a></li>
        </ul>
    </div>
    <table style='border:1px solid black; border-collapse: collapse; '>
        <tr style='border:1px solid black;'>
            <th style='border:1px solid black;'>serial #</th>
            <th style='border:1px solid black;'>foodname</th>
            <th style='border:1px solid black;'>type</th>
            <th style='border:1px solid black;'>image</th>
            <th style='border:1px solid black;'>price</th>
            <th style='border:1px solid black;'>rating</th>
            <th colspan='2' style='border:1px solid black;'>Actions</th>
            </tr>";
            $sr=0;
    while($row = $result->fetch_assoc())
    {
        $sr++;
        echo "<tr style='border:1px solid black;'>
         <td style='border:1px solid black;'>".$sr."</td>
         <td style='border:1px solid black;'>".$row['foodname']."</td>
         <td style='border:1px solid black;'>".$row['type']."</td>
         <td style='border:1px solid black;'><img width='90px' height='60px' src='../images/".$row['image']."'</td>
         <td style='border:1px solid black;'>".$row['price']."</td>
         <td style='border:1px solid black;'>".$row['rating']."</td>
         <td>
            <Form method='post'>
              <input type='hidden' value=".$row['serial #']." name='id'>
              <input type='submit' value='Delete' name='btnDelete' class='btnDelete'/>
            </Form>
         </td>
         <td>
            <Form method='post'>
               <input type='hidden' value=".$row['serial #']." name='id'>
               <input type='hidden' value=".$row['foodname']." name='foodname'>
               <input type='hidden' value=".$row['type']." name='type'>
               <input type='hidden' value=".$row['image']." name='image'>
               <input type='hidden' value=".$row['price']." name='price'>
               <input type='hidden' value=".$row['rating']." name='rating'>
               <input type='submit' value='Update' name='btnUpdate' class='btnUpdate'/>
            </Form>
         </td>
        </tr>";    
    }
            echo"</table>";
            
}
else
{
    echo"NO DATA ADDED";
}
if(isset($_POST['btnDelete']))
{
    $query = "DELETE FROM addfood WHERE `addfood`.`serial #` = ".$_POST['id'];
    if($conn->query($query))
    {
        header("Location:./edit.php");
    }
}
else if(isset($_POST['btnUpdate']))
{
    // exit(header("Location: /finished.html"));
    ob_clean();
    exit(header("Location:./update.php?foodname=".$_POST['foodname']."&type=".$_POST['type']."&image=".$_POST['image']."&price=".$_POST['price']."&rating=".$_POST['rating']."&id=".$_POST['id']));
    // exit();
}
    $conn->close();
?>
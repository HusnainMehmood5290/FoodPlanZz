<?php  
session_start();  
// if(!isset($_SESSION["user"]))
// {
//  header("location:index.php");
// }
?>
<?php
// include '../buildconnection.php';

// $conn=connection();
// $sql="select * from admin";
// $result=$conn->query($sql);
// // echo"$result";
// if($result->num_rows>0)
// {
    // echo "<table style='border:1px solid black; border-collapse: collapse; '>
    //     <tr style='border:1px solid black;'>
    //         <th style='border:1px solid black;'>serial #</th>
    //         <th style='border:1px solid black;'>foodname</th>
    //         <th style='border:1px solid black;'>type</th>
    //         <th style='border:1px solid black;'>image</th>
    //         <th style='border:1px solid black;'>price</th>
    //         <th style='border:1px solid black;'>rating</th>
    //     </tr>";
    // $sr=0;
    // while($row = $result->fetch_assoc())
    // {
        // $sr++;
        // echo "<tr style='border:1px solid black;'>
        //  <td style='border:1px solid black;'>".$sr."</td>
    //      <td style='border:1px solid black;'>".$row['foodname']."</td>
    //      <td style='border:1px solid black;'>".$row['type']."</td>
    //      <td style='border:1px solid black;'><img width='90px' height='60px' src='../images/".$row['image']."'</td>
    //      <td style='border:1px solid black;'>".$row['price']."</td>
    //      <td style='border:1px solid black;'>".$row['rating']."</td>
    //      </tr>";
    // // }
    // echo"</table>";

// }
// else{
    // echo"NO DATA ADDED";
// }
?>
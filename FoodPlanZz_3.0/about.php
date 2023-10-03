<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Page</title>
    <link rel="stylesheet" href="index_style.css" />
  </head>
  <body>
    <div class="cover">
      <div class="header">
        <a href="#">FOOD PLANZz</a>
        <ul>
          <a href="./show_cart.php"><li>Cart</li></a>
          <div class="Item_count"><li>
            <?php  
              session_start();  
              if(!isset($_SESSION['cartCount']))
              echo '0'; 
              else echo $_SESSION['cartCount'];
              ?>
          </li></div>
          <a href="./index.php"><li>Home</li></a>
          <a href=""><li>About</li></a>
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
        <h2 id="about">About US</h2>
      </div>
    </div>
    <div class="aboutdetail">
      <p style="font-size: 28px; font-weight: 400">ABOUT US</p>
      <p style="font-size: 28px; font-weight: 400; line-height: 42px">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, odit
        quisquam esse ea atque voluptatibus recusandae ullam consectetur nulla
        exercitationem, saepe enim minima! Sequi voluptatem consequuntur
        voluptate hic ratione, similique voluptatibus ad, minima sunt reiciendis
        fuga. Maiores molestiae, odio quas corporis veniam sapiente impedit
        expedita vero blanditiis, hic quia? Error cum quo enim, quam, id illo
        reprehenderit voluptatibus vitae perferendis iusto beatae atque repellat
        dolor! Nihil quaerat neque labore error quas aspernatur veritatis
        numquam consectetur ex ea, sapiente voluptate itaque impedit minima
        doloremque at saepe nesciunt qui officiis, praesentium obcaecati eum
        culpa commodi dolore? Reprehenderit vero possimus quo hic repellat.
      </p>
      <br />
      <br />
      <p
        style="
          font-size: 28px;
          line-height: 34px;
          font-weight: 500;
          text-align: left;
        ">
        Where does it come from?
      </p>
      <br />
      <p style="font-weight: 400; font-size: 16px; line-height: 24px">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga atque
        harum dicta quos a, id cum totam laudantium sequi quasi. Nesciunt libero
        reiciendis dolore iure ea earum voluptatibus iusto quas non vel sunt
        eveniet, dolor eum, suscipit animi! Maxime porro atque doloremque
        inventore recusandae quas beatae laboriosam, dolores magnam natus
        labore. Accusamus natus suscipit excepturi. Minus repellendus eligendi
        maxime ex, earum aliquam est temporibus voluptatibus quia. Consectetur
        sapiente incidunt praesentium.
      </p>
    </div>
  </body>
</html>

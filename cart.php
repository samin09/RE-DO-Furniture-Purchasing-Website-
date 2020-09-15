<?php
    session_start();
$dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$totalprice=0;
?>

<html>
    <head>
        <title>
            Re do
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body style="margin: 0px;padding: 0px;" >
        <div id="header">
            
            <a href="home.php" > 
                    <div id="name">
                        RE Do
                </div>
            </a>
            
        </div>
        
            
        <div id="main">
            <div id="leftbar">
                <a href="home.php" class="holder">Home</a>
                <a href="shop.php" class="holder">Shop</a>
                <a href="cart.php"style="background-color: black;color: white;border: 2px solid white;" class="holder">Cart</a>
                <a href="new.php" class="holder">New Today</a>
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo "<a href='logout.php'>Log Out</a>";
                    }
                ?>  
            </div>
            <div id="rightmain">
                <?php
                $username=$_SESSION["username"];
                $sql="select * from cart where username='".$username."';";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_array($result))
                    {
                        $totalprice=$totalprice+$row['price'];
                        ?>
                
                    <div class="cartbox">
                    <img src="<?php echo $row['name'] ?>" class="cartimage" name="name">
                    <p name="product"><?php echo $row['product'] ?></p>
                    <p name="price">Price: <?php echo $row['price'] ?>/=</p>
                        <input type="text" style="display:none;" name="name" value="<?php echo $row['name'] ?>" >
                    <input type="text" style="display:none;" name="product" value="<?php echo $row['product'] ?>" >
                    <input type="text" style="display:none;" name="price" value="<?php echo $row['price'] ?>" >
                </div>
          
                <?php
                    }
                    ?>
                
                <div id="calc">
                    <p>Total Price: <?php echo $totalprice; ?>/=</p>
                
                </div>
                
                <form class="last" action="clear.php">
                    <input type="submit" value="Clear Cart">
                </form>
                <form class="last" action="buy.php">
                    <input type="submit" value="Buy those items">
                </form>
                <?php
                }
                
                ?>
                
                
                
            </div>
        </div>
            
        
        <div id="footer">
            <p style="text-align: center;">CONTACT US: 01774810974</p>
            <p style="text-align: center;">Mail us: redo@gmail.com</p>
            <p style="text-align: center;">© 2019 REDo.com | All Rights Reserved.  </p>
        </div>
        
        
    </body>
</html>















<?php
    session_start();
$dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
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
                <a href="cart.php" class="holder">Cart</a>
                <a href="new.php" class="holder">New Today</a>
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo "<a href='logout.php'>Log Out</a>";
                    }
                ?>  
            </div>
            <div id="rightmain">
                <div id="shop">
                    <a href="office.php" class="holder">Office</a>
                    <a href="bedroom.php" class="holder">Bedroom</a>
                    <a href="drawing.php"style="background-color: black;color: white;border: 2px solid white;" class="holder">Drawing</a>
                    <a href="dining.php" class="holder">Dining</a>
                </div>
                <?php
                $sql="select * from items where catagory='drawing';";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_array($result))
                    {
                        ?>
                <form action="addcart.php" method="post">
                    <div class="box">
                    <img src="<?php echo $row['name'] ?>" class="boximage" name="name">
                    <p name="product"><?php echo $row['product'] ?></p>
                    <p name="price">Price: <?php echo $row['price'] ?>/=</p>
                        <input type="text" style="display:none;" name="name" value="<?php echo $row['name'] ?>" >
                    <input type="text" style="display:none;" name="product" value="<?php echo $row['product'] ?>" >
                    <input type="text" style="display:none;" name="price" value="<?php echo $row['price'] ?>" >
                        
                    <center>
                        
                        <button type="submit">Add to Cart</button>
                        
                    </center>
                </div>
                </form>    
                <?php
                    }
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















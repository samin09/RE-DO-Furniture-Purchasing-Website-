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
            <?php
                    if(isset($_SESSION['username']))
                    {
                      
                    }
                    
            else {
                    echo "<div id='login' name='login'>
                <form method='post' action='#'>
                    <input type='text' name='username' placeholder='username'>
                    <input type='password' name='password' placeholder='password'>
                    <input type='submit' value='LogIn' name='submit'>
                    <p><a href='registration.php'>Not a member? join here</a></p>
                </form>
            </div>";
                }
            ?>
        </div>
        
            
        <div id="main">
            <div id="leftbar">
                <a href="home.php" style="background-color: black;color: white;border: 2px solid white;"
                class="holder">Home</a>
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
                
                <img name="cover" class="cover">             
                
                <?php
                $sql="select * from items;";
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



<script>
    
    
    var i=0;
    var images=[];
    images[0]='images/1.jpg';
    images[1]='images/2.jpg';
    images[2]='images/3.jpg';
    images[3]='images/4.jpg';
    
    function change(){
        document.cover.src=images[i%3];
        i++;    
    }
    setInterval(change,1500);
    window.onload=change;
    
    
</script>


<?php

        $username=$_POST['username'];
        $pass=$_POST['password'];
        
        $dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$sql="select * from userregister where username='".$username."'AND password='".$pass."';";

$result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1)
        {
            $_SESSION["username"]=$username;
            header("location:home.php");
            
        }
    else 
        {
            header("location:home.php");
        }
?>
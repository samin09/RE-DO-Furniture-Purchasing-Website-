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
        <div id="register">
            <div id="info">
                <h1>Register Here</h1>
                <form method="post" target="" action="#">
                    <p>User name</p>
                    <input type="text" name="username" placeholder="">
                    <p>Password</p>
                    <input type="password"
                    placeholder="" name="pass">
                    <p>Confirm Password</p>
                    <input type="password"
                    placeholder="" name="passconfirm">
                    <p><button name="submit" type="submit">Sign UP</button></p>
                </form>
            </div>
        </div>
        
            
        <div id="footer">
            <p style="text-align: center;">CONTACT US: 01774810974</p>
            <p style="text-align: center;">Mail us: redo@gmail.com</p>
            <p style="text-align: center;">© 2019 REDo.com | All Rights Reserved.  </p>
        </div>
            
    </body>
</html>





<?php
    if($_POST)
    {
        $username=$_POST['username'];
        $pass=$_POST['pass'];
        $passconfirm=$_POST['passconfirm'];
        
        
        $dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";
        
        if($username=="") 
        {
            echo "<script type='text/javascript'> alert('Username not set')</script>";
        }
        else if($pass=="") 
        {
            echo "<script type='text/javascript'> alert('Password not set')</script>";
        }
        else if($passconfirm=="") 
        {
            echo "<script type='text/javascript'> alert('Confirm Password not set')</script>";
        }
        else if($passconfirm!=$pass) 
        {
            echo "<script type='text/javascript'> alert('pass not matched')</script>";
        }
        else
        {

            $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

            $sql="insert into userregister(username,password)
            values('$username','$pass')";
            if(mysqli_query($conn,$sql))
            {
                header("location:home.php");
            }
            else
            {
                    echo "<script type='text/javascript'> alert('username taken, try another')</script>";
            }
       
        }
    
    
    }


?>










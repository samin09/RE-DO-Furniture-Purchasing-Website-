


<?php
    session_start();

        $dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";


    
    $username=$_SESSION["username"]; 
echo $username;

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$sql="delete from cart where username='$username'";
$result=mysqli_query($conn,$sql);

            header("location:home.php");
            

?>


























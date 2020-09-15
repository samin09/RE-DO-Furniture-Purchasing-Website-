<?php
    session_start();

        $dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="redo";


    $name=$_POST['name'];
    $price=$_POST['price'];
    $product=$_POST['product'];
    $username=$_SESSION["username"]; //using session

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$sql="insert into cart(name,product,price,username) values('$name','$product',$price,'$username')";
            if(mysqli_query($conn,$sql))
            {
                header("location:shop.php");
            }

?>
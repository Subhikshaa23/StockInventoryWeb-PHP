<?php
include 'dbcon.php';

if(isset($_POST['add_stock']))
{
    // echo "pressed";

    $pname = $_POST['pname'];
    $qty= $_POST['qty'];
    $price = $_POST['price'];


    if($pname == "" || empty($pname)){
        header('location:index.php?message=Enter product name');
    }

    else{
        $query = "INSERT INTO stock(Product_name, Quantity, Price) VALUES('$pname', '$qty','$price')";
        $result = mysqli_query($connection, $query);


        if(!$result)
        {
            die("Connection failed");
        }
        else
        {
            header('location:index.php?insert_message=Product added successfully');
        }
    }

}

?>
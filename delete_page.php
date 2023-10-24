<?php include('dbcon.php'); ?>


<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $query = "DELETE FROM stock WHERE Id = $id";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed");
        }
        else{
            header('location:index.php?delete_message=Product deleted successfully');
        }
    }
?>




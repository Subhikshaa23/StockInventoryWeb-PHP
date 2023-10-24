<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
//Fetching previous saved data into textboxes

    if(isset($_GET['id'])) 
    {
        $id = $_GET['id'];
                
        $query = "SELECT * FROM stock WHERE Id = $id";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed");
        }
        else
        {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
        }
    }
?>

<?php
//Updating changes to database

    if(isset($_POST['update_stock'])) 
    {

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }

        $pname = $_POST['pname'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
    
        $query = "UPDATE stock SET Product_name = '$pname', Quantity = '$qty', Price = '$price' WHERE Id=$idnew";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed");
        }
        else {
            header('location:index.php?update_message=Product details updated successfully');
        }
    }

?>

<form Action ="update_page.php?id_new=<?php echo $id; ?>" method = "post">
    <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" name="pname" class="form-control" value = <?php echo $row ['Product_name']?> >
    </div> 
            
    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="number" name="qty" class="form-control" value = <?php echo $row['Quantity']?>>
    </div> 

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" value = <?php echo $row['Price']?>>
    </div> 
        
    <input  type="submit" class="btn btn-success" name="update_stock" value ="UPDATE">

</form>


<?php include('footer.php'); ?>
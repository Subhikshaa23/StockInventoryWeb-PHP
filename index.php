<?php include('header.php');?>
<?php include('dbcon.php');?>

<div class="box1">
        <h3>AVAILABLE STOCK</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD</button>
</div>


<table class="table table-hover table-bordered table-stripped">
    <thead>
        <tr>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>ACTIONS</th>
            <!-- <th>Delete</th> -->
        </tr>
    </thead>

    <tbody>
        <?php
            
            $query = "SELECT * FROM stock";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                // die("Query failed".mysqli_error());
                die("Query failed");
            }
            else
            {
                // print_r($result);
                while($row = mysqli_fetch_assoc($result))
                {
        ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Product_name']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['Price']; ?></td>
                        <td> 
                            <a href="update_page.php?id=<?php echo $row['Id']; ?>" class="btn btn-success">Update</a>
                            <a href="delete_page.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>   
        
                    <?php
                }
            }
        ?>

    </tbody>
</table>


<?php 
// For displaying confirmation messages 
    // if(isset($_GET['message'])) {
    //     echo "<h6>".$_GET['message']."</h6>";
    // }

    // if(isset($_GET['insert_message'])) {
    //     echo "<h6>".$_GET['insert_message']."</h6>";
    // }

    // if(isset($_GET['update_message'])) {
    //     echo "<h6>".$_GET['update_message']."</h6>";
    // }

    // if(isset($_GET['delete_message'])) {
    //     echo "<h6>".$_GET['delete_message']."</h6>";
    // }
?> 


<!-- Modal -->
<form action="insert_page.php" method ="post">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                    <label for="pname">Product Name</label>
                    <input type="text" name="pname" class="form-control">
                    </div> 
                    
                    <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" name="qty" class="form-control">
                    </div> 

                    <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control">
                </div> 
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input  type="submit" class="btn btn-primary" name="add_stock" value ="Add">
                </div>

            </div>
        </div>
    </div>
</form>

<?php include('footer.php');?>
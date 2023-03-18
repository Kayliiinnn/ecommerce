<html>
<?php include_once "dblecture_conn.php";

if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $delete=mysqli_query($conn, "DELETE FROM `products` WHERE `item_id`='$id'");
}

$select="SELECT * FROM products";
$query=mysqli_query($conn, $select);

?>

<head>
	<meta charset="UTF-8">
	<title>MIDTERM EXAM</title>
	<link rel="stylesheet"
href="css/bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>


<body>

	<div class="container">
        <div class="row">
            <div class="col-3">
				<br>
                <h3>New Record</h3>
                
                <?php
                     if(isset($_GET['new_record'])){
                            switch($_GET['new_record']){
                                case "added": echo "<div class='alert alert-success'>Product Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Product Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                
	
				<form action="newrecord.php" method="post">

                    <div class="mb-3">
                        <label for="new_item_name" class="form-label">Item Name</label>
                        <input type="text" id="new_item_name" required name="new_item_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="new_item_price" class="form-label">Item Price</label>
                        <input type="number" required id="new_item_price" name="new_item_price" class="form-control">
                    </div>
                   
                    <input type="submit" class="btn btn-primary">

                </form>
			</div>

	<div class="card-body">
		<div class="table-responsive">
		
		<br>
		<h3>Update Record</h3>
                <?php
                  $productlist = query($conn, "SELECT item_id, item_name, item_price FROM products");
                 
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>Product Updated.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Product Failed to be updated.</div>";
                                      break;
                                        
                            }
                       }
					?>
                  </hr>


				<table class="table table-bordered">
				<thead>
					<tr>
  				<th scope="col">Item ID</th>
  				<th scope="col">Item Name</th>
  				<th scope="col">Item Price</th>
  				<th scope="col">Status</th>
  				<th scope="col">Date Added</th>
  				<th scope="col">Action</th>
  				<th scope="col"></th>
  					</tr>
  				</thead>
  				<?php 
  					require ('dblecture_conn.php');
  					
  					$sql = "SELECT item_id, item_name, item_price, item_status, date_added FROM products";
		$result = $conn-> query($sql);

		
			while($row = $result-> fetch_assoc()){



  				 ?>
  				 <tr>
  				 	
  				 	<td><?php echo $row['item_id']; ?></td>
  				 	<td><?php echo $row['item_name']; ?></td>
  				 	<td><?php echo $row['item_price']; ?></td>
  				 	<td><?php echo $row['item_status']; ?></td>
  				 	<td><?php echo $row['date_added']; ?></td>
  				 	<td><a href='submit.php'><button type="button" class="btn btn-success">Update</button></a></td>
  					<td> <a href='delete.php'><button type="button"  class="btn btn-danger">Delete</button></a></td>

  				 </tr>
  				<?php } ?>
  				<tbody>
  					
  				</tbody>

			</table>

		</div>

	</div>
	</body>
	<script src="js/bootstrap"></script>
	</html>
<?php
include('database-connection.php');
session_start();


 $color ="";
if(isset($_GET['userid'])) {
	
	$id = $_GET['userid'];
	$name = $_SESSION["Name"];
	
	
	$sql = "SELECT * FROM vender WHERE username='$name'";
          $result = mysqli_query($conn, $sql);
		    	if ($result->num_rows == 1) {
				$get = mysqli_fetch_assoc($result);
			    	
					$n_name = $get['id'];
                  //   $_SESSION["id"] = $get['id'];
				}
			else
			{
				echo " Data not find ";
			}
	
	}

   if(isset($_POST['update'])){
	   
	   $i_id = $_POST['id'];
	  $p_name = $_POST['name'];
	  $p_quantity = $_POST['quantity'];
	   
	   $sql = "INSERT INTO chekouts(itemid,userid,itemquantity)
                     VALUES ('$i_id','$p_name','$p_quantity')";
                 if (mysqli_query($conn, $sql)) {
                       		 echo "New record created successfully !";
                		header("location: Mainscreen.php");
	                      		  exit();
	           } 
	              else {
	                    	echo "Error: " . $sql . "
                            " . mysqli_error($conn);
	 }	
}

	?>
	
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add user cart </title>
	<link rel="stylesheet" href="editProduct.css">
	
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="addProductstyle.css">
	

</head>

<body>

 <h1> Add To Cart </h1>

<div class="customDiv" > 
	
	<form method="post" action='Addusercart.php?userid='<?php $id ?>  enctype="multipart/form-data">
					
									
													
									<div class="input-container">
									<input type="hidden" name="id" value="<?php echo $id ; ?>">
										<label for="user" class="label">Prosuct id </label>
										<input id="suser" type="text" class="input-field" placeholder="Product id" name="id" value=" <?php echo $id;  ?>">
									</div>
										
									<div class="input-container">
										<label for="pass" class="label"> User id  </label>
										<input id="upass" type="text" class="input-field" data-type="text" placeholder="Userid" name="name" value="<?php echo $n_name;  ?>">
									</div>
								  
                                    <div class="input-container">
										<label for="pass" class="label"> Quantity  </label>
										<input id="upass" type="text" value="1" class="input-field" data-type="text" placeholder="Quantity" name="quantity" >
									</div>
                                     
									<div class="input-container">
										<button type="submit" class="btn btn-info"  value="Update" name="update"> Add Cart    </button>
								 </div>
                                   
                                      </div>
									       
							</form>
	               	</div>
                    </body>
</html>
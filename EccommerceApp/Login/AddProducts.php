<?php
session_start();
error_reporting(0);
?>
<?php
$msg = "";
include( 'database-connection.php' );


            
				if ( isset( $_POST[ 'AddProduct' ] ) ) {

	$ProductName = $_POST[ 'name' ];
	$ProductQuantity = $_POST[ 'Quantity' ];
	$colorid = $_POST[ 'colorid' ];
	$psize = $_POST[ 'psize' ];
	$price = $_POST[ 'price' ];
	$category = $_POST[ 'category' ];
    $venderid = $_SESSION["id"];
	
					$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "Productimages/".$filename;
					
					$sql = "INSERT INTO products(venderid,name,image, Quantity , colore ,size ,price ,category )
    VALUES ('$venderid','$ProductName','$filename','$ProductQuantity','$colorid','$psize','$price','$category')";
			
         if (move_uploaded_file($tempname, $folder)) {
			
			$msg = "Image uploaded successfully";
			
		}else{
			$msg = "Failed to upload image";
	}
					
	if (mysqli_query($conn, $sql)) {
		 echo "New record created successfully !";
		header("location: Products.php");
			  exit();
	 } 
	else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
					
					
					
}
                       
?>






<!DOCTYPE html>
<html>
<head>
<title> Add Products </title>

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

 <h1 > Add products </h1>
 
<div class="customDiv" > 
     		 	 	<form method="post"  enctype="multipart/form-data" >     
			           
                           <div class="input-container">
                                <input type="file" name="uploadfile" value=""/>  
	                     	</div>
                                 <div class="input-container">
                            <i class="fa fa-user icon"></i>
									<input class="input-field" type="text"  placeholder="Enter Product Name" name="name">
									</div>
									
									 <div class="input-container">
                                        <i class="fa fa-envelope icon"></i>
                                          <input class="input-field" type="text" placeholder="Quantity" name="Quantity">
							
									 </div>	
									
                                        <div class="input-container">
                                        <i class="fa fa-price icon"></i>
                                          <input class="input-field" type="text" placeholder="Price" name="price">
							
									 </div>	
								 
                                   <div class="form-group">
                                    <label for="sel1">Select Category:</label>
                                      <select class="form-control" id="sel1" name="category">
                                    
                                    <option value="Tea shirt">Tea shirt</option>
                                      <option value="pent">pent</option>
                                        <option value="shirts">shirts</option>
                                          <option value="other">other</option>
                                     </select>
                                      </div>
                                   
                                     <div class="form-group">
                                    <label for="sel1">Select Color:</label>
                                      <select class="form-control" id="sel1" name="colorid">
                                    <?php 
                                        $sql = "SELECT * FROM colore  ";
                                             $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result))
                      		{ ?>
                      			<option value="<?php echo($row['id']) ?>"><?php echo($row['colorename']) ?></option>
      					   <?php  } ?> 
                                  
                                       </select>
                                      </div>
								 
									 <div class="form-group">
                                    <label for="sel1">Select Size:</label>
                                      <select class="form-control" id="sel1" name="psize">
                                         <?php 
                                       $sql = "SELECT * FROM size  ";
                                             $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result))
                      		{ ?>
                      		<option value="<?php echo($row['id']) ?>"><?php echo($row['lenght']."-".$row['width']) ?></option>
      					<?php  } ?>     
                               </select>
                                      </div>
                              
                               	  	 <div class="input-container">
										<button type="submit" class="btn btn-info"  value="Sign Up" name="AddProduct"> Add Product    </button>
								 </div>
								 
									 </div>
							
			 		</form>	
			 </div>
		</div>

</body>


</html>
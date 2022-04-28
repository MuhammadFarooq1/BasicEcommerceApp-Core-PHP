<?php
include( 'database-connection.php' );

	if ( isset( $_POST[ 'AddProduct' ] ) ) {
	     
		$id = $_REQUEST['id'];
              $colorename = $_REQUEST['colorename'];
                    $sql = "INSERT INTO colore( colorename)
                        VALUES ('$colorename')";
		
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
 
 <link rel="stylesheet" href="addProductColorstyle.css">
  

</head>


<body>

 <h1 > Add New Color </h1>
<div class="customDiv" >
     		 	 	<form method="post"  enctype="multipart/form-data" >
     		 	 		  <div class="input-container">
     		 	 		  <label for="favcolor">Select your favorite color: <br> </label>
                                    <input type="color" id="favcolor" name="colorename" value="#ff0000">
     		 	 		  </div>
     		 	 		 
     		 	 		 
     		 	 		 <div class="input-container">
										<button type="submit" class="btn btn-info"  value="new color" name="AddProduct"> Add New Color   </button>
								 </div>
     		 	 	</form>     
		
  
    </div>
   
</body>


</html>
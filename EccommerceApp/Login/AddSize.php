<?php
include( 'database-connection.php' );

 
				if (isset( $_POST['AddSize'] ) ) {

              $id = $_REQUEST['id'];
              $lenght = $_REQUEST['lenght'];
              $width = $_REQUEST['width'];

         $sql = "INSERT INTO size( lenght, width)
                     VALUES ('$lenght','$width')";
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

  <link rel="stylesheet" href="addProductSizestyle.css">
  

</head>


<body>

 <h1 > Add products New Size </h1>

  <div class="customDiv" >
    		 	 	
     		 	 	<form method="post"  enctype="multipart/form-data" >
    		 	 		     
     		 	 		     <div class="input-container">
                            <i class="fa fa-user icon"></i>
									<input class="input-field" type="text"  placeholder="Enter Product Lenght" name="lenght">
									</div>
    		 	 		
									 <div class="input-container">
                                        <i class="fa fa-envelope icon"></i>
                                          <input class="input-field" type="text" placeholder="Enter Width " name="width">
     		 	 		
     		 	 		</div>
     		 	 		 <div class="input-container">
										<button type="submit" class="btn btn-info"  value="Sign Up" name="AddSize"> Add New Size    </button>
								 </div>
     		 	 	</form>     
		
  
    </div>
</body>


</html>
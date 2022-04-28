<?php

include( 'database-connection.php' );


$v_username ="";

if ( isset( $_POST[ 'signup' ] ) ) {

	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];
	$email = $_POST[ 'email' ];
	
	if (empty($username)) {
  
		
		echo " username cant be empty <br>";
}
	elseif (empty($password)) {
  
		
		echo "password cant be empty <br>";
}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "email cant be empty <br>";
}
	else{
	$sql = "INSERT INTO vender (username,password, email)
    VALUES ('$username','$password ','$email')";
  
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
}

   

?>





<!DOCTYPE html>
<html>
<head>
<title> Sign Up  </title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<link href="SignUpstyle.css" rel="stylesheet">
</head>


<body>
<div class="container">
	
	<div class="row">
		<div class="col-sm-12 col-md-offset-4"  >
		
        <div class="customDiv" > 
         <img src="Signup.jpg" class="img-circle " alt="product"   >  
         <h1> Wellcome  </h1>
			<p class="para"> Sign UP by entering the information below</p>
			
			 	<form method="post"  enctype="multipart/form-data" </for>
		         
			         <div class="input-container">
                            <i class="fa fa-user icon"></i>
									<input class="input-field" type="text" <?php echo $v_username  ?> placeholder="Create your username" name="username">
									</div>
									
									 <div class="input-container">
                                        <i class="fa fa-envelope icon"></i>
                                          <input class="input-field" type="text" placeholder="Email" name="email">
									 </div>
									 
									<div class="input-container">
                                        <i class="fa fa-key icon"></i>
                                         <input class="input-field" type="password" placeholder="Create Your Password" name="password">
                                          </div>
                                      
										<p> Sign Up By clicking  </p>
										<button type="submit" class="btn1 btn-info"  value="Sign Up" name="signup"> Sign Up    </button>
									
			 		</form>	
			 </div>
		</div>
		
		
		
	</div>
	
	
</div>



</body>


</html>
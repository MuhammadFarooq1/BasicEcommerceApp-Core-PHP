
<?php
include( 'database-connection.php' );

session_start();

 if(isset($_SESSION["id"])){
 
	 header('location: Mainscreen.php');	
	 exit(); 
  }
else{


if ( isset( $_POST[ 'signup' ] ) ) {
	
	 header("location: SignUp.php");
			  exit();
}
   if ( isset( $_POST[ 'SignIn' ] ) ) {

	   
	   
	$username = $_POST[ 'username' ];
	$password = $_POST[ 'password' ];
   
	header("location: indext.php");
			          exit();
	   
	   	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
	   $result = mysqli_query($conn, $sql);
		    	if ($result->num_rows == 1) {
				$get = mysqli_fetch_assoc($result);
			
	        
					echo   $userid = $get['roll'];
					if($userid == "Vender")
					{
						$_SESSION["Name"] = $get['username'];
                      $_SESSION["email"] = $get['email'];
						$_SESSION["id"] = $get['id'];
						header("location: Products.php");
			          exit();
					}
					elseif($userid== "user")
					{
						 $_SESSION["id"] = $get['id'];
						$_SESSION["Name"] = $get['username'];
                      $_SESSION["email"] = $get['email'];
			             	 header("location: Products.php");
			                   exit();
					}
					else{
						echo "please enter Correct data";
					}
	   
				}
	  /* 
	   if($category == "Vender"){
			$sql = "SELECT * FROM vender WHERE username='$username' AND password='$password' ";
          $result = mysqli_query($conn, $sql);
		    	if ($result->num_rows == 1) {
				$get = mysqli_fetch_assoc($result);
			    	
					$_SESSION["Name"] = $get['username'];
                     $_SESSION["email"] = $get['email'];
                    $_SESSION["id"] = $get['id'];
					
					
			//echo	 $userid = $get['id'];
					
			     	 header("location: Products.php");
			          exit();
					}
					
			}
	         elseif($category == "User")
					{
			$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
                if($result = mysqli_query($conn, $sql)){
		    //	if ($result->num_rows == 1) {
			//	$get = mysqli_fetch_assoc($result);
			    	
				//	$_SESSION["Name"] = $get['username'];
                 //    $_SESSION["email"] = $get['email'];
                  $_SESSION["U_id"] = $get['id'];
						header("location: Mainscreen.php");
			          exit();
	}	
 	}
	   else
			{
				echo " User name and Password not valid ";
			}*/
   }
?>
<!DOCTYPE html>
<html>
<head>
<title> Products </title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<link href="indexstyle.css" rel="stylesheet">
</head>


<body>

<div class="container">
	
	<div class="row">
		<div class="col-sm-12 col-md-offset-4"  >
		
        <div class="customDiv" > 
         <img src="product.jpg" class="img-circle " alt="product"   >  
         <h1> Wellcome  </h1>
			<p class="para"> Sign in by entering the information below</p>
			
			 	<form method="post"  enctype="multipart/form-data">
			         <div class="input-container">
                            <i class="fa fa-user icon"></i>
									<input class="input-field" type="text"  placeholder="Enter your username" name="username">
									</div>
									<div class="input-container">
                                        <i class="fa fa-key icon"></i>
                                         <input class="input-field" type="password" placeholder="Password" name="password">
                                          </div>
                                          
                                         <div class="group">
                                             <button type="submit" class="btn btn-danger"> Forget    </button>
                                      </div>
                                              <div class="group">
										<button  type="submit" class="button" value="Sign In" name="SignIn"> Sign In  </button>
										</div>
								
										<p> Don't have an account </p>
										<button type="submit" class="btn1 btn-info" value="Sign up" name="signup"> Sign Up    </button>
									
			 		</form>	
			 </div>
		</div>
		
		
		
	</div>
	
	
</div>

</body>


</html>
<?php }?>
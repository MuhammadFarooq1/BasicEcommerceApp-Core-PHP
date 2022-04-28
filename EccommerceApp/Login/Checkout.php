<?php
include('database-connection.php');
 session_start();
 $totalprice = '0';

if(!isset($_SESSION["id"])){
  
	header('location: Mainscreen.php');	
	 exit();
  }

else
{
	
if(isset($_GET['p_price'])) {
	
	$Price = $_GET['p_price'];
	  
	$name  = $_SESSION["Name"];
	
	$sql  = "SELECT * FROM users WHERE username='$name'";
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



    if(isset($_POST['btnsave']))
	{
	 $firstname = $_POST['firstname'];
	 $email = $_POST['email'];
	 $address = $_POST['address'];
	 $city = $_POST['city'];
	 $state = $_POST['state'];
	 $zip = $_POST['zip'];
	 $cardname = $_POST['cardname'];
	 $cardnumber = $_POST['cardnumber'];
	 $expmonth = $_POST['expmonth'];
	 $expyear = $_POST['expyear'];
	 $cvv = $_POST['cvv'];
	
	
		$name = $_SESSION["Name"];
	
	$sql = "SELECT * FROM users WHERE username='$name'";
          $uid_result = mysqli_query($conn, $sql);
		    	//if ($result->num_rows == 1) {
				while ( $get  = $uid_result->fetch_assoc() ){
					// $get = mysqli_fetch_assoc($result);
			    	
					$n_name = $get['id'];
				   // $_SESSION["id"] = $get['id'];
				
			/*else
			{
				echo " Data not find in users ";
			}*/	
				
							
			$pid_sql = "SELECT * FROM chekouts ";
                    $pid_result = mysqli_query($conn, $pid_sql);
		    	while ( $p_itemidget  = $pid_result->fetch_assoc() ){
								
			    $p_itemid = $p_itemidget['itemid'];
			    $p_itemquantity = $p_itemidget['itemquantity'];
                  //   $_SESSION["id"] = $get['id'];
				
							
							
							
							
								
			$sql = "SELECT * FROM products WHERE id=$p_itemid ";

			$result = $conn->query( $sql );
			while ( $row = $result->fetch_assoc() ){
                  $p_price = $row['price'] ; 
                  $p_itemid = $row['id'] ; 
		           $date = date("Y-m-d");
    	 	$totalprice = $p_itemquantity * $p_price;
				
			
			$sql ="INSERT INTO product_detail(userid,itemid,Quantity,itemprice,totalprice,date)
		     VALUES('$n_name','$p_itemid','$p_itemquantity','$p_price','$totalprice','$date')";
			   	if (mysqli_query($conn, $sql)) {
	    	     echo "New record created successfully !"; 
	                    } 
	else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
			}}} 
  /*   
	$sql = "INSERT INTO shipingdetail(userid,firstname,email,address,city,state,zip,cardname,cardnumber ,expmonth,expyear,cvv)
      VALUES('$n_name','$firstname','$email','$address','$city','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
			
        			
	if (mysqli_query($conn, $sql)) {
		 echo "New record created successfully !";
	//	header("location: Products.php");
	//		  exit();
	//	$sql = "INSERT INTO shipingdetail(userid,itemid,Quantity,itemprice,totalprice,date)
	//	 VALUES('$n_name','$firstname','$email','$address','$city','$state','$zip','$cardname','$cardnumber')";
    
		
	 } 
	else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }*/
  }

 


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="Checkout.css" rel="stylesheet">

</head>
<body>

<h2> Place Order </h2>
<p> By entering the detail place your order </p>
<div class="row">
  <div class="col-75">
    <div class="container">
       <form method="post"  enctype="multipart/form-data" >
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Please Enter Your Name ">
            
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="farooq@proglabs.com">
            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 Cream block 15th Street">
            
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Lahor ">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Pakistan">
              </div>
              <div class="col-50">
                <label for="zip"> Zip </label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder=" Prog Labs ">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2021">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" name="btnsave" class="btn" onclick="return confirm('Are you sure to place  order?');">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      
      <?php
				$name = $_SESSION["Name"];
	
	$sql = "SELECT * FROM users WHERE username='$name'";
          $uid_result = mysqli_query($conn, $sql);
		    	//if ($result->num_rows == 1) {
				while ( $get  = $uid_result->fetch_assoc() ){
					// $get = mysqli_fetch_assoc($result);
			    	
					$n_name = $get['id'];
				   // $_SESSION["id"] = $get['id'];
				
			/*else
			{
				echo " Data not find in users ";
			}*/	
				
							
			$pid_sql = "SELECT * FROM chekouts ";
                    $pid_result = mysqli_query($conn, $pid_sql);
		    	while ( $p_itemidget  = $pid_result->fetch_assoc() ){
								
			    $p_itemid = $p_itemidget['itemid'];
			    $p_itemquantity = $p_itemidget['itemquantity'];
                  //   $_SESSION["id"] = $get['id'];
				
							
							
							
							
								
			$sql = "SELECT * FROM products WHERE id=$p_itemid ";

			$result = $conn->query( $sql );
			while ( $row = $result->fetch_assoc() ){

				$colorid = $row[ 'colore' ];
				$psizeid = $row[ 'size' ];
				$pQuantity = $row[ 'Quantity' ];
				$p_price = $row['price'] ; 
				
				?>
      
      <p><a href="#"> <?php echo $row['name']; ?> </a> <span class="price"> <?php echo $row['price']; $totalprice += $row['price']; ?> </span></p>
      <?php }} }?>
      
     <!-- <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>-->
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo  $totalprice ;   ?> </b></span></p>
      
      
    </div>
  </div>
</div>

</body>
</html>
<?php } ?>
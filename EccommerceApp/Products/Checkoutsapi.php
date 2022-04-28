<?php

include( 'database-connection.php' );

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");




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



	  $name = $_REQUEST['name'];
	 
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
	 
		     $last_id = $conn->insert_id;
	             // echo $last_id;
	               $s_sql = "SELECT * FROM product_detail WHERE id='$last_id' ";
    
                  $r_result = mysqli_query($conn, $s_sql);
	          if ($r_result->num_rows == 1) {
	   
				$get = mysqli_fetch_assoc($r_result);
				  // set response code - 200 OK
            http_response_code(200);
	
	 print_r( json_encode(array("status" => true , "messege " => "success" , "data" => ($get) )));
	
		// echo "New record created successfully !";
   }
	else
			{			
              echo json_encode(
                        array("status"=>false , "message" => "No record found.") );			
			} 
}
else
			{
              echo json_encode(
                        array("status"=>false , "message" => "No record found.") );
			
			}
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
			
		}}}		

?>
<?php

include( 'database-connection.php' );

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
$id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $image = $_REQUEST['image'];
  $Quantity    = $_REQUEST['Quantity'];
 // $colore    = $_REQUEST['colore'];
  $size    = $_REQUEST['size'];
 


$r_sql = "SELECT colore.colorename
FROM colore 
INNER JOIN products ON colore.colorename = products.colore "  ;
 $r_result = mysqli_query($conn, $r_sql);
	
	          if ($r_result->num_rows > 1) {
	   
				$get = mysqli_fetch_assoc($r_result);
				  $colore = $get['colorename'];
				  echo($colore);
			  }
$sql = "UPDATE products SET name='$name', image='$image' ,Quantity='$Quantity', colore='$colore',size='$size' WHERE id=$id ";

//   $sql = "UPDATE products SET(name,image, Quantity , colore ,size ) 
  //          VALUES ('$name','$image','$Quantity','$colore','$size') WHERE id=$id  ";


 if (mysqli_query($conn, $sql)) {
	 
	  $s_sql = "SELECT * FROM products WHERE id=$id ";
              $r_result = mysqli_query($conn, $s_sql);

   if ($r_result->num_rows == 1) {
	   
				$get = mysqli_fetch_assoc($r_result);
	 
            http_response_code(200);
	 
	// print_r(json_encode(array( $get , "message" => "Your has been found Succesfully") )); 
	 print_r( json_encode(array('status' => true , "messege " => "success", "data" => ($get) )));
	
}
	 else
			{		
              echo json_encode(
                        array("status"=>false , "message" => "Not found.") );
			
			} 
 }    else
			{		
              echo json_encode(
                        array("status"=>false , "message" => "No record found.") );
			
			} 



?>




<?php

include( 'database-connection.php' );

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

 
   $id = $_REQUEST['id'];
   $colorename = $_REQUEST['colorename'];
   $tone = $_REQUEST['tone'];
 
$sql = "INSERT INTO colore( colorename, tone)
    VALUES ('$colorename','$tone')";
      
 if (mysqli_query($conn, $sql)) {
	 
	          $s_sql = "SELECT * FROM colore WHERE id='$id'";
         
	         $r_result = mysqli_query($conn, $s_sql);
	               
	   if ($r_result->num_rows == 1){
		          		$get = mysqli_fetch_assoc($r_result);
				 
                    http_response_code(200);
	                print_r( json_encode(array("status" => true , "messege " => "success" , "data" => ($get) )));
	
   }
	else
			{			
              echo json_encode(
                        array("status"=>false , "message" => "dont add ") );			
			} 
}
else
			{
              echo json_encode(
                        array("status"=>false , "message" => "No record found.") );
			
			}



?>
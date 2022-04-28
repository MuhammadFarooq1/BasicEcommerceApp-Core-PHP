<?php

include( 'database-connection.php' );

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

 $id = $_REQUEST['id'];

$sql = "SELECT * FROM colore WHERE id='$id' ";
            $result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
				$get = mysqli_fetch_assoc($result);
				
	// set response code - 200 OK
            http_response_code(200);
	 
	// print_r(json_encode(array( $get , "message" => "Your has been found Succesfully") )); 
	 print_r( json_encode(array('status' => true , "messege " => "success", "data" => ($get) )));
	
}
        else
			{		
              echo json_encode(
                        array("status"=>false , "message" => "No record found.") );
			
			} 


?>
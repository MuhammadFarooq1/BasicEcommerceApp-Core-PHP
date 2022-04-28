<?php
include('database-connection.php');

if($_GET['userid']){
	$id = $_GET['userid'];
	$sql = "DELETE  FROM products WHERE id=$id ";
	
	$qry = mysqli_query($conn, $sql);
	if($qry){
		echo("Record Deleted");
		die;
	}
	else{
		echo "Record not deleted";
	}
        $conn->query($sql);
	
	 $_SESSION['messege'] = "Record has been deleted!";
	 $_SESSION['msg_type'] = "danger";
	 header("Location: products.php");
          exit();
	
	
}
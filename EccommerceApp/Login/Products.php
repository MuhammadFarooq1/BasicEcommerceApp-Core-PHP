<?php
include( 'database-connection.php' );
session_start();

   $checckid = $_SESSION["id"];

  if($checckid != "Vender"){
 // if(!isset($_SESSION["id"])){
 
	 header( "location:Mainscreen.php" );
	exit();
  }

else{
	// session_destroy();
	 $name = $_SESSION["Name"];

if (
	isset( $_POST[ 'signup' ] ) ) {
	header( "location:AddProducts.php" );
	exit();
}

if ( isset( $_POST[ 'mainhome' ] ) )
{
	header( "location:Mainscreen.php" );
	exit();
}
if ( isset( $_POST[ 'color' ] ) ) 
{
	header( "location:AdColor.php" );
	exit();
}
if ( isset( $_POST[ 'size' ] ) )
{
	header( "location:AddSize.php" );
	exit();
}
	if ( isset( $_POST[ 'order-detail' ] ) ) 
	{
	header( "location:OrderDetail.php" );
	exit();
}
		if ( isset( $_POST[ 'Addvender' ] ) )
		{
	header( "location:Addvender.php" );
	exit();
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

	<link href="productstyle.css" rel="stylesheet">
</head>


<body>

	<h1 class="h1"> Well come to main screen </h1>
	<div class="customD">
		<form method="post" enctype="multipart/form-data" >

			<button type="submit" class="customDiv btn-info" value="main home" name="mainhome"> Go To home    </button>
			<button type="submit" class="customDiv btn-info" value="Add Product" name="signup"> Add Product    </button>
			<button type="submit" class="customDiv btn-info" value="color" name="color"> Add P_Color   </button>
			<button type="submit" class="customDiv btn-info" value="size" name="size">  Add P_Size   </button>
			<button type="submit" class="customDiv btn-info" value="Addvender" name="Addvender"> Add vender   </button>
			<button type="submit" class="customDiv btn-info" value="order-detail" name="order-detail">  Order Detail   </button>
		</form>
	</div>


	<?php



	?>
	<section> 
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th> Id </th>
					<th> VenderId </th>
					<th> Name </th>
					<th> Quantity </th>
					<th> size </th>
					<th> colore </th>
					<th> image </th>
				</tr>
			</thead>
			<?php
	$name = $_SESSION["Name"];
	
	$sql = "SELECT * FROM vender WHERE username='$name'";
          $uid_result = mysqli_query($conn, $sql);
		    	//if ($result->num_rows == 1) {
				while ( $get  = $uid_result->fetch_assoc() ){
					// $get = mysqli_fetch_assoc($result);
			    	
					$n_name = $get['id'];
				   // $_SESSION["id"] = $get['id'];
				
	
				}
			$sql = "SELECT * FROM products WHERE venderid=$n_name";

			 if($result = $conn->query( $sql )){
			while ( $row = $result->fetch_assoc() ){

				$colorid = $row[ 'colore' ];
				$psizeid = $row[ 'size' ];

				$sql = "SELECT * FROM colore where id='$colorid'  ";
				$c_result = mysqli_fetch_assoc(mysqli_query($conn, $sql)) ;
				
				$s_sql = "SELECT * FROM size where id='$psizeid'  ";
				$s_result = mysqli_fetch_assoc(mysqli_query($conn, $s_sql)) ;
			
			?>
			<tr>
				<td>
					<?php echo $row['id']; ?>
				</td>
				<td>
					<?php echo $row['venderid']; ?>
				</td>
				<td>
					<?php echo $row['name']; ?>
				</td>
				<td>
					<?php echo $row['Quantity']; ?>
				</td>
				<td>
					<?php echo $s_result['lenght']."-".$s_result['width']; ?>
				</td>
				<td>
					<?php echo $c_result['colorename']; ?>
				</td>
				<td>
					<?php echo $row['image']; ?>
				</td>
				<td>
						<form method="post" enctype="multipart/form-data">
                           	<a href="edit.php?userid=<?php echo($row['id']) ?>" class="btn btn-info">Edit</a>
                            <a href="delete.php?userid=<?php echo($row['id']) ?>" class="btn btn-danger"  onclick="return confirm('Are you sure you want to Delete?');">Delete</a>
                		</form>
				  </td>

			</tr>
			<?php }}
				 else{
					 echo  "NO record found";
				 }
			?>

		</table>

	</div>
</section>



</body>


</html>


<?php } ?>
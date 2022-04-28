<?php
include('database-connection.php');
 $color ="";
if(isset($_GET['userid'])) {
	$id = $_GET['userid'];
	
      $qry =   mysqli_query($conn, "SELECT *  FROM products WHERE id=$id ");
		
	if($qry)
	{
		$row = mysqli_fetch_array($qry);
		$p_name = $row['name'];
		$p_Quantity = $row['Quantity'];
	  $color = $row['colore'];
	  $psize = $row['size'];
	}
	else
	{
		echo " record not find ";
	}
		
	
	}

   if(isset($_POST['update'])){
	$id = $_GET['userid'];
	$p_name = $_POST['name'];
	$p_Quantity = $_POST['Quantity'];
	$colorid = $_POST[ 'colorid' ];
    	$psize = $_POST[ 'psize' ];
	   
	   
            $qry =   mysqli_query($conn, "UPDATE products SET name='$p_name' ,Quantity='$p_Quantity' , colore='$colorid'  , size='$psize'    WHERE id=$id ");
	   
	   if($qry){header("Location: Products.php?userid=".$id);
         exit();}
	   else{
		 
		echo "Record not update";
	}
	   
	
	
	
}

	?>
	
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tidi</title>
	<link rel="stylesheet" href="editProduct.css">
	
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="addProductstyle.css">
	

</head>

<body>

 <h1> Update Products </h1>

<div class="customDiv" > 
	
	<form method="post"   enctype="multipart/form-data">
							<div class="input-container">
									<input type="hidden" name="id" value="<?php echo $id ; ?>">
										<label for="user" class="label">Color</label>
										<input id="suser" type="text" class="input-field" placeholder="Create Color name" name="name" value="<?php echo $p_name;  ?>">
									</div>
									<div class="input-container">
										<label for="pass" class="label"> Quantity </label>
										<input id="upass" type="text" class="input-field" data-type="text" placeholder="Enter Quantity" name="Quantity" value="<?php echo $p_Quantity;  ?>">
									</div>
								   
                                   <div class="input-container">
                                    <label for="sel1">Select Color:</label>
                                      <select class="form-control"  id="sel1" name="colorid" >
                               <?php
										  
				$sql = "SELECT * FROM colore where id='$color'  ";
				$c_result = mysqli_fetch_assoc(mysqli_query($conn, $sql)) ;  
			
										  ?>
                                       <optgroup label = "Choose One">
                                       <option > <?php echo $c_result['colorename'];  ?> </option>
                                      <?php 
								       $s_sql = "SELECT * FROM colore  ";
                                             $result = mysqli_query($conn, $s_sql);
                                    while($row = $result->fetch_assoc())
                      		{ 
									  ?>
                     			
                      			<option value="  <?php echo($row['id']) ?>"><?php echo $row['colorename']; ?></option>
      					   <?php  }
										  ?> 
                                    </select>
                                      </div>
							         
								      
								       <div class="input-container">
                                    <label for="sel1">Select Size:</label>
                                      <select class="form-control" id="sel1" name="psize">
                                        
                                        <?php
										  $sql = "SELECT * FROM size where id='$psize'  ";
				$c_result = mysqli_fetch_assoc(mysqli_query($conn, $sql)) ;  
										  ?>
                                       <optgroup label = "Choose One">
                                         <option selected disabled> <?php echo $c_result['lenght']."-".$c_result['width'];  ?> </option>
                                         
                                         <?php 
                                       $sql = "SELECT * FROM size  ";
                                             $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result))
                      		{ ?>
                      		
                      		<option value="<?php echo($row['id']) ?>"><?php echo($row['lenght']."-".$row['width']) ?></option>
      					<?php  } ?>     
                               </select>
                                      </div>
								      
								       <div class="input-container">
										<button type="submit" class="btn btn-info"  value="Update" name="update"> Update    </button>
								 </div>
								 
								      
									      
								</form>
	
	</div>
</body>
	

</html>
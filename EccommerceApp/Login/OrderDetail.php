<?php
include( 'database-connection.php' );
session_start();
 $totalprice = '0';
?>

<!DOCTYPE html>
<html>
<head>
<title> Estore </title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
    
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>;

  
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<link href="mainscreen.css" rel="stylesheet">




</head>


<body>

<section class="menu" id="menu">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent"> <a class="navbar-brand font-weight-bold " href="#">Estore
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    
      <!--<div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>-->
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="#home">Home</a> </li>
          <li class="nav-item "> <a class="nav-link" href="#catagori">Catagori</a> </li>
          <li class="nav-item "> <a class="nav-link" href="#pages">Pages</a> </li>
          <li class="nav-item "> <a class="nav-link" href="#Contact">Contact</a> </li>       
          </ul>
      </div>
      
       <div class="collapse navbar-collapse ml-auto" >
         <div class="search-container">
            <form action="/action_page.php"> 
             <input class="searchbar" type="text" placeholder="Search.." name="search" >
                 <button type="submit" > <i class="fa fa-search"> </i> </button> 
                      </form>
                         </div>
            
           </div>
          <div class="shoping-cart">
          <a href="cart.html">
         	<i class="fas fa-heart">		
         	</i> </a></div>
         	<div class="shoping-cart">
          <a href="Add_cart.php">
         	<i class="fas fa-shopping-cart">		
         	</i> </a></div>
         	<a href="indext.php" class="btn1 btn btn-secondary">Sign In</a> 
  </nav>
  </div>
</section>

<?php
 
	 $venderid = $_SESSION["id"];
				$my_sql = "SELECT * FROM shipingdetail WHERE userid=$venderid  ";

			$my_result = $conn->query( $my_sql );
			while ( $my_row = $my_result->fetch_assoc() ){
							 
			 $t =	$my_row['userid'];
			
							?>

<section class="cart-area cartsection">
	<div class="mycart">
		<div class="cart-inner">
			<div class="cs table-responsive table-dark">
				<table class="table">
					<thead>
				    <tr >
      <th COLSPAN="2" >
         <h3><br> Order ID
         <div class="padding">
					<?php echo $my_row['id']; ?>
					</div>
				</td>
     </h3>
     
       </th>
       <th COLSPAN="2">
         <h3><br> Order Date
         <div class="padding">
					<?php echo $my_row['expmonth']; ?>
					</div>
				</td>
     </h3>
     
       </th>
       <th COLSPAN="2">
         <h3><br> User ID
         <div class="padding">
					<?php echo $my_row['userid']; ?>
					</div>
				</td>
     </h3>
     
       </th>
       
       </th>
       <th COLSPAN="2">
         <h3><br> User Adress
         <div class="padding">
					<?php echo $my_row['address']; ?>
					</div>
				</td>
     </h3>
     
       </th>
       
       <th COLSPAN="2">
         <h3><br> Shop Code
         <div class="padding">
					<?php echo $my_row['zip']; ?>
					</div>
				</td>
     </h3>
     
       </th>
       
        <th COLSPAN="2">
          <form method="post" enctype="multipart/form-data">
                          <!--	<button type="submit" class="btn btn-info" value="Accept" name="Accept"> Accept   </button>
                          	<button type="submit" class="btn btn-danger" value="Reject" name="Reject"> Reject   </button>-->
                        
                           	<a href="editoderdetail.php?userid=<?php echo($my_row['id']) ?>" class="btn btn-info"> Accept </a>
                            <a href="delete.php?userid=<?php echo($my_row['id']) ?>" class="btn btn-danger"  onclick="return confirm('Are you sure you want to Delete?');"> Reject </a>
                		</form>
     
       </th>
       
   </tr>
				  <tr>
					<th> Image </th>
					<th> Id </th>
					<th> ItemID </th>
					<th> Quantity </th>
					<th> P-Price </th>
					<th> Total-Price </th>
					<th> Date </th>
					
				</tr>  
					</thead>
					<tbody>
						<tr>
						 <form method="post"  enctype="multipart/form-data" >
						<?php
				$p_venderid = $_SESSION["id"];
				
					
								
			
				
				
				$pd_sql = "SELECT * FROM products WHERE venderid=$p_venderid ";

			//$pd_result = $conn->query( $pd_sql );
			//while ( $pd_row = $pd_result->fetch_assoc() ){
				
				if($pd_result = $conn->query( $pd_sql )){
			while ( $pd_row = $pd_result->fetch_assoc() ){
				  // echo $pd_row['image'];
				
				
				$sql = "SELECT * FROM product_detail WHERE userid=$p_venderid ";
                  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql)) ;
				
		//	$result = $conn->query( $sql );
		//	while ( $row = $result->fetch_assoc() ){
				
				 $user_id = $row[ 'userid' ];
				 $item_id = $row[ 'itemid' ];
							
							?>
				<td >
				 <div class="d-flex">	
                       <img class="img" src="image/<?php echo $pd_row['image'];?>" alt="xarrival">
                </div>
             	</td>
             	
				 <td >
				<div class="padding">
					<?php echo $row['id']; ?>
					</div>
				</td>
				 
				 
					 <td >
				<div class="padding">
					<?php echo $row['itemid']; ?>
					</div>
				</td>
					<td >
				<div class="padding">
					<?php echo $row['Quantity']; ?>
					</div>
				</td> 
					<td >
				<div class="padding">
					<?php echo $row['itemprice']; ?>
					</div>
				</td>
					<td >
				<div class="padding">
					<?php echo $row['totalprice']; ?>
					</div>
				</td>
				
				
				 
			
			 <td >
				<div class="padding">
					<?php echo $row['date']; ?>
					</div>
							 </td>
		
					
          </tr>
				<?php  }}?>
					
					
						</form>
							</tbody>
				</table>
			</div>
			
			
		</div>
	</div>
	 <?php } ?>
</section>
 

  <script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

</body>


</html>
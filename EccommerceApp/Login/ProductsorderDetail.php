<?php
include( 'database-connection.php' );
session_start();
 $grandtotal = '0';

?>

<!DOCTYPE html>
<html>
<head>
<title> Estore </title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
    
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">


<link href="mainscreen.css" rel="stylesheet">
</head>


<body>

<section class="menu" id="menu">
  <div class="container">
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


<section class="cart-area cartsection">
	<div class="container">
		<div class="cart-inner">
			<div class="cs table-responsive table-dark">
				<table class="table">
					<thead>
					  <tr>
					  	<th scope="col">userid</th>
					  	<th scope="col">itemid</th>
					  	<th scope="col">Quantity</th>
					  	<th scope="col">itemprice</th>
					  	<th scope="col">totalprice</th>
					  	<th scope="col">date</th>
					  	
					  	
					  </tr>  
					</thead>
					<tbody>
						<tr>
						 <form method="post"  enctype="multipart/form-data" >
				   
				<?php   $sql = "SELECT * FROM product_detail";

			$result = $conn->query( $sql );
			while ( $row = $result->fetch_assoc() ){

				$p_price = $row['totalprice'] ;
				
				
                 	?>
				   
				   
				
				<td >
				<div class="padding">
					<?php echo $row['userid']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $row['itemid']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $row['Quantity']; ?>
					</div>
				</td>
				
				
				<td>
				<div class="padding">
					<?php echo $row['itemprice']; ?>
					</div>
				</td>
				
				<td>
				<div class="padding">
					<?php echo $row['totalprice'];
				$grandtotal	+=$row['totalprice']; ?>
					</div>
				</td>
         
                <td>
				<div class="padding">
					<?php echo $row['date']; ?>
					</div>
				</td>
         
         
          </tr>
				<?php } ?>
					</tr>	
						
					  <tr >
					   <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					 
				          	  <td>
					            	<p class="carttotal">    Subtotal  </p>
					             	<p class="carttotal"><?php echo $grandtotal ?>   </p>
					          </td>
					  
					  </tr>
					  		
					  	</form>
							</tbody>
				</table>
			</div>
			
			
		</div>
	</div>
	
	
</section>


<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>


</html>
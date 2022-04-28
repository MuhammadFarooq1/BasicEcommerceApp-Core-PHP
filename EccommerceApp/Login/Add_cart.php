<?php
include( 'database-connection.php' );
session_start();
 $totalprice = '0';



if(!isset($_SESSION["id"])){
  
	header('location: Mainscreen.php');	
	 exit();
  }

else
{
	if(isset($_POST['Logout'])) {
    
	 session_destroy();
	
	 header('location: indext.php');	
	 exit();
}
	
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
<?php  
include( 'header.php' );
	
include( 'addheader.php');	
	
	
?>

<section class="cart-area cartsection">
	<div class="container">
		<div class="cart-inner">
			<div class="cs table-responsive table-dark">
				<table class="table">
					<thead>
					  <tr>
					  	<th scope="col">Image</th>
					  	<th scope="col">Name</th>
					  	<th scope="col">Quantity</th>
					  	<th scope="col">Category</th>
					  	<th scope="col">size</th>
					  	<th scope="col">Color</th>
					  	<th scope="col">Price</th>
					  	<th scope="col">Quantity</th>
					  	<th scope="col">Total price</th>
					  </tr>  
					</thead>
					<tbody>
						<tr>
						 <form method="post"  enctype="multipart/form-data" >
						<?php
				$venderid = $_SESSION["id"];

								
			$sql = "SELECT * FROM products WHERE venderid=$venderid ";

			$result = $conn->query( $sql );
			while ( $row = $result->fetch_assoc() ){

				$colorid = $row[ 'colore' ];
				$psizeid = $row[ 'size' ];
				$pQuantity = $row[ 'Quantity' ];
				
				
                 
				$pid_sql = "SELECT * FROM chekouts WHERE userid=$venderid ";
                    $pid_result = mysqli_query($conn, $pid_sql);
		    	$pid_result = mysqli_fetch_assoc(mysqli_query($conn, $pid_sql)) ;
								
			    $p_itemid = $pid_result['itemid'];
			    $p_itemquantity = $pid_result['itemquantity'];
                  //   $_SESSION["id"] = $get['id'];
				
				
				
				
				$sql = "SELECT * FROM colore where id='$colorid'";
				$c_result = mysqli_fetch_assoc(mysqli_query($conn, $sql)) ;
				
				$s_sql = "SELECT * FROM size where id='$psizeid'";
				$s_result = mysqli_fetch_assoc(mysqli_query($conn, $s_sql));
   
			
							?>
				<td >
				 <div class="d-flex">	
                           <img class="img" src="image/<?php echo $row['image'];?>" alt="xarrival">
                </div>
             	</td>
             	
				<td >
				<div class="padding">
					<?php echo $row['name']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $row['Quantity']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $row['category']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $s_result['lenght']."-".$s_result['width']; ?>
					</div>
				</td>
				<td>
				<div class="padding">
					<?php echo $c_result['colorename']; ?>
					</div>
				</td>
				
				<td class="pricerow">
				<div class="padding" id="qtyprice" >
					<?php echo $row['price']; ?>
					<?php  $totalprice += $row['price'] ;?>
					<?php  $p_price = $row['price'] ; ?>
					
					<input type="text" value="<?php echo $row['price'] ?>" hidden >
					
					</div>
				</td>
				
				<td>
				<div class="padding">
				 
					  <!--<label for="quantity"> Quantity (between 1 and You add on cart): </label>-->
                       <input type="number" id="quantity" class="quantity" onchange="function()" name="quantity"  value="<?php echo $p_itemquantity; ?>" min="1" max="<?php echo $pQuantity; ?>">
                       
					 
					</div>
				</td>
         
         
                <td class="subtotalRow">
                	<div class="padding" id="p_quantity">
                	
                	<?php  echo $p_itemquantity * $p_price ?>
                
                	<script>
                /*	$(document).ready(function(){
                       $("#quantity").click(function(){
						//  $("p_quantity").addClass("quantity");
						   var x = document.getElementById("quantity");
						   $("#p_quantity").text(x.value * <?php // echo $p_price ?>  );
						  });
                          }); */
                     </script>
                	
                	
                	<script>
					/*  function updatePrice() {
					     var x = document.getElementById("quantity");
						      var y = document.getElementById("price");
						      var z = "";
                                  z.value =x.value*y.value;
						           //  document.write(itemqty);
                          //  alert("The input value has changed. The new value is: " + val);
//						             $.ajax({
//										url: "Add_cart.php",
//							            method: "post"
//										data: val,
//										success: function(result) {
//											console.log(result); 
//										 
//        								}
//    								});
                                  }
						*/
						
					</script>
               
                	</div>
                </td>
         
         
          </tr>
				<?php }?>
					
					<tr >
					  <td class="button">
					  	<a href="AddProducts.php" class="bottom-button btn btn-secondary">Update Cart </a>
					  </td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  	
					  <td class="button">
					        	<a href="Products.php" class="bottom-button btn btn-secondary">Close Coupn </a>
					  </td>
					  		
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
					 
				
				           
					          <td >
					          	<p class="carttotal">    Subtotal  </p>
					          	<p class="carttotal"><?php echo $totalprice ?>   </p>
					          </td>
					  
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
					  	
					  <td class="button">
					        	<a href="Checkout.php?p_price=<?php echo $totalprice ?>"  name="btncheckouts" class="bottom-button btn btn-secondary"> Proceed Checkouts </a>
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
			$( ".quantity" ).on( 'change', function () {
				var qty = $( this ).val();
				var price = $( $( $( $( $( $( this ).parent() ).parent() ).parent() ).find( ".pricerow" ) ).find( "input" ) ).val();
				// alert(price);
				var subtotal = qty * price;
				$(  $( $( $( this ).closest( "tr" ) ).find( ".subtotalRow" ) ).find( "div" ) ).html( subtotal + " €" );
				//alert(subtotal);
				//document.getElementsByClassName("subtotal").innerHTML=subtotal;
			} );
		</script>



</body>


</html>
<?php  } ?>
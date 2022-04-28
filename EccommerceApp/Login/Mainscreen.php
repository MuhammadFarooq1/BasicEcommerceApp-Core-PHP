<?php
include( 'database-connection.php' );
session_start();

if(isset($_POST['btnaddcart'])) {
	
  header('location: Checkout.php?id='.$GLOBALS);	
	 exit();
}

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
  
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

 

<link href="mainscreen.css" rel="stylesheet">
</head>


<body>
<?php 
	
include( 'header.php' );
include( 'addheader.php');	
	
	
?>
<section class="services" id="services">
  <div class="aboutservices" >
    
    <div class="container">
     
      <div class="row">
       <div class="col-lg-12" >  
          <h1> Shop by Category </h1>
         <hr class="divider">
          
        </div>
        <div class="col-sm-4" >  
          <img src="image/1st.jpg" alt="Italian Trulli" class="img-fluid">
          <div class="catagori-caption">
				<h2>Whoman</h2>
				<span class="best"><a href="#" > Best new deals</a></span><br>
				<span class="collection"><a href="#" > Best collections </a></span>
			</div>
        </div>
        <div class="col-sm-4" > 
          
			  <img src="image/2nd.jpg" alt="Italian Trulli" class="img-fluid">
        </div>
        <div class="col-sm-4" >  
            <img src="image/3rd.jpg" alt="Italian Trulli" class="img-fluid">
			
        </div> 
      </div>
    </div>
  </div>
</section>

<section class="services" >
 

 
<div class="aboutservices" >
    
    <div class="container">
     
      <div class="row">
       <div class="col-lg-12" >  
          <h1 style="text-align: left"> Latest Products </h1>
         
          <hr>
        </div>
       
       
        <?php
           //   $venderid = $_SESSION["id"];
    //  WHERE venderid=$venderid
		  $sql =  "SELECT * FROM products ";
        
		  if($result = $conn->query( $sql )){
			while ( $data = $result->fetch_assoc() )
		 // while($data = mysqli_fetch_array($result))
       {

	?>
       <div class="col-sm-12 col-lg-4 col-xl-4 col-md-6 " >    
           
           
           <div class="imgplace"> 
            <form method="post"   enctype="multipart/form-data">
             <img  class="img-responsive" style="max-width: 500px ; max-height: 300px; padding: 5px; margin: 10px; border-radius: 12px; background-color: aqua" src="image/<?php echo $data['image']; ?>">
       
            <a style="position:static; " href="Mainscreen.php?userid=<?php echo ($data['id']) ; ?>" class="btn btn-info"> Add Cart 
            </a>
            </div>
        	        <div class="catagori-caption">
			    	<div class="product-rating">
					<i class="fa fa-star">  </i>
					<i class="fa fa-star">  </i>
					<i class="fa fa-star">  </i>
					<i class="far fa-star low-star">  </i>
					<i class="far fa-star low-star">  </i>
			</div>
				<span  class="best"><a href="#" name="name" > <?php echo $data['name']; ?> </a></span><br>
				
				<?php  $id = $data['id']; ?>
				<div class="price">
					<ul style="list-style-type:none;">
					<li> Quantity : <?php echo $data['Quantity']; ?> </li>
					<li class="discount"> Price : <?php echo $data['price']; ?></li>
				</ul>
				</div>
				</form>
     </div>      
     </div>      
<?php
} }?> 
      <?php 
      
	   if(isset($_GET['userid'])) {
		   
		     if(!isset($_SESSION["id"]))
		  {
			  
			//  header( "location:Mainscreen.php" );
	        // exit();
		  }
		  else{
	
		   $id = $_GET['userid'];
		  $name = $_SESSION["id"];
		   $s_sql = "SELECT * FROM products WHERE id='$id'";
		   $c_result = mysqli_fetch_assoc(mysqli_query($conn, $s_sql)) ;
	        
	      echo   $i_id = $c_result['id'];
	      echo   $venderid = $c_result['venderid'];
	      //  $name = $_SESSION["U_id"];
	    $p_quantity = 1;
	   
	   $sql = "INSERT INTO chekouts(itemid,userid,itemquantity)
                     VALUES ('$i_id','$name','$p_quantity')";
                 if (mysqli_query($conn, $sql)) {
                       	//	 echo "New record created successfully !";
                		// header("location: Mainscreen.php");
	                      //		  exit();
	           } 
	              else {
	                    	echo "Error: " . $sql . "
                            " . mysqli_error($conn);
	 }	
}
			  }
       ?>
 
</section>
<section class="product" >
<div class="best-product-area 1f-padding">
	<div class="product-wrapper bg-height" style="background-image: url(image/asest1.jpg)">
		<div class="container position-relative">
			<div class="row  ">
				<div class="product-man position-absolute d-none d-lg-block ">
					<img src="image/boy.jpg" alt="productman">
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2  d-none d-lg-block">
					<div class="vertical-text">
						<!--<span> MENZ </span>-->
					</div>
				</div>
				<div class=" col-xl-8 col-lg-8 ">
					<div class="best-product-caption">
						<h1 style="font-weight: bold">Find The Best Product<br>from Our Shop</h1>
						<br>
						<p>Designers who are interesten creating state ofthe.</p>
						<br>
						<a href="indext.php" class="btn btn-secondary" >Shop Now</a> 
					</div>
				</div>
				<div class="shape bounce-animate d-none d-md-block col-lg-2" >
		<img src="image/shirt5jpg.webp" alt="s5">
	</div>
			</div>
		</div>
	</div>
	
</div>
</section>

<section class="best-collection">
	<div class="collection">
		<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6">
	    <div class="x1xollection">
	    <h1 style="font-weight: bold"> Best Collection of This Month </h1>	
	    <br>
	    <p style="font-weight: bold"> Designers who are interesten crea. </p>	
	    <br>
		<a href="indext.php" class="btn btn-secondary"  > Shop Now </a>
		</div>	
		<div class="x1xollection" style="margin-top: 70px;">
			<img src="image/xcollection1.jpg">
		</div>
		</div>	
		
		
		<div class="col-xl-4 col-lg-4 ">
			<div class="x2xollection">
				<img src="image/xcollection2.jpg" alt="xcollection">
			</div>
			
		</div>
			
		<div class=" col-xl-4 col-lg-4 col-md-6">
			
			<div class="x3col">
			<div class="best-right-cap">
			<div class="row">
			<div class="single-cap col-xl-6 col-lg-6  col-md-6">
				<h4>Menz Winter<br>jacket </h4>
			</div>
			
			<div class="single-cap col-xl-6 col-lg-6  col-md-6">
				<img src="image/xcollection3.jpg " alt="collection3">
			</div>
		</div>	
		</div>	
		
		<div class="best-right-cap">
			<div class="row">
			<div class="single-cap col-xl-6 col-lg-6 col-md-6 active" style="border-radius: 12px">
				<h4>Menz Winter<br>jacket </h4>
			</div>
			
			<div class="single-cap col-xl-6 col-lg-6  col-md-6">
				<img src="image/xcollection4.jpg" alt="collection3">
			</div>
		</div>	
		</div>	
		
		<div class="best-right-cap">
			<div class="row">
			<div class="single-cap col-xl-6 col-lg-6  col-md-6">
				<h4>Menz Winter<br>jacket </h4>
			</div>
			
			<div class="single-cap col-xl-6 col-lg-6  col-md-6">
				<img src="image/xcollection5.jpg" alt="collection3">
			</div>
		</div>	
		</div>	
		
		</div>	
		</div>	
			
	</div>
	</div>	
</section>

<section class="latest">
	<div class="container">
		<div class="latest-area d-flex align-items-center" style="background-image: url(image/latest-offer.jpg)" >
			<div class="container">
				<div class="row d-flex align-items-center ">
					<div class="col-xl-6 col-lg-6 col-md-6 ">
						<div class="latest-caption">
						  	<h1 style="font-weight: bold"> Get Our<br>Latest Offers News</h1>
					   		<p>Subscribe news latter</p>
					           </div>
					          </div>
					        <div class="col-xl-6 col-lg-6 col-md-6 ">
				       	<div class="latest-subscribe">
					<form action="#">
				<input type="email" placeholder="Enter your email ">
			<a href="indext.php" class="btn btn-info"  > Shop Now </a>
	     </form>
	</div>
 </div>
	</div>
			</div>
		</div>
	</div>
</section>
<section class="shop-method" >
	<div class="shop-method-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xl-4 col-lg-4 col-md-4 ">
				<div class="single-method mb-40">
					<i class="fa fa-gift" aria-hidden="true"></i>
					<h6> Free Shipping Method</h6>
					<p> laorem ixpsacdolor sit ameasecur adipisicing elitsf edasd. </p>
				</div>
	      	</div>
				<div class="col-sm-12 col-xl-4 col-lg-4 col-md-4 ">
				<div class="single-method mb-40">
					<i class="fa fa-unlock">...</i>
					<h6> Secure Payment System </h6>
					<p> aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd </p>
				</div>
			</div>
				<div class="col-sm-12 col-xl-4 col-lg-4 col-md-4 ">
				<div class="single-method mb-40">
					<i class="fa fa-refresh" aria-hidden="true" style="font-size:36px;"></i>
					<h6 style="font-weight: bold"> Secure Payment System </h6>
					<p> aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd </p>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>

<section class="gellary-area">
	<div class="gellary-wrapper If-padding">
		<div class="gellary-area">
			<div class="container-fluid">
			<div class="row">
				<div class="gellary-items col-lg-3">
					<img src="image/xgallery1.jpg" alt="xg1">
				</div>
				<div class="gellary-items col-lg-2">
					<img src="image/xgallery2.jpg" alt="xg2">
				</div>
				<div class="gellary-items col-lg-2">
					<img src="image/xgallery3.jpg" alt="xg3">
				</div>
				<div class="gellary-items col-lg-2">
					<img src="image/xgallery4.jpg" alt="xg4">
				</div>
				<div class="gellary-items col-lg-3">
					<img src="image/xgallery5.jpg" alt="xg5">
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>


</html>

<!DOCTYPE html>
<html>
<head>
<title> Header </title>

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
            <form method="post" enctype="multipart/form-data" > 
             <input class="searchbar" type="text" placeholder="Search.." name="search" >
                 <button type="submit" > <i class="fa fa-search"> </i> </button> 
                    
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
         	
         	<?php if(!isset($_SESSION["id"])){
  ?>
	          <button class="btn1 btn btn-secondary" type="submit" class="button" value="Signout" id="Logout" name="Logout"> Sign IN  </button>
	          <?php
  }
else
{
		   ?>
						<button class="btn1 btn btn-secondary" type="submit" class="button" value="Signout" id="Logout" name="Logout"> Sign Out  </button>
		<?php } ?>								
         	<!--<a href="indext.php" class="btn1 btn btn-secondary">Sign out</a> -->
   </form>
   </nav>
  </div>
</section>

	</body>
</html>

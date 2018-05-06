<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

if(isset($_GET['pro_id'])) {

  $product_id = $_GET['pro_id'];

  $get_product = "select * from products where product_id='$product_id'";

  $run_product = mysqli_query($con,$get_product);

  $row_product = mysqli_fetch_array($run_product);

  $p_cat_id = $row_product['p_cat_id'];

  $pro_title = $row_product['product_title'];
  $pro_price = $row_product['product_price'];
  $pro_desc = $row_product['product_desc'];
  $pro_img1 = $row_product['product_img1'];
  $pro_img2 = $row_product['product_img2'];
  $pro_img3 = $row_product['product_img3'];


  $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

  $run_p_cat = mysqli_query($con,$get_p_cat);

  $row_p_cat = mysqli_fetch_array($run_p_cat);

  $p_cat_title = $row_p_cat['p_cat_title'];



}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Κατάστημα E-commerce </title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

	<link  href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">


	<link rel="stylesheet" type="text/css" href="font">


	<link rel="stylesheet" href="styles/style.css">
</head>
<body>

  <br>
<!-- <div class="container">
<nav>

<a href="#">Home</a>
<a href="#">Tab</a>
<a href="#">Tab</a>
<a href="#">Tab</a>
<a href="#" class="btn btn-info" role="button">Link Button</a>
</nav>
</div> -->



<!-- <div class="navbar navbar-default" id="navbar">
<div class="container">
<div class="navbar-header">

<a class="navbar-brand home" href="index.php">

</a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation" >


<span class="sr-only">Toggle Navigation</span>

<i class="fas fa-align-justify"></i>
</button>

</div>

</div>

</div> -->

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
      <a class="navbar-brand" href="#"><button type="button" class="btn btn-success"><?php

        if(!isset($_SESSION['customer_email'])){

          echo "Καλωσορίσατε: Επισκέπτης";

        }else{

          echo "Καλωσορίσατε " . $_SESSION['customer_email'] . "";

        }
       ?> </button></a>



      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item"><a class="nav-link" href="register.php">Συνολικό Κόστος <?php total_price(); ?> ,</a>
          </li>
           <li class="nav-item"><a class="nav-link" href="register.php">Συνολικά Προιόντα <?php items(); ?> </a>
          </li>
         <!--  <form class="navbar-form navbar-left" method="post" action="/search">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Έυρεση...">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-primary"> Submit</button>
              </span>
            </div>
          </form> -->
          
        </ul>
        <ul class="navbar-nav" style="float: right">

           <li class="nav-item" style="float: right"><a class="nav-link" href="register.php">Register</a>
             </li>

            <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

            ?>
             <!--
           <li class="nav-item dropdown" style="float: right">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown">Signup / Login</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/signup">Signup</a>
              <a class="dropdown-item" href="/login">Login</a>
            </div>
          </li>
        -->

         

            <li class="nav-item" style="float: right">
              
             <?php

              if(!isset($_SESSION['customer_email'])){

              echo "<a class='nav-link' href='checkout.php'> Είσοδος </a>";

              }else{

                echo "<a class='nav-link' href='logout.php'> Έξοδος </a>";

            }

          
            ?>

           </li>

          

        </ul>
      </div>
  </div>
    </nav>

    <div style="height: 10px; background-color: #EAEFF5"></div>


    <div class="container">
    <div class="topnav">
      <a href="index.php">Home</a>
      <a class="btn btn-primary" href="shop.php">Κατάστημα</a>
       <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

      ?>
      <a href="cart.php">Η Κάρτα μου</a>
      <a href="contact.php">Επικοίνωνησε μαζί μας</a>

      <a class="btn btn-success navbar-btn right" id="right" href="#"><i class="fas fa-shopping-basket"></i><span> <?php items(); ?> αντικείμενα στο καλάθι</span></a>

      <div class="navbar-collapse collapse right">
        <button class="btn navbar-btn-primary" type="button" data-toggle="collapse" data-target="#search">
          <span class="sr-only">Toggle Search</span>
          <i class="fas fa-search"></i>
        </button>
      </div>
      
    </div>
    </div>

    <br>
  
  <div id="content">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home </a>
          </li>
          <li>
            <a href="shop.php">Κατάστημα </a>
          </li>
           <li>
            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
          </li>
           <li>
            <?php echo $pro_title; ?> 
          </li>
         <!--  <li>
            Κατάστημα
          </li> -->
        </ul>
      </div>
      <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>

      </div>


  


      <div class="col-md-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="admin_area/product_images/<?php echo $pro_img1;  ?>"  alt="First slide">
          </div>
           <div class="carousel-item">
            <img class="d-block img-fluid" src="admin_area/product_images/<?php echo $pro_img2;  ?>"  alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="admin_area/product_images/<?php echo $pro_img3; ?>"  alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>


    <div class="col-md-4">
      <div class="box">
        <h2 class="text-center"> <?php echo $pro_title; ?> </h2>

        <?php add_cart(); ?>

        <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
          <div class="form-group">
            <label class="col-md-8 control-label">Ποσότητα Προιόντος</label>
            <div class="col-md-8">
              <select name="product_qty" class="form-control">
                <option>Επιλέξτε Ποσότητα</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-8 control-label">Μέγεθος Προιόντος</label>

            <div class="col-md-8">
              <select name="product_size" class="form-control">
                <option>Επιλέξτε Μέγεθος</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>

              </select>
            </div>
          </div>

          <p class="price text-center"> <?php echo $pro_price; ?>€ </p>

          <p class="text-center buttons">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-shopping-basket"></i> Πρόσθεσε στην Κάρτα
            </button>
          </p>

        </form>
      </div>

      <div class="row" id="thumbs">
        <div class="col-md-4">
          <a href="#" class="thumbs">
            <img src="admin_area/product_images/<?php echo $pro_img1; ?>" width="100%" class="img-responsive">
          </a>
        </div>

         <div class="col-md-4">
          <a href="#" class="thumbs">
            <img src="admin_area/product_images/<?php echo $pro_img2; ?>" width="100%" class="img-responsive">
          </a>
        </div>

         <div class="col-md-4">
          <a href="#" class="thumbs">
            <img src="admin_area/product_images/<?php echo $pro_img3; ?>" width="100%">
          </a>
        </div>
      </div> 
    </div>
  </div>
    
  <br>

<div class="row">
  <div class="col-md-4 ">
    
  </div>

  <div class="col-md-8">
    <div class="box" id="details">
      <p>
        <h4>Λεπτομέρειες Προιόντος</h4>
        <p> 
           <?php echo $pro_desc; ?>
        </p>

        <h4 >Μέγεθος</h4>

        <ul>
          <li>Small</li>
          <li>Medium</li>
          <li>Large</li>
        </ul>
      </p>

      <hr>

    </div>
  </div>
  
</div>






<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-8">
     <div class="box">
        <h3 class="text-center">Σας Αρεσαν και αυτά τα Προιόντα</h3>
        </div>



     

 <!--  <div class="center-responsive col-md-4">
    <div class="product same-height">
      <a href="details.php">
         <img src="admin_area/product_images/product.jpg" width="80%">
      </a>

      <div class="text">
        <h4><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h4>
          <p class="price"> 50€</p>
      </div>
    </div>
  </div> -->


   <?php

        $get_products = "select * from products order by 1 LIMIT 0,2";

        $run_products = mysqli_query($con,$get_products);

        while($row_products = mysqli_fetch_array($run_products)) {

          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_title'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_img1'];

          echo "
          <div class='well text-center'>
            <div class='row' id='thumbs'>

              <div class='col-md-4'>
                <a href='details.php?pro_id=$pro_id' class='thumbs'>
                  <img src='admin_area/product_images/$pro_img1' width='100%' class='img-responsive'>
                </a>
              <div class='text'>
                  
              </div>
            </div>
          </div>
        </div>

        

          ";



        }

        ?>

<!-- 
      <div class="row" id="thumbs">
        <div class="col-md-4">
          <a href="details.php" class="thumbs">
            <img src="admin_area/product_images/product.jpg" width="100%" class="img-responsive">
          </a>
          <div class="text">
            <h4><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h4>
            <p class="price text-center"> 50€</p>
          </div>
        </div>

         <div class="col-md-4">
          <a href="details.php" class="thumbs">
            <img src="admin_area/product_images/product.jpg" width="90%" class="img-responsive">
          </a>
          <div class="text">
            <h4><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h4>
            <p class="price text-center"> 50€</p>
          </div>
        </div>

         <div class="col-md-4">
          <a href="details.php" class="thumbs">
            <img src="admin_area/product_images/product.jpg" width="90%">
          </a>
          <div class="text">
            <h4><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h4>
            <p class="price text-center"> 50€</p>
          </div>
        </div>
 -->


  </div>

</div> 


    </div>   
  </div>
</div>


<br>

<?php

include("includes/footer.php");


?>

</body>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</body>
</html>
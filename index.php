<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

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

          <!--  <li class="nav-item"><a class="nav-link" href="register.php">Κάρτα Αγορών</a>
          </li> -->
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

          <li class="nav-item" style="float: right">
            <?php

            if(!isset($_SESSION['customer_email'])){

              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

            ?>

          </li>

<!--
        

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





  

    <div class="container">
    <div class="topnav">

      <div class="hom" style="text-shadow: 2px 2px #050411;">
        <a class="btn btn-primary" href="index.php"><i class="fas fa-home"></i> Home</a>
      </div>

      <a href="shop.php"> Καταστημα</a>
       <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμος μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

            ?>
      <a href="cart.php">Η Καρτα μου</a>
      <a href="contact.php">Επικοινωνησε μαζι μας</a>

      <div class="hom">
       <!-- <a class="btn btn-primary navbar-btn right" id="right" href="cart.php?ip_add='$ip_add'"> <?php echo $total; ?>.00€<span> </span></a> -->


        <a class="btn btn-primary navbar-btn right" id="right" href="cart.php"><i class="fas fa-shopping-basket"></i><span> <?php items(); ?> αντικειμενα στο καλαθι</span></a>
      </div>
 

   <!--    <a class="btn btn-default navbar-btn right" id="right" href="#">
      <input type="image" name="submit"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif"
        alt="4 αντικείμενα στο καλάθι">
        </a> -->

      <div class="navbar-collapse collapse right">
        <button class="btn navbar-btn-primary" type="button" data-toggle="collapse" data-target="#search">
          <span class="sr-only">Toggle Search</span>
          <i class="fas fa-search"></i>
        </button>
      </div>
      
    </div>
    </div>


    <!-- <div class="container" id="slider">
      <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <div class="carousel-inner">
            
            <div class="item active">
              <img src="admin_area/slides_images/1.jpg">
            </div>

            <div class="item">
              <img src="admin_area/slides_images/2.jpg">
            </div>

            <div class="item">
              <img src="admin_area/slides_images/3.jpg">
            </div>

            <div class="item">
              <img src="admin_area/slides_images/4.jpg">
            </div>


          </div>

          <a class="left carousel" href="#myCarousel" data-slide="prev">
            <span class></span>
          </a>
        </div>

      </div>

<div class="carousel-item active">
    </div>

 -->
<div class="jumbotron">
<div class="container" id="slider">
<div class="col-md-12">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
   <?php

   $get_slides = "select * from slider LIMIT 0,1";

   $run_slides = mysqli_query($con,$get_slides);

   while($row_slides=mysqli_fetch_array($run_slides)) {
    $slide_name = $row_slides['slide_name'];
    $slide_image = $row_slides['slide_image'];


    echo "
     <div class='carousel-item active'>
      <img src='admin_area/slides_images/$slide_image' >  
    </div>
    ";
   }

   ?>

   <?php

   $get_slides = "select * from slider LIMIT 1,3 ";

   $run_slides = mysqli_query($con,$get_slides);

   while($row_slides=mysqli_fetch_array($run_slides)) {
    $slide_name = $row_slides['slide_name'];
    $slide_image = $row_slides['slide_image'];

    echo "
     <div class='carousel-item'>
      <img src='admin_area/slides_images/$slide_image' >  
     </div>

    ";
   }

   ?>
  </div>

  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>


<br><br>

<!--     <div class="col-md-9">
     <form class="navbar-form" method="get" action="results.php">
            <div class="input-group">
              <input type="text" name="user_query" class="form-control" placeholder="Έυρεση..." required>
              <button type="submit" value="Submit" name="search" class="btn btn-primary"> <i class="fas fa-search"></i></button>
            </div>
          
      </form>
    </div> -->

<div id="advantages">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="box same-height">
          <div class="icon">
            <i class="fas fa-heart"></i>
          </div>
          <h3><a href="#"> Αγαπαμε τους πελατες μας</a></h3>
          <p>
            Σας παρέχουμε τις καλύτερες υπηρεσίες στην πόλη
          </p>
        </div>
      </div>
        <div class="col-md-4">
          <div class="box same-height">
            <div class="icon">
              <i class="fas fa-tags"></i>
            </div>
            <h3><a href="#">Καλυτερες Τιμες</a></h3>
            <p>
              Μπορείτε να πάτε να checkarete τις άλλες τιμές και να τις συγκρίνετε με τις δικές μας
            </p>
          </div>
        </div>
         <div class="col-md-4">
          <div class="box same-height">
            <div class="icon">
              <i class="fas fa-thumbs-up"></i>
            </div>
            <h3><a href="#">100% ικανοποιηση πελατων</a></h3>
            <p>
              Δωρεάν επιστροφή προιόντων μέσα σε 3 μήνες
            </p>
          </div>
        </div>
    </div>
  </div>
</div>

</div> 

<div id="hot">
  <div class="box">
    <div class="container">
      <div class="col-md-12">
        <h2>Τελευταιες Προσφορες για την Τελευταια Εβδομαδα</h2>
      </div>
    </div>
  </div>
</div>



<br><br>

 <!--  <div id="content" class="container">
    <div class="row">
      <div class="col-md-4 col-md-6 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive">
          </a>
        </div>
        <div class="text">
          <h3> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
          <p class="price">50€</p>
          <p class="buttons">
            <a href="details.php" class="btn btn-default">Δείτε Λεπτομέρειες</a>
            <a href="details.php" class="btn btn-success">
              <i class="fas fa-shopping-cart"></i>Πρόσθεσε στην Κάρτα
            </a>
          </p>
        </div>
      </div>

      <div class="col-md-4 col-md-6 single">
        <div class="product" >
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive">
          </a>
        </div>
        <div class="text" >
          <h3> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
          <p class="price">50€</p>
          <p class="buttons">
            <a href="details.php" class="btn btn-default">Δείτε Λεπτομέρειες</a>
            <a href="details.php" class="btn btn-success">
              <i class="fas fa-shopping-cart"></i>Πρόσθεσε στην Κάρτα
            </a>
          </p>
        </div>
      </div>
    </div>     
     <div class="col-md-4 col-md-6 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive">
          </a>
        </div>
        <div class="text">
          <h3> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
          <p class="price">50€</p>
          <p class="buttons">
            <a href="details.php" class="btn btn-default">Δείτε Λεπτομέρειες</a>
            <a href="details.php" class="btn btn-success">
              
              <i class="fas fa-shopping-cart"></i>Πρόσθεσε στην Κάρτα
            </a>
          </p>
        </div>
      </div> -->


<div class="container">
  <div class="row">

    <?php

    getPro();

    ?>
  <!-- <div class="col-md-3">
   <div class="card1">
    <div class="flex">
    <div class="product_one">
      <img src="admin_area/product_images/product.jpg" width="70%">
    </div>
     </div>

    <div class="product_text">
      <h6> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h6>
    </div>

    <div class="star_rating" align="middle">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star2.png">
    </div>
    <div class="product_description">
      <b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
    <div class="product_price">
      <div class="price">
        10€
        <div class="btn btn-success">
        Βάλτο στο Καλάθι
        </div>
          <a href="details.php"><div class="btn btn-primary">Περισσότερα... </div></a>
      </div>
    </div>
  </div>
</div>

  <div class="col-md-3">
   <div class="card2">
    <div class="flex">
    <div class="product_one">
      <img src="admin_area/product_images/Polo.jpg" width="70%">
    </div>
    </div>
    <div class="product_text">
      <h6> <a href="details.php">POLO Blue Kids POLO T-Shirt</a></h6>
    </div>

    <div class="star_rating" align="middle">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star2.png">
    </div>
    <div class="product_description">
      <b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
    <div class="product_price">
      <div class="price">
        10€
        <div class="btn btn-success">
        Βάλτο στο Καλάθι
        </div>
         <div class="btn btn-primary">
            Περισσότερα...
        </div>
      </div>
    </div>
  </div>

</div> 

<div class="col-md-3">
   <div class="card3">
    <div class="flex">
    <div class="product_one">
      <img src="admin_area/product_images/product.jpg" width="70%">
    </div>
  </div>
    <div class="product_text">
      <h6> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h6>
    </div>

    <div class="star_rating" align="middle">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star2.png">
    </div>
    <div class="product_description">
      <b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
    <div class="product_price">
      <div class="price">
        10€
        <div class="btn btn-success">
        Βάλτο στο Καλάθι
        </div>
          <a href="details.php"><div class="btn btn-primary">Περισσότερα... </div></a>
      </div>
    </div>
  </div>
</div>


</div> 



<div class="row">
<div class="col-md-3">
   <div class="card4">
    <div class="flex">
    <div class="product_one">
      <img src="admin_area/product_images/product.jpg" width="70%">
    </div>
    </div>
    <div class="product_text">
      <h6> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h6>
    </div>

    <div class="star_rating" align="middle">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star2.png">
    </div>
    <div class="product_description">
      <b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
    <div class="product_price">
      <div class="price">
        10€
        <div class="btn btn-success">
        Βάλτο στο Καλάθι
        </div>
          <a href="details.php"><div class="btn btn-primary">Περισσότερα... </div></a>
      </div>
    </div>
  </div>
</div>




<div class="col-md-3">
   <div class="card5">
    <div class="flex">
    <div class="product_one">
      <img src="admin_area/product_images/T-shirt1.jpg" width="70%">
    </div>
  </div>
    <div class="product_text">
      <h6> <a href="details.php">Marvel Black Kids POLO T-Shirt</a></h6>
    </div>

    <div class="star_rating" align="middle">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star1.png">
      <img src="images/star2.png">
    </div>
    <div class="product_description">
      <b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </div>
    <div class="product_price">
      <div class="price">
        10€
        <div class="btn btn-success">
        Βάλτο στο Καλάθι
        </div>
           <a href="details.php"><div class="btn btn-primary">Περισσότερα... </div></a>
      </div>
    </div>
  </div>
</div>


  </div>
 -->
  </div>
 
</div>

<?php

include("includes/footer.php");


?>

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="list-builder.js"></script>

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
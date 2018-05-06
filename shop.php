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
    <!--  <a class="navbar-brand" href="#">e-Commence</a> -->
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
          <!-- <form class="navbar-form navbar-left" method="post" action="/search">
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

    <div style="background-color: #EAEFF5"></div>


    <div class="container">
    <div class="topnav">
      <a href="index.php">Home</a>
      <a class="btn btn-primary" href="shop.php">Καταστημα</a>
       <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

      ?>
      <a href="#about">Η Καρτα μου</a>
      <a href="#about">Επικοινωνησε μαζι μας</a>

      <!-- <a class="btn btn-info navbar-btn right" id="right" href="#"><i class="fas fa-search"></i><span> </span></a> -->


      <a class="btn btn-primary navbar-btn right" id="right" href="cart.php"><i class="fas fa-shopping-basket"></i><span> <?php items(); ?> αντικειμενα στο καλαθι</span></a>

      

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
            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?></a>Κατάστημα
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div id="content">
    <div class="container">
      <div class="row">

      <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
      </div>

      <div class="col-md-8">

        <?php

        if(!isset($_GET['p_cat'])) {

        if(!isset($_GET['cat']))

        echo "
        <div class='box'>
          <h1>Κατάστημα</h1>
          <p> 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
          </p>
        </div>



      ";

        }




        ?>

      <div class="row">

          <?php

          if(!isset($_GET['p_cat'])) {

          if(!isset($_GET['cat'])) {

          $per_page=6;

          if(isset($_GET['page'])) {

          $page = $_GET['page'];

          }else {
            $page=1;
          }

          $start_from = ($page-1) * $per_page ;

          $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";

          $run_products = mysqli_query($con,$get_products);

          while($row_products=mysqli_fetch_array($run_products)){

          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_title'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_img1'];

          echo "


          
           <div class='well text-center'></div>
        <div class='row'>
          <div class='product_one' style='width: 246px; padding: 1px;margin-left: 3px;margin-right:4px;'>
          <div class='col-md-6'>
            <a href='details.php?pro_id=$pro_id'>
              <img src='admin_area/product_images/$pro_img1' width='60%'>
            </a>
          </div>
              <div class='product_text'>
                <div class='product_description'>
                  $pro_desc 
                </div>
              </div>
              <div class='product_price' style='width: 246px; padding: 1px;margin-left: 15px;margin-right:6px;'>
                <div class='price'>
                  $pro_price €
                  <div class='btn btn-success'>
                    Βάλτο στο Καλάθι
                  </div>
                  <a href='details.php?pro_id=$pro_id'><div class='btn btn-primary'>Περισσότερα... </div></a>
                </div>
              </div>
            </div>  
        <div class='col'></div>
      </div>
           
          
          ";


          }

          ?>

    </div>    
         <!--  <div class=".col-auto .mr-auto" style="margin-right: 15px;margin-left: 5px;">
            <div class="product_one" >
              <img src="admin_area/product_images/Gini-1.jpg" width="70%">
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
        



          <div class="row">
          <div class=".col-md-3 .ml-md-auto" style="margin-left: 10px;">
            <div class="product_one" >
              <img src="admin_area/product_images/product.jpg" width="70%">
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




          <div class=".col-md-3 .offset-md-4" style="margin-left: 10px;">
            <div class="product_one">
              <img src="admin_area/product_images/Polo.jpg" width="70%">
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
                 <a href="details.php"><div class="btn btn-primary">Περισσότερα... </div></a>
              </div>
            </div>
          </div>
    

             </div>



            <div class=".col-auto .mr-auto" style="margin-right: 15px;margin-left: 5px;">
            <div class="product_one" >
              <img src="admin_area/product_images/T-shirt1.jpg" width="70%">
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


         <div class="row">
          <div class=".col-md-3 .ml-md-auto" style="margin-left: 10px;">
            <div class="product_one" >
              <img src="admin_area/product_images/United.jpg" width="70%">
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

      </div> -->

         
    <br>
            <nav aria-label="Page navigation example" >
              <ul class="pagination">

                <?php

                $query = "select * from products";
                $result = mysqli_query($con,$query);
                $total_records = mysqli_num_rows($result);
                $total_pages = ceil($total_records / $per_page);

                echo "
                <li class='page-item'><a class='page-link' href='shop.php?page=1'>".'Πρώτη Σελίδα'."</a></li>
                ";

               
                for ($i=1; $i<=$total_pages; $i++){

                    echo "

                    <li class='page-item'><a class='page-link' href='shop.php?page=".$i."' >".$i."</a></li>

                      ";


                    };

                  echo "
                <li class='page-item'><a class='page-link' href='shop.php?page=$total_pages' >".'Τελευταία Σελίδα'."</a></li>
                ";

                  }


                  }


                ?>
               <!--  <li class="page-item"><a class="page-link" href="shop.php">Προηγούμενο</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">1</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">2</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">3</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">4</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">5</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">Επόμενο</a></li> -->
              </ul>
          
            </nav>
      


          
              <?php

              getpcatpro();

              getcatpro();

              ?>

        



          </div>


        </div>
      </div>
    </div>
    </div>








<br>

<?php

include("includes/footer.php");


?>



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

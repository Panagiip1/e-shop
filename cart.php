
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
       <a class="navbar-brand" href="#"><button type="button" class="btn btn-success">
      <?php

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
<!-- 
          <form class="navbar-form navbar-left" method="post" action="/search">
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
          </li> -->

         

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
      <a href="shop.php">Κατάστημα</a>
      <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

            ?>
      <a class="btn btn-primary" href="shop.php">Η Κάρτα μου</a>
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
            Η Κάρτα μου
          </li>
        </ul>
      </div>


      <div class="col-md-8" id="cart">
        <div class="box">
          <form action="cart.php" method="post" enctype="multipart-form-data">
            <h1> Κάρτα Αγορών</h1>

              <?php 
                $ip_add = getRealUserIp(); 
                $select_card = "select * from cart where ip_add='$ip_add'";
                $run_cart = mysqli_query($con,$select_card);
                $count = mysqli_num_rows($run_cart);
              ?>

            <p class="text-muted"> Έχεται <?php echo $count; ?> αντικείμενα στην κάρτα αγορών σας</p>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Προιόν</th>
                    <th>Ποσότητα</th>

                    <th>Τιμή </th>

                    <th>Μέγεθος</th>

                    <th colspan="1">Κατάργηση</th>

                    <th colspan="2">Σύνολο</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $total = 0;

                  while($row_cart = mysqli_fetch_array($run_cart)){

                    $pro_id = $row_cart['p_id'];
                    $pro_size = $row_cart['size'];
                    $pro_qty = $row_cart['qty'];

                    $get_products = "select * from products where product_id='$pro_id'";

                    $run_products = mysqli_query($con,$get_products);     

                    while($row_products = mysqli_fetch_array($run_products)){

                      $product_title = $row_products['product_title'];

                      $product_img1 = $row_products['product_img1'];

                      $only_price = $row_products['product_price'];

                      $sub_total = $row_products['product_price']*$pro_qty;
            
                      $total += $sub_total;

                  ?>

                  <tr>
                    <td>
                      <img src="admin_area/product_images/<?php echo $product_img1; ?>" width="100%">
                    </td>
                    <td>
                      <a href="#"><?php echo $product_title; ?></a>
                    </td>
                    <td>
                      <?php echo $pro_qty; ?>
                    </td>
                    <td>
                      <?php echo $only_price; ?>.00€
                    </td>
                    <td>
                      <?php echo $pro_size; ?>
                    </td>
                    <td>
                      <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                    </td>
                    <td>
                      <?php echo $sub_total; ?>.00€
                    </td>
                  </tr>

                  <?php } } ?>
              
                </tbody>

                <tfoot>
                  <tr>
                    <th colspan="5">
                      Σύνολο
                    </th>
                    <th colspan="2">
                      <?php echo $total; ?>.00€
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="box-footer">
              <div class="pull-left">
                <a href="index.php" class="btn btn-primary">
                  <i class="fas fa-chevron-left"></i>
                  Συνέχιση
                </a>
              </div>
              <div class="pull-right">
                <button class="btn btn-primary" type="submit" name="update" value="Update Card">
                <i class="fas fa-sync"></i> Ανανέωση Κάρτας</button>

                <a href="checkout.php" class="btn btn-success">
                  Ολοκληρώστε την Παραγγελία σας <i class="fas fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </form>

        </div>

        <?php

        function update_cart(){
          global $con;
          if(isset($_POST['update'])){
            foreach($_POST['remove'] as $remove_id){
              $delete_product = "delete from cart where p_id='$remove_id'";
              $run_delete = mysqli_query($con,$delete_product);
              if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
              }
            }
          }
        }
        echo @$up_cart = update_cart();

        ?>

      </div>

        <div class="col-md-3">
            <div class="box" id="order-summary">
              <div class="box-header">
                <h4>Επισκόπηση Παραγγελίας</h4>
              </div>
              <p class="text-muted">
                Η παράδοση και τα επιπλέον κόστη υπολογίζονται με βάση τις τιμές που πληκτρολογήσετε.
              </p>

              <div class="table-responsive">
                <table class="table"> 
                  <tbody>
                    <tr>
                      <td>  
                        Μερικό Σύνολο της Παραγγελίας σας
                      </td>
                      <th> <?php echo $total; ?>.00€ </th>
                    </tr>
                    
                    <tr>
                      <td> Παράδοση </td>  
                      <td> 0.00€ </td>
                    </tr>

                    <tr>
                      <td>ΦΠΑ</td>
                      <th> 0.00€ </th>
                    </tr>

                    <tr class="total">
                      <td>Σύνολο</td>
                      <th><?php echo $total; ?>.00€</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
        </div>








     <!--  <div class="row" id="thumbs">
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


<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";

}else{

include("includes/db.php");

include("functions/functions.php");

if(isset($_GET['order_id'])) {

$order_id = $_GET['order_id'];

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
     <!-- <a class="navbar-brand" href="#">e-Commence</a> -->
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

           <li class="nav-item" style="float: right"><a class="nav-link" href="../customer_register.php">Register</a>
          </li>

          <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

          ?>

         <!--  <li class="nav-item dropdown" style="float: right">
            <a class="nav-link dropdown-toggle" href="../checkout.php" id="dropdown01" data-toggle="dropdown">Register / Login</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/signup">Signup</a>
              <a class="dropdown-item" href="/login">Login</a>
            </div>
          </li>
        -->

         

           <li class="nav-item" style="float: right">
             <?php

            if(!isset($_SESSION['customer_email'])){

              echo "<a class='nav-link' href='../checkout.php'> Είσοδος </a>";

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
      <a href="../index.php">Home</a>
      <a href="../shop.php">Κατάστημα</a>
       <?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='btn btn-primary nav-link' href='checkout.php'>O Λογαριασμός μου</a>";

            }else{

              echo "<a class='btn btn-primary nav-link' href='customer/my_account.php'>O Λογαριασμός μου</a>";
            }

            ?>
      <a href="../cart.php">Η Κάρτα μου</a>
      <a href="../contact.php">Επικοίνωνησε μαζί μας</a>

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
            O Λογαριασμός μου
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
      </div>

<!-- Order Form -->
      <div class="col-md-8">
        <div class="box">
          <h1 align="center"> Παρακαλώ Επιβεβαιώστε την Πληρωμή σας</h1>
          <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Νο Τιμολογίου Παραγγελίας:</label>
              <input type="text" class="form-control" name="invoice_no" required>
            </div>
            <div class="form-group">
              <label>Ποσό που θα Σταλεί:</label>
              <input type="text" class="form-control" name="amount_sent" required>
            </div>
            <div class="form-group">
              <label>Επιλέξτε Τρόπο Πληρωμής:</label>
              <select name="payment_mode" class="form-control">
                <option>Επιλέξτε Τρόπο Πληρωμής</option>
                <option>Κωδικός Τραπέζης</option>
                <option>PayPal</option>
                <option>Εύκολη Πληρωμή</option>
              </select>
            </div>
            <div class="form-group">
              <label>Αποδεικτικό Πληρωμής:</label>
              <input type="text" class="form-control" name="ref_no" required>
            </div>
            <div class="form-group">
              <label>No Εύκολης Πληρωμής:</label>
              <input type="text" class="form-control" name="code" required>
            </div>
            <div class="form-group">
              <label>Ημερομηνία Πληρωμής:</label>
              <input type="text" class="form-control" name="date" required>
            </div>

            <div class="text-center">
              <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                <i class="fas fa-user-md"></i>
                 Επιβεβαίωση Πληρωμής
              </button>
            </div>

          </form>

          <?php

          if(isset($_POST['confirm_payment'])){

            $update_id = $_GET['update_id'];

            $invoice_no = $_POST['invoice_no'];

            $amount = $_POST['amount_sent'];

            $payment_mode = $_POST['payment_mode'];

            $ref_no = $_POST['ref_no'];

            $code = $_POST['code'];

            $payment_date = $_POST['date'];

            $complete = "Ολοκληρώθηκε";

            $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

            $run_payment = mysqli_query($con,$insert_payment);

            $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

            $run_customer_order = mysqli_query($con,$update_customer_order);

            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

            $run_pending_order = mysqli_query($con,$update_pending_order);

            if($run_pending_order){

              echo "<script>alert('Η Πληρωμή σας, έχει Ληφθεί, η Παραγγελία θα ολοκληρωθεί μέσα σε 24 ώρες')</script>";

               echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            }
          }

          ?>

        </div>
      </div>

<!-- Ews Edw -->

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

<?php } ?>
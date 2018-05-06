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
      <a href="cart.php">Η Κάρτα μου</a>
      <a class="btn btn-primary"  href="contact.php">Επικοίνωνησε μαζί μας</a>

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
          Επικοίνωνησε μαζί μας
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
      </div>


<div class="col-md-8">
  <div class="box">
    <div class="box-header">
      <center>
        <h2>Επικοίνωνησε μαζί μας</h2>
        <p class="text-muted">
          Αν έχεται κάποια ερώτηση, παρακαλώ μην διστάσεται να επικοινωνίσεται με το τμήμα εξυπηρέτησης πελατών που λειτουργεί 24/7.
        </p>
      </center>
    </div>

    <form action="contact.php" method="post">
      <div class="form-group">
        <label>Όνομα:</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" class="form-control" name="email" required>
      </div>
      <div class="form-group">
         <label>Θέμα:</label>
         <input type="text" class="form-control" name="subject" required>
      </div>
      <div class="form-group">
        <label>Μήνυμα:</label>
        <textarea class="form-control" name="message"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
          <i class="fas fa-user"></i> Στείλε Μήνυμα
        </button>
      </div>
    </form>

    <?php

      if(isset($_POST['submit'])){

        // O Admin pairnei email mesa apo auton ton kwdika
        
        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];

        $receiver_email = "panagiip@gmail.com";

        mail($receiver_email,$sender_name,$sender_email,$sender_subject,$sender_message,$sender_email);

        // Apostolh email sto sender mesw aytou tou kwdika

        $email = $_POST['email'];
        $subject = "Welcome to your Website";

        $msg = "Θα Επικοινωνίσουμε με εσάς σύντομα, ευχαριστούμε για το email σας!";

        $from= "panagiip@gmail.com";

        mail($email,$subject,$msg,$from);

        echo "<h2 align='center'>Το μήνυμα σας αποστάλθηκε με επιτυχία</h2>";

      }

    ?>

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

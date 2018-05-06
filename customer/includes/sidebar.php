<!-- <div class="panel panel-default siderbar-menu">
  <div class="panel-heading">
    <center>
      <img src="customer_images/brock_lesnar.jpg" class="img-responsive" width="70%">
    </center>
    <br>
    <h3 align="center" class="panel-title">Όνομα: Brock </h3>
  </div>

  <div>
    
  </div>
  
</div> -->

<div class="card" style="width: 18rem;">
 <?php
    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_image = $row_customer['customer_image'];
    $customer_name = $row_customer['customer_name'];

    if(!isset($_SESSION['customer_email'])) {


    }
    else {
      echo "
      <img class='card-img-top' src='customer_images/$customer_image' alt='Card image cap'>
      <br>
      <h4 align='center'>Όνομα: $customer_name </h4>
      ";
    }
  ?>
  <!--
<div class="card" style="width: 18rem;">
<img class="card-img-top" src="customer_images/0.jpeg" alt="Card image cap">
  <br>
  <h4 align="center">Όνομα: Παναγιώτης Παπουλίδης</h4>
-->
   <div class="card-body">
    <!-- <ul class="nav nav-pills nav-justified">
      <li class="nav-link active">
        <a style="color:white" href="my_account.php?my_orders"><i class="fas fa-list-ul"></i> Οι Παραγγελίες μου</a>
      </li>
    </ul> -->





<ul class="list-group list-group-flush">
    <li class="<?php if(isset($_GET['my_orders'])){ echo "active";} ?> list-group-item "><a style="color: black" href="my_account.php?my_orders"><i class="fas fa-list-ul"></i> Οι Παραγγελίες μου</a></li>
    <li class="<?php if(isset($_GET['pay_offline'])){ echo "active";} ?> list-group-item"><a style="color: black" href="my_account.php?pay_offline"><i class="fas fa-bolt"></i> Πλήρωσε Offline</a></li>
    <li class="<?php if(isset($_GET['edit_account'])){ echo "active";} ?> list-group-item"><a style="color: black" href="my_account.php?edit_account"><i class="fas fa-edit"></i> Edit </a></li>
    <li class="<?php if(isset($_GET['change_pass'])){ echo "active";} ?> list-group-item"><a style="color: black" href="my_account.php?change_pass"><i class="fas fa-user"></i> Άλλαξε Κωδικό </a></li>
    <li class="<?php if(isset($_GET['delete_account'])){ echo "active";} ?> list-group-item"><a style="color: black" href="my_account.php?delete_account"><i class="fas fa-trash-alt"></i> Κατάργηση Λογαργιασμού </a></li>
     <li class="list-group-item"><a style="color: black" href="smy_account.php?delete_account"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
    
  </ul>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
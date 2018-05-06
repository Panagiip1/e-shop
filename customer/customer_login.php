<div class="box">
	<div class="box-header">
		<center>
			<h1>Login</h1>
			<p class="lead">Είστε Πελάτης μας?</p>
		</center>
		<p class="text text-center">
			Παρακαλώ κάντε log in για να εισέλθεται στο e-shop ως πελάτης.
		</p>
	</div>
	<form action="checkout.php" method="post">
		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="c_email" required>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="c_pass" required>
		</div>
		<div class="text-center">
			<button name="login" value="Login" class="btn btn-primary">
				<i class="fas fa-sign-in-alt"></i> Log in
			</button>
		</div>
	</form>
	<br>
	<center>
		<a href="customer_register.php">
			<h5>Είστε καινούργιος στο e-shop? Κάντε την εγγραφή σας εδώ</h5>
		</a>
	</center>
</div>

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];
$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('Το password ή το email είναι λανθασμένο')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('Είσαι Logged in')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}else{

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('Είσαι Logged in')</script>";

echo "<script>window.open('checkout.php','_self'</script>";

}


}

?>
<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {


?>


<br><br>

<div class="row">
	<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Δείτε τους Πελάτες σας
				</li>
			</ol>
			
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
			<div class="card"  style="width: 70rem;">
        		<div class="card-header">
			    	<i class="fas fa-money-bill-alt"></i> Δείτε τους Πελάτες σας
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Id Πελάτη</th>
									<th>Όνομα Πελάτη</th>
									<th>Email Πελάτη</th>
									<th>Εικόνα Πελάτη</th>
									<th>Χώρα Πελάτη</th>
									<th>Πόλη Πελάτη</th>
									<th>Αριθμός Τηλεφώνου Πελάτη</th>
									<th>Διαγραφή Πελάτη</th>
								</tr>
							</thead>
								<tbody>
									<?php

										$i=0;
										$get_c = "select * from customers";

										$run_c = mysqli_query($con,$get_c);

										while($row_c=mysqli_fetch_array($run_c)){

											$c_id = $row_c['customer_id'];

											$c_name = $row_c['customer_name'];

											$c_email = $row_c['customer_email'];

											$c_image = $row_c['customer_image'];

											$c_country = $row_c['customer_country'];

											$c_city = $row_c['customer_city'];

											$c_contact = $row_c['customer_contact'];

											$i++;



									?>

									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $c_name; ?></td>
										<td><?php echo $c_email; ?></td>
										<td><img src="../customer/customer_images/<?php echo $c_image;  ?>" width="60" height="60"></td>
										<td><?php echo $c_country; ?></td>
										<td><?php echo $c_city; ?></td>

										<td><?php echo $c_contact; ?></td>

										<td>
											<a href="index.php?customer_delete=<?php echo $c_id;  ?>">
												<i class="fas fa-trash-alt"></i> Διαγραφή
											</a>
										</td>
									</tr>

									<?php } ?>
								</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>

<?php  }  ?>
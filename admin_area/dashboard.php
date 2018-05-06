<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {





?>

<br><br>


<div class="row">
	<div class="col-lg-12">
			<h1 class="page-header">Ταμπλό Ελέγχου</h1>
			<ol class="breadcrumb">
				<li class="active">
					 <i class="fas fa-tachometer-alt"></i> Έλεγχος Προιόντων, Πελατών, Παραγγελιών και Λοιπές Υπηρεσίες.
				</li>
			</ol>
	</div>
</div>



<div class="row">
  <div class="col"> <div class="col-sm">
        <div class="card" style="width: 150px;">
          <a href="index.php?view_products" class="btn btn-danger">
          <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
        			<i class="fas fa-tasks fa-2x"></i>
        		</div>
        		<div class="col-md-8 text-right">
  					<h3><?php echo $count_products; ?></h3>
  					<div>Προιόντα</div>
				</div>
        	</div>
          </div>
          </a>
          <a href="index.php?view_products">
	          <div class="colo1" style="text-align:center">
	    		<span style="float:left">Περισσότερα</span>
	    		<span style="float:right"><i class="fas fa-arrow-circle-right"></i></span>
			  </div>
         </a>    	
       </div>
    </div></div>
  <div class="col"><div class="col-sm">
     <div class="card" style="width: 150px;">
          <a href="index.php?view_products" class="btn btn-success">
          <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
        			<i class="fas fa-comments fa-2x"></i>
        		</div>
        		<div class="col-md-8 text-right">
  					<h3><?php echo $count_customers; ?></h3>
  					<div>Πελάτες</div>
				</div>
        	</div>
          </div>
          </a>
          <a href="index.php?view_products">
	          <div class="colo2" style="text-align:center">
	    		<span style="float:left">Περισσότερα</span>
	    		<span style="float:right"><i class="fas fa-arrow-circle-right"></i></span>
			  </div>
         </a>    	
       </div>
    </div></div>
  <div class="col"><div class="col-sm">
     <div class="card" style="width: 150px;">
          <a href="index.php?view_products" class="btn btn-warning">
          <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
        			<i class="fas fa-shopping-cart fa-2x"></i>
        		</div>
        		<div class="col-md-8 text-right">
  					<h3><?php echo $count_p_categories; ?></h3>
  					<div>Κατηγ.</div>
				</div>
        	</div>
          </div>
          </a>
          <a href="index.php?view_products">
	          <div class="colo3" style="text-align:center">
	    		<span style="float:left">Περισσότερα</span>
	    		<span style="float:right"><i class="fas fa-arrow-circle-right"></i></span>
			  </div>
         </a>    	
       </div>
    </div></div>
  <div class="col"><div class="col-sm">
     <div class="card" style="width: 150px;">
          <a href="index.php?view_products" class="btn btn-primary">
          <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
        			<i class="far fa-life-ring fa-2x"></i>
        		</div>
        		<div class="col-md-8 text-right">
  					<h3><?php echo $count_pending_orders; ?></h3>
  					<div>Orders</div>
				</div>
        	</div>
          </div>
          </a>
          <a href="index.php?view_products">
	          <div style="text-align:center">
	    		<span style="float:left">Περισσότερα</span>
	    		<span style="float:right"><i class="fas fa-arrow-circle-right"></i></span>
			  </div>
         </a>    	
       </div>
    </div></div>
</div>

<br><br>

<div class="row">
  <div class=".col-12 .col-md-8"><div class=".col-md-10 " style="width: 43rem;">
		<div class="card">
			 <a href="index.php?view_products" class="btn btn-primary">
			 	<div class="card-heading">
			 		<h4 class="card-title">
			 			<i class="fas fa-money-bill-alt"></i> Νέες Παραγγελίες
			 		</h4>
			 	</div>
			 </a>
			 <div class="card-body">
			 		<div class="table-responsive">
						<table class="table table-bordered table-hover tble-striped">
							<thead>
								<tr>
									<th>Αριθμός Παραγγελίας:</th>
									<th>Email Πελάτη:</th>
									<th>Αριθμός Τιμολογίου:</th>
									<th>ID Προιόντος:</th>
									<th>Ποσότητα Προιόντος:</th>
									<th>Μέγεθος Προιόντος:</th>
									<th>Status:</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$i = 0;

								$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
								$run_order = mysqli_query($con,$get_order);

								while($row_order=mysqli_fetch_array($run_order)){

									$order_id = $row_order['order_id'];
									$c_id = $row_order['customer_id'];
									$invoice_no = $row_order['invoice_no'];
									$product_id = $row_order['product_id'];
									$qty = $row_order['qty'];
									$size = $row_order['size'];
									$order_status = $row_order['order_status'];

									$i++;

								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php
											$get_customer = "select * from customers where customer_id='$c_id'";
											$run_customer = mysqli_query($con,$get_customer);
											$row_customer = mysqli_fetch_array($run_customer);
											$customer_email = $row_customer['customer_email'];
											echo $customer_email;

										?>
									</td>
									<td><?php echo $invoice_no; ?></td>
									<td><?php echo $product_id; ?></td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td>
										<?php
											if($order_status=='Η Πληρωμή Αναμένεται'){

												echo $order_status='Η Πληρωμή Αναμένεται';

											}else {

												echo $order_status='Ολοκληρώθηκε';
											}
										?>
									</td>
								</tr>

								<?php } ?>
								
							</tbody>
						</table>
					</div>


					<div class="text-right">
						<a href="index.php?view_orders">
							Δείτε Όλες τις Παραγγελίες <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>

			 	</div>
			</div>
		</div>
</div>
  <div class=".col-6 .col-lg-4"> <div class="col-sm">
			<div class="card" style="width: 9rem;">
				<div class="card-body" >
					<div class="row">
						<div class=" mx-auto">
						<div class="thumb-info ">
							<!--<img src="admin_images/0.jpeg" align="middle" width="120" height="125" class="mx-auto d-block">
							<div class="thumb-info-title">
								<span class="thumb-info-inner"> Παναγιώτης Παπουλίδης </span>
							</div> -->
							 <img src="admin_images/<?php echo $admin_image; ?>" align="middle" width="120" height="125" class="rounded-circle mx-auto d-block" >
							  <div class="container">
							  	<div class="thumb-info-title">
							  	 <h6 class="text-center"><b ><?php echo $admin_name; ?></b></h6> 
							    <p class="text-center"><?php echo $admin_job; ?></p>
							  </div>	
								</div> 
								<p> Περιοχή: Θεσσαλονίκη</p>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
									<br>
								
    							<a href="#" class="btn btn-primary">Λεπτομέρειες</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
</div></div>
</div>


<div class="container">
  <div class="row">
    <div class="col-sm">
        
    </div>
    <div class="col-sm">
     
    </div>
 <!--   <div class="col-sm">
			<div class="card">
				<div class="card-body" >
					<div class="row">
						<div class=" mx-auto">
						<div class="thumb-info ">
							<img src="admin_images/0.jpeg" align="middle" width="120" height="125" class="mx-auto d-block">
							<div class="thumb-info-title">
								<span class="thumb-info-inner"> Panagiotis Papoulidis </span>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

-->




<!--
	<div class=".col-md-5">
		<div class="card" style="width: 20rem;">
			 <a href="index.php?view_products" class="btn btn-danger">
          <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
        			<i class="far fa-life-ring fa-4x"></i>
        		</div>
        		<div class="col-md-8 text-right">
  					<h1>10</h1>
  					<div>Παραγγελίες</div>
				</div>
        	</div>
          </div>
          </a>
          <a href="index.php?view_products">
	          <div style="text-align:center">
	    		<span style="float:center">Δείτε Λεπτομέρειες</span>
	    		<span style="float:center"><i class="fas fa-arrow-circle-right"></i></span>
			  </div>
         </a>    	
       </div>
	</div>
-->
<br>

<div class="row">
<!--	<div class=".col-md-10 " style="width: 43rem;">
		<div class="card">
			 <a href="index.php?view_products" class="btn btn-primary">
			 	<div class="card-heading">
			 		<h4 class="card-title">
			 			<i class="fas fa-money-bill-alt"></i> Νέες Παραγγελίες
			 		</h4>
			 	</div>
			 </a>
			 <div class="card-body">
			 		<div class="table-responsive">
						<table class="table table-bordered table-hover tble-striped">
							<thead>
								<tr>
									<th>Αριθμός Παραγγελίας:</th>
									<th>Email Πελάτη:</th>
									<th>Αριθμός Τιμολογίου:</th>
									<th>ID Προιόντος:</th>
									<th>Ποσότητα Προιόντος:</th>
									<th>Μέγεθος Προιόντος:</th>
									<th>Status:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>panagiip@gmail.com</td>
									<td>78055</td>
									<td>32</td>
									<td>2</td>
									<td>Large</td>
									<td>Complete</td>
								</tr>
								<tr>
									<td>1</td>
									<td>panagiip@gmail.com</td>
									<td>78055</td>
									<td>32</td>
									<td>2</td>
									<td>Large</td>
									<td>Complete</td>
								</tr>
								<tr>
									<td>1</td>
									<td>panagiip@gmail.com</td>
									<td>78055</td>
									<td>32</td>
									<td>2</td>
									<td>Large</td>
									<td>Complete</td>
								</tr>
							</tbody>
						</table>
					</div>


					<div class="text-right">
						<a href="index.php?view_orders">
							Δείτε Όλες τις Παραγγελίες <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>

			 	</div>
			</div>
		</div>
-->
		
</div>

</div>


<?php } ?>

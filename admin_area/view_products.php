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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Δείτε τα Προιόντα σας
				</li>
			</ol>
			
	</div>
</div>


<div class="row">
  <div class="col-lg-12"> 
        <div class="card"  style="width: 70rem;">
        	<div class="card-header">
			    <i class="fas fa-money-bill-alt"></i> Δείτε τα Προιόντα σας
			</div>
			<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>ID Προιόντος</th>
									<th>Όνομα Προιόντος</th>
									<th>Εικόνα </th>
									<th>Τιμή</th>
									<th>Πουλημένο</th>
									<th>Ημερομηνία</th>
									<th>Διαγραφή Προιόντος</th>
									<th>Τροποποίηση Προιόντος</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$i=0;

								$get_pro = "select * from products";
								$run_pro = mysqli_query($con,$get_pro);

								while($row_pro=mysqli_fetch_array($run_pro)){

									$pro_id = $row_pro['product_id'];
									$pro_title = $row_pro['product_title'];
									$pro_image = $row_pro['product_img1'];
									$pro_price = $row_pro['product_price'];
									$pro_keywords = $row_pro['product_keywords'];
									$pro_date= $row_pro['date'];

									$i++;
								?>

								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $pro_title; ?></td>
									<td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>
									<td><?php echo $pro_price; ?>€ </td>
									<td>
									<?php 

										$get_sold = "select * from pending_orders where product_id='$pro_id'";
										$run_sold = mysqli_query($con,$get_sold);
										$count = mysqli_num_rows($run_sold);
										echo $count;
									 ?>
									 </td>
									<!-- <td> <?php echo $pro_keywords; ?></td> -->
									<td><?php echo $pro_date; ?></td>
									<td>
										<a href="index.php?delete_product=<?php echo $pro_id; ?>">
											<i class="fas fa-trash-alt"></i> Διαγραφή
										</a>
									</td>
									<td>
										<a href="index.php?edit_product=<?php echo $pro_id; ?>">
											<i class="fas fa-edit"></i> Διόρθωση
										</a>
									</td>
								</tr>

								<?php  } ?>
							</tbody>
						</table>
					</div>
			</div>
       </div>
    </div>
</div>
<?php } ?>
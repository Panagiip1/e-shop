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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Δείτε τις Κατηγορίες Προιόντων σας
				</li>
			</ol>
			
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
			<div class="card"  style="width: 70rem;">
        		<div class="card-header">
			    	<i class="fas fa-money-bill-alt"></i> Δείτε τις Κατηγορίες Προιόντων σας
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Id Κατηγορίας Προιόντος</th>
									<th>Τίτλος Κατηγορίας Προιόντος</th>
									<th>Περιγραφή Κατηγορίας Προιόντος</th>
									<th>Διαγραφή Κατηγορίας Προιόντος</th>
									<th>Διόρθωση Κατηγορίας Προιόντος</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$i = 0;
									$get_p_cats = "select * from product_categories";
									$run_p_cats = mysqli_query($con,$get_p_cats);

									while($row_p_cats = mysqli_fetch_array($run_p_cats)){

										$p_cat_id = $row_p_cats['p_cat_id'];
										$p_cat_title = $row_p_cats['p_cat_title'];
										$p_cat_desc = $row_p_cats['p_cat_desc'];

										$i++;

									?>

									<tr>
										<td> <?php echo $i; ?></td>
										<td> <?php echo $p_cat_title;  ?></td>
										<td width="300"> <?php echo $p_cat_desc;  ?></td>
										<td>
											<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
												<i class="fas fa-trash-alt"></i> Διαγραφή
											</a>
										</td>
										<td>
											<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
												<i class="fas fa-edit"></i> Διόρθωση
											</a>
										</td>
									</tr>

									<?php  }  ?>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>


<?php  }  ?>
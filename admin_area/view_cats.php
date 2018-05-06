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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Δείτε τις Κατηγορίες σας
				</li>
			</ol>
			
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
			<div class="card"  style="width: 70rem;">
        		<div class="card-header">
			    	<i class="fas fa-money-bill-alt"></i> Δείτε τις Κατηγορίες σας
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Id Κατηγορίας</th>
									<th>Τίτλος Κατηγορίας</th>
									<th>Περιγραφή Κατηγορίας</th>
									<th>Διαγραφή Κατηγορίας</th>
									<th>Διόρθωση Κατηγορίας</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$i = 0;
									$get_cats = "select * from categories";
									$run_cats = mysqli_query($con,$get_cats);

									while($row_cats = mysqli_fetch_array($run_cats)){

										$cat_id = $row_cats['cat_id'];
										$cat_title = $row_cats['cat_title'];
										$cat_desc = $row_cats['cat_desc'];

										$i++;

									?>

									<tr>
										<td> <?php echo $i; ?></td>
										<td> <?php echo $cat_title;  ?></td>
										<td width="300"> <?php echo $cat_desc;  ?></td>
										<td>
											<a href="index.php?delete_cat=<?php echo $cat_id; ?>">
												<i class="fas fa-trash-alt"></i> Διαγραφή
											</a>
										</td>
										<td>
											<a href="index.php?edit_cat=<?php echo $cat_id; ?>">
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



<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {


?>

<?php

if(isset($_GET['edit_p_cat'])){

	$edit_p_cat_id = $_GET['edit_p_cat'];

	$edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";

	$run_edit = mysqli_query($con,$edit_p_cat_query);

	$row_edit = mysqli_fetch_array($run_edit);

	$p_cat_id = $row_edit['p_cat_id'];

	$p_cat_title = $row_edit['p_cat_title'];

	$p_cat_desc = $row_edit['p_cat_desc'];

}


?>

?>

<br><br>

<div class="row">
	<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Διόρθωση Κατηγορία Προιόντος
				</li>
			</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Διόρθωση Κατηγορίας Προιόντος	
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Τίτλος Κατηγορίας  Προιόντος</label>
	    				<div class="col-md-7">
	    					<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Περιγραφή Κατηγορίας  Προιόντος</label>
	    				<div class="col-md-7">
	    					<textarea type="text" name="p_cat_desc" class="form-control" rows="3" cols="10">
	    						<?php echo $p_cat_desc; ?>

	    					</textarea>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label">  </label>
	    				<div class="col-md-7">
	    					<input type="submit" name="update" value="Ανανέωση" class="btn btn-primary form-control">
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
	</div>
</div>

<?php

if(isset($_POST['update'])){

	$p_cat_title = $_POST['p_cat_title'];

	$p_cat_desc = $_POST['p_cat_desc'];

	$update_p_cat = "update product_categories set p_cat_title='$p_cat_title',
	 p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";

	$run_p_cat = mysqli_query($con,$update_p_cat);

	if($run_p_cat){

		echo "<script>alert('Η Κατηγορία Προιόντος έχει Ανανεωθεί')</script>";
		echo "<script>window.open('index.php?view_p_cats','_self')</script>";
	}
}


?>


<?php } ?>
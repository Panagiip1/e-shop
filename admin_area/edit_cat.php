<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {



?>

<?php

if(isset($_GET['edit_cat'])){

	$edit_id = $_GET['edit_cat'];
	$edit_cat = "select * from categories where cat_id='$edit_id'";

	$run_edit = mysqli_query($con,$edit_cat);

	$row_edit = mysqli_fetch_array($run_edit);

	$c_id = $row_edit['cat_id'];

	$c_title = $row_edit['cat_title'];

	$c_desc = $row_edit['cat_desc'];

}

?>

<br><br>

<div class="row">
	<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Τροποποίηση Κατηγορίας
				</li>
			</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Τροποποίηση Κατηγορίας
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Τίτλος Κατηγορίας</label>
	    				<div class="col-md-7">
	    					<input name="cat_title" class="form-control" value="<?php echo $c_title; ?>" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Περιγραφή Κατηγορίας </label>
	    				<div class="col-md-7">
	    					<textarea name="cat_desc" class="form-control" rows="3" cols="10">
	    						<?php echo $c_desc; ?>
	    					</textarea>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label">  </label>
	    				<div class="col-md-7">
	    					<input type="submit" name="update" value="Τροποποίηση Κατηγορίας" class="btn btn-primary form-control">
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
	</div>
</div>

<?php

if(isset($_POST['update'])){

	$cat_title = $_POST['cat_title'];
	$cat_desc = $_POST['cat_desc'];

	$update_cat = "update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$c_id'";

	$run_cat = mysqli_query($con,$update_cat);

	if($run_cat){

		echo "<script>alert('Μία Κατηγορία έχει ανανεωθεί επιτυχημένα')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}


}

?>
<?php  }  ?>
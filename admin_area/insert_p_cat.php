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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Εισαγωγή Κατηγορία Προιόντος
				</li>
			</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Εισαγωγή Κατηγορίας Προιόντος	
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Τίτλος Κατηγορίας  Προιόντος</label>
	    				<div class="col-md-7">
	    					<input type="text" name="p_cat_title" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label"> Περιγραφή Κατηγορίας  Προιόντος</label>
	    				<div class="col-md-7">
	    					<textarea name="product_desc" class="form-control" rows="3" cols="10"></textarea>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-5 control-label">  </label>
	    				<div class="col-md-7">
	    					<input type="submit" name="submit" value="Εισαγωγή" class="btn btn-primary form-control">
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
	</div>
</div>

<?php

if(isset($_POST['submit'])){

	$p_cat_title = $_POST['p_cat_title'];

	$p_cat_desc = $_POST['p_cat_desc'];

	$insert_p_cat = "insert into product_categories (p_cat_title,p_cat_desc) values ('$p_cat_title','$p_cat_desc')";

	$run_p_cat = mysqli_query($con,$insert_p_cat);

	if($run_p_cat){

		echo "<script>alert('Νέα Κατηγορία Προιόντος έχει Εισαχθεί')</script>";
		echo "<script>window.open('index.php?view_p_cats','_self')</script>";

	}

}


?>


<?php } ?>
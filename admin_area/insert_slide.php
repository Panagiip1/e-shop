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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Εισάγεται Slide
				</li>
			</ol>	
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Εισαγωγή Slide	
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Τίτλος Slide</label>
	    				<div class="col-md-8">
	    					<input type="text" name="slide_name" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Όνομα Slide</label>
	    				<div class="col-md-8">
	    					<input type="file" name="slide_image" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"></label>
	    				<div class="col-md-8">
	    					<input type="submit" name="submit" value="Εισαγωγή" class="btn btn-primary form-control" required>
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
	</div>
</div>


<?php

if(isset($_POST['submit'])){

	$slide_name = $_POST['slide_name'];

	$slide_image = $_FILES['slide_image']['name'];

	$temp_name = $_FILES['slide_image']['tmp_name'];

	$view_slides = "select * from slider";

	$view_run_slides = mysqli_query($con,$view_slides);

	$count = mysqli_num_rows($view_run_slides);

	if($count<4){

		move_uploaded_file($temp_name, "slides_images/$slide_image");

		$insert_slide = "insert into slider (slide_name,slide_image) values ('$slide_name','$slide_image')";

		$run_slide = mysqli_query($con,$insert_slide);

		echo "<script>alert('Ένα Νέο Slide έχει μόλις Εισαχθεί')</script>";
		echo "<script>window.open('index.php?view_slides','_self')</script>";
	}
	else {
		echo "<script>alert('Έχεται ήδη Εισάγει 4 slides')</script>";
	}
}


?>


<?php  } ?>
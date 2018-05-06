<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {


?>

<?php

if(isset($_GET['edit_slide'])){

	$edit_id = $_GET['edit_slide'];

	$edit_slide = "select * from slider where slide_id='$edit_id'";

	$run_edit = mysqli_query($con,$edit_slide);

	$row_edit = mysqli_fetch_array($run_edit);

	$slide_id = $row_edit['slide_id'];

	$slide_name = $row_edit['slide_name'];

	$slide_image = $row_edit['slide_image'];


}

?>

<br><br>

<div class="row">
	<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Τροποποιήση Slide
				</li>
			</ol>	
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Τροποποιήση Slide	
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Τίτλος Slide</label>
	    				<div class="col-md-8">
	    					<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name; ?>" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Όνομα Slide</label>
	    				<div class="col-md-8">
	    					<input type="file" name="slide_image" class="form-control"  required>
	    					<br>
	    					<img src="slides_images/<?php echo $slide_image; ?>" width="70" height="55" style="float:left">
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"></label>
	    				<div class="col-md-8">
	    					<input type="submit" name="update" value="Ανανέωση" class="btn btn-primary form-control" required>
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
	</div>
</div>


<?php

if(isset($_POST['update'])){

	$slide_name = $_POST['slide_name'];

	$slide_image = $_FILES['slide_image']['name'];

	$temp_name = $_FILES['slide_image']['tmp_name'];

	move_uploaded_file($temp_name, "slides_images/$slide_image");

	$update_slide = "update slider set slide_name='$slide_name',slide_image='$slide_image' where slide_id='$slide_id'";

	$run_slide = mysqli_query($con,$update_slide);

	if($run_slide){

		echo "<script>alert('Ένα Slide έχει Ανανεωθεί')</script>";
		echo "<script>window.open('index.php?view_slides','_self')</script>";

	}

	
}


?>


<?php  } ?>
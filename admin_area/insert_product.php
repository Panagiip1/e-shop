<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {


?>
<!DOCTYPE html>
<html>
<head>
	<title>Εισαγωγή Προιόντων</title>
	

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>

</head>
<body>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Εισαγωγή Προιόντων
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card ">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i> Εισαγωγή Προιόντων	
	    		</h4>
	    	</div>
	    	<div class="card-body text-right">
	    		<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Τίτλος Προιόντος</label>
	    				<div class="col-md-6">
	    					<input type="text" name="product_title" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Κατηγορία Προιόντος</label>
	    				<div class="col-md-6">
	    					<select name="product_cat" class="form-control">
	    						<option> Επιλέξτε μια Κατηγορία Προιόντος </option>
	    						<?php

	    						$get_p_cats = "select * from product_categories";

	    						$run_p_cats = mysqli_query($con,$get_p_cats);

	    						while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
	    							$p_cat_id = $row_p_cats['p_cat_id'];
	    							$p_cat_title = $row_p_cats['p_cat_title'];
	    							
	    							echo "<option value='$p_cat_id' >$p_cat_title</option>";
	    						}

	    						?>
	    					</select>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Κατηγορία </label>
	    				<div class="col-md-6">
	    					<select name="cat" class="form-control">
	    						<option> Επιλέξτε μία Κατηγορία </option>
	    						<?php

	    						$get_cat ="select * from categories";
	    						$run_cat = mysqli_query($con,$get_cat);

	    						while ($row_cat=mysqli_fetch_array($run_cat)) {
	    							$cat_id = $row_cat['cat_id'];
	    							$cat_title = $row_cat['cat_title'];

	    							echo "<option value='$cat_id'>$cat_title</option>";
	    						}
	    						?>

	    					</select>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Εικόνα Προιόντος 1</label>
	    				<div class="col-md-6">
	    					<input type="file" name="product_img1" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Εικόνα Προιόντος 2</label>
	    				<div class="col-md-6">
	    					<input type="file" name="product_img2" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Εικόνα Προιόντος 3</label>
	    				<div class="col-md-6">
	    					<input type="file" name="product_img3" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Τιμή Προιόντος</label>
	    				<div class="col-md-6">
	    					<input type="text" name="product_price" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Λέξεις Κλειδιά του Προιόντος</label>
	    				<div class="col-md-6">
	    					<input type="text" name="product_keywords" class="form-control" required>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> Περιγραφή Προιόντος</label>
	    				<div class="col-md-6">
	    					<textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
	    				</div>
	    			</div>
	    			<div class="form-group row">
	    				<label class="col-md-3 control-label"> </label>
	    				<div class="col-md-6">
	    					<input type="submit" name="submit" value="Εισαγωγή Προιόντος" class="btn btn-primary form-control">
	    				</div>
	    			</div>
	    			
	    		</form>
	    	</div>
	    </div>
	</div>
</div>



</body>
</html>

<?php 

if(isset($_POST['submit'])) {

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1, "product_images/$product_img1");
move_uploaded_file($temp_name2, "product_images/$product_img2");
move_uploaded_file($temp_name3, "product_images/$product_img3");

$insert_product = "insert into products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keywords) values ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$$product_img2','$product_img3','$product_price','$product_desc','$product_keywords')";

$run_product = mysqli_query($con,$insert_product);

if($run_product){

	echo "<script>alert('Product has been inserted successfullly')</script>";

	echo "<script>window.open('index.php?view_products','_self')</script>";
}

}


?>

<?php

}

?>
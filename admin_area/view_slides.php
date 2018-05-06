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
					 <i class="fas fa-tachometer-alt"></i> Ταμπλό Ελέγχου / Δείτε τα Slides
				</li>
			</ol>	
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card">
  			<div class="card-header">
	    		<h4 class="card-title">
	    			<i class="far fa-money-bill-alt"></i>  Δείτε τα Slides	
	    		</h4>
	    	</div> 
	    	<div class="card-body">  
	    		<?php
	    			$get_slides = "select * from slider";
	    			$run_slides = mysqli_query($con,$get_slides);

	    			while($row_slides=mysqli_fetch_array($run_slides)){

	    				$slide_id = $row_slides['slide_id'];
	    				$slide_name = $row_slides['slide_name'];
	    				$slide_image = $row_slides['slide_image'];

					?>	
					<div class="row">
  						<div class="col"> <div class="col-lg">
  						<a href="index.php?delete_slide">	
			        <div class="card" style="width: 130px; margin-left: 3px; margin-right: 34px; ">
			      
						     <h6 class="text-center" style="background-color: #1E90FF; color: white;"><?php echo $slide_name; ?></h6>		
						
			          <div class="card-body">
			          	 
			        	<div class="row">

			        		<div class="col-md-10">
			        			<img src="slides_images/<?php echo $slide_image; ?>" style="width: 90px;">
			        		</div>
			        		
			        	</div>
			          </div>
			          </a>
			          <a href="index.php?delete_slide=<?php echo $slide_id;  ?>">
				          <div style="background-color: #ececec; >
				    		 <a href="index.php?delete_slide=<?php echo $slide_id;  ?>" style="float:left;">
						          	 	<i class="fas fa-trash-alt" style="font-size: 20px;"></i> 
						          	 </a>
						          	 <a href="index.php?edit_slide=<?php echo $slide_id;  ?>" style="float:right">
						          	 	<i class="fas fa-pencil-alt"></i>
						          	 </a>
						  </div>
			         </a>    	
			       </div>
			    </div></div>
			

					<?php  }  ?>
	    		
	    	</div>
	    </div>
	</div>
</div>


<?php  }  ?>
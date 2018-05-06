

<div class="footer" style="background-color:#E0E0E0";>
	<div class="container">
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<h4>Σελίδες</h4>
				<ul class="no-bullets">
					<?php
					$get_p_cats = "select * from product_categories";

					$run_p_cats = mysqli_query($con,$get_p_cats);

					while($row_p_cats = mysqli_fetch_array($run_p_cats)) {

						$p_cat_id = $row_p_cats['p_cat_id'];

						$p_cat_title = $row_p_cats['p_cat_title'];

						echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title </a></li>";
					}


					?>
				<!--  	<li><a href="cart.php">Κάρτα</a></li>
				 	<li><a href="contact.php">Επικοινώνησε μαζί μας</a></li>
				 	<li><a href="shop.php">Κατάστημα</a></li>
				 	<li><a href="checkout.php">Ο Λογαργιασμός μου</a></li> -->
				</ul>

				<hr>

				<h4>Χρήστης</h4>
				<ul>
			<li> 
			<?php

            if(!isset($_SESSION['customer_email'])){
              
              echo "<a class='nav-link' href='checkout.php'>Login</a>";

            }else{

              echo "<a class='nav-link' href='my_account.php?my_orders'>O Λογαριασμός μου</a>";
            }

            ?>
            	
            </li>
			<li><a href="register.php">Register</a></li>
			</ul>

				<hr class="hiddem-md hiddem-lg hiddem-sm">

		</div>

			<div class="col-md-3 col-sm-6">
				<h4>Νέα</h4>
				<p class="text-muted">
					Neque aliquam vestibulum morbi blandit cursus risus at ultrices mi. Amet porttitor eget dolor morbi non.
				</p>

		<form action="" method="post">
			<div class="input-group">
				<input type="text" class="form-control" name="email">

				<span class="input-group-btn">
					<input type="submit" value="subscribe" class="btn btn-primary">
				</span>
			</div>

			<hr>

			<h4>Social Media</h4>

			<p class="social">
				<a href="#"><i class="fab fa-facebook-square"></i></a>
				<a href="#"><i class="fab fa-twitter-square"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
				<a href="#"><i class="fas fa-envelope-square"></i></a>
			</p>

		</form>
		</div>

		<div class="col-md-3 col-sm-6">
			<h4>Που θα μας βρείτε</h4>
			<p>
				<strong>Παπουλίδης AE</strong>
				<br>Ωραιοκάστρου 6
				<br>Θεσσαλονίκη
				<br>6973183544
				<br>panagiip@gmail.com
				<br>
				<strong>Παναγιώτης Παπουλίδης</strong>
			</p>

			<a href="contact.php">Πήγαινε στην Σελίδα Επικοινωνίας </a>
		</div>

		<hr class="hiddem-md hiddem-lg">
		</div>
	</div>
	</div>
</div>

<div class="copyright"  >
	<div class="container">
		<div class="col-md-6" >
			<p class="pull-left" style="background-color:#191919; color: white;"> &copy; 2018 Panagiotis Papoulidis</p>
		</div>
		<div class="col-md-12">
			<p class="pull-right" style="background-color:#191919; color: white;">
				Template by <a href="https://www.linkedin.com/in/panagiotis-papoulidis-3343923a/">Panagiotis Papoulidis</a>
			</p>

		</div>
	</div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>


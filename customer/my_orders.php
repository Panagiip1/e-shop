
<center>		
<h1>Οι Παραγγελίες μου </h1>

<p class="lead">Οι παραγγελίες σου σε ένα μέρος</p>

<p class="text-muted">
Αν έχεται κάποια ερώτηση, παρακαλώ μην διστάσεται να επικοινωνίσεται στο <a href="../contact.php"> με το τμήμα εξηπηρέτησης πελατών</a> που λειτουργεί 24/7. 

</p>
</center>

<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>O N:</th>
				<th>Ποσό:</th>
				<th>No Τιμολογίου Παραγγελίας:</th>
				<th>Qty:</th>
				<th>Μέγεθος:</th>
				<th>Ημερομηνία Παραγγελίας:</th>
				<th>Πληρωμένα/Απλήρωτα:</th>
				<th>Κατάσταση:</th>
			</tr>
		</thead>
		<tbody>

			<?php

			$customer_session = $_SESSION['customer_email'];
			$get_customer = "select * from customers where customer_email='$customer_session'";
			$run_customer = mysqli_query($con,$get_customer);

			$row_customer = mysqli_fetch_array($run_customer);

			$customer_id = $row_customer['customer_id'];

			$get_orders = "select * from customer_orders where customer_id='$customer_id'";

			$run_orders = mysqli_query($con,$get_orders);

			$i = 0;

			while($row_orders = mysqli_fetch_array($run_orders)){

				$order_id = $row_orders['order_id'];
				$due_amount = $row_orders['due_amount'];
				$invoice_no = $row_orders['invoice_no'];
				$qty = $row_orders['qty'];
				$size = $row_orders['size'];
				$order_date = substr($row_orders['order_date'],0,11);
				$order_status = $row_orders['order_status'];

				$i++;

				if($order_status=='Η Πληρωμή Αναμένεται') {

					$order_status = "Απλήρωτα";

				}else{

					$order_status = "Πληρώθηκε";
				}

			?>
			<tr>
				<th><?php echo $i; ?></th>
				<td><?php echo $due_amount; ?>€</td>
				<td><?php echo $invoice_no; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo $size; ?></td>
				<td><?php echo $order_date; ?></td>
				<td><?php echo $order_status; ?></td>
				<td>
					<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-primary btn-sm">Επιβεβαίωση Αν Πληρώθηκε</a>
				</td>
			</tr>
			<?php  }  ?>
		</tbody>
	</table>
</div>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
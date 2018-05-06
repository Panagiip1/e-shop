<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}
else {





?>


 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <a class="navbar-brand" href="index.php?dashboard">To Panel του Διαχειριστή</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        
         <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="#users" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cogs"></i> Χρήστες</a>
            <ul id="users" class="dropdown-menu collapse" aria-labelledby="dropdown01">
              <li> <a class="dropdown-item" href="index.php?insert_user"> Εισαγωγή Χρήστη</a></li>
              <li> <a class="dropdown-item" href="index.php?view_users"> Δείτε τους Χρήστες</a></li>
              <li> <a class="dropdown-item" href="index.php?user_profile=<?php $admin_id; ?>"> Edit το Προφίλ σας</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> Log Out<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown" style="float: right">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown">
                <i class="fas fa-user"></i>
                <?php echo $admin_name; ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <div class="dropdown-content">
                <li>
                  <a href="index.php?user_profile">
                    <i class="fas fa-users"></i> Προφίλ
                  </a>
                </div>
                </li>
                <div class="dropdown-content">
                 <li>
                  <a href="index.php?view_products">
                    <i class="fas fa-envelope"></i> Προιόντα
                   <span class="badge badge-danger"><?php echo $count_products; ?></span>
                  </a>
                </li>
               </div>
              <div class="dropdown-content">
                <li>
                  <a href="index.php?view_customers">
                    <i class="fas fa-cogs"></i> Πελάτες
                     <span class="badge badge-success"><?php echo $count_customers; ?></span>
                  </a>
                </li>
              </div>
               <div class="dropdown-content">
                 <li>
                  <a href="index.php?view_p_cats">
                    <i class="fas fa-cogs"></i> Κατηγορίες
                     <span class="badge badge-warning"><?php echo $count_p_categories; ?></span>
                  </a>
                </li>
              </div>
                <div class="dropdown-divider" ></div>
                  <div id="lang">
                     <div class="dropdown-content">
                      <li><a href="logout.php"><i class="fas fa-power-off"></i> Log Out</a></li>
                    </div>
                  </div>
                </div>
              </ul>
          </li>
        </ul>
      
      </div>
    </nav>

<!--
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="fixed-top"></div>
      <a class="navbar-brand" href="index.php?dashboard">To Panel του Διαχειριστή</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto side-nav">
         <li class="nav-item active">
            <a class="nav-link" href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard<span class="sr-only">(current)</span></a>
          </li>
      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="#products" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-table"></i> Προιόντα</a>
            <ul id="products" class="dropdown-menu collapse" aria-labelledby="dropdown01">
              <li> <a class="dropdown-item" href="index.php?insert_product"> Εισαγωγή Προιόντων</a></li>
              <li> <a class="dropdown-item" href="index.php?view_products"> Δείτε τα Προιόντα</a></li>
            </ul>
          </li> 

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="#p_cat" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-pencil-alt"></i> Κατηγορίες Προιόντων </a>
            <ul id="products" class="dropdown-menu collapse" aria-labelledby="dropdown01">
              <li> <a class="dropdown-item" href="index.php?insert_product"> Εισαγωγή Κατηγορία Προιόντος</a></li>
              <li> <a class="dropdown-item" href="index.php?view_products"> Δείτε τις Κατηγορίες Προιόντων</a></li>
            </ul>
          </li> 
          <div class="d-flex justify-content-end">...</div>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="#slides" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cogs"></i> Slides</a>
            <ul id="slides" class="dropdown-menu collapse" aria-labelledby="dropdown01">
              <li> <a class="dropdown-item" href="index.php?insert_product"> Εισαγωγή Slide</a></li>
              <li> <a class="dropdown-item" href="index.php?view_products"> Δείτε τα Slides</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_customers"><i class="fas fa-edit"></i> Δείτε τους Πελάτες<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_orders"><i class="fas fa-list-ul"></i> Δείτε τις Παραγγελίες σας<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view_payments"><i class="fas fa-pencil-alt"></i> Δείτε τις Πληρωμές σας<span class="sr-only">(current)</span></a>
          </li>



        </ul>
      </div>


      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="#users" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cogs"></i> Χρήστες</a>
            <ul id="users" class="dropdown-menu collapse" aria-labelledby="dropdown01">
              <li> <a class="dropdown-item" href="index.php?insert_user"> Εισαγωγή Χρήστη</a></li>
              <li> <a class="dropdown-item" href="index.php?view_users"> Δείτε τους Χρήστες</a></li>
              <li> <a class="dropdown-item" href="index.php?user_profile"> Edit το Προφίλ σας</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> Log Out<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown" style="float: right">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown">
                <i class="fas fa-user"></i>
                Panagiotis Papoulidis <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="index.php?user_profile">
                    <i class="fas fa-users"></i> Προφίλ
                  </a>
                </li>
                 <li>
                  <a href="index.php?view_products">
                    <i class="fas fa-envelope"></i> Προιόντα
                   <span class="badge badge-primary">7</span>
                  </a>
                </li>
                <li>
                  <a href="index.php?view_customers">
                    <i class="fas fa-cogs"></i> Πελάτες
                     <span class="badge badge-primary">12</span>
                  </a>
                </li>
                 <li>
                  <a href="index.php?view_cats">
                    <i class="fas fa-cogs"></i> Κατηγορίες
                     <span class="badge badge-primary">5</span>
                  </a>
                </li>
                <div class="dropdown-divider" ></div>
                  <div id="lang">
                      <li><a href="logout.php"><i class="fas fa-power-off"></i> Log Out</a></li>
                  </div>
                </div>
              </ul>
          </li>
        </ul>
      </div>
  
</nav>


-->







 <ul id="accordion1" class="nav nav-pills flex-column">
    <li class="nav-item active">
            <a class="nav-link" href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard </i><span class="sr-only">(current)</span></a>
    </li>


  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1"><i class="fas fa-fw fa-table"></i> Προιόντα <i class="fas fa-caret-down"></i></a>
    <div id="item-2" class="collapse">
      <ul class="nav flex-column ml-2">
        <li> <a class="dropdown-item" href="index.php?insert_product"> Εισαγωγή Προιόντων</a></li>
         <li> <a class="dropdown-item" href="index.php?view_products"> Δείτε τα Προιόντα</a></li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1"><i class="fas fa-pencil-alt"></i> Κατηγορίες Προιόντων <i class="fas fa-caret-down"> </i> </a>
    <div id="item-3" class="collapse">
      <ul class="nav flex-column ml-3">
         <li> <a class="dropdown-item" href="index.php?insert_p_cat"> Εισαγωγή Κατηγορία Προιόντος</a></li>
        <li> <a class="dropdown-item" href="index.php?view_p_cats"> Δείτε τις Κατηγορίες Προιόντων</a></li>
      </ul>
    </div>
  </li>
 <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-4" data-parent="#accordion1"><i class="fas fa-pencil-alt"></i> Κατηγορίες <i class="fas fa-caret-down"></i>  </a>
    <div id="item-4" class="collapse">
      <ul class="nav flex-column ml-3">
         <li> <a class="dropdown-item" href="index.php?insert_cat"> Εισαγωγή Κατηγορίας</a></li>
        <li> <a class="dropdown-item" href="index.php?view_cats"> Δείτε τις Κατηγορίες</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-5" data-parent="#accordion1"><i class="fas fa-cogs"></i> Slides <i class="fas fa-caret-down"></i>  </a>
    <div id="item-5" class="collapse">
      <ul class="nav flex-column ml-2">
         <li> <a class="dropdown-item" href="index.php?insert_slide"> Εισαγωγή Slide</a></li>
        <li> <a class="dropdown-item" href="index.php?view_slides"> Δείτε τα Slides</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
            <a class="nav-link" href="index.php?view_customers"><i class="fas fa-edit"></i> Δείτε τους Πελάτες </i><span class="sr-only">(current)</span></a>
    </li>
  
   <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-7" data-parent="#accordion1"><i class="fas fa-list-ul"></i> Δείτε τις Παραγγελίες σας </a>
  </li>
   <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-8" data-parent="#accordion1"><i class="fas fa-pencil-alt"></i> Δείτε τις Πληρωμές σας</a>
  </li>

   <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-9" data-parent="#accordion1"><i class="fas fa-cogs"></i> Χρήστες <i class="fas fa-caret-down"></i></a>
    <div id="item-9" class="collapse">
      <ul class="nav flex-column ml-2">
        <li> <a class="dropdown-item" href="index.php?insert_product"> Εισαγωγή Χρήστη</a></li>
         <li> <a class="dropdown-item" href="index.php?view_products"> Δείτε τους Χρήστες</a></li>
          <li> <a class="dropdown-item" href="index.php?view_products"> Edit το Προφίλ σας</a></li>
      </ul>
    </div>
  </li>
   <li class="nav-item">
      <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> Log Out<span class="sr-only">(current)</span></a>
    </li>

</ul>



</body>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


<?php  } ?>
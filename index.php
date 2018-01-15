<?php include('includes/connect.php'); ?>
<?php include('includes/header.php'); ?>



<?php  if ( current_page_exists()  ) : ?>
  <?php include(current_page() ); ?>
<?php else : ?>
  <?php include('404.php'); ?>
 <?php endif; ?>


<?php include('includes/footer.php'); ?>

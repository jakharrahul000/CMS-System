<?php include "includes/header.php" ?>
<?php include "includes/functions.php" ?>



    <div id="wrapper">

      <!-- Sidebar -->
      <?php include "includes/nav.php" ?>
      

      <div id="page-wrapper">

        <div class="row">

          <div class="col-lg-12">

            <div class="col-xs-12">
              <h1>WELCOME to admin <small>Author </small></h1>
            </div>
            <div class="col-xs-12"> 
<?php

if (isset($_GET['source'])) {
  $source = $_GET['source'];
}else{
  $source = '';
}

switch ($source) {
  case 'add_post':
    include "includes/add_posts.php";
    break;

  case 'edit_post':
    include "includes/edit_post.php";
    break;
  
  default:
    include "includes/view_all_posts.php";
    break;
}

?>

<?php

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = {$delete_id}";
  $delete_post_selected = mysqli_query($connection, $query);
  header("Location: posts.php");
}
?>



            </div>

          </div>


        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<!-- JavaScript -->
<?php include "includes/script.php" ?>
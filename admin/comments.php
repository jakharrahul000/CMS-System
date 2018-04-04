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
  case 'add_comment':
    //
    break;

  case 'edit_comment':
    //
    break;
  
  default:
    include "includes/view_all_comments.php";
    break;
}

?>

<?php

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];

  $query = "DELETE FROM comments WHERE comment_id = {$delete_id}";
  $delete_comment_selected = mysqli_query($connection, $query);
  header("Location: comments.php");
}
?>

<?php

if (isset($_GET['approve'])) {
  $approve_id = $_GET['approve'];

  $query = "UPDATE comments SET comment_status= 'Approved' WHERE comment_id = {$approve_id}";
  $approve_comment_selected = mysqli_query($connection, $query);
  header("Location: comments.php");
}
?>

<?php

if (isset($_GET['disapprove'])) {
  $disapprove_id = $_GET['disapprove'];

  $query = "UPDATE comments SET comment_status= 'Disapproved' WHERE comment_id = {$disapprove_id}";
  $disapprove_comment_selected = mysqli_query($connection, $query);
  header("Location: comments.php");
}
?>




            </div>

          </div>


        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<!-- JavaScript -->
<?php include "includes/script.php" ?>
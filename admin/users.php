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
  case 'add_user':
    include "includes/add_user.php";
    break;

  case 'edit_user':
    include "includes/edit_user.php";
    break;
  
  default:
    include "includes/view_all_users.php";
    break;
}

?>

<?php

if (isset($_GET['delete_id'])) {

  if (isset($_SESSION['user_role'])) {
    
  if ($_SESSION['user_role'] == 'admin') {
   
  


  $delete_id = $_GET['delete_id'];

  $query = "DELETE FROM users WHERE user_id = {$delete_id}";
  $delete_user_selected = mysqli_query($connection, $query);
  header("Location: users.php");
}}}
?>

<?php

if (isset($_GET['admin_id'])) {
  $admin_id = $_GET['admin_id'];

  $query = "UPDATE users SET user_role='admin' WHERE user_id = {$admin_id}";
  $make_user_selected_admin = mysqli_query($connection, $query);
  header("Location: users.php");
}
?>

<?php

if (isset($_GET['subscriber_id'])) {
  $subscriber_id = $_GET['subscriber_id'];

  $query = "UPDATE users SET user_role='subscriber' WHERE user_id = {$subscriber_id}";
  $make_user_selected_subscriber = mysqli_query($connection, $query);
  header("Location: users.php");
}
?>



            </div>

          </div>


        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<!-- JavaScript -->
<?php include "includes/script.php" ?>
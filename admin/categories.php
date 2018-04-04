<?php include "includes/header.php" ?>
<?php include "includes/functions.php" ?>



    <div id="wrapper">

      <!-- Sidebar -->
      <?php include "includes/nav.php" ?>
      

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">

            <h1>WELCOME to admin <small>Author </small></h1> 


            <div class="col-xs-6"> 


<?php
// Add Category
add_category();
?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Add Category</label>
                  <input type="text" name="cat_title" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Add">
                </div>
              </form>  


<?php

if (isset($_GET['edit'])) {
  $cat_id = $_GET['edit'];

  include "includes/update_categories.php";
}

?>

            </div>



            <div class="col-xs-6"> 
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Category Id</th>
                    <th colspan="3">Category Title</th>
                  </tr>
                </thead>
                <tbody>

<?php

$query = "SELECT * FROM categories";
$select_all_categories = mysqli_query($connection, $query);

while ( $row = mysqli_fetch_assoc($select_all_categories)) {
  $cat_title = $row['cat_title'];
  $cat_id = $row['cat_id'];

                  echo "<tr>";
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                  echo "</tr>";

?>
                  
                

<?php } ?>

<?php 
// Delete Category
delete_category();
?>
                </tbody>
              </table> 
            </div>

          </div>


        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<!-- JavaScript -->
<?php include "includes/script.php" ?>
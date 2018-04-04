              <form action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Edit Category</label>

<?php 

if (isset($_GET['edit'])) {
  $edit_category_id = $_GET['edit'];

  $query = "SELECT * FROM categories WHERE cat_id = {$edit_category_id}";
  $edit_category = mysqli_query($connection, $query);

  while ( $row = mysqli_fetch_assoc($edit_category)){
    $cat_title = $row['cat_title'];
?>
                  <input type="text" name="cat_title" class="form-control" value="<?php 
if(isset($cat_title)){
  echo $cat_title;
} 
?>">

<?php }} ?>


<?php

if (isset($_POST['update'])) {
  $the_cat_title = $_POST['cat_title'];

  $query = "UPDATE categories SET cat_title='{$the_cat_title}'  WHERE cat_id = {$cat_id}";
  $update_category = mysqli_query($connection, $query); 
}


?>

                  
                </div>
                <div class="form-group">
                  <input type="submit" name="update" class="btn btn-primary" value="Update">
                </div>
              </form>
<div class="col-md-4">




          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="search.php" method="post">
              <div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button name="submit" class="btn btn-primary" type="submit ">Search</button>
                </span>
              </div>
              </form>
            </div>
          </div>




          <div class="card my-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <form action="includes/login.php" method="post">
                <div class="form-group">
                  <input type="text" name="username" placeholder="Enter Username" class="form-control">
                </div>
                <div class="input-group">
                  <input type="password" name="user_password" placeholder="Enter Password" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>

<?php

$query = "SELECT * FROM categories";
$categories_query = mysqli_query($connection, $query);


?>


            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">

<?php

while($row = mysqli_fetch_assoc($categories_query)){
$cat_title = $row['cat_title'];
$cat_id = $row['cat_id'];

echo "<li><a href='individual_category_post.php?c_id=$cat_id;'>{$cat_title}</a></li>";
}

?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="admin/index.php">Admin</a>
        <a class="navbar-brand" href="registration.php">Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="index.php">HOME PAGE</a>
            </li>

            <?php

            $query = "SELECT * FROM categories LIMIT 4";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($result)){
              $cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];

              echo "<li class='nav-item'>
              <a href='individual_category_post.php?c_id=$cat_id;' class='nav-link'>{$cat_title}</a>
              </li>";
            }

            ?>

            


            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
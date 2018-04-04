<div class="container">

  <?php
  $query = "SELECT * FROM posts";
  $select_all_posts_query = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
  ?>
 

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $post_title ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $post_author ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $post_date ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post_content ?></p>



          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

         

        </div>


<?php  }  ?>

        <!-- Sidebar Widgets Column -->
        <?php  include "includes/sidebar.php"   ?>
        

      </div>
      <!-- /.row -->

    </div>
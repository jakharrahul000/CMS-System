<?php  include "includes/db.php"   ?>
<?php  include "includes/header.php"   ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"   ?>

    <!-- Page Content -->
    <div class="container">


      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

<?php
if (isset($_GET['p_id'])) {
  $the_post_id = $_GET['p_id'];
}

?>



<?php
  $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
  $select_individual_posts_query = mysqli_query($connection, $query);

  if (!$select_individual_posts_query) {
    die("QUERY FAILED". mysqli_error($connection));
  }

  while ($row = mysqli_fetch_assoc($select_individual_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
?>

          <!-- Title -->
          <h1 class="mt-4"><a href="#"><?php echo $post_title ?></a></h1>

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
          <img class="img-fluid rounded" src="images/<?php echo $post_image; ?>"
           style="width:900px; height:300px;">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post_content ?></p>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

              <form action="#" method="post"> 
                <div class="form-group">
                  <label for="comment_author">Author</label>
                  <input type="text" name="comment_author" class="form-control">
                </div>
                <div class="form-group">
                  <label for="comment_email">Email</label>
                  <input type="email" name="comment_email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="comment_content">Comment</label>
                  <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
              </form>
            </div>
          </div>

<?php

if (isset($_POST['post_comment'])) {
  $comment_author = $_POST['comment_author'];
  $comment_email = $_POST['comment_email'];
  $comment_content = $_POST['comment_content'];

  $query= "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ({$the_post_id}, '{$comment_author}', '{$comment_email}', 
  '{$comment_content}', 'Disapproved', now())";
  $insert_comment = mysqli_query($connection, $query);

  if (!$insert_comment) {
    die("QUERY FAILED". mysqli_error($connection));
  }

  $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id=$post_id";
  $increase_count = mysqli_query($connection, $query);
}

?>


<?php

$query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
$query .= "AND comment_status = 'Approved' ";
$query .= "ORDER BY comment_id DESC";
$show_comments = mysqli_query($connection, $query);

if (!$show_comments) {
    die("QUERY FAILED". mysqli_error($connection));
  }

while ($row = mysqli_fetch_assoc($show_comments)) {
  $comment_author = $row['comment_author'];
  $comment_content = $row['comment_content'];

?>



          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment_author; ?></h5>
              <?php echo $comment_content; ?>
            </div>
          </div>

<?php } ?>
         

          

<?php } ?>

        </div>



<!-- Sidebar Widgets Column -->
<?php  include "includes/sidebar.php"   ?>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php  include "includes/footer.php"   ?>

<!-- Bootstrap core JavaScript -->
<?php  include "includes/script.php"   ?>
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
if (isset($_GET['c_id'])) {
  $the_post_id = $_GET['c_id'];
}

?>



<?php
  $query = "SELECT * FROM posts WHERE post_category_id = {$the_post_id}";
  $select_individual_posts_query = mysqli_query($connection, $query);

  if (!$select_individual_posts_query) {
    die("QUERY FAILED". mysqli_error($connection));
  }

  while ($row = mysqli_fetch_assoc($select_individual_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = substr($row['post_content'],0,100);
    $post_image = $row['post_image'];
?>

          <!-- Title -->
          <h1 class="mt-4"><a href="individual_post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h1>

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
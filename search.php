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




  if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

    $count = mysqli_num_rows($search_query);

    if ($count == 0) {
      echo "<h1>No Result</h1>";
    }else{
      while ($row = mysqli_fetch_assoc($search_query)) {
        $post_title = $row['post_title'];
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
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
          <img class="img-fluid rounded" src="images/<?php echo $post_image?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post_content ?></p>

      
   



<?php

}}}

  
?>

          



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
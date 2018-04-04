<?php include "includes/header.php" ?>
<?php  include "includes/functions.php"   ?>



    <div id="wrapper">

      <!-- Sidebar -->
      <?php include "includes/nav.php" ?>
      

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>WELCOME to admin <small><?php echo $_SESSION['username'];  ?> </small></h1> 
          </div>
        </div><!-- /.row -->


        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">

<?php

$query = "SELECT * FROM posts";
$view_posts = mysqli_query($connection, $query);
$posts_count = mysqli_num_rows($view_posts);

echo "<p class='announcement-heading'>{$posts_count}</p>";

?>
                    
                    <p class="announcement-text">Posts</p>
                  </div>
                </div>
              </div>
              <a href="posts.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
<?php

$query = "SELECT * FROM comments";
$view_comments = mysqli_query($connection, $query);
$comments_count = mysqli_num_rows($view_comments);

echo "<p class='announcement-heading'>{$comments_count}</p>";

?>

                    <p class="announcement-text">Comments</p>
                  </div>
                </div>
              </div>
              <a href="comments.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
<?php

$query = "SELECT * FROM users";
$view_users = mysqli_query($connection, $query);
$users_count = mysqli_num_rows($view_users);

echo "<p class='announcement-heading'>{$users_count}</p>";

?>

                    <p class="announcement-text">Users</p>
                  </div>
                </div>
              </div>
              <a href="users.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
<?php

$query = "SELECT * FROM categories";
$view_categories = mysqli_query($connection, $query);
$categories_count = mysqli_num_rows($view_categories);

echo "<p class='announcement-heading'>{$categories_count}</p>";

?>

                    <p class="announcement-text">Categories</p>
                  </div>
                </div>
              </div>
              <a href="categories.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Details
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->


<?php

$query = "SELECT * FROM posts WHERE post_status='draft'";
$view_draft_posts = mysqli_query($connection, $query);
$draft_posts_count = mysqli_num_rows($view_draft_posts);

$query = "SELECT * FROM users WHERE user_role='subscriber'";
$view_subscribered_users = mysqli_query($connection, $query);
$subscribed_users_count = mysqli_num_rows($view_subscribered_users);

$query = "SELECT * FROM comments WHERE comment_status ='Disapproved'";
$view_disapproved_comments = mysqli_query($connection, $query);
$disapproved_comments_count = mysqli_num_rows($view_disapproved_comments);


?>




        <div class="row">
          <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],

<?php

$element_text = ['Active Posts', 'Draft Posts', 'Comments', 'Disapproved comments', 'Users', 'Subscriber', 'Categories'];
$element_count = [$posts_count, $draft_posts_count, $comments_count, $subscribed_users_count, $users_count,$disapproved_comments_count , $categories_count];

for ($i = 0; $i < 7; $i++) {
  echo "['{$element_text[$i]}', {$element_count[$i]}],";
}


?>

              ]);

              var options = {
                chart: {
                  title: '',
                  subtitle: '',
                }
              };

              var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
          </script>
          <div id="columnchart_material" style="width: auto; height: 500px;"></div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<!-- JavaScript -->
<?php include "includes/script.php" ?>
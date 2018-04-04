<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CMS Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Posts <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="posts.php">View All Posts</a></li>
                <li><a href="posts.php?source=add_post">Add Posts</a></li>
              </ul>
            </li>
            <li><a href="categories.php"><i class="fa fa-bar-chart-o"></i> Categories</a></li>
            <li><a href="comments.php"><i class="fa fa-comment"></i> Comments</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Users <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="users.php">View All Users</a></li>
                <li><a href="users.php?source=add_user">Add User</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li>
              <a href=""><?php echo 'Users Online: ' . users_online();?></a>
            </li>
            <li>
              <a href="../index.php">HOME PAGE</a>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

<?php

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
}



?>


               <?php echo $username ;?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a href="../includes/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
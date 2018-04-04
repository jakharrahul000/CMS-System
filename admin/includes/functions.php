<?php

function add_category(){
	global $connection;

	if(isset($_POST['submit'])){
	  $cat_title = $_POST['cat_title'];

	  if ($cat_title == ""  || empty($cat_title)) {
	    echo "This field should be filled";
	  }else{
	    $query = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
	    $to_add_new_categoriy = mysqli_query($connection, $query);
	  }

	  
	}
}

function delete_category(){
	global $connection;
	
	if (isset($_GET['delete'])) {
	  $the_cat_id = $_GET['delete'];

	  $query = "DELETE FROM categories WHERE cat_id={$the_cat_id}";
	  $delete_category = mysqli_query($connection, $query);
	  header("Location: categories.php");
	}
}


function users_online(){
	global $connection;

	$session = session_id();
	$time = time();
	$time_in_seconds = 30;
	$time_out = $time - $time_in_seconds;

	$query = "SELECT * FROM users_online WHERE session = '$session'";
	$send_query = mysqli_query($connection, $query);
	$count = mysqli_num_rows($send_query);

	if ($count == null) {
	  mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
	}else{
	  mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session' ");
	}

	$query_users_online = mysqli_query($connection, "SELECT * FROM users_online WHERE time>'$time_out'");
	if (!$query_users_online) {
		die("QUERY FAILED". mysqli_error($connection));
	}
	return mysqli_num_rows($query_users_online);


}














?>
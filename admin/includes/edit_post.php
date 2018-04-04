<?php

if (isset($_GET['edit_id'])) {
	$edit_id = $_GET['edit_id'];

	$query = "SELECT * FROM posts WHERE post_id = {$edit_id}";
	$edit_post =  mysqli_query($connection, $query);

	if (!$edit_post) {
		die("QUERY FAILED". mysqli_error($connection));
	}else{
		while ($row = mysqli_fetch_assoc($edit_post)) {
			$post_title = $row['post_title'];
			$post_category_id = $row['post_category_id'];
			$post_author = $row['post_author'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_content = $row['post_content'];
		}
	}
}



?>

<?php 

if (isset($_POST['update_post'])) {
	$post_title = $_POST['post_title'];
	$post_category_id = $_POST['post_category'];
	$post_author = $_POST['post_author'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	
	move_uploaded_file($post_image_temp, "../images/$post_image");

	if ($post_image == "") {
		$query = "SELECT * FROM posts WHERE post_id = $edit_id";
		$finding_image =  mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($finding_image)) {
			$post_image = $row['post_image'];
		}
	}

	$query = "UPDATE posts SET 
	post_category_id =$post_category_id, 
	post_title= '$post_title', 
	post_author= '$post_author',
	 post_date=now(),
	  post_image= '$post_image', 
	  post_content = '$post_content',
	   post_tags = '$post_tags',
	    post_comment_count= 4,
	 post_status = '$post_status' 
	 WHERE post_id = $edit_id";

	 $update_post =  mysqli_query($connection, $query);
}

?>






<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
	  <label for="post_title">Post Title</label>
	  <input value="<?php echo $post_title ; ?>" type="text" name="post_title" class="form-control">
	</div>
	<div class="form-group">
	  <select name="post_category">
	  	
<?php

$query = "SELECT * FROM categories";
$show_category =  mysqli_query($connection, $query);

if (!$show_category) {
	die("QUERY FAILED". mysqli_eror($connection));
}

while ($row = mysqli_fetch_assoc($show_category)) {
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	echo "<option value='$cat_id'>$cat_title</option>"; 
}


?>


	  </select>
	</div>
	<div class="form-group">
	  <label for="post_author">Post Author</label>
	  <input value="<?php echo $post_author ; ?>" type="text" name="post_author" class="form-control">
	</div>
	<div class="form-group">
	  <label for="post_status">Post Status</label>
	  <input value="<?php echo $post_status ; ?>" type="text" name="post_status" class="form-control">
	</div>
	<div class="form-group">
	  <label for="post_image">Post Image</label>
	  <img src="../images/<?php echo $post_image ;?>" width="50px">
	  <input type="file" name="post_image">
	</div>
	<div class="form-group">
	  <label for="post_tags">Post Tags</label>
	  <input value="<?php echo $post_tags ; ?>" type="text" name="post_tags" class="form-control">
	</div>
	<div class="form-group">
	  <label for="post_content">Post Content</label>
	  <textarea name="post_content" class="form-control" rows="10" cols="30">
	  	<?php echo $post_content ; ?>
	  </textarea>
	</div>
		<div class="form-group">
	  <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
	</div>
</form>
<?php

if (isset($_GET['edit_id'])) {
	$edit_id = $_GET['edit_id'];

	$query = "SELECT * FROM users WHERE user_id = {$edit_id}";
	$edit_user =  mysqli_query($connection, $query);

	if (!$edit_user) {
		die("QUERY FAILED". mysqli_error($connection));
	}else{
		while ($row = mysqli_fetch_assoc($edit_user)) {
			$user_id = $row['user_id'];
		    $username = $row['username'];
		    $user_firstname = $row['user_firstname'];
		    $user_lastname = $row['user_lastname'];
		    $user_email = $row['user_email'];
		    $user_role = $row['user_role'];
		    $user_password = $row['user_password'];
		}
	}
}



?>


<?php 

if (isset($_POST['update_user'])) {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];

    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>12));


	$query = "UPDATE users SET username='$username', user_firstname='$user_firstname', 
	user_lastname='$user_lastname', user_password='$hashed_password', user_email='$user_email', user_role='$user_role'
	WHERE user_id = $edit_id";

	$update_user =  mysqli_query($connection, $query);

	if (!$update_user) {
		die("QUERY FAILEDsgsfg". mysqli_error($connection));
	}
}

?>






<form action="" method="post">
	<div class="form-group">
	  <label for="user_firstname">Firstname</label>
	  <input value="<?php echo $user_firstname ; ?>" type="text" name="user_firstname" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_lastname">Lastname</label>
	  <input value="<?php echo $user_lastname ; ?>" type="text" name="user_lastname" class="form-control">
	</div>


	<div class="form-group">
	  <select name="user_role">
	  	<option value='<?php echo $user_role;  ?>'><?php echo $user_role;  ?></option>"

<?php

	if ($user_role == 'admin') {
	 	echo "<option value='subscriber'>subscriber</option>";
	}
	else{
	 	echo "<option value='admin'>admin</option>";
	} 


?>
	  </select>
	</div>


	<div class="form-group">
	  <label for="username">Username</label>
	  <input value="<?php echo $username ; ?>" type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_email">Email</label>
	  <input value="<?php echo $user_email ; ?>" type="email" name="user_email" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_password">Password</label>
	  <input value="<?php echo $user_password ; ?>" type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
	  <input type="submit" name="update_user" class="btn btn-primary" value="Update User">
	</div>
</form>
<?php

if (isset($_POST['add_user'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];

	$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>12));


	$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}',
	 '{$user_email}', '{$user_role}')";

	 $add_user =  mysqli_query($connection, $query);

	 if (!$add_user) {
	 	die("QUERY FAILED". mysqli_error($connection));
	 }
}



?>








<form action="" method="post">
	<div class="form-group">
	  <label for="user_firstname">Firstname</label>
	  <input type="text" name="user_firstname" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_lastname">Lastname</label>
	  <input type="text" name="user_lastname" class="form-control">
	</div>
	<div class="form-group">
	  <select name="user_role">
	  	<option value='subscriber'>Select Role</option>
	  	<option value='admin'>Admin</option>
	  	<option value='subscriber'>Subscriber</option>
	  </select>
	</div>
	<div class="form-group">
	  <label for="username">Username</label>
	  <input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_email">Email</label>
	  <input type="email" name="user_email" class="form-control">
	</div>
	<div class="form-group">
	  <label for="user_password">Password</label>
	  <input type="password" name="user_password" class="form-control">
	</div>
	</div>
		<div class="form-group">
	  <input type="submit" name="add_user" class="btn btn-primary" value="Add User">
	</div>
</form>
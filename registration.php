<?php include "includes/db.php" ?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

  </head>

  <body>


<?php

if (isset($_POST['register'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)){
    
  $firstname = mysqli_real_escape_string($connection, $firstname);
  $lastname = mysqli_real_escape_string($connection, $lastname);
  $username = mysqli_real_escape_string($connection, $username);
  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);

  $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

  $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}' , 
  'subscriber')";
  $register_user = mysqli_query($connection, $query);
  if (!$register_user) {
    die("QUERY FAILED". mysqli_error($connection));
  }

 
  }else{
    echo "Fill all fields";
  }


}





?>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Home Page</a>
      </div>
    </nav>


    <div class="user">
      <form class="form" action="" method="post">
          <div class="form__group">
              <input type="text" placeholder="Firstname" name="firstname" class="form__input" />
          </div>
          <div class="form__group">
              <input type="text" placeholder="Lastname" name="lastname" class="form__input" />
          </div>
          <div class="form__group">
              <input type="text" placeholder="Username" name="username" class="form__input" />
          </div>
          
          <div class="form__group">
              <input type="email" placeholder="Email" name="email" class="form__input" />
          </div>
          
          <div class="form__group">
              <input type="password" placeholder="Password" name="password" class="form__input" />
          </div>
          
          <button class="btn btn-secondary" name="register" type="submit">Register</button>
      </form>
  </div>




</body>

</html>

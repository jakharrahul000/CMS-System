<div class="table-responsive">
    

<table class="table table-bordered table-hover ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Admin</th>
        <th>Subscriber</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

<?php 

$query = "SELECT * FROM users";
$view_all_users = mysqli_query($connection, $query);

if (!$view_all_users) {
    die("QUERY FAILED". mysqli_error($connection));    
}

while($row = mysqli_fetch_assoc($view_all_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_password = $row['user_password'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];

    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_role</td>";
    echo "<td><a href='users.php?admin_id={$user_id}'>Admin</a></td>";
    echo "<td><a href='users.php?subscriber_id={$user_id}'>Subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_id={$user_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete user')\" href='users.php?delete_id={$user_id}'>Delete</a></td>";
    echo "</tr>";
}

?>
      
    </tbody>
</table> 
</div>
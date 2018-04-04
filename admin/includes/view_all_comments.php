<div class="table-responsive">
    

<table class="table table-bordered table-hover ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

<?php 

$query = "SELECT * FROM comments";
$view_all_comments = mysqli_query($connection, $query);

if (!$view_all_comments) {
    die("QUERY FAILED". mysqli_erroe($connection));
}

while($row = mysqli_fetch_assoc($view_all_comments)){
    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];
    $comment_post_id = $row['comment_post_id'];
    

    echo "<tr>";
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";

    /*$query = "SELECT * FROM categories WHERE cat_id='{$post_category_id}'";
    $view_cat_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($view_cat_id)){
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<td>$cat_title</td>";
    }
*/
    


    echo "<td>$comment_email</td>";
    echo "<td>$comment_status</td>";

$query = "SELECT * FROM posts WHERE post_id='{$comment_post_id}'";
$view_post_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($view_post_id)){
        $post_title = $row['post_title'];
        $post_id = $row['post_id'];

        echo "<td><a href='../individual_post.php?p_id=$post_id'>$post_title</a></td>";
    }


    echo "<td>$comment_date</td>";
    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
    echo "<td><a href='comments.php?disapprove={$comment_id}'>Disapprove</a></td>";
    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
    echo "</tr>";
}

?>
      
    </tbody>
</table> 
</div>
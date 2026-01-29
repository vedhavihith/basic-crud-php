<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
?>

<h2>All Posts</h2>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['content']; ?></p>

    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    <hr>
<?php } ?>

<a href="dashboard.php">Back to Dashboard</a>

<!-- delete.php -->
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM employees WHERE id = $id";
    $conn->query($sql);

    echo "Employee deleted successfully.";
}
$conn->close();
?>

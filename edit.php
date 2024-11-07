<!-- edit.php -->
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Employee Name:</label>
    <input type="text" name="employee_name" value="<?php echo $row['employee_name']; ?>" required><br>

    <label>Position:</label>
    <input type="text" name="position" value="<?php echo $row['position']; ?>" required><br>

    <label>Salary:</label>
    <input type="number" step="0.01" name="salary" value="<?php echo $row['salary']; ?>" required><br>

    <label>Hire Date:</label>
    <input type="date" name="hire_date" value="<?php echo $row['hire_date']; ?>" required><br>

    <button type="submit">Update Employee</button>
</form>

<?php } $conn->close(); ?>

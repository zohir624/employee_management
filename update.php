<!-- update.php -->
<?php
$conn = new mysqli("localhost", "username", "password", "company_management");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['employee_name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $sql = "UPDATE employees SET employee_name='$name', position='$position', salary='$salary', hire_date='$hire_date' WHERE id=$id";
    $conn->query($sql);

    echo "Employee updated successfully.";
}
$conn->close();
?>

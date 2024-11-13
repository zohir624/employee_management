<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $employee_name = $_POST['employee_name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    if (empty($id)) {
        // Insert new employee
        $sql = "INSERT INTO employees (employee_name, position, salary, hire_date) VALUES ('$employee_name', '$position', '$salary', '$hire_date')";
        $message = "New employee added successfully.";
    } else {
        // Update existing employee
        $sql = "UPDATE employees SET employee_name='$employee_name', position='$position', salary='$salary', hire_date='$hire_date' WHERE id=$id";
        $message = "Employee updated successfully.";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('$message'); window.location.href='display.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

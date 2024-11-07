<?php
// Include the database connection file
include 'db_connect.php';

// Check if form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $employee_name = $_POST['employee_name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    // SQL query to insert data into the employees table
    $sql = "INSERT INTO employees (employee_name, position, salary, hire_date) VALUES ('$employee_name', '$position', '$salary', '$hire_date')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "New employee record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

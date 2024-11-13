<!-- display.php -->
<?php
// Create a connection
include 'db_connect.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h2 { color: #333; }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .form-container {
            margin-top: 20px;
            width: 100%;
            max-width: 500px;
        }
        input[type="text"], input[type="number"], input[type="date"], button {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }
        .action-buttons a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
    <script>
        function editEmployee(id, name, position, salary, hire_date) {
            document.getElementById("employee_id").value = id;
            document.getElementById("employee_name").value = name;
            document.getElementById("position").value = position;
            document.getElementById("salary").value = salary;
            document.getElementById("hire_date").value = hire_date;
            document.getElementById("form-action").textContent = "Update Employee";
        }

        function resetForm() {
            document.getElementById("employee_id").value = "";
            document.getElementById("employee_name").value = "";
            document.getElementById("position").value = "";
            document.getElementById("salary").value = "";
            document.getElementById("hire_date").value = "";
            document.getElementById("form-action").textContent = "Add New Employee";
        }
    </script>
</head>
<body>

<h2>Employee Management</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Hire Date</th>
        <th>Actions</th>
    </tr>

    <?php
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['employee_name']}</td>
                <td>{$row['position']}</td>
                <td>{$row['salary']}</td>
                <td>{$row['hire_date']}</td>
                <td class='action-buttons'>
                    <a href='javascript:void(0);' onclick=\"editEmployee('{$row['id']}', '{$row['employee_name']}', '{$row['position']}', '{$row['salary']}', '{$row['hire_date']}')\">Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
    }
    $conn->close();
    ?>
</table>

<div class="form-container">
    <h3 id="form-action">Add New Employee</h3>
    <form action="insert_or_update.php" method="post">
        <input type="hidden" name="id" id="employee_id">
        <label for="employee_name">Name:</label>
        <input type="text" name="employee_name" id="employee_name" required><br>

        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required><br>

        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary" required><br>

        <label for="hire_date">Hire Date:</label>
        <input type="date" name="hire_date" id="hire_date" required><br>

        <button type="submit">Submit</button>
        <button type="button" onclick="resetForm()">Reset</button>
    </form>
</div>

</body>
</html>

<!-- display.php -->
<?php
$conn = new mysqli("localhost", "username", "password", "company_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Hire Date</th>
            <th>Actions</th>
        </tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['employee_name']}</td>
            <td>{$row['position']}</td>
            <td>{$row['salary']}</td>
            <td>{$row['hire_date']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
}
echo "</table>";

$conn->close();
?>

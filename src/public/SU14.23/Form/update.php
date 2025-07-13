<?php
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $salary = $_POST["salary"];
    $hiredate = $_POST["hiredate"];

    // Combine first and last name into a single field
    $empname = $firstname . ' ' . $lastname;

    // Call the stored procedure pro_updateemp
    $sql = "CALL pro_updateemp(?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("isds", $emp_id, $empname, $salary, $hiredate);

    if ($stmt->execute()) {
        echo "Employee updated successfully.";
    } else {
        echo "Error updating employee: " . $stmt->error; // Debugging
    }

    $stmt->close();
    $connection->close();
}
?>
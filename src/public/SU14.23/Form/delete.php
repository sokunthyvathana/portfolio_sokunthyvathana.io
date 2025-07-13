<?php
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];

    $sql = "CALL pro_deleteemp(?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $emp_id);

    if ($stmt->execute()) {
        echo "Employee deleted successfully.";
    } else {
        echo "Error deleting employee.";
    }

    $stmt->close();
    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListData</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
</head>
<style>
    .modal-content {
        border-radius: 10px;
        border: none;
    }
    .modal-header {
        background: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
    }
    .modal-title {
        font-weight: bold;
    }
    .modal-body .form-control {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ddd;
    }
    .modal-body .form-control:focus {
        border-color: #007bff;
        box-shadow: none;
    }
    .modal-footer {
        border-top: 1px solid #ddd;
        padding: 15px;
    }
    .modal-footer .btn-secondary {
        background: #6c757d;
        border: none;
    }
    .modal-footer .btn-secondary:hover {
        background: #5a6268;
    }
    .modal-footer .btn-primary {
        background: #007bff;
        border: none;
    }
    .modal-footer .btn-primary:hover {
        background: #0056b3;
    }
</style>
<body>
    <div class="container mt-3">
        <button class="btn btn-success px-4 mb-3" onclick="window.location.href='index.php'">Back</button>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>EMP #</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>SALARY</th>
                    <th>HIREDATE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'connectdb.php'; ?>
                <?php
                $sql = "CALL pro_getalldataemp()";
                $result = $connection->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_salary = "$" . number_format((float) preg_replace("/[^\d.-]/", "", $row["SALARY"]), 2);
                        $formatted_hire_date = date("Y-m-d", strtotime($row["HIRE_DATE"]));

                        echo "<tr>
                            <td>" . htmlspecialchars($row["EMP_ID"]) . "</td>
                            <td>" . htmlspecialchars($row["FIRST_NAME"]) . "</td>
                            <td>" . htmlspecialchars($row["LAST_NAME"]) . "</td>
                            <td>" . htmlspecialchars($formatted_salary) . "</td>
                            <td>" . htmlspecialchars($formatted_hire_date) . "</td>
                            <td>
                                <a href='#' class='btn btn-primary btn-sm editBtn' 
                                   data-id='" . htmlspecialchars($row["EMP_ID"]) . "' 
                                   data-first='" . htmlspecialchars($row["FIRST_NAME"]) . "' 
                                   data-last='" . htmlspecialchars($row["LAST_NAME"]) . "' 
                                   data-salary='" . htmlspecialchars(preg_replace("/[^\d.-]/", "", $row["SALARY"])) . "' 
                                   data-hire='" . htmlspecialchars($formatted_hire_date) . "'>
                                   Edit
                                </a>
                                <button class='btn btn-danger btn-sm deleteBtn' 
                                        data-id='" . htmlspecialchars($row["EMP_ID"]) . "'>Delete</button>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Employee Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: #007bff; color: #fff; border-radius: 10px 10px 0 0;">
                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editEmployeeForm">
                    <input type="hidden" id="edit_emp_id" name="emp_id">

                    <!-- First Name -->
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" id="edit_firstname" name="firstname" class="form-control" placeholder="Enter first name" required>
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" id="edit_lastname" name="lastname" class="form-control" placeholder="Enter last name" required>
                    </div>

                    <!-- Salary -->
                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="number" id="edit_salary" name="salary" class="form-control" placeholder="Enter salary" required>
                    </div>

                    <!-- Hire Date -->
                    <div class="mb-3">
                        <label class="form-label">Hire Date</label>
                        <input type="date" id="edit_hiredate" name="hiredate" class="form-control" required>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            // Edit Button
            $(document).on("click", ".editBtn", function() {
                    let emp_id = $(this).data("id");
                    let first_name = $(this).data("first");
                    let last_name = $(this).data("last");
                    let salary = $(this).data("salary");
                    let hire_date = $(this).data("hire");

                    $("#edit_emp_id").val(emp_id);
                    $("#edit_firstname").val(first_name);
                    $("#edit_lastname").val(last_name);
                    $("#edit_salary").val(salary);
                    $("#edit_hiredate").val(hire_date);

                    $("#editEmployeeModal").modal("show");
                });

                $("#editEmployeeForm").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(response) {
                            alert(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            alert("Error: " + error); // Debugging
                        }
                    });
                });

            // Delete Button
            $(document).on("click", ".deleteBtn", function() {
                let emp_id = $(this).data("id");
                if (confirm("Are you sure you want to delete this employee?")) {
                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data: { emp_id: emp_id },
                        success: function(response) {
                            alert(response);
                            location.reload();
                        }
                    });
                }
            });
        });
        
        $("#editEmployeeForm").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "update.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            // Show success message
            $("#successMessage").text(response).removeClass("d-none");
            setTimeout(function() {
                location.reload();
            }, 2000); // Reload after 2 seconds
        },
        error: function(xhr, status, error) {
            // Show error message
            $("#errorMessage").text("Error: " + error).removeClass("d-none");
        }
    });
});

    </script>
    
</body>
</html>
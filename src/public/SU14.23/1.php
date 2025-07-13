<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   body {
        background: linear-gradient(120deg, #FF5733, #C70039);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container {
        max-width: 600px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1s ease;
    }
    h2 {
        margin-bottom: 30px;
        font-size: 30px;
        color: #333;
        text-align: center;
        font-weight: bold;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        font-weight: bold;
        color: #444;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 3px rgba(56, 55, 55, 0.1);
        padding: 10px;
        font-size: 16px;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: #FF5733;
        box-shadow: 0 0 8px rgba(255, 87, 51, 0.5);
    }
    .btn-primary {
        background: linear-gradient(120deg, #FF5733, #C70039);
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 50px;
        color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(199, 0, 57, 0.4);
    }
    .btn-primary:hover {
        background: linear-gradient(120deg, #C70039, #FF5733);
        box-shadow: 0 8px 20px rgba(199, 0, 57, 0.6);
        transform: translateY(-3px);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<body>
    <div class="container mt-5">
        <h2>Employee Form</h2>
        <form action="submit_employee.php" method="post">
            <div class="form-group">
                <label for="employeeName">Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" required>
            </div>
            <div class="form-group">
                <label for="employeeEmail">Email</label>
                <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" required>
            </div>
            <div class="form-group">
                <label for="employeePhone">Phone</label>
                <input type="text" class="form-control" id="employeePhone" name="employeePhone" required>
            </div>
            <div class="form-group">
                <label for="employeePosition">Position</label>
                <input type="text" class="form-control" id="employeePosition" name="employeePosition" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
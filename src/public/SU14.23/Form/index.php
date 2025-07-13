


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
    <!-- Link stylesheet for bootrape -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="insert.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <center>
        
        <div class="container col-4 mt-5 p-4 border rounded shadow-lg bg-light animate__animated animate__fadeIn">
            <h2 class="text-primary mb-4">EMPLOYEES FORM BOOTRAPE</h2>
         
            <!-- <?php
            include 'connectdb.php';
            ?> -->
            <form action="insert.php" method="Post">
          
                <div class="form-group mb-3">
                    <label for="employeeName" class="form-label">Name</label>
                    <input type="text" class="form-control border-dark-subtle" id="employeeName" name="employeeName" placeholder="Please Input your Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="employeeSalary" class="form-label">Salary</label>
                    <input type="number" class="form-control border-dark-subtle" id="employeeSalary" name="employeeSalary" placeholder="Please Input your salary" required>
                </div>
                <div class="form-group mb-4">
                    <label for="hireDate" class="form-label">Hire Date</label>
                    <input type="date" class="form-control border-dark-subtle" id="hireDate" name="hireDate" placeholder="Please Input Your Hire Date" required>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success w-100 me-2">Submit</button>
                    <button type="reset" class="btn btn-danger w-100 me-2">Reset</button>
                    <button type="reset" class="btn btn-info ">Next</button>
                </div>
            </form>
        </div>

        
    </center>

    
   

  
   
    
    <!-- Link stylesheet for animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</html>
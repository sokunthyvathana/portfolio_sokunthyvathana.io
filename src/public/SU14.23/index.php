<!DOCTYPE html>
<html>
    <head>
        <title>Laragon</title>

        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                margin: 0;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(120deg,#FF5733,#C70039);
                color:rgb(14, 14, 15);
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .container {
                text-align: center;
                background: rgba(255, 255, 255, 0.9);
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
                max-width: 900px;
                width: 100%;
                animation: fadeIn 1.5s ease;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .title {
                font-size: 3rem;
                font-weight: 700;
                color:#C70039;
                margin-bottom: 20px;
                letter-spacing: 1px;
            }

            .info {
                font-size: 1.1rem;
                color:rgb(156, 156, 156);
                margin: 20px 0;
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                font-size: 1rem;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            th {
                background:#C70039;
                color: #fff;
                padding: 15px;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            td {
                padding: 15px;
                border: 1px solid #ddd;
                color: #2c3e50;
                text-align: center;
            }

            tr:nth-child(even) {
                background: #ecf0f1;
            }

            tr:hover {
                background: #d6eaf8;
                transition: background 0.3s ease;
            }

            .opt a {
                display: inline-block;
                background: linear-gradient(90deg,#FF5733,#C70039);
                color: #fff;
                text-decoration: none;
                padding: 12px 25px;
                border-radius: 30px;
                font-size: 1.2rem;
                font-weight: 700;
                margin-top: 20px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .opt a:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title" title="Laragon">LIST STORE PROCEDURE FROM EMPLOYEES</div>
                <div class="info"><br />

                    <?php
                        include 'cinnectiondb.php'
                    ?>
                    <?php
                        
                        $stml = $connection -> prepare("CALL pro_insertEmp(?,?,?)");
                        // sis => s=string, i=int, s=string;
                        
                        $empname = "sokunthy vathana";  // String
                        $salary = 1000;     // Decimal
                        $hiredate = "2024-12-01 "; // Date as string in 'YYYY-MM-DD' format
                        $stml->bind_param("sds", $empname, $salary, $hiredate);
                        $connection->close(); 
                    ?>
                    <?php
                        include 'cinnectiondb.php'
                    ?>
                    <?php
                        $stml = $connection -> prepare("CALL pro_updateemp(?,?,?,?)");
                        $idemp = 1; // int
                        $empname = "Heng Ly";  // String
                        $salary = 1200;     // Decimal
                        $hiredate = "2005-10-01"; // Date as string
                        $stml->bind_param("isds",$idemp, $empname, $salary, $hiredate);
                        // isds => i=int, s=string, d=decinmal, s=string;

                        // if($stml->execute()){
                        //     echo "Update data successfully using store procedure";
                        // }else{
                        //     echo "Error update date using store procedure";
                        // }
                        $connection->close();
                        
                    ?>
                    <?php
                        include 'cinnectiondb.php'
                    ?>
                    <?php
                        // Delete employee
                        $stml = $connection->prepare("CALL pro_deleteemp(?)");
                        $idemp = 16; // int
                        $stml->bind_param("i", $idemp);
                        // i => int

                        if($stml->execute()){
                            echo "Delete data successfully using store procedure";
                        } else {
                            echo "Error deleting data using store procedure";
                        }
                        $connection->close();
                    ?>
                    <?php
                        include 'cinnectiondb.php'
                    ?>
                    <?php
                        // Call store procedure from mysql
                        $sql='CALL pro_getalldataemp()';
                        $result=$connection->query($sql);
                        if($result->num_rows>0){
                            echo "<table><tr>
                                        <th>EMP_ID</th>
                                        <th>FistName</th>
                                        <th>LastName</th>
                                        <th>SALARY</th>
                                        <th>HireDate</th>
                                     </tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<tr><td>".$row["EMP_ID"].
                               "</td><td>".$row["FIRST_NAME"].
                                "</td><td>".$row["LAST_NAME"].
                               "</td><td>".$row["SALARY"].
                               "</td><td>".$row["HIRE_DATE"]
                               ."</td></tr>";
                        }
                        echo "</table>";
                        }
                        $connection->close(); 
                        


                        
                        // if($stml->execute()){
                        //     echo "Insert data successfully using store procedure";
                        // }else{
                        //     echo "Error insert date using store procedure";
                        // }
                        // $connection->close(); 
                    ?>
                   
                 
                        
                      

                </div>
                <div class="opt">
                  <div><a title="Getting Started" href="https://laragon.org/docs">Getting Started</a></div>
                </div>
            </div>

        </div>
    </body>
</html>
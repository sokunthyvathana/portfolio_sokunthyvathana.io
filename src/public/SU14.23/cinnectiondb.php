<?php
    // declear variable get connection
    $servername='localhost';
    $username='root';
    $password='';
    $db_name='emp_db';
    // create connection 
    $connection= new mysqli($servername,$username,$password,$db_name);
//     if(connection->connect_error){
//         echo "Connection database failed: ";
//     }else{
//         echo "Connection database successfully";
//     }
// ?>
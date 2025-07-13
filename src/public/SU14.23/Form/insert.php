<?php
    //Declear varible get name from bootrape
    $empname=$_POST['employeeName'];
    $empsalary=$_POST['employeeSalary'];     
    $hiredate=$_POST['hireDate'];
    // echo $empname;
    // echo $empsalary;
    // echo $hiredate;  
    include 'connectdb.php';
    $stml=$connection->prepare("CALL pro_insertemp(?,?,?)");
    $stml->bind_param("sds",$empname,$empsalary,$hiredate);
    if($stml->execute()){
        echo "Insert data successfully using store procedure And form Bootrssape";
    }else{
        echo "Error insert date using store procedure";
    }
    // list data from database
    header('Location: listdata.php');
    exit;
    $stml->close();
    $connection->close();
?>
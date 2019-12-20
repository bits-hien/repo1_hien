<?php 
    // include "sql_dbconnection.php";
    include "dbconn.php";
    session_start();
    
    $user = $_POST['user'];
    $pass = $_POST['password'];

    if($user == "" || $pass == "") {
        echo "Không để trống SĐT hoặc email";
    }else{
        $conn1 = new DBconn();
        $connect =$conn1->connect();
        $table1 = 'users';
        $condision1 = "user = '$user' && password = '$pass'";
        $rows =$conn1->selectAll($table1,$condision1);
        $rows = mysqli_fetch_assoc($rows);
        // var_dump($rows);
        // die;
    }

    if(empty($rows)){
        header("location: login.php");
    }else{
        $_SESSION['id'] = $rows['id'];
        if($rows['sex'] == "boy"){
            header("location: index.php");
        }else{
            header("location: index1.php");
    }
    }

?>

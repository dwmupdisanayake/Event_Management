<?php
    $reg = $_POST['reg'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","root","","eventra");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from users where reg = ?");
        $stmt->bind_param("s",$reg);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<h2>Login Successfully</h2>";
            }else{
                echo "<h2>Invalid Email or password</h2>";
            }
        }else{
            echo "<h2>Invalid Email or Password</h2>";
        }
    }

?>
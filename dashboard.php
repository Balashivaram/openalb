<?php      
        include('connection.php');  
        $username = $_POST['username'];  
        $password = $_POST['password'];  
          
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
          
            $sql = "select * from student where username = '$username' and passwd = '$password'";  
            $result = mysqli_query($con, $sql);  
            $values = mysqli_fetch_assoc($result);
            echo $values[0];
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            // header('Content-Type:application/json');
            $username=$values["username"];
            $openlab=$values["openlab"];
            $total=$values["total"];
            // echo $username;
            // header('Content-Type: application/json');
            // echo json_encode([
            //     'mathAttendance' => 5,
            //     'scienceAttendance' => $total
            // ]);
            // echo json_encode([
            //     'openlab' => $openlab,
            //     'total'   => $total
            // ]);

    ?>  
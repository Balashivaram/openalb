<?php      
        include('connection.php');  
        // $username = $_POST['username'];  
        // $password = $_POST['password'];  
          
        //     //to prevent from mysqli injection  
        //     $username = stripcslashes($username);  
        //     $password = stripcslashes($password);  
        //     $username = mysqli_real_escape_string($con, $username);  
        //     $password = mysqli_real_escape_string($con, $password);  
            $username='CB.EN.U4ELC20012';
            $password='bala';
            $sql = "select * from student where username = '$username' and passwd = '$password'";  
            $result = mysqli_query($con, $sql);  
            $values = mysqli_fetch_assoc($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            if($count>0){  
                // echo "Hello World";
                // echo $values["username"];
                $queryString = http_build_query($values);
                $url = 'dashboards.php?' . $queryString;
                header('Location:'.$url);
                // header('Location: dashboard.php');
                // $username=$values["username"];
                // $openlab=$values["openlab"];
                // $total=$values["total"];
                // echo $username;
                // header('Content-Type: application/json');
                // echo json_encode([
                //     'mathAttendance' => $openlab,
                //     'scienceAttendance' => $total
                // ]);
                                // echo "Username:".$values["username"]."<br>";
                // echo "DBSP:".$values["dbsp"]."<br>";
                // echo "CNIC:".$values["cnic"]."<br>";

            }  
            // else{  
            //     echo "<h1> Login failed. Invalid username or password.</h1>";  
            // }     
    ?>  
<?php      
    include('../includes/connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  

      
        $sql = "SELECT * FROM users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($result);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $count = mysqli_num_rows($result); 
        $fullname = $data['fullname'];
        $role = $data['role'];
          
        if($count == 1 and $role == 'admin'){  
            session_start();
            $_SESSION['name'] = $fullname;
            header("Location: admin/home.php"); 
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  
<?php 
session_start();
    include("database.php"); 

    if(isset($_POST["login"])){
        
        function validate($data)
        {   $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);
        
        if(empty($username)){
            header("Location: frontend.php?error= Username is required");
            exit();
        }
        else if(empty($password)){
            header("Location: frontend.php?error= Password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
            $result = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['Username'] === $username && $row['Password'] === $password){
                    $_SESSION['Username'] = $row['Username'];
                    header("Location: http://localhost/website/patient.php");
                    echo '<script type="text/javascript">alert("Logged in as ' . $_SESSION["Username"] . '");</script>';

                    exit();
                }
                else{
                    unset($_SESSION['Username']);
                    echo '<script type ="text/javascript"> alert("Invalid Username or Password"); window.location.href = "frontend.php"; </script>';
                    exit();
                }
            }
            else{
                unset($_SESSION['Username']);
                echo '<script type ="text/javascript"> alert("Invalid Username or Password"); window.location.href = "frontend.php"; </script>';
                exit();
            }
        }
    
      }

?>

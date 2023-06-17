<?php 
    include("database.php");
    //FOR VALUE INSERTION
    if(isset($_POST["submit"])){
        function validate($data)
        {   $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
            $appointmentID = validate($_POST["appointmentID"]);
            $doctorID = validate($_POST["doctorID"]);
            $patientID = validate($_POST["patientID"]);
            $appointmentDate = $_POST['appointmentDate'];
            $appointmentTime = $_POST['appointmentTime'];
            $appointmentStatus = $_POST['appointmentStatus'];
        try{
            $sql = "INSERT INTO appointment VALUE ('$appointmentID','$doctorID','$patientID','$appointmentDate','$appointmentTime','$appointmentStatus')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/appointment.php");
        }
        catch(mysqli_sql_exception){
            echo '<script>alert("ERROR")</script>';
            header("Location: http://localhost/website/appointment.php?error=Duplicate value not allowed");        
        }

    }
    else{
        header("Location: http://localhost/website/appointment.php?error=Following isnt working");        
        exit();
    }





?>





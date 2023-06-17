<?php 
    include("database.php");
    session_start();
    //FOR VALUE INSERTION
    if(isset($_POST['submit'])){

        function validate($data)
        {   $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if(!empty($_POST['gender']) || !empty($_POST['patientID']) || !empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['dateofbirth'] || !empty($_POST['contactnumber']) || !empty($__POST['address']))){
            $PatientID = validate($_POST["patientID"]);
            $FirstName = validate($_POST["firstname"]);
            $LastName = validate($_POST["lastname"]);
            $Gender = $_POST['gender'];
            $Date = $_POST['dateofbirth'];
            $ContactNumber = validate($_POST['contactnumber']);
            $Address = validate($_POST['address']);
        try{
            $sql = "INSERT INTO patients VALUE ('$PatientID','$FirstName','$LastName','$Gender','$Date','$ContactNumber','$Address')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/patient.php");
        }
        catch(mysqli_sql_exception){
            echo '<script>alert("Duplicate value not allowed")</script>';
            header("Location: http://localhost/website/patient.php?error=Duplicate value not allowed");        
        }
    } 
    else{
            header("Location: patient.php?error = Fill in all fields");
            exit();
    }
    }

?>




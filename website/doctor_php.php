<?php 
    include("database.php");
    //FOR VALUE INSERTION
    echo "not working";
    if(isset($_POST['submit'])){

        function validate($data)
        {   $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if(!empty($_POST['doctorID']) || !empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['specialization']) || !empty($_POST['contact_number'] || !empty($_POST['email']))){
            $doctorID = validate($_POST["doctorID"]);
            $FirstName = validate($_POST["first_name"]);
            $LastName = validate($_POST["last_name"]);
            $specialization = validate($_POST['specialization']);
            $contact = validate($_POST['contact_number']);
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        try{
            $sql = "INSERT INTO doctors VALUE ('$doctorID','$FirstName','$LastName','$specialization','$contact','$email')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/doctor.php");
        }
        catch(mysqli_sql_exception){
            echo '<script>alert("Duplicate value not allowed")</script>';
            header("Location: http://localhost/website/doctor.php?error=Duplicate value not allowed");        
        }
    } 
    else{
            header("Location: doctor.php?error = Fill in all fields");
            exit();
    }
    }

?>





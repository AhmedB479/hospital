<?php 
    include("database.php");
    //FOR VALUE INSERTION
    if(isset($_POST['submit'])){
        function validate($data)
        {   $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    if(!empty($_POST['recordID']) || !empty($_POST['patientID']) || !empty($_POST['doctorID']) || !empty($_POST['patientArrivalDate']) || !empty($_POST['diagnosis']) || !empty($_POST['medication'])){
            $recordID = validate($_POST["recordID"]);
            $patientID = validate($_POST["patientID"]);
            $doctorID = validate($_POST["doctorID"]);
            $patientArrivalDate = validate($_POST["patientArrivalDate"]);
            $diagnosis = validate($_POST["diagnosis"]);
            $medication = validate($_POST["medication"]);
            $notes = validate($_POST["notes"]);

        try{
            $sql = "INSERT INTO medical_records VALUE ('$recordID','$patientID','$doctorID','$patientArrivalDate','$diagnosis','$medication','$notes')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/medicalrecords.php");
        }
        catch(mysqli_sql_exception){
            header("Location: http://localhost/website/medicalrecords.php?error=Duplicate value not allowed");        
        }
    } }
    else{
            header("Location: medicalrecords.php?error = Fill in all fields");
            exit();
    }

?>





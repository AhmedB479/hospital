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
    if(!empty($_POST['invoiceID']) || !empty($_POST['patientID']) || !empty($_POST['amount']) || !empty($_POST('paymentDate')) || !empty($_POST('paymentMethod'))){
            $invoiceID = validate($_POST["invoiceID"]);
            $patientID = validate($_POST["patientID"]);
            $amount = validate($_POST["amount"]);
            $paymentDate = validate($_POST["paymentDate"]);
            $paymentMethod = validate($_POST["paymentMethod"]);

        try{
            $sql = "INSERT INTO payments VALUE ('$invoiceID','$patientID','$amount','$paymentDate','$paymentMethod')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/payment.php");
        }
        catch(mysqli_sql_exception){
            header("Location: http://localhost/website/payment.php?error=Duplicate value not allowed");        
        }
    } }
    else{
            header("Location: payment.php?error = Fill in all fields");
            exit();
    }

?>





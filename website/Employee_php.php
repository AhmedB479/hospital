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
    if(!empty($_POST['employeeID']) || !empty($_POST['firstName']) || !empty($_POST['lastName']) || !empty($_POST('employeePosition')) || !empty($_POST('departmentID'))){
            $employeeID = validate($_POST["employeeID"]);
            $firstName = validate($_POST["firstName"]);
            $lastName = validate($_POST["lastName"]);
            $employeePosition = validate($_POST["employeePosition"]);
            $departmentID = validate($_POST["departmentID"]);

        try{
            $sql = "INSERT INTO employees VALUE ('$employeeID','$firstName','$lastName','$employeePosition','$departmentID')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/Employee.php");
        }
        catch(mysqli_sql_exception){
            header("Location: http://localhost/website/Employee.php?error=Duplicate value not allowed");        
        }
    } }
    else{
            header("Location: Employee.php?error = Fill in all fields");
            exit();
    }

?>





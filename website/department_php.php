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
    if(!empty($_POST['departmentID']) || !empty($_POST['departmentName']) || !empty($_POST['description'])){
            $departmentID = validate($_POST["departmentID"]);
            $departmentName = validate($_POST["departmentName"]);
            $description = validate($_POST["description"]);

        try{
            $sql = "INSERT INTO department VALUE ('$departmentID','$departmentName','$description')";
            mysqli_query($conn,$sql);
            header("Location: http://localhost/website/department.php");
        }
        catch(mysqli_sql_exception){
            header("Location: http://localhost/website/department.php?error=Duplicate value not allowed");        
        }
    } }
    else{
            header("Location: department.php?error = Fill in all fields");
            exit();
    }

?>





<?php
  ob_start();
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Management</title>
  <style>
    /* styles.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("Employees.jpg");
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      background-repeat: no-repeat;
      padding-top: 5px;
      padding-bottom: 30px;
    }

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
}

header h1 {
  margin: 0;
}

main {
  padding: 20px;
}

section {
  margin-bottom: 20px;
}

h2 {
  margin-top: 0;
}

form {
  display: flex;
  flex-direction: column;
  width: 400px;
  margin: 0 auto;
  border-radius: 10px;
  max-width: 500px;
  background-color: rgba(255, 255, 255, 0.8);
  margin-top:100px;
  padding:20px;
}

label {
  margin-bottom: 5px;
}

input[type="text"] {
  padding: 5px;
  margin-bottom: 10px;
}

button[type="submit"] {
  padding: 10px;
}

.i5
{
	background-color:black;
	width:100%;
	height:70px;
	margin:0px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 10px;
  border: 1px solid #ccc;
}

table th {
  background-color: #f0f0f0;
  font-weight: bold;
}

table td {
  text-align: center;
}

.search-container {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      margin-top: 10px;
    }

    .search-input {
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
      font-size: 16px;
      width:300px;
    }

    .search-button {
      background-color: #4CAF50;
      padding:10px 15px;
      border: none;
      border-radius: 0 4px 4px 0;
      color: white;
      font-size: 12px;
      cursor: pointer;
      margin-left: 40px;
      margin-right:0px;
    }

  </style>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class=i5>
    <h1 style="float:left;margin-top:15px;color:white;">Hospital Management</h1>
    <nav style="float:right;margin-top:25px">
    <font size="2px"><a href="doctor.php" target="_blank" style="text-decoration:none;color:white; margin-right:60px;">Doctor</a></font>
    <font size="2px"><a href="appointment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Appointment</a></font>
    <font size="2px"><a href="medicalrecords.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">MedicalRecord</a></font>
    <font size="2px"><a href="department.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Department</a></font>
    <font size="2px"><a href="patient.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Patient</a></font>
    <font size="2px"><a href="payment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Payment</a></font>
    <font size="2px"><a href="logout.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">logout</a></font>
    </nav>
    </div>

  <main>
    <section>
      <div class="back">


  
      <form id="employeeForm" action="Employee_php.php" method="POST">
        <label for="employeeID">Employee ID:</label>
        <input type="text" id="employeeID" name="employeeID" required>
        
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        
        <label for="employeePosition">Employee Position:</label>
        <input type="text" id="employeePosition" name="employeePosition" required>
        
        <label for="departmentID">Department ID:</label>
        <input type="text" id="departmentID" name="departmentID" required>
        
        <button type="submit" name="submit" value="submit">Add Employee</button>
      </form>
</div>
    </section>

    <section>
      <h2>Employees</h2>
      <table id="employeesTable">
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Employee Position</th>
            <th>Department</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include("database.php");

        if(isset($_GET['id'])){
          $id = $_GET['id'];
          mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
          $delete = mysqli_query($conn,"DELETE FROM `employees` WHERE `EmployeeID` = '$id'");
          mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
          header("Employee.php");
        } 


        $sql = "SELECT EmployeeID,first_name,last_name,position,department.department_name AS Department_Name
        FROM employees 
        INNER JOIN department ON department.departmentID = employees.departmentID";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr>
            <td>".$row["EmployeeID"]."</td>"
            ."<td>".$row["first_name"]."</td>"
            ."<td>".$row["last_name"]."</td>"
            ."<td>".$row["position"]."</td>"
            ."<td>".$row["Department_Name"]
            ."<td>"
            ."<a href='Employee.php?id=".$row["EmployeeID"]."'class ='btn'>Delete</a>"
            ."</td></tr>";
          }
          echo "</table>";
        }
        else{
          echo "0 result";
        }
        ob_end_flush();
        ?>
        </tbody>
      </table>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>

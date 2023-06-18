<?php
  ob_start();
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient Form</title>
  <style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("doc1.jpg");
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      background-repeat: no-repeat;
      padding-top: 5px;
      padding-bottom: 30px;
    }

h1 {
  text-align: center;
  padding: 20px;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 10px;
  margin-top: 100px;
    }

label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

header {
  background-color: #333;
  color: #fff;
  padding: 5px;
}

input[type="text"],
input[type="tel"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 16px;
}

select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 16px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
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
      margin-top: 20px;
    }

    .search-input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
      font-size: 16px;
      width:100px;
    }

    .search-button {
      background-color: #4CAF50;
      padding: 10px 15px;
      border: none;
      border-radius: 0 4px 4px 0;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-left: 80px;
      margin-right:250px;
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
    <font size="2px"><a href="Employee.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Employee</a></font>
    <font size="2px"><a href="payment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Payment</a></font>
    <font size="2px"><a href="logout.php" target="" style="text-decoration:none;color:white;margin-right:60px;" >logout</a></font>
    </nav>
    </div>
    <div class="back">


  <form action="patient_php.php" method="POST" style="margin-top:50px;">
    <label for="patientID">Patient ID:</label>
    <input type="number" name="patientID" id="patientID" required>
    
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id="firstname" required>
    
    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" id="lastname" required>
    
    <label for="gender">Gender:</label>
    <select name="gender" id="gender" required>
      <option value="">Select gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    
    <label for="dateofbirth">Date of Birth:</label>
    <input type="date" name="dateofbirth" id="dateofbirth" required>
    
    <label for="contactnumber">Contact Number:</label>
    <input type="tel" name="contactnumber" id="contactnumber" required>
    
    <label for="address">Address:</label>
    <textarea name="address" id="address" rows="4" required></textarea>
    
    <input type="submit" name="submit" value="Submit">
  </form>
    </div>
  <section>
    <h2>Details</h2>
    <table id="appointmentsTable">
      <thead>
        <tr>
          <th>Patient ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Date Of Birth</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
      <?php 
       include("database.php");
      
       if(isset($_GET['id'])){
        $id = $_GET['id'];
        mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
        $delete = mysqli_query($conn,"DELETE FROM `patients` WHERE `patientID` = '$id'");
        mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
        header("patient.php");
      } 
    
        $sql = "SELECT * FROM patients";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr>
            <td>".$row["patientID"]."</td>"
            ."<td>".$row["first_name"]."</td>"
            ."<td>".$row["last_name"]."</td>"
            ."<td>".$row["gender"]."</td>"
            ."<td>".$row["dateofbirth"]."</td>"
            ."<td>".$row["contact_number"]."</td>"
            ."<td>".$row["address"]."</td>"
            ."<td>"
            ."<a href='patient.php?id=".$row["patientID"]."'class ='btn'>Delete</a>"
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
</body>
</html>
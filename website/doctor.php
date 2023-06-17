<?php
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Doctor Form</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("doctor1.jpg");
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

input[type="text"],
input[type="tel"],
input[type="email"] {
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
    <font size="2px"><a href="patient.php" target="_blank" style="text-decoration:none;color:white; margin-right:60px;">Patient</a></font>
    <font size="2px"><a href="appointment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Appointment</a></font>
    <font size="2px"><a href="medicalrecords.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">MedicalRecord</a></font>
    <font size="2px"><a href="department.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Department</a></font>
    <font size="2px"><a href="Employee.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Employee</a></font>
    <font size="2px"><a href="payment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Payment</a></font>
    <font size="2px"><a href="logout.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">logout</a></font>
    </nav>
    </div>
  <div class="back">


  <form action="doctor_php.php" method="POST">
    <label for="doctorID">Doctor ID:</label>
    <input type="text" name="doctorID" id="doctorID" required>
    
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required>
    
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required>
    
    <label for="specialization">Specialization:</label>
    <input type="text" name="specialization" id="specialization" required>
    
    <label for="contact_number">Contact Number:</label>
    <input type="tel" name="contact_number" id="contact_number" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    
    <input type="submit" name="submit" value="submit">
  </form>
</div>
  <section>
    <h2>Details</h2>
    <table id="appointmentsTable">
      <thead>
        <tr>
          <th>Doctor ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Specialization</th>
          <th>Contact Number</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include("database.php");
        $sql = "SELECT * FROM doctors";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr><td>".$row["doctorID"]."</td>"."<td>".$row["first_name"]."</td>"."<td>".$row["last_name"]."</td>"."<td>".$row["specialization"]."</td>"."<td>".$row["contact_number"]."</td>"."<td>".$row["email"]."</td></tr>";
          }
          echo "</table>";
        }
        else{
          echo "0 result";
        }
        ?>
      </tbody>
    </table>
  </section>
</body>
</html>
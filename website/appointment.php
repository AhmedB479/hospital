<?php
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointment Management</title>
<style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("appointment.jpg");
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      background-repeat: no-repeat;
      padding-top: 5px;
      padding-bottom: 30px;
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
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 10px;
  margin-top: 100px;
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="time"],
select {
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
    <font size="2px"><a href="patient.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Patient</a></font>
    <font size="2px"><a href="medicalrecords.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">MedicalRecord</a></font>
    <font size="2px"><a href="department.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Department</a></font>
    <font size="2px"><a href="Employee.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Employee</a></font>
    <font size="2px"><a href="payment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Payment</a></font>
    <font size="2px"><a href="logout.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">logout</a></font>
    </nav>
    </div>

  <main>
    <section>
      <div class="back">


      <form action="appointment_php.php" method="POST" id="appointmentForm">
        <label for="appointmentID">Appointment ID:</label>
        <input type="text" id="appointmentID" name="appointmentID" required>
        
        <label for="doctorID">Doctor ID:</label>
        <input type="text" id="doctorID" name="doctorID" required>
        
        <label for="patientID">Patient ID:</label>
        <input type="text" id="patientID" name="patientID" required>
        
        <label for="appointmentDate">Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate" required>
        
        <label for="appointmentTime">Time:</label>
        <input type="time" id="appointmentTime" name="appointmentTime" required>
        
        <label for="appointmentStatus">Status:</label>
        <select id="appointmentStatus" name="appointmentStatus" required>
          <option value="Confirmed">Confirmed</option>
          <option value="Pending">Pending</option>
          <option value="Cancelled">Cancelled</option>
        </select>
        
        <button type="submit" name="submit" value="submit">Add Appointment</button>
      </form>
</div>
    </section>

    <section>
      <h2>Appointments</h2>
      <table id="appointmentsTable">
        <thead>
          <tr>
            <th>Appointment ID</th>
            <th>Doctor Name</th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include("database.php");
        
        $sql = 
        "SELECT appointmentID,CONCAT(patients.first_name,' ',patients.last_name) AS Patient_Name,CONCAT(doctors.first_name,' ',doctors.last_name) AS Doctor_Name,appointment_date,appointment_time,state 
        FROM appointment 
        INNER JOIN patients ON patients.patientID = appointment.patientID
        INNER JOIN doctors ON doctors.doctorID = appointment.doctorID
        ORDER BY appointment_date";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr><td>".$row["appointmentID"]."</td>"."<td>".$row["Doctor_Name"]."</td>"."<td>".$row["Patient_Name"]."</td>"."<td>".$row["appointment_date"]."</td>"."<td>".$row["appointment_time"]."</td>"."<td>".$row["state"]."</td></tr>";
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
  </main>
</body>
</html>
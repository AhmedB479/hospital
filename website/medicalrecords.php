<?php
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Medical Record Management</title>
  <style>
    /* styles.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("medicalrecords.jpg");
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
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
textarea {
  padding: 5px;
  margin-bottom: 10px;
}

textarea {
  resize: vertical;
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
<div class="i5">
    <h1 style="float:left;margin-top:15px;color:white;">Hospital Management</h1>
    <nav style="float:right;margin-top:25px">
    <font size="2px"><a href="doctor.php" target="_blank" style="text-decoration:none;color:white; margin-right:60px;">Doctor</a></font>
    <font size="2px"><a href="appointment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Appointment</a></font>
    <font size="2px"><a href="patient.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Patient</a></font>
    <font size="2px"><a href="department.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Department</a></font>
    <font size="2px"><a href="Employee.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Employee</a></font>
    <font size="2px"><a href="payment.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Payment</a></font>
    <font size="2px"><a href="logout.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">logout</a></font>
    </nav>
    </div>


  <main>
    <section>
      <div class="back">

      <form id="medicalRecordForm" action="medicalrecords_php.php" method="POST">
        <label for="recordID">Record ID:</label>
        <input type="text" id="recordID" name="recordID" required>
        
        <label for="patientID">Patient ID:</label>
        <input type="text" id="patientID" name="patientID" required>
        
        <label for="doctorID">Doctor ID:</label>
        <input type="text" id="doctorID" name="doctorID" required>
        
        <label for="patientArrivalDate">Patient Arrival Date:</label>
        <input type="date" id="patientArrivalDate" name="patientArrivalDate" required>
        
        <label for="diagnosis">Diagnosis:</label>
        <input type="text" id="diagnosis" name="diagnosis" required>
        
        <label for="medication">Medication:</label>
        <input type="text" id="medication" name="medication" required>
        
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes" required></textarea>
        
        <button type="submit" name="submit" value="submit">Add Medical Record</button>
      </form>
</div>
    </section>

    <section>
      <h2>Medical Records</h2>
      <table id="medicalRecordsTable">
        <thead>
          <tr>
            <th>Record ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Patient Arrival Date</th>
            <th>Diagnosis</th>
            <th>Medication</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include("database.php");
        $sql = "SELECT recordID,medical_records.patientID,medical_records.doctorID,CONCAT(patients.first_name,' ',patients.last_name) AS Patient_Name,CONCAT(doctors.first_name,' ',doctors.last_name) AS Doctor_Name,date,diagnosis,medication,notes
        FROM medical_records
        INNER JOIN patients ON patients.patientID = medical_records.patientID
        INNER JOIN doctors ON doctors.doctorID = medical_records.doctorID
        ORDER BY date";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr><td>".$row["recordID"]."</td>"."<td>".$row["patientID"]."</td>"."<td>".$row["doctorID"]."</td>"."<td>".$row["Patient_Name"]."</td>"."<td>".$row["Doctor_Name"]."</td>"."<td>".$row["date"]."</td>"."<td>".$row["diagnosis"]."</td>"."<td>".$row["medication"]."</td>"."<td>".$row["notes"]."</td></tr>";
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

  <script src="script.js"></script>
</body>
</html>
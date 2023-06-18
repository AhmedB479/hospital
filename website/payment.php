<?php
  ob_start();
  include('session_handler.php');
  checker();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment Management</title>
  <style>
    /* styles.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.back {
      background-image: url("payment.jpg");
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

input[type="text"],
input[type="date"] {
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
    <font size="2px"><a href="Employee.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Employee</a></font>
    <font size="2px"><a href="patient.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">Patient</a></font>
    <font size="2px"><a href="logout.php" target="_blank" style="text-decoration:none;color:white;margin-right:60px;">logout</a></font>
    </nav>
    </div>

  <main>
    <section>
      <div class="back">



      <form id="paymentForm" action="payment_php.php" method="POST">
        <label for="invoiceID">Invoice ID:</label>
        <input type="text" id="invoiceID" name="invoiceID" required>
        
        <label for="patientID">Patient ID:</label>
        <input type="text" id="patientID" name="patientID" required>
        
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>
        
        <label for="paymentDate">Payment Date:</label>
        <input type="date" id="paymentDate" name="paymentDate" required>
        
        <label for="paymentMethod">Payment Method:</label>
        <input type="text" id="paymentMethod" name="paymentMethod" required>
        
        <button type="submit" name="submit" value="submit">Add Payment</button>
      </form>
</div>
    </section>

    <section>
      <h2>Payments</h2>
      <table id="paymentsTable">
        <thead>
          <tr>
            <th>Invoice ID</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Payment Method</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include("database.php");

        if(isset($_GET['id'])){
          $id = $_GET['id'];
          mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
          $delete = mysqli_query($conn,"DELETE FROM `payments` WHERE `paymentID` = '$id'");
          mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
          header("payment.php");
        } 

        $sql = "SELECT paymentID,payments.patientID,CONCAT(patients.first_name,' ',patients.last_name) AS Patient_Name,amount,payment_date,payment_method
        FROM payments
        INNER JOIN patients 
        ON patients.patientID = payments.patientID";
        $result = mysqli_query($conn,$sql);
        if($result-> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<tr>
            <td>".$row["paymentID"]."</td>"
            ."<td>".$row["patientID"]."</td>"
            ."<td>".$row["Patient_Name"]."</td>"
            ."<td>".$row["amount"]."</td>"
            ."<td>".$row["payment_date"]."</td>"
            ."<td>".$row["payment_method"]
            ."<td>"
            ."<a href='payment.php?id=".$row["paymentID"]."'class ='btn'>Delete</a>"
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

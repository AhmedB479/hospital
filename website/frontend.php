<?php 
  session_start();
  unset($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      width: 300px;
      padding: 16px;
      background-color: #fff;
      margin: 0 auto;
      margin-top: 100px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    
    .container h2 {
      text-align: center;
    }
    
    .container input[type=text],
    .container input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    .container button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    .container button:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="frontend_php.php" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>



<?php
  include('connection.php');  
  $username = $_GET['name'];
  $openlab = $_GET['openlab'];
  $total =$_GET['total'];
?>



<!DOCTYPE html>
<html>
<head>
  <title>Attendance Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
      color: #333; /* Set default text color */
      transition: color 0.3s ease;
    }
    
    .container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      text-align: center;
      transition: background-color 0.3s ease;
    }
    
    h1 {
      margin-top: 0;
    }
    
    .name {
      font-size: 24px;
      margin-bottom: 20px;
    }
    
    .subject {
      margin-bottom: 10px;
    }
    
    .subject span {
      font-weight: bold;
    }
    
    .subject .status {
      margin-left: 10px;
      font-weight: bold;
    }
    
    .subject .status.absent {
      color: #F44336;
    }

    #dark-mode-btn {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: transparent;
      border: none;
      font-size: 28px;
      color: #333;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    #dark-mode-btn:hover {
      color: #666;
    }

    .dark-mode {
      background-color: #333;
      color: #fff;
    }
    
    .dark-mode .name {
      color: #fff;
    }

    .dark-mode .subject span {
      color: #fff;
    }
    
    .dark-mode .subject .status.absent {
      color: #FFBABA;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Attendance Dashboard</h1>
    <div class="name">
      <span>Student Name:<?php echo $username ?></span> 
    </div>
    <div class="subject">
      <span>OpenLab:<?php echo $openlab ?></span> <span id="mathAttendance" class="status"></span>
    </div>
    <div class="subject">
      <span>Total Classes: <?php echo $total ?></span> <span id="scienceAttendance" class="status absent"></span>
    </div>
  </div>

  <button id="dark-mode-btn">&#9788;</button>

  <script>
    const darkModeBtn = document.getElementById('dark-mode-btn');
    const body = document.querySelector('body');
    const mathAttendanceElement = document.getElementById('mathAttendance');
    const scienceAttendanceElement = document.getElementById('scienceAttendance');

    darkModeBtn.addEventListener('click', function () {
      body.classList.toggle('dark-mode');
    });

    // Fetch attendance data from a PHP file
    fetch('dashboard.php')
      .then(response => response.json())
      .then(data => {
        // Update attendance numbers on the page
        mathAttendanceElement.textContent = data.openlab;
        scienceAttendanceElement.textContent = data.total;
      })
      .catch(error => console.error(error));
  </script>
</body>
</html>

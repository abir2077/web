<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A Touch of Perfume</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      font-family: 'Georgia', serif;
      background-color: #fffaf9;
      margin: 0;
      padding: 0;
    }

    .account-container {
      position: relative;
      display: inline-block;
      margin: 20px;
      color: #800000;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
    }

    .account-tooltip {
      display: none;
      position: absolute;
      top: 130%;
      right: 0;
      background-color: #ffffff;
      color: #800000;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      font-size: 14px;
      white-space: nowrap;
      z-index: 10;
      text-align: center;
      min-width: 160px;
    }

    .account-container:hover .account-tooltip {
      display: block;
    }

    .home-button {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 14px;
      background-color: #800000;
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .home-button:hover {
      background-color: #a00000;
    }
  </style>
</head>
<body>

  <div class="account-container">
    Welcome, Beautiful
    <div class="account-tooltip">
      Hello, <?php echo htmlspecialchars($username); ?><br>
      <a href="/web/index.php" class="home-button"><i class="fas fa-home"></i> Home</a>
    </div>
  </div>

</body>
</html>

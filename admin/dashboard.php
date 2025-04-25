<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: sign.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin control panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #fceef2;
            color: #800020;
            padding: 3rem;
            text-align: center;
        }

        .dashboard-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        h2 {
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: #800007;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            text-decoration: none;
            transition: background 0.3s ease;
            margin: 0.5rem;
        }

        .btn:hover {
            background-color: #800020;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Control panel</span>
            <a href="logout.php" class="btn btn-outline-light">Sign out</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Welcome admin!</h3>
        <div class="row mt-4 g-3">
            <div class="col-md-4">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Number of products</h5>
                        <p class="card-text fs-4">100</p> <!-- يمكن تعويضها من قاعدة البيانات -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a href="dele_edti.php" class="btn btn-success w-100 h-100">Product Management</a>
            </div>
            <div class="col-md-4">
                <a href="insert_pro.php" class="btn btn-success w-100 h-100">Add products</a>
            </div>
            <div class="col-md-4">
                <a href="manage_users.php" class="btn btn-secondary w-100 h-100">User list</a>
            </div>
        </div>
    </div>
    <a href="../index.php" class="btn-home">Back to Home Page</a>

</body>
</html>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // تحقق بسيط (ممكن تعوضيه بقاعدة بيانات)
    if ($username == "admin" && $password == "123456") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "معلومات الدخول غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #fceef2;
            color: #800020;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 3rem;
        }

        form {
            background-color: #fff;
            padding: 2rem 3rem;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            background-color: #fffafc;
        }

        button {
            background-color: #800007;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #800020;
        }

        .error-msg {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="text-center">تسجيل دخول الأدمن</h3>
        <form method="POST" class="mx-auto p-4 bg-white shadow rounded" style="max-width: 400px;">
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100" type="submit">login</button>
        </form>
    </div>
</body>
</html>

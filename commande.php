<?php
session_start();
include('connt.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Function to calculate cart total
function calculateCartTotal($user_id) {
    global $conn;

    $query = "SELECT SUM(price * quantity) AS total FROM panier WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        error_log("Error preparing statement: " . $conn->error);
        return 0;
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();

    return $row['total'] ?? 0;
}

$total_amount = calculateCartTotal($user_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = "pending";
    $date = date("Y-m-d");

    if (!$conn) {
        die("Database connection error.");
    }

    $stmt = $conn->prepare("INSERT INTO commande (id, date_commande, status, montant_total) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        error_log("Error preparing statement: " . $conn->error);
        echo "❌ Error placing order.";
        exit();
    }

    $stmt->bind_param("issd", $user_id, $date, $status, $total_amount);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully'); window.location.href='../index.php';</script>";
        exit();
    } else {
        error_log("Error executing statement: " . $stmt->error);
        echo "❌ Error placing order.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f2f2f2;
            padding: 2rem;
            direction: ltr;
        }

        .container {
            background-color:rgb(249, 249, 247); /* khaki */
            max-width: 500px;
            margin: auto;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #8B0000; /* dark red */
        }

        label {
            display: block;
            margin-top: 1rem;
            color: #333;
        }

        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #bbb;
            border-radius: 8px;
        }

        button {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }

        button:hover {
            background-color: #a10000;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>New Order</h2>
    <form method="post">
        <label>User ID</label>
        <input type="text" value="<?= htmlspecialchars($user_id) ?>" disabled>

        <label>Order Date</label>
        <input type="text" value="<?= date('Y-m-d') ?>" disabled>

        <label>Status</label>
        <input type="text" value="pending" disabled>

        <label>Total Amount</label>
        <input type="text" value="<?= $total_amount ?>" disabled>

        <button type="submit">Submit Order</button>
    </form>
</div>

</body>
</html>
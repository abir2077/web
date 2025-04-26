<?php
include('../connt.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueName = uniqid('img_', true) . '.' . $ext;
        $uploadPath = "../parfum/" . $uniqueName;

        if (move_uploaded_file($imageTmp, $uploadPath)) {
            $sql = "INSERT INTO products (name, image, description, price, category) 
                    VALUES ('$name', '$uniqueName', '$description', '$price', '$category')";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='success-msg'>✅ تم إدخال المنتج بنجاح!</div>";
            } else {
                echo "<div class='error-msg'>❌ خطأ في قاعدة البيانات: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='error-msg'>❌ فشل في تحميل الصورة.</div>";
        }
    } else {
        echo "<div class='error-msg'>❌ لم يتم اختيار صورة أو حدث خطأ في رفعها.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add product</title>
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
        textarea,
        select {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            background-color: #fffafc;
        }

        input[type="file"] {
            margin-bottom: 1.5rem;
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
        }

        button:hover {
            background-color: #800020;
        }

        .success-msg, .error-msg {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .success-msg {
            background-color: #d4edda;
            color: #155724;
        }

        .error-msg {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<a href="dashboard.php" style="text-decoration: none;">
    <button style="
        background-color: #800007;
        color: white;
        padding: 6px 14px;
        font-size: 0.9rem;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    " onmouseover="this.style.backgroundColor='#a30012'; this.style.transform='scale(1.05)'" 
       onmouseout="this.style.backgroundColor='#800007'; this.style.transform='scale(1)'">
        ← Back
    </button>
</a>

<form action="insert_pro.php" method="POST" enctype="multipart/form-data">
    <label>Name product:</label>
    <input type="text" name="name" required>

    <label for="image">image product:</label>
    <input type="file" name="image" id="image" required>

    <label>الوصف:</label>
    <textarea name="description" rows="4" required></textarea>

    <label>price:</label>
    <input type="text" name="price" required>

    <label>type:</label>
    <select name="category" required>
        <option value="floral">Floral Perfumes</option>
        <option value="fruity">Fruity Perfumes</option>
        <option value="oriental">Oriental Perfumes</option>
        <option value="best">Best selling</option>
        <option value="trend">Trending Perfumes</option>
    </select><button type="submit">Add product</button>
</form>

</body>
</html>
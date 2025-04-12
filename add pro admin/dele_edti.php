<?php
include('connt.php');  // تأكد من صحة مسار الاتصال بقاعدة البيانات

// عملية حذف المنتج
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM products WHERE id='$id'";
    $delete = mysqli_query($conn, $query);
    if ($delete) {
        echo '<script>alert("تم الحذف بنجاح");</script>';
    } else {
        echo '<script>alert("فشل في الحذف");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - المنتجات</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: '29LT Zarid Display', serif;
            background-color: #f4f4f4;
            padding: 2rem;
        }

        .sidebar_container {
            width: 100%;
            margin-top: 6rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            direction: rtl;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 1.2rem;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 1.5rem;
        }

        th {
            background-color: rgba(255, 182, 193, 0.2);
            color: #800007;
        }

        td img {
            width: 80px;
            height: auto;
            border-radius: 10px;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-delete:hover {
            background-color: #e53935;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar_container">
        <table>
            <thead>
                <tr>
                    <th>رقم المنتج</th>
                    <th>صورة المنتج</th>
                    <th>عنوان المنتج</th>
                    <th>سعر المنتج</th>
                    <th>توفر المنتج</th>
                    <th>الأقسام</th>
                    <th>تفاصيل المنتج</th>
                    <th>حذف المنتج</th>
                    <th>تعديل المنتج</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><img src="العطور/<?= $row['image']; ?>" alt="صورة المنتج"></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['price']; ?> DZ</td>
                    <td><?= isset($row['availability']) ? $row['availability'] : 'غير محدد'; ?></td>
                    <td><?= $row['category']; ?></td>
                    <td><a href="dele_edti.php?id=<?= $row['id']; ?>">عرض التفاصيل</a></td>
                    <td>
                        <a href="dele_edti.php?delete_id=<?= $row['id']; ?>" onclick="return confirm('هل أنت متأكد من حذف المنتج؟');">
                            <button class="btn-delete">حذف المنتج</button>
                        </a>
                    </td>
                    <td>
                        <a href="dele_edti.php?id=<?= $row['id']; ?>">
                            <button class="btn-edit">تعديل المنتج</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

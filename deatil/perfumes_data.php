<?php 
include('connt.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
</head>
<body>
<style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
 /* تصميم أفقي للبطاقة */
 .product-card {
      width: 700px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      display: flex;
      gap: 40px;
    }

    /* الصورة على اليسار */
    .product-image {
      width: 300px;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }

    /* محتوى النص على اليمين */
    .product-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    /* الاسم في الأعلى على اليمين (منتصف رأسي) */
    .product-title {
      font-size: 28px;
      font-weight: bold;
      color: #800007;
      margin: 120;
      position: absolute;
      top: 10%;
      right: 20%;
      text-align: right;
      margin-bottom: 40px;
    }

    /* السعر تحت الاسم */
    .product-price {
      font-size: 20px;
      font-weight: bold;
      color: #800007;
      margin: 80px 0 0 0;
      text-align: center;
    }

    /* الوصف تحت السعر */
    .product-description {
      font-size: 16px;
      color: #555;
      line-height: 1.6;
      margin: 20px 0 0 0;
      text-align: left;
    }

    /* زر الشراء */
    .cart-btn {
      background-color: #800007;
      color: white;
      border: none;
      padding: 14px 35px;
      font-size: 18px;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: bold;
      margin-top: 30px;
      align-self: flex-end;
    }

    .cart-btn:hover {
      background-color: #600006;
      transform: scale(1.02);
    }

    /* الخط الفاصل */
    .divider {
      border: none;
      height: 1px;
      background-color: #eee;
      margin: 20px 0;
    }

    /* خلفية مظللة */
    .preview-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      display: none;
      z-index: 99;
    }

    /* نافذة المعاينة */
    .product-preview {
      position: fixed;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      padding: 20px;
      width: 400px;
      max-width: 90%;
      border-radius: 10px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
      display: none;
      z-index: 100;
    }

    .product-preview img {
      width: 100%;
      border-radius: 10px;
    }

    .close-btn {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 25px;
      color: #900;
      cursor: pointer;
    }

    .stars i {
      color: gold;
    }
  </style>
</head>
<body>
<?php 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // استعلام لاستخراج بيانات المنتج بناءً على المعرف
            $query = "SELECT * FROM products WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            
            // تحقق من نتيجة الاستعلام
            if ($result) {
                $row = mysqli_fetch_array($result);
                if ($row) {
                    $productName = $row['name']; // استبدل بـاسم المنتج في قاعدة البيانات
                    $productPrice = $row['price']; // استبدل بالسعر
                    $productDescription = $row['description']; // استبدل بوصف المنتج
                    $productImage = $row['image']; // استبدل بصورة المنتج (إذا كانت موجودة في قاعدة البيانات)

                } else {
                    echo "لم يتم العثور على المنتج.";
                }
            } else {
                // طباعة خطأ الاستعلام
                echo "حدث خطأ في الاستعلام: " . mysqli_error($conn);
            }
        } else {
            echo "لم يتم توفير المعرف.";
        }
        ?>
    
    
  
    <div class="product-card">
  <img src="العطور/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" class="product-image">

  <div class="product-content">
    <h1 class="product-title"><?php echo $productName; ?></h1>

    <span class="product-price"><?php echo $productPrice; ?> DZD</span>

    <div class="product-description">
      <?php echo nl2br($productDescription); ?>
    </div>

    <hr class="divider">

    <button class="cart-btn">Add To Cart</button>
  </div>
</div>

</body>
</html>
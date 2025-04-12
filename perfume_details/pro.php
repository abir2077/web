<?php
include('connt.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $image = $row['image'];
        $description = $row['description'];
        $price = $row['price'];
    } else {
        echo "❌ لم يتم العثور على المنتج.";
        exit;
    }
} else {
    echo "❌ لم يتم تمرير معرف المنتج.";
    exit;
}
?>

<h2><?php echo $name; ?></h2>
<img src="العطور/<?php echo $image; ?>" alt="<?php echo $name; ?>" width="300">
<p><strong>السعر:</strong> $<?php echo $price; ?></p>
<p><?php echo $description; ?></p>

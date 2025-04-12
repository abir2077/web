<?php
include('connt.php');

$q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

if ($q != '') {
    $sql = "SELECT id, name, description, image FROM products WHERE name LIKE '%$q%' OR description LIKE '%$q%' LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='search-result'>";
            echo "<a href='pro.php?id=".$row['id']."' style='color: inherit; text-decoration: none;'>";
            echo "<strong>" . htmlspecialchars($row['name']) . "</strong><br>";
            echo "<small>" . htmlspecialchars(substr($row['description'], 0, 100)) . "...</small>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<div class='no-result'>لا توجد نتائج مطابقة.</div>";
    }
}

$conn->close();
?>
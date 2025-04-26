<?php
include('../connt.php'); // الاتصال بقاعدة البيانات

if (isset($_GET['q'])) {
  $search = $conn->real_escape_string($_GET['q']);

  $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <img src="'.$row['image'].'" class="card-img-top" alt="image">
          <div class="card-body">
            <h5 class="card-title">'.$row['name'].'</h5>
            <p class="card-text">'.$row['description'].'</p>
            <p class="card-text text-danger font-weight-bold">'.$row['price'].' DZ</p>
            <a href="details.php?id='.$row['id'].'" class="btn btn-custom-red">Details</a>
          </div>
        </div>
      </div>';
    }
  } else {
    echo '<div class="col-12"><p class="text-center text-muted">لم يتم العثور على عطور مطابقة.</p></div>';
  }
}
?>
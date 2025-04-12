<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>البحث عن العطور</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .icons-and-search {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-box {
      position: relative;
      width: 250px;
    }

    .search-box input {
      padding: 8px 30px 8px 12px;
      border: 2px solid #8B0000;
      border-radius: 20px;
      font-size: 14px;
      color: #8B0000;
      width: 100%;
    }

    .search-box .search-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #8B0000;
      pointer-events: none;
      font-size: 16px;
    }
    .search-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  color: #8B0000;
  pointer-events: none;
  font-size: 12px; /* 👈 الحجم هنا */
}


  </style>
</head>
<body>

  <div class="search-container">
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="ابحث عن عطر...">
      <i class="fas fa-search search-icon"></i>
    </div>
  </div>

  <div id="results"></div>

  <script>
    document.getElementById('searchInput').addEventListener('input', function() {
      const query = this.value;

      fetch('search.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
          document.getElementById('results').innerHTML = data;
        });
    });
  </script>

</body>
</html>

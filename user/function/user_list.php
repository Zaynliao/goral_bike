<?php

require_once("../db-connect.php");

// for 排序
if (!isset($_GET["type"])) {
    $type = "1";
} else {
    $type = $_GET["type"];
}
switch ($type) {
    case "1":
        $order = "id ASC";
        break;
    case "2":
        $order = "id DESC";
        break;
    case "3":
        $order = "name ASC";
        break;
    case "4":
        $order = "name DESC";
        break;
    default:
        $order = "id ASC";
}

// for 分頁
if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}
// for 每頁幾筆
if (!isset($_GET["per_page"])) {
    $per_page = 10;
} else {
    $per_page = $_GET["per_page"];
}

//for 啟用狀態
if (!isset($_GET["enable"])) {
    $enable = 1;
} else {
    $enable = $_GET["enable"];
}

if (isset($_GET["search"])) {
    //query所有使用者
    $search = $_GET["search"];
    $sql = "SELECT * FROM user WHERE enable = $enable 
            AND (id LIKE '%$search%'
            OR name LIKE '%$search%' 
            OR account LIKE '%$search%')";
    $result = $conn->query($sql);
    $total = $result->num_rows;
    //計算所需分頁數量
    $page_count = ceil($total / $per_page);
    $start = ($p - 1) * $per_page;
    //for 顯示每個分頁資訊
    $sqlShow = "SELECT * FROM user 
                WHERE enable = $enable
                AND (id LIKE '%$search%'
                OR name LIKE '%$search%'
                OR account LIKE '%$search%')
                ORDER BY $order LIMIT $start,$per_page";
} else {
    $search="";
    //query所有使用者
    $sql = "SELECT * FROM user WHERE enable = $enable";
    $result = $conn->query($sql);
    $total = $result->num_rows;
    //計算所需分頁數量
    $page_count = ceil($total / $per_page);
    $start = ($p - 1) * $per_page;
    //for 顯示每個分頁資訊
    $sqlShow = "SELECT * FROM user 
                WHERE enable = $enable
                ORDER BY $order LIMIT $start,$per_page";
}

//執行列表資訊的sql
$result = $conn->query($sqlShow);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$user_count = $result->num_rows;


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      
      <div class="container">
          <?php //var_dump($rows);
          ?>
          <!-- 搜尋列 -->
          <div class="pt-4 pb-2">
              <form class="d-flex justify-content-end" action="goral_biker_user_list.php">
                  <div class="w-25 d-flex">
                      <input type="hidden" name="enable" value="<?= $enable ?>">
                      <input class="form-control me-2" type="search" placeholder="搜尋關鍵字" aria-label="Search" name="search">
                      <button class="btn btn-outline-dark" type="submit">Search</button>
                  </div>
              </form>
          </div>
          <!-- 每分頁顯示資料數量 -->
          <div class="d-flex justify-content-between pt-2">
              <div class="d-flex align-items-center">
                  <span class="text-nowrap me-2">
                      顯示
                  </span>
                  <select class="form-select me-2" aria-label="Default select example" id="pageCount">
                      <option value="5" <?php if ($per_page == 5) echo "selected" ?>>5</option>
                      <option value="10" <?php if ($per_page == 10) echo "selected" ?>>10</option>
                      <option value="15" <?php if ($per_page == 15) echo "selected" ?>>15</option>
                  </select>
                  <span class="text-nowrap">
                      筆數
                  </span>
              </div>
              <div>
                  <a href="goral_biker_user_list.php?p=<?= $p ?>&type=1&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" class="btn btn-dark text-white <?php if ($type == 1) echo "active" ?>">依id正序排列</a>
                  <a href="goral_biker_user_list.php?p=<?= $p ?>&type=2&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" class="btn btn-dark text-white <?php if ($type == 2) echo "active" ?>">依id反序排列</a>
                  <a href="goral_biker_user_list.php?p=<?= $p ?>&type=3&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" class="btn btn-dark text-white <?php if ($type == 3) echo "active" ?>">依姓名正序排列</a>
                  <a href="goral_biker_user_list.php?p=<?= $p ?>&type=4&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" class="btn btn-dark text-white <?php if ($type == 4) echo "active" ?>">依姓名反序排列</a>
              </div>
          </div>
          <!-- 切換啟用/禁用會員 -->
          <div class="py-2 text-end">
              <?php if ($enable == 1) : ?>
                  <a href="goral_biker_user_list.php?enable=0" class="btn btn-dark text-white">已禁用會員</a>
              <?php else : ?>
                  <a href="goral_biker_user_list.php" class="btn btn-dark text-white">啟用會員</a>
              <?php endif; ?>
          </div>
          <table class="table table-bordered ">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>姓名</th>
                      <th>帳號</th>
                      <th>性別</th>
                      <th>生日</th>
                      <th>地址</th>
                      <th>信箱</th>
                      <th>電話</th>
                      <th>創建時間</th>
                      <th>啟用狀態</th>
                      <th></th>
                  </tr>
              </thead>
              <!-- table資料呈現 -->
              <tbody>
                  <?php if ($user_count > 0) : ?>
                      <?php
                      foreach ($rows as $row) :
                      ?>
                          <tr>
                              <td><?= $row["id"] ?></td>
                              <td><?= $row["name"] ?></td>
                              <td><?= $row["account"] ?></td>
                              <td>
                                  <?php echo ($row["gender"] == "male") ? "男" : "女"; ?>
                              </td>
                              <td><?= $row["birthday"] ?></td>
                              <td><?= $row["address"] ?></td>
                              <td><?= $row["email"] ?></td>
                              <td><?= $row["phone_number"] ?></td>
                              <td><?= $row["create_time"] ?></td>
                              <td>
                                  <?php echo ($row["enable"] == 1) ? "啟用" : "禁用"; ?>
                              </td>
                              <td><a href="goral_biker_user.php?id=<?= $row["id"] ?>" class="btn btn-info text-white">詳細</a></td>
                          </tr>
                      <?php endforeach; ?>
                  <?php else : ?>
                      <?= "<tr><td>no data.</td></tr>" ?>
                  <?php endif; ?>
              </tbody>
          </table>
          <!-- 切換分頁 -->
          <div class="d-flex justify-content-center align-items-center">
              <div class="py-2 me-3">
                  <nav aria-label="Page navigation example">
                      <ul class="pagination mb-0">
                          <?php if ($p != 1) : ?>
                              <li class="page-item">
                                  <a class="page-link" href="goral_biker_user_list.php?p=<?= $p - 1 ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                  </a>
                              </li>
                          <?php endif; ?>
                          <li class="page-item">
                              <a class="page-link" href="goral_biker_user_list.php?p=<?= $p ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>"><?= $p ?>
                              </a>
                          </li>
                          <?php if ($p < $page_count) : ?>
                              <li class="page-item">
                                  <a class="page-link" href="goral_biker_user_list.php?p=<?= $p + 1 ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&enable=<?= $enable ?>&search=<?= $search ?>" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                  </a>
                              </li>
                          <?php endif; ?>
                      </ul>
                  </nav>
      
              </div>
              <!-- 顯示當前分頁及搜尋筆數 -->
              <div class="py-2 text-center">
                  第 <?= $p ?> 頁, 共<?= $page_count ?>頁, 共<?= $total ?>筆
              </div>
          </div>
      </div>

    
  <script>
      // 切換分頁的js
      let pageCount = document.querySelector("#pageCount");
      pageCount.addEventListener("change", function(e) {
          console.log(e.target.value);
          location.href = `goral_biker_user_list.php?per_page=${e.target.value}&enable=<?= $enable ?>&type=<?= $type ?>&search=<?= $search ?>`;
      })
  </script>
  </body>
</html>


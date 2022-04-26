<div class="d-flex flex-wrap">
    <?php foreach ($rows as $row) : ?>
    <input type="hidden" name="id" id="id" value="<?= $row["course_id"] ?>">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
        <div class="card shadow-sm mx-2">
            <figure class="product-img text-center">

                <img class="object-cover" src="../course/images/<?= $row["course_pictures"] ?>" alt="">
                <!-- 每個產品的 checkbox -->
                <div class="text-start">
                    <input class="checkbox form-check-input ms-2 mt-2 position-absolute top-0 start-0" name="checkbox[]"
                        id="checkbox" type="checkbox" value="<?= $row["course_id"] ?>" aria-label="">
                </div>

            </figure>
            <div class="pb-2 px-3">
                <span class="badge rounded-pill px-2 me-1
                        <?php if ($row["course_category_id"] == 1) : echo "bg-success" ?>
                        <?php else : echo "bg-danger" ?>
                        <?php endif; //標籤顏色判斷 ?>" <?php if (!$row["course_category_id"]) echo "hidden" //標籤hidden判斷?>>

                    <!-- 類別名稱顯示 -->
                    <?= $row["course_category_name"] ?>
                </span>
                <span class="badge rounded-pill px-2 me-1
                        <?php if ($row["course_status_id"] == 1) : echo "bg-secondary" ?>
                        <?php elseif ($row["course_status_id"] == 2) : echo "bg-success" ?>
                        <?php else : echo "bg-danger" ?>
                        <?php endif; //標籤顏色判斷 ?>" <?php if (!$row["course_status_id"]) echo "hidden" //標籤hidden判斷?>>

                    <!-- 狀態名稱顯示 -->
                    <?= $row["course_status_name"] ?>
                </span>
                <span class="badge bg-dark rounded-pill px-2 me-1"
                    <?php if (!$row["course_location_id"]) echo "hidden" //標籤hidden判斷?>>
                    <!-- 地點名稱顯示 -->
                    <?= $row["course_location_name"] ?>
                </span>
                <span class="badge bg-dark rounded-pill px-2 me-2" <?php if (!$row["course_price"]) echo "hidden"?>>

                    <!-- 價錢顯示 -->
                    <?= $row["course_price"] ?> / 人
                </span>
                <!-- 課程名稱與時間顯示 -->
                <div class="name-time mt-3">
                    <h3 class="text-dark fw-bold"><?= $row["course_title"] ?></h3>
                    <h5 class="text-dark fw-bold"><?= $row["course_date"] ?></h5>
                </div>
                <!-- 單次修改課程按鈕 -->
                <div class="d-grid mt-4">
                    <!-- 需傳送特定單筆資料的各式欄位，以到修改頁面能取得 GET -->
                    <a class="btn btn-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_course-upload.php?id=<?= $row["course_id"] ?>&statu=<?= $row["course_status_id"] ?>
                        &loca=<?= $row["course_location_id"] ?>&cate=<?= $row["course_category_id"] ?>">修改課程</a>
                </div>
                <!-- 單次 delete/update 按鈕 -->
                <div class="d-grid">
                    <button formaction="../course/api/course-doDelete.php"
                        class="delete-btn btn btn-secondary text-white mb-2 fw-bold" data-id="<?= $row["course_id"] ?>"
                        <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0)  echo "hidden" ?>>下架課程</button>
                    <button formaction="../course/api/course-doValid.php"
                        class="valid-btn btn btn-info text-white mb-2 fw-bold" data-id="<?= $row["course_id"] ?>"
                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>上架課程</button>
                    <button formaction="../course/api/course-isdoDelete.php"
                        class="isdelete-btn btn btn-danger text-white mb-2 fw-bold" data-id="<?= $row["course_id"] ?>"
                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>刪除課程</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

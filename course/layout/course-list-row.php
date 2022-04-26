<div class="d-flex justify-content-evenly align-content-center border rounded text-nowrap my-5 shadow">
    <div class="col-auto text-center">
        <div class="table-title py-2 px-3"  style="border-top-left-radius: 5px;">
            <input class="form-check-input" type="checkbox" name="checkall" id="checkallrow"
                onclick="CheckedAllrow()" />
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <input class="checkboxrow form-check-input" name="checkbox[]" id="checkbox" type="checkbox"
                value="<?= $value["course_id"] ?>" aria-label="">
        </div>
        <?php endforeach;?>
    </div>
    <div class="col border-start text-center d-none d-sm-block">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                名稱
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=7<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=8<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach($rows as $row => $value):?>
        <div class="border-top py-2 px-3" <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href=""><?=$value["course_title"]?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col border-start text-center d-none d-md-block">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                難度
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=11<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=12<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach( $rows as $row=>$value):?>
        <div class="border-top py-2 px-3" <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href=""><?=$value["course_category_name"]?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col border-start text-center">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                時間
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=3<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=4<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3" <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href=""><?=$value["course_date"]?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col border-start text-center d-none d-md-block">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                地點
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=9<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=10<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href=""><?=$value["course_location_name"]?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto d-none d-lg-block border-start text-center">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                價錢 / 人
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=5<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=6<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href=""> $ <?=$value["course_price"]?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto border-start text-center d-none d-sm-block">
        <div class="table-title pt-1 pb-2 px-3 d-flex justify-content-center">
            <div class="col-auto pt-1 fw-bold">
                狀態
            </div>
            <div class="col-auto ms-2">
                <div style="height: 8px;">
                    <a class="py-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=13<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-up fa-lg"></i></a>
                </div>
                <div style="height: 8px;">
                    <a class="pb-1" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=14<?=$dateURL?><?=$searchURL?><?=$perpageURL?><?=$modeURL?>"><i class="fa-solid fa-caret-down fa-lg"></i></a>
                </div>
            </div>
        </div>
        <?php foreach($rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href="" data-bs-toggle="tooltip" data-bs-placement="right" <?php if($value["course_status_id"] == 1) :?>
                title="報名未開放" <?php elseif($value["course_status_id"] == 2):?> title="報名開放中" <?php else:?> title="報名已截止"
                <?php endif; ?>>
                <i <?php if($value["course_status_id"] == 1) :?> class="fa-regular fa-circle-xmark" style="color:firebrick;"
                    <?php elseif($value["course_status_id"] == 2):?> class="fa-regular fa-circle-check" style="color:green;"<?php else:?>
                    class="fa-solid fa-ban" style="color:#666;" <?php endif; ?>></i>
            </a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto border-start text-center">
        <div class="table-title py-2 px-3 fw-bold">
            編輯
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href="../goral_bike_layout/goral_biker_course-upload.php?id=<?= $value["course_id"] ?>&statu=<?= $value["course_status_id"] ?>
                        &loca=<?= $value["course_location_id"] ?>&cate=<?= $value["course_category_id"] ?>"><i
                    class="fa-solid fa-pen-to-square"></i></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto border-start text-center"<?php if (isset($_GET["valid"]) && $_GET["valid"] == 0)  echo "hidden" ?>>
        <div class="table-title py-2 px-3 fw-bold"  style="border-top-right-radius: 5px;" >
            下架
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href="#" class="delete-btn" data-id="<?= $value["course_id"] ?>"><i class="fa-solid fa-clipboard"></i></i></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto border-start text-center" <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>
        <div class="table-title py-2 px-3 fw-bold">
            上架
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href="#" class="valid-btn" data-id="<?= $value["course_id"] ?>"><i class="fa-solid fa-clipboard-check"></i></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-auto border-start text-center" <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>
        <div class="table-title py-2 px-3 fw-bold" style="border-top-right-radius: 5px;" >
            刪除
        </div>
        <?php foreach( $rows as $row => $value):?>
        <div class="border-top py-2 px-3"  <?php if (($row%2)!==0) echo "style=background:#f8f9fa;"?>>
            <a href="#" class="isdelete-btn" data-id="<?= $value["course_id"] ?>"> <i
                    class="fa-solid fa-trash"></i></a>
        </div>
        <?php endforeach;?>
    </div>
</div>
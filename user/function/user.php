<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="py-2">
                <a href="goral_biker_user_list.php" class="btn btn-info text-white">回列表</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?= $row["id"] ?></td>
                </tr>
                <tr>
                    <th>姓名</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>帳號</th>
                    <td><?= $row["account"] ?></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <?php echo ($row["gender"] == "male") ? "男" : "女"; ?>
                    </td>
                </tr>
                <tr>
                    <th>生日</th>
                    <td><?= $row["birthday"] ?></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><?= $row["address"] ?></td>
                </tr>
                <tr>
                    <th>信箱</th>
                    <td><?= $row["email"] ?></td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td><?= $row["phone_number"] ?></td>
                </tr>
                <tr>
                    <th>創建時間</th>
                    <td><?= $row["create_time"] ?></td>
                </tr>
                <tr>
                    <th>啟用狀態</th>
                    <td>
                        <?php echo ($row["enable"] == 1) ? "啟用" : "禁用"; ?>
                    </td>
                </tr>
            </table>
            <div class="py-2">
                <a href="goral_biker_user_edit.php?id=<?= $row["id"] ?>" class="btn btn-info text-white">編輯</a>
                <a href="../user/backend/doDelete.php?id=<?= $row["id"] ?>" class="btn btn-danger text-white">刪除</a>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- Bootstrap JavaScript Libraries -->
</body>

</html>
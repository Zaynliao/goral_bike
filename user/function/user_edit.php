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
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 pt-3">
                <form action="../user/backend/updateUser.php" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <tr>
                            <th>ID</th>
                            <td><?= $row["id"] ?></td>
                        </tr>
                        <tr>
                            <th>姓名</th>
                            <td>
                                <input type="text" name="name" class="form-control" value="<?= $row["name"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>帳號</th>
                            <td>
                                <input type="text" name="account" class="form-control" value="<?= $row["account"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($row["gender"] == "male") ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="male">
                                        男生
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($row["gender"] == "female") ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="female">
                                        女生
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>生日</th>
                            <td>
                                <input type="date" name="birthday" class="form-control" value="<?= $row["birthday"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>地址</th>
                            <td>
                                <input type="text" name="address" class="form-control" value="<?= $row["address"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>信箱</th>
                            <td>
                                <input type="text" name="email" class="form-control" value="<?= $row["email"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>電話</th>
                            <td>
                                <input type="text" name="phone" class="form-control" value="<?= $row["phone_number"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>創建時間</th>
                            <td>
                                <?= $row["create_time"] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>啟用狀態</th>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="enable">
                                    <option value="1" <?php echo ($row["enable"] == 1) ? "selected" : ""; ?>>
                                        啟用</option>
                                    <option value="0" <?php echo ($row["enable"] == 0) ? "selected" : ""; ?>>
                                        禁用</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="py-2">
                        <button type="submit" class="btn btn-info text-white">儲存</button>
                        <a href="goral_biker_user.php?id=<?= $row["id"] ?>" class="btn btn-info text-white">取消</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
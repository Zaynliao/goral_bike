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
        <form action="../user/backend/register.php" method="POST" onsubmit="return checkForm()">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h1>註冊</h1>

                    <div class="mb-2">
                        <label for="">姓名</label>
                        <input class="form-control" type="text" name="name" id="name">
                        <span class="text-danger" id="validName"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">帳號</label>
                        <input class="form-control" type="text" name="account" id="account">
                        <span class="text-danger" id="validAccount"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">密碼</label>
                        <input class="form-control" type="password" name="password" id="password">
                        <span class="text-danger" id="validPassword"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">再輸入一次密碼</label>
                        <input class="form-control" type="password" name="repassword" id="repassword">
                        <span class="text-danger" id="validRepassword"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">性別</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                    男生
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    女生
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="">生日</label>
                        <input class="form-control" type="date" name="birthday" id="birthday">
                        <span class="text-danger" id="validBirthday"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">地址</label>
                        <input class="form-control" type="text" name="address" id="address">
                        <span class="text-danger" id="validAddress"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">email</label>
                        <input class="form-control" type="email" name="email" id="email">
                        <span class="text-danger" id="validEmail"></span>
                    </div>
                    <div class="mb-2">
                        <label for="">電話</label>
                        <input class="form-control" type="text" name="phone" id="phone">
                        <span class="text-danger" id="validPhone"></span>
                    </div>
                    <button class="btn btn-info text-white" type="submit" id="send">送出</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let name = document.querySelector("#name");
        let account = document.querySelector("#account");
        let password = document.querySelector("#password");
        let repassword = document.querySelector("#repassword");
        let birthday = document.querySelector("#birthday");
        let address = document.querySelector("#address");
        let email = document.querySelector("#email");
        let phone = document.querySelector("#phone");

        function checkForm() {
            let nameVal = name.value,
                accountVal = account.value,
                passwordVal = password.value,
                repasswordVal = repassword.value,
                birthdayVal = birthday.value,
                addressVal = address.value,
                emailVal = email.value,
                phoneVal = phone.value;
            // console.log(birthdayVal);

            if (nameVal == "") {
                document.querySelector("#validName").innerText = "請填寫姓名!";
                // alert("請填寫姓名!");
                name.focus();
                return false;
            } else {
                document.querySelector("#validName").innerText = " ";
            }

            if (accountVal == "") {
                // alert("請填寫帳號!");
                document.querySelector("#validAccount").innerText = "請填寫帳號!";
                account.focus();
                return false;
            } else {
                if (accountVal.length < 5 || accountVal.length > 10) {
                    // alert("您的帳號長度只能5至10個字元!");
                    document.querySelector("#validAccount").innerText = "您的帳號長度只能5至10個字元!";
                    account.focus();
                    return false;
                }

                for (idx = 0; idx < accountVal.length; idx++) {
                    if (!((accountVal.charAt(idx) >= 'A' && accountVal.charAt(idx) <= 'Z') || (accountVal.charAt(idx) >= 'a' && accountVal.charAt(idx) <= 'z') || (accountVal.charAt(idx) >= '0' && accountVal.charAt(idx) <= '9') || (accountVal.charAt(idx) == '_'))) {
                        // alert("您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!");
                        document.querySelector("#validAccount").innerText = "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!";
                        account.focus();
                        return false;
                    }
                    if (accountVal.charAt(idx) == '_' && accountVal.charAt(idx - 1) == '_') {
                        // alert("「_」符號不可相連 !\n");
                        document.querySelector("#validAccount").innerText = "「_」符號不可相連 !\n";
                        account.focus();
                        return false;
                    }
                }
                document.querySelector("#validAccount").innerText = " ";
            }
            if (!check_passwd(passwordVal, repasswordVal)) {
                password.focus();
                return false;
            }

            if (birthdayVal == "") {
                // alert("請填寫生日!");
                document.querySelector("#validBirthday").innerText = "請填寫生日!";
                birthday.focus();
                return false;
            } else {
                document.querySelector("#validBirthday").innerText = " ";
            }
            if (!checkbirthday(birthdayVal)) {
                birthday.focus();
                return false;
            }

            if (addressVal == "") {
                // alert("請填寫地址!");
                document.querySelector("#validAddress").innerText = "請填寫地址!";
                address.focus();
                return false;
            } else {
                document.querySelector("#validAddress").innerText = " ";
            }

            if (emailVal == "") {
                // alert("請填寫電子郵件!");
                document.querySelector("#validEmail").innerText = "請填寫電子郵件!";
                email.focus();
                return false;
            } else {
                document.querySelector("#validEmail").innerText = " ";
            }
            if (!checkmail(email)) {
                email.focus();
                return false;
            }

            if (phoneVal == "") {
                // alert("請填寫電話號碼!");
                document.querySelector("#validPhone").innerText = "請填寫電話號碼!";
                phone.focus();
                return false;
            } else {
                document.querySelector("#validPhone").innerText = " ";
            }

            return confirm('確定送出嗎？');
        }

        function check_passwd(pw1, pw2) {
            document.querySelector("#validPassword").innerText = " ";
            if (pw1 == '') {
                // alert("密碼不可以空白!");
                document.querySelector("#validPassword").innerText = "密碼不可以空白!";
                return false;
            }
            for (var idx = 0; idx < pw1.length; idx++) {
                if (pw1.length < 5 || pw1.length > 10) {
                    // alert("密碼長度只能5到10個字元 !\n");
                    document.querySelector("#validPassword").innerText = "密碼長度只能5到10個字元 !\n";
                    return false;
                }
                if (pw1 != pw2) {
                    // alert("密碼二次輸入不一樣,請重新輸入 !\n");
                    document.querySelector("#validPassword").innerText = "密碼二次輸入不一樣,請重新輸入 !\n";
                    document.querySelector("#validRepassword").innerText = "密碼二次輸入不一樣,請重新輸入 !\n";
                    return false;
                }
                if (!((pw1.charAt(idx) >= 'A' && pw1.charAt(idx) <= 'Z') || (pw1.charAt(idx) >= 'a' && pw1.charAt(idx) <= 'z') || (pw1.charAt(idx) >= '0' && pw1.charAt(idx) <= '9') || (pw1.charAt(idx) == '_'))) {
                    document.querySelector("#validPassword").innerText = "您的密碼只能是數字,英文字母及「_」等符號,其他的符號都不能使用!";
                    // alert("您的密碼只能是數字,英文字母及「_」等符號,其他的符號都不能使用!");
                    return false;
                }
            }
            return true;
        }

        function checkmail(Email) {
            var filter = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (filter.test(Email.value)) {
                document.querySelector("#validEmail").innerText = " ";
                return true;
            }
            // alert("電子郵件格式不正確");
            document.querySelector("#validEmail").innerText = "電子郵件格式不正確";
            return false;
        }

        function checkbirthday(birthday) {
            let today = new Date();
            let check = new Date(birthday);
            console.log(today.getTime());
            console.log(check.getTime());
            if (today.getTime() < check.getTime()) {
                document.querySelector("#validBirthday").innerText = "生日不得小於今天";
                return false;
            }
            document.querySelector("#validBirthday").innerText = " ";
            return true;
        }
    </script>
</body>

</html>
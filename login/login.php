<?php
require('../db/config.php');
session_start();
$error = [];
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)) $error['email'] = 'Vui lòng nhập trường này!';
    if(empty($password)) $error['password'] = 'Vui lòng nhập trường này!';
    
    $login = "SELECT * from users where email = '$email'";
    $select = mysqli_query($conn,$login);

    
    if(mysqli_num_rows($select) > 0) {
        $user = mysqli_fetch_assoc($select);
        $pass_hash = $user['password'];

        if(password_verify($password,$pass_hash)){
            $_SESSION['user'] = $user;

            if($_SESSION['user']['isAdmin'] == 1) {
                $_SESSION['isAdmin'];
                header('location: ../Project_PHP/admin/index.php');
            }
            else {
                header('location: ../Project_PHP/client/index.php');

            }

        }else{
            $error['user'] = 'Tài khoản hoặc mật khẩu sai!';
        }
        
    }
    else {
        $error['user'] = 'Tài khoản chưa tồn tại!';
    }
}
?>



<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>user </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Đăng nhập tài khoản của bạn Lưu</h4>
                                    <form action="" method="POST">
                                        <p style="color:red;"><?php echo isset($error['user'])?$error['user']:''; ?></p>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Nhập Email" name="email">
                                            <p style="color:red;"><?php echo isset($error['email'])?$error['email']:''; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                                            <p style="color:red;"><?php echo isset($error['password'])?$error['password']:''; ?></p>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Quên mật khẩu?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="login">Đăng nhập</button>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>
<?php
    session_start();
    $username = "";
    $password = "";
    $passwordConfirm = "";
    $name = "";
    $birth = "";
    $gender = "";
    $phone = "";
    if(isset($_SESSION['loginOk']))
    {
        header("Location: index.php");
    }
    $err = "";
    $complete = "";
    
    if(isset($_POST['btnSignUp']))
    {
        require_once ('api/connection.php');
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];
        $checkpass = strlen($password);

        if($password == $passwordConfirm && $checkpass >= 7)
        {
            $sql = 'INSERT INTO users(username,password,name,gender,birth,phone) VALUES(?,?,?,?,?,?)';
            try{
                $stmt = $dbCon->prepare($sql);
                $stmt->execute(array($username,$password,$name,$gender,$birth,$phone));
                $complete = "Tạo tài khoản thành công";
                $name = "";
                $username = "";
                $password = "";
                $passwordConfirm = "";
                $gender = "";
                $birth = "";
                $phone = "";
            }
            catch(PDOException $ex){
                
            }
        }else{
            if($checkpass < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
            else
                $err = "Mật khẩu xác nhận không khớp, vui lòng nhập lại";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <title>Login</title>
    <style>
        .gradient-custom-2 {
            background: #1e5453;
        }
        
        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }

        .text-center .btn:hover{
            background-color: #e4a11b;
            border-color: #e4a11b;
        }
    </style>
</head>

<body style="background-color: #eee;">
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-2 mx-md-4">

                                    <!-- Link vào src logo ảnh -->
                                    <div class="text-center">
                                        <img src="assets/images/Logo1.png" style="width: 185px;" alt="logo">
                                        <h3 class="mt-1 mb-5 pb-1">HOTEL DEL LUNA</h3>
                                    </div>

                                    <form method="post">
                                        <h5 style="color:#e4a11b; text-align: center">Đăng ký tài khoản mới</h5>

                                        <div class="form-outline mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Tên đăng nhập</p>
                                            <input required name="username" required style="border: 1px solid;" type="text" id="form2Example11" class="form-control" placeholder="Tên tài khoản bạn muốn tạo" value="<?php echo $username; ?>"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Mật khẩu</p>
                                            <input required name="password" required style="border: 1px solid;" type="password" id="form2Example22" class="form-control" value="<?php echo $password; ?>"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Xác nhận mật khẩu</p>
                                            <input required name="passwordConfirm" required style="border: 1px solid;" type="password" id="form2Example22" class="form-control" value="<?php echo $passwordConfirm; ?>"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Họ và tên</p>
                                            <input required name="name" style="border: 1px solid;" type="text" id="form2Example11" class="form-control" value="<?php echo $name; ?>"/>
                                        </div>
                                        
                                        <div class="mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Ngày tháng năm sinh</p>
                                            <input required name="birth" style="border: 1px solid;" type="date" id="form2Example11" class="form-control" value="<?php echo $birth; ?>"/>
                                        </div>

                                        <div class="form-outline mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Số điện thoại</p>
                                            <input required name="phone" required style="border: 1px solid;" type="tel" id="form2Example11" class="form-control" value="<?php echo $phone; ?>"/>
                                        </div>

                                        <div class="mb-1">
                                            <p style="color: #1e5453; margin-bottom: 0px; margin-right: 15px; float: left;">Giới tính</p>
                                            <div class="form-check form-check-inline">
                                                <input required class="form-check-input" type="radio" name="gender" id="male" value="Nam" <?php if($gender=="Nam") echo "checked"?>>
                                                <label class="form-check-label" for="male">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ" <?php if($gender=="Nữ") echo "checked"?>>
                                                <label class="form-check-label" for="female">Nữ</label>
                                            </div>
                                        </div>

                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <input name="btnSignUp" class="btn btn-primary btn-block fa-lg gradient-custom-2" type="submit" value="Đăng ký">
                                            <p style="color: red; text-align: left;"><?php echo $err;?></p>
                                            <p style="color: green; text-align: left;"><?php echo $complete;?></p>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4" >
                                            <p class="mb-0 me-2">Đã có tài khoản?</p>
                                            <a  href="login.php"><button type="button" class="btn btn-outline-danger" style="color:#e4a11b; border-color: #e4a11b">Đăng nhập</button></a>
                                        </div>
                                        <a style="width: 35%;" href="index.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang chủ</a>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Đôi nét về chúng tôi</h4>
                                    <p class="small mb-0">Tọa lạc tại bán đảo Sơn Trà, thành phố Đà Nẵng, Hotel Del Luna được đầu tư hệ thống phòng có diện tích khác nhau phù hợp với nhiều nhu cầu của khách hàng. Hệ thống trang thiết bị hiện đại và các các dịch vụ đưa đón khách
                                        tham quan các điểm du lịch. Được thiết kế và trang trí theo kiến trúc sang trọng và ấm cúng luôn mang lại sự thoải mái cho khách hàng trong suốt thời gian lưu trú tại Hotel Del Luna. Ngoài ra, đội ngũ nhân viên tại
                                        đây cũng rất thân thiện. Nếu các bạn có nhu cầu tìm chỗ ở, chúng tôi rất hân hạnh đón chờ!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
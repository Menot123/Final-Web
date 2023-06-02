<?php
    session_start();
    require_once ('api/connection.php');
    $sendOk = ""; 
    if(isset($_POST['btnSendContact']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sql = 'INSERT INTO contact(name,email,subject,message) VALUES(?,?,?,?)';
        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array($name,$email,$subject,$message));
            $sendOk = "Đã gửi phản hồi thành công";
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Del Luna</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/style_contact.css">
    <link rel="stylesheet" href="assets/images/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <!-- Top  -->
    <div class="top-main" style="background-image:url('assets/images/banner/contact_banner.png')">
        <!-- Top-Header  -->
        <div class="fixed">
            <div class="top-header">
                <div class="top-all">
                    <div class="two-button dropdown" style="display: inline-block; display:flex">
                        <div <?php if (isset($_SESSION['name'])) echo "hidden"; ?>>
                            <a style="text-decoration:none; font-size: 20px; margin-right:20px" class="login-logout" href="login.php">Đăng nhập</a>
                        </div>
                        <div <?php if (isset($_SESSION['name'])) echo "hidden"; ?>> <a style="text-decoration:none; font-size: 20px" class="login-logout" href="signup.php">Đăng ký</a> </div>

                        <div <?php if (!isset($_SESSION['name'])) echo "hidden"; ?>> <a style="text-decoration:none; font-size: 20px;" class="dropbtn" href="">Xin chào, <?php echo $_SESSION['name']; ?></a> </div>
                        <div <?php if (!isset($_SESSION['name'])) echo "hidden"; ?> class="dropdown-content">
                            <a href="self-change-info.php">Thay đổi thông tin cá nhân</a>
                            <a href="changepass.php">Đổi mật khẩu</a>
                            <a href="logout.php">Đăng xuất</a>
                        </div>

                    </div>

                    <img class="logo" src="assets/images/Logo.png" alt="">
                    <!-- <div class="carts" style="display: inline-block; display:flex;">
                    <a class="book" style="text-decoration: none;font-size: 20px" href="">
                        Đặt Phòng
                        <span class='badge badge-warning' id='lblCartCount'></span>
                    </a>
                </div> -->
                </div>
            </div>
            <div>
                <div class="nav">
                    <nav class="navbar navbar-expand-lg w-100" style="background-color: rgba(0,0,0,-0.5)">
                        <div class="container">
                            <!-- <a class="navbar-brand" style="font-size: 250%;" href="#">DL FARM</a> -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                                <ul class="navbar-nav mb-2 mt-lg-0 mb-lg-0 d-flex justify-content-around w-100">
                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link" href="about.php">Về chúng tôi</a>
                                    </li>

                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active text-primary" href="contact.php">Liên hệ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link" href="rooms.php">Xem phòng</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Top Header -->   
        </div>
        <div style="height: 168px;"></div>
        <h1><p style="color: white; text-align: center; font-size: 200%;">Liên hệ</p></h1>
    </div>

    <!-- Body  -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Liên lạc</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" method="post" id="contactForm">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea required class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập nội dung'" placeholder="Nhập nội dung" style="height: 163px;"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input required class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tên'" placeholder="Nhập tên">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input required class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập email'" placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input required class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tiêu đề'" placeholder="Nhập tiêu đề">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input name="btnSendContact" type="submit" class="button button-contactForm boxed-btn" value="Gửi">&nbsp;&nbsp;<span style="color: green;"><?php echo $sendOk;?></span>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Đà Nẵng, Việt Nam</h3>
                        <p>Bán đảo Sơn Trà</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+84 878 27 2222</h3>
                        <p>24/7 mỗi ngày trừ cuối tuần </p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>hoteldelluna.com</h3>
                        <p>Gửi câu hỏi bất cứ lúc nào!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Footer -->
    <div>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section>
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Del Luna Hotel
                        </h6>
                        <p>
                        Tọa lạc tại bán đảo Sơn Trà, thành phố Đà Nẵng, Hotel Del Luna được đầu tư hệ thống phòng có diện tích khác nhau phù hợp với nhiều nhu cầu của khách hàng. Hệ thống trang thiết bị hiện đại và các các dịch vụ đưa đón khách
                                    tham quan các điểm du lịch.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            XEM PHÒNG
                        </h6>
                        <p>
                            <a href="#!" class="text-reset" style="text-decoration: none">Phòng 2 người</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset" style="text-decoration: none">Phòng 4 người</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset" style="text-decoration: none">Phòng 1 người</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset" style="text-decoration: none">Phòng hội tiệc</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            VỀ CHÚNG TÔI
                        </h6>
                        <p>
                            <a href="vechungtoi.php" class="text-reset" style="text-decoration: none">Giới thiệu</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset" style="text-decoration: none">Liên hệ</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">THÔNG TIN LIÊN HỆ</h6>
                        <p><i style="font-size: 25px;" class="fa fa-home text-secondary"></i> Bán đảo Sơn Trà, Đà Nẵng</p>
                        <p>
                            <i style="font-size: 25px;" class="fa fa-envelope text-secondary"></i> dellunahotel@gmail.com
                        </p>
                        <p><i style="font-size: 25px;" class="fa fa-phone text-secondary"></i> 0878 27 2222</p>
                        <p><i style="font-size: 25px;" class="fa fa-print text-secondary"></i> 03 343536 60</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="index.php">DEL LUNA HOTEL</a>
        </div>
        <!-- Copyright -->
    </div>
</body>
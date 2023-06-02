<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Del Luna</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="./assets/css/style_rooms.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!-- Top  -->
    <div class="headerPage">
        <div class="top-main" style="background-image:url('assets/images/banner.png')">
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
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active text-primary" aria-current="page" href="index.php">Trang chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link " href="about.php">Về chúng tôi</a>
                                        </li>

                                        <li class="nav-item">
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link" href="contact.php">Liên hệ</a>
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

            <!-- 1:31 17/12 -- ------------------------------------------------>
            <!-- Background image -->
            <form action="rooms.php" method="POST">
                <div class="blur__background">
                    <!-- <div class="input__location d-flex">
                    <img id="icon_loupe" src="./assets/images/loupe.png" alt="loupe">
                    <input class="flex-grow-1" type="text" name="location" id="location__text" placeholder="Bạn muốn đến đâu?">
                </div> -->

                    <div class="date__people d-flex">
                        <div class="dateStart flex-grow-1">
                            <img class="calendar" src="./assets/images/check-in.png" alt="check-in">
                            <b>Từ ngày</b>
                            <input type="date" name="dateStart" id="dateStart">
                        </div>
                        <div class="borderCenter"></div>
                        <div class="dateEnd flex-grow-1">
                            <img class="calendar" src="./assets/images/calendar.png" alt="check-in">
                            <b>Đến ngày</b>
                            <input type="date" name="dateEnd" id="dateEnd">
                        </div>
                    </div>

                    <div class="people__room d-flex justify-content-between">
                        <div class="people bg-white">
                            <img id="icon__people" src="./assets/images/people.png" alt="people">
                            <b>Số người</b>
                            <input type="text" name="people" id="people">
                        </div>

                        <div class="rooms bg-white">
                            <img id="icon__room" src="./assets/images/door.png" alt="door">
                            <b>Số phòng</b>
                            <input type="text" name="room" id="room">
                        </div>
                    </div>
                    <span id="messageErr"></span>
                    <!-- <a  id="btnSearch" type="submit" class="btn btn-primary"> -->
                    <a id="btnSearch" href="rooms.php" type="submit" class="btn btn-primary">SEARCH</a>
                </div>
            </form>

            <form id="formTrigger" action="./rooms.php" method="GET" style="display: none;">
                <input type="date" name="checkin" id="checkin">
                <input type="date" name="checkout" id="checkout">
                <input type="text" name="adults" id="adults">
                <input type="text" name="rooms" id="rooms">
            </form>

            <!-- Background image ----------------------------------------------------------->

        </div>
    </div>


    <!-- Body Container  -->
    <div class="body-container">
        <div class="about-us">
            <div class="title-about-us">Về Chúng Tôi</div>
            <div class="intro-about-us">Một Khách Sạn Sang Trọng Hòa Hợp Với Thiên Nhiên</div>
            <div class="details-about-us">Trải nghiệm kỳ nghỉ dưỡng riêng tư miền nhiệt đới với nắng vàng, biển xanh và cát trắng tại một trong những Khu nghỉ dưỡng biển đẹp nhất Việt Nam. Còn gì tuyệt vời hơn khi được đắm mình trong trong thế giới thiên nhiên hoang sơ bên vịnh biển riêng tư và cảm nhận phong cách thiết kế độc đáo của khu nghỉ dưỡng với sự kết hợp hoàn hảo giữa văn hóa Việt Nam truyền thống và lối kiến trúc đương đại.</div>
            <div class="images-about-us">
                <img class="image-about-us1" src="./assets/images/about_1.png" alt="">
                <img class="image-about-us2" src="./assets/images/about_2.png" alt="">
            </div>
            <div class="more-about-us">
                <a href="">Xem Thêm</a>
            </div>
        </div>
        <div class="offers-area">
            <div class="offers-container">
                <div class="row" style="margin-bottom:30px">
                    <div class="col-xl-12">
                        <div class="section_title text-center mb-100">
                            <span>Ưu Đãi Của Chúng Tôi</span>
                            <h3>Ưu Đãi Đang Diễn Ra</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="single_offers">
                            <div class="about_thumb">
                                <img src="assets/images/offer1.png" alt="">
                            </div>
                            <h3>Tiết kiệm 15% cho phòng Standard</h3>
                            <ul>
                                <li>Phòng tiêu chuẩn</li>
                                <li>2 người lớn</li>
                                <li>Hướng nhìn khung cảnh đồi</li>
                            </ul>
                            <a href="#" class="book_now">Đặt ngay</a>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="single_offers">
                            <div class="about_thumb">
                                <img src="assets/images/offer2.png" alt="">
                            </div>
                            <h3>Tiết kiệm 20% cho phòng Deluxe</h3>
                            <ul>
                                <li>Phòng cao cấp</li>
                                <li>2 người lớn &amp; 1 trẻ nhỏ </li>
                                <li>Hướng nhìn khung cảnh biển</li>
                            </ul>
                            <a href="#" class="book_now">Đặt ngay</a>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="single_offers">
                            <div class="about_thumb">
                                <img src="assets/images/offer3.png" alt="">
                            </div>
                            <h3>Tiết kiệm 30% cho phòng Suite</h3>
                            <ul>
                                <li>Phòng thượng hạng</li>
                                <li>4 người lớn &amp; 2 trẻ nhỏ</li>
                                <li>Hướng nhìn khung cảnh biển và đồi</li>
                            </ul>
                            <a href="#" class="book_now">Đặt ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Food  -->
        <div class="about_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        <div class="about_thumb2 d-flex">
                            <div class="img_1">
                                <img src="assets/images/about_3.png" alt="">
                            </div>
                            <div class="img_2">
                                <img src="assets/images/about_4.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="about_info">
                            <div class="section_title mb-20px">
                                <span>Tinh hoa ẩm thực</span>
                                <h3>Chúng Tôi Phục Vụ Món Ăn Ngon
                                    Và Chất Lượng</h3>
                            </div>
                            <p>Một kì nghỉ dưỡng tuyệt vời không thể thiếu những món ăn ngon mang đậm bản sắc vùng miền nơi bạn đến. Khách sạn chúng tôi phục vụ những món ăn chất lượng và hấp dẫn, đảm bảo sẽ khiến bạn có những trải nghiệm tuyệt vời nhất khi dùng bữa.</p>
                            <a href="#" class="line-button">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Food  -->

        <!-- Features Room Start  -->
        <div class="features_room">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title text-center mb-100">
                            <span>Những Phòng Nổi Bật</span>
                            <h3>Chọn Phòng Tốt Hơn</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rooms_here">
                <div class="single_rooms">
                    <div class="room_thumb">
                        <img src="assets/images/SuperiorRoom.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>Chỉ từ 950.000 VNĐ một đêm</span>
                                <h3>Phòng Superior</h3>
                            </div>
                            <a href="#" class="line-button">Đặt Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="single_rooms">
                    <div class="room_thumb">
                        <img src="assets/images/DeluxeRoom.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>Chỉ từ 1.150.000 VNĐ một đêm</span>
                                <h3>Phòng Deluxe</h3>
                            </div>
                            <a href="#" class="line-button">Đặt Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="single_rooms">
                    <div class="room_thumb">
                        <img src="assets/images/SignatureRoom.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>Chỉ từ 700.000 VNĐ một đêm</span>
                                <h3>Phòng Signature</h3>
                            </div>
                            <a href="#" class="line-button">Đặt Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="single_rooms">
                    <div class="room_thumb">
                        <img src="assets/images/CoupleRoom.png" alt="">
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <span>Chỉ từ 890.000 VNĐ một đêm</span>
                                <h3>Phòng Couple</h3>
                            </div>
                            <a href="#" class="line-button">Đặt Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Feature Room Start  -->

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

    </div>
</body>

<script src="./assets/js/valuedateSubmit.js"></script>
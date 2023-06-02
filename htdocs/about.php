<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Del Luna</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
  
    <link rel="stylesheet" href="assets/css/style_about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!-- Top  -->
    <div class="top-main" style="background-image:url('assets/images/banner/banner_about.png')">
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
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active text-primary" href="about.php">Về chúng tôi</a>
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
            <div style="height: 168px;"></div>
            <h1><p style="color: white; text-align: center; font-size: 200%;">Về chúng tôi</p></h1>
    </div>

    <div class="body-contain">
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

        <div class="Slide-about">
            <div class="row">
                <div class="col-lg-1"></div>
                <div id="carouselExampleControls" class="carousel slide col-12 col-md-12 col-lg-10 " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="slide" src="assets/images/banner/about_banner.png" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="slide" src="assets/images/banner/about_banner.png" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="slide" src="assets/images/banner/about_banner.png" class="d-block " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    
        <div class="commit"> 
            <div class="title-commit">Cam Kết Của Chúng Tôi</div>
            <div class="col-lg-12"><h3>Những Trải Nghiệm Trên Cả Tuyệt Vời</h3></div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="row col-lg-10">
                    <div class="col-lg-4"><p>Hotel Del Luna cung cấp những dịch vụ tốt nhất cho khách hàng. Khách hàng sẽ được hỗ trợ bởi đội ngũ nhân viên là người địa phương, với kinh nghiệm và sự tận tụy trong công việc, cam kết mang lại sự hài lòng nhất cho khách hàng.</p></div>
                    <div class="col-lg-4"><p>Phát triển nhiều tiện nghi xung quanh khách sạn như khu vui chơi, khu spa, khu thám hiểm... tất cả tiện nghi xung quanh khách sạn chỉ cần tốn 5 đến 10 phút di chuyển. Bảo đảm mang lại những trải nghiệm tốt nhất cho khách hàng.</p></div>
                    <div class="col-lg-4"><p>Cảm nhận sự khác biệt khi đến với khách sạn của chúng tôi. Khách sạn được đầu tư với tư duy và sự khác biệt theo tầm nhìn của những kiến trúc sư nổi tiếng. Chắc chắn đem đến những trải nghiệm tận hưởng và ngắm nhìn tốt nhất.</p></div>
                </div>
                <div class="col-lg-1"></div>
    
            </div>
        </div>
        
        <div  class="vision">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="image_vision col-lg-6">
                    <img class="vision_img1" src="./assets/images/about/vision_1.jpeg" alt="">
                    <img class="vision_img2" src="./assets/images/about/vision_2.jpg" alt="">
                </div>
                <div class="text_vision col-lg-4">
                    <div class="title-commit">Tầm Nhìn Của Chúng Tôi</div>
                    <div><h3>Hướng Tới Tương Lai Và Sự Toàn Diện </h3></div>
                    <p>Kiến trúc sư Bill Bensley tạo nên sự kết hợp đặc trưng của kiến trúc bản địa, phong cách trang trí có độ tương phản cao cùng những điểm nhấn vui tươi, có ý nghĩa trong từng thiết kế của không gian trong nhà và ngoài trời. Xuyên suốt toàn bộ Khu nghỉ dưỡng, Quý khách sẽ tìm thấy vô số đồ nội thất được lấy cảm hứng từ Pháp và Việt Nam, nội và ngoại thất được chế tác tinh xảo cùng tác phẩm nghệ thuật gốc tạo nên ấn tượng ngạc nhiên và thích thú. InterContinental Danang Sun Peninsula Resort cũng vinh dự giới thiệu bếp trưởng đầu tiên của Việt Nam tại nhà hàng La Maison 1888, được trao sao Michelin, Pierre Gagnaire. Những khu vực phục vụ ẩm thực và giải trí đặc biệt khiến Khu nghỉ dưỡng trở thành điểm đến chính cho các chuyến tham quan trong ngày, hội họp hay nghỉ dưỡng với gia đình và bạn bè.</p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>

        <div class="distance">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="title-distance">Địa điểm</div>
                    <h3>Thuận Tiện Cho Di Chuyển</h3>
                    <p>Chỉ cách sân bay quốc tế Đà Nẵng 30 phút (20 km) và cách thành phố Đà Nẵng 13 km, Khu nghỉ dưỡng của chúng tôi nằm trong vùng hoang dã nguyên sơ, với tầm nhìn hướng ra bờ vịnh riêng biệt trên Bán đảo Sơn Trà. Gần Khu nghỉ dưỡng là hàng loạt điểm đến đẳng cấp thế giới, chẳng hạn như bờ biển cát trắng trải dài 94m nổi tiếng của Đà Nẵng và các di sản được UNESCO công nhận như Huế và Mỹ Sơn. Để trải nghiệm các địa điểm tham quan khác, đội ngũ Nhân Viên Hỗ Trợ của chúng tôi sẽ chia sẻ những kinh nghiệm du lịch bản địa và sắp xếp chu đáo mọi thứ bạn cần từ phương tiện đi lại, hướng dẫn viên du lịch và nhiều hơn thế nữa.</p>
                </div>
                <div class="col-lg-6">
                    <img src="./assets/images/about/distance.jpg" alt="">
                </div>
                <div class="col-lg-1">
                </div>

            </div>

        </div>

        <div class="text_final">
            <h2>"Chúng tôi tin rằng mình đang làm điều đúng đắn cả ở cấp độ cộng đồng và cấp độ toàn cầu."</h2>
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
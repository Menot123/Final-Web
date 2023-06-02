<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Del Luna Room</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/style_rooms1.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" -->
    <!-- integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!-- Top  -->
    <div class="top-main" style="background-image:url('assets/images/banner/banner_rooms.png')">
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
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link " href="about.php">Về chúng tôi</a>
                                        </li>

                                        <li class="nav-item">
                                            <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link" href="contact.php">Liên hệ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 150%; width: 100%; color:aliceblue;" class="nav-link active text-primary" href="#">Xem phòng</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- End Top Header -->
        </div>
        <!-- End Top Header -->
        <div style="height: 168px;"></div>
        <h1><p style="color: white; text-align: center; font-size: 200%;">Phòng tại hotel Del Luna</p></h1>


        <!-- Offer  -->
        <div class="offers-area">
            <div class="offers-container">
                <div class="row" style="margin-bottom:30px">
                    <div class="col-xl-12">
                        <div class="section_title text-center mb-100">
                            <h3 style="font-weight:bold">Những Phòng Trống Tại Khách Sạn Chúng Tôi</h3>
                        </div>
                    </div>
                </div>
                <?php
                require_once('./api/connection.php');
                $numDays = 1.0;
                if(isset($_GET["checkin"]) && isset($_GET["checkout"]) && isset($_GET["adults"])) {
                    $people = "";
                    if(isset($_GET['adults'])&& $_GET['adults']  != "") {
                        $people = $_GET['adults']. ' người';
                    }
                    // Format day start y-m-d
                    $dateStart = $_GET["checkin"];
                    $dateStart = explode('-', $dateStart);
                    $d1 = $dateStart[2];
                    $m = $dateStart[1];
                    $y = $dateStart[0];
                    $resultStart = $y . '-' . $m . '-' . $d1;
                    // Format day end y-m-d
                    $dateEnd = $_GET["checkout"];
                    $dateEnd = explode('-', $dateEnd);
                    $d2 = $dateEnd[2];
                    $m = $dateEnd[1];
                    $y = $dateEnd[0];
                    $resultEnd = $y . '-' . $m . '-' . $d2;

                    $numDays = $d2 - $d1;

                    $sql = 'SELECT * from bookroom where ('. "'".$resultStart. "'". ' > checkin and ' . "'".$resultStart. "'".
                     ' > checkout) or ' ."'". $resultEnd. "'".' < checkin ';
                    try {
                        $stmt = $dbCon->prepare($sql);
                        $stmt->execute();
                        $arr =array();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            array_push($arr,$row["maphong"]);
                        }
                        $ds = implode (",",$arr); 
                        $ds = '('.$ds.')';
                        $sql = 'SELECT * from rooms where id in '.$ds;
                        try {
                            $stmt = $dbCon->prepare($sql);
                            $stmt->execute();
                        } catch (PDOException $ex) {
                            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                        }
                    } catch (PDOException $ex) {
                        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                    }
                    
                } else {
                    $sql = 'SELECT * from rooms';
                    try {
                        $stmt = $dbCon->prepare($sql);
                        $stmt->execute();
                    } catch (PDOException $ex) {
                        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                    }
                }
            
                if (!function_exists('currency_format')) {
                    function currency_format($number, $suffix = '') {
                        if (!empty($number)) {
                            return number_format($number, 0, ',', '.') . "{$suffix}";
                        }
                    }
                }

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $price = currency_format($row["price"]*$numDays);
                    echo "<div class=\"row\">";
                    echo "<div class=\"col-xl-1\"></div>";
                    echo "<div class=\"col-xl-10\">";
                    echo "<div class=\"single_offers\">";
                    echo "<div class=\"about_thumb d-flex row\">";
                    echo "<div id=\"carouselExampleIndicators\" class=\"carousel slide col-lg-5\" data-bs-ride=\"carousel\">";
                    echo "<div class=\"carousel-indicators\">";
                    echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>";
                    echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>";
                    echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>";
                    echo "</div>";
                    echo "<div class=\"carousel-inner\">";
                    echo "<div class=\"carousel-item active\">";
                    echo "<img  style=\"height:362px; width: 350px\" src=\"$row[image_1]\" class=\"d-block w-100\" alt=\"...\">";
                    echo "</div>";
                    echo "<div class=\"carousel-item active\">";
                    echo "<img  style=\"height:362px; width: 350px\" src=\"$row[image_2]\" class=\"d-block w-100\" alt=\"...\">";
                    echo "</div>";
                    echo "<div class=\"carousel-item active\">";
                    echo "<img  style=\"height:362px; width: 350px\" src=\"$row[image_3]\" class=\"d-block w-100\" alt=\"...\">";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-lg-7\">";
                    echo "<div class=\"details-room\" style=\"\">";
                    echo "<h3 style=\"font-size: 30px;\">$row[title]</h3>";
                    echo "<ul>";
                    echo "$row[description]";
                    echo "</ul>";
                    echo "<div class=\"price_service d-flex\">";
                    echo "<h4 style=\"margin-top:30px; margin-left: 20px; color:#996515\">Giá $price VNĐ/ $numDays Đêm</h4>";
                    echo "<div class=\"Service\">";
                    echo "<label  for=\"breakfast\"><b >Dịch vụ ăn sáng</b></label>";
                    echo "<input type=\"checkbox\" name=\"breakfast\" id=\"breakfast\">";
                    echo "</div>";
                    echo "</div>";
                    echo "<a id='btnBook' onclick='GoBookRoom(this,\"".$_GET["checkin"]."\" , \"".$_GET["checkout"]."\" , \"".$row["id"]."\" , \"".$people."\", \"".$row["title"]."\", \"".$price."\")' href=\"#\" class=\"book_now\">Đặt ngay</a>";
                    echo "</div> ";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-xl-1\"></div>";
                    echo "</div>";
                }
                
                
                ?>
                <div class="Service">";
                <label  for="breakfast"><b >Dịch vụ ăn sáng</b></label>";
                <input type="checkbox" name="breakfast" id="breakfast">";
                </div>";
            </div>
        </div>
        <form style="display: none;" id="formBookRoom" action="bookroom.php" method="POST">
            <input type="text" name="dateS" id="dateS">
            <input type="text" name="dateE" id="dateE">
            <input type="text" name="idRoom" id="idRoom">
            <input type="text" name="numPeople" id="numPeople">
            <input type="text" name="nameRoom" id="nameRoom">
            <input type="text" name="price" id="price">
            <input type="text" name="bf" id="bf">
        </form>
        <!-- End Offer  -->


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
                <a class="text-reset fw-bold" href="home.php">DEL LUNA</a>
            </div>
            <!-- Copyright -->
        </div>
    
    </div>  
</body>
<script src="./assets/js/handleBookRoom.js"></script>
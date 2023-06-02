<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/style_contact.css">
    <link rel="stylesheet" href="./assets/css/style_bookroom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>

</style>

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
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link " href="about.php">Về chúng tôi</a>
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
        <!-- End Top Header -->
        <div style="height: 168px;"></div>
        <h1>
            <p style="color: white; text-align: center; font-size: 200%;">Các phòng đã đặt</p>
        </h1>
    </div>

    <!-- Body  -->
    <div class="body-contain">
        <div class="info">
            <div class="notification">
                
                <h4>Đặt chỗ của bạn - từ <?php if(isset($_SESSION["houses"])) {
                    echo $_SESSION["houses"][0][0].' đến '.$_SESSION["houses"][0][1];
                    }  ?></h4>
            </div>
            <div class="aboutHotel">
                <h5 class="ml-16">DEL LUNA HOTEL</h5>
                <div class="address">
                    <span class="ml-16" style="color: #808080;margin-right: 160px;">Địa chỉ</span> <span > bán đảo Sơn Trà, thành phố Đà Nẵng</span>
                </div>

                <div class="contact">
                <span class="ml-16" style="color: #808080;margin-right: 158px;">Liên hệ</span>  <span > 0878 27 2222</span>
                </div>

                <div class="reception">
                <span class="ml-16" style="color: #808080; margin-right: 80px;">Thời gian phục vụ</span><span > 24/24</span>
                </div>
            </div>
        </div>
        <?php 
            require_once("api/connection.php");
            $price = 0;
            if(isset($_POST["idroom"]) && isset($_POST["roomname"]) && isset($_POST["totals"])){
                $sql = 'INSERT INTO manageroom(idroom, roomname, total) VALUES (?,?,?)';
                    try {
                        $stmt = $dbCon->prepare($sql);
                        $stmt->execute(array($_POST["idroom"], $_POST["roomname"], $_POST["totals"]));
                    } catch (PDOException $ex) {
                        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                    }
            }
            if(isset($_POST["dateS"]) && isset($_POST["dateE"]) && isset($_POST["idRoom"])
            && isset($_POST["numPeople"])  && isset($_POST["nameRoom"])  && isset($_POST["price"])) {
                if(!isset($_SESSION["houses"])) {
                    $_SESSION["houses"] = array();
                }
                array_push($_SESSION["houses"],array($_POST["dateS"],$_POST["dateE"],$_POST["idRoom"],$_POST["numPeople"],$_POST["nameRoom"],$_POST["price"]));
                
                for($i = 0; $i < count($_SESSION["houses"]); $i+= 1) {
                    // for($j = 0; $j < sizeof($_SESSION["houses"][$i]); $j+= 1) {
                        $price = $price + $_SESSION["houses"][$i][5];
                        echo "<div class=\"room1 d-flex justify-content-around\">";
                        echo "<div class=\"room__people\">";
                        echo '<h4>Room '. $_SESSION["houses"][$i][2].'</h4>';
                        echo '<span>'.$_SESSION["houses"][$i][3].'</span>';
                        echo "</div>";
                        echo "<div class=\"detail\">";
                        echo '<span>'.$_SESSION['houses'][$i][4].'</span>';
                        echo "</div>";
                        echo "<div class=\"price\">";
                        echo '<b>'.number_format($_SESSION["houses"][$i][5],0,',','.').'VND</b>';
                        echo "</div>";
                        echo "</div>";
                    // }
                }
            } 
        ?>

        <hr>
        <div id="service" class="room1 d-flex justify-content-between">
            <div class="room__people">
                <h4>Dịch vụ</h4>
            </div>

            <!-- <div class="detail">
                <span>Ăn sáng</span>
            </div> -->
            <?php
                if(isset($_POST['bf']) && $_POST['bf']=="check" ) {
                    echo '<div class="detail">';
                    echo '<span>Ăn sáng</span>';
                    echo '</div>';
                    echo "<div class=\"price\">";
                    echo "<b>600.000 VND</b>";
                    echo "</div>";
                }
             ?>
            
            <!-- <div class="price">
                <b>600.000 VND</b>
                <input onchange="calPrice()" type="checkbox" name="breakfast" id="breakfast">
            </div> -->
        </div>
        

        <hr>
        <div id="service" class="room1 d-flex justify-content-between">
            <div class="room__people">
                <h4>Tổng tiền</h4>
            </div>

            <div class="price">
                <b id="total"><?php echo number_format($price,0,',','.')." VND"  ?></b>
            </div>
        </div>
        <hr>
        <div class="inputInfo d-flex flex-column">
            <input class="mb-3" type="text" name="nameUS" id="nameUS" placeholder="Nhập vào tên của bạn" value="<?php
                if(isset($_SESSION["name"])) echo $_SESSION["name"];
            ?>">
            <input type="text" name="phoneUS" id="phoneUS" placeholder="Nhập vào số điện thoại của bạn" value="<?php
                if(isset($_SESSION["phone"])) echo $_SESSION["phone"];
            ?>">
        </div>
        <div class="payment d-flex justify-content-center mb-3">
            <button onclick='handleUpDb(<?php 
                    if(isset($_SESSION["houses"])){
                        echo $_SESSION["houses"][0][2].",\"". $_SESSION["houses"][0][4]."\",\"". $_SESSION["houses"][0][5]."\"";
                    } 
                ?>)' class="btn btn-success" style="margin-right: 24px" id="btnPay">Đặt phòng</button>
            <button class="btn btn-primary" id="btnPrint">In hóa đơn</button>
        </div>

        <div class="qr">
            <span id="close">X</span>
            <img id="qr_code" src="https://www.publicdomainpictures.net/pictures/130000/velka/qr-code-1442833538ywX.jpg" alt="qr">
        </div>

        <form id="pushRoom" style="display:none;" action="" method="POST">
                <input type="text" name="idroom" id="idroom">
                <input type="text" name="roomname" id="roomname">
                <input type="text" name="totals" id="totals">
        </form>
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
            <a class="text-reset fw-bold" href="home.php">DEL LUNA</a>
        </div>
        <!-- Copyright -->
    </div>
</body>

<script src="./assets/js/Bookroom.js"></script>
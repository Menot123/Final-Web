<?php
    session_start();
    if(!isset($_SESSION['loginAdminOk']))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Del Luna</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb1da7a09c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style_admin.css">

    <style>
        
    </style>
</head>


<body style="background-image:url('https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg')">
    <!-- Top  -->
    <div class="top-main">
        <!-- Top-Header  -->
        <div class="fixed">
            <div class="top-header">
                <div class="top-all">
                    <div class="two-button dropdown" style="display: inline-block; display:flex">
                        <div> <a style="text-decoration:none; font-size: 20px;"  class="dropbtn" href="">Admin</a> </div> 
                        <div class="dropdown-content">
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
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link " aria-current="page" href="admin.php">Quản lý tài khoản</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link active text-primary" href="#">Quản lý phòng</a>
                                    </li>

                                    <li class="nav-item">
                                        <a style="font-size: 150%; width: 100%; color:aliceblue" class="nav-link " href="admin-contact-manager.php">Xem phản hồi</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- End Top Header -->
        </div>
        <div style="height: 168px;">

        </div>

        <!-- Table User -->
        <section class="intro">

            <div class="container" style="width: 40%;">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive" style="position: relative; ">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #002d72;">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên phòng</th>
                                                <th scope="col">Tiền trả</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require_once ('api/connection.php');
                                                $sql = 'SELECT * FROM manageroom';
                                                try{
                                                    $stmt = $dbCon->prepare($sql);
                                                    $stmt->execute();
                                                }
                                                catch(PDOException $ex){
                                                    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
                                                }
                                                $i = 1; 
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo '<tr>';
                                                    echo '<td>'.$row["id"].'</td>';
                                                    echo '<td>'.$row["roomname"].'</td>';
                                                    echo '<td>'.$row["total"].'</td>';
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                                if($i == 0) echo '<div style="text-align: center;">Vẫn chưa có phòng được đặt</div>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
        </section>


    </div>
    
</body>
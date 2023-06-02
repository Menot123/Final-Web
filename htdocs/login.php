<?php
    session_start();
    
    if(isset($_SESSION['loginOk']))
    {
        header("Location: index.php");
    }
    if(isset($_SESSION['loginAdminOk']))
    {
        header("Location: admin.php");
    }
    
    $err = "";
    $password = "";
    $username = "";
    if(isset($_POST['btnLogin']))
    {
        require_once ('api/connection.php');
        $sql = 'SELECT * FROM users';

        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
        $false = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] == $row['username'] && $_POST['password'] == $row['password'])
            {
                $_SESSION['loginOk'] = 1;
                $_SESSION['name'] = $row['name'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['birth'] = $row['birth'];
                $_SESSION['phone'] = $row['phone'];

                $false = 0;
                header("Location: index.php");
            }   
        }
        if($false == 1)
        {   
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(strlen($password) < 7)
                $err = "Mật khẩu phải từ 7 ký tự trở lên";
            else
                $err = "Tài khoản hoặc mật khẩu không chính xác";
        }
    }  
    if(isset($_POST['btnLoginAdmin']))
    {
        require_once ('api/connection.php');
        $sql = 'SELECT * FROM admin';

        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
        $false = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] == $row['username'] && $_POST['password'] == $row['password'])
            {
                $_SESSION['loginAdminOk'] = 1;        
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $false = 0;
                header("Location: admin.php");
            }   
        }
        if($false == 1)
        {   
            $username = $_POST['username'];
            $password = $_POST['password'];
            $err = "Tài khoản hoặc mật khẩu admin không chính xác";
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
                                <div class="card-body p-md-5 mx-md-4">

                                    <!-- Link vào src logo ảnh -->
                                    <div class="text-center">
                                        <img src="assets/images/Logo1.png" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-4 pb-1">Hotel Del Luna</h4>
                                    </div>

                                    <form method="post">
                                        <h5 style="color:#e4a11b; text-align: center; margin-bottom: 20px">Đăng nhập vào tài khoản của bạn</h5>

                                        <div class="form-outline mb-4">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Tên đăng nhập</p>
                                            <input required name="username" style="border: 1px solid;" type="username" id="form2Example11" class="form-control" placeholder="Tên đăng nhập của bạn" value="<?php echo $username; ?>"/>
                                        </div>

                                        <div class="form-outline mb-2">
                                            <p style="color: #1e5453; margin-bottom: 0px;">Mật khẩu</p>
                                            <input required name="password" style="border: 1px solid;" type="password" id="form2Example22" class="form-control" value="<?php echo $password; ?>"/>
                                        </div>

                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <p style="color: red; text-align: left;"><?php echo $err;?></p>
                                            <input name="btnLogin" class="btn btn-primary btn-block fa-lg gradient-custom-2" type="submit" value="Đăng nhập">
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                           <input name="btnLoginAdmin" class="btn btn-info btn-block fa-lg" type="submit" value="Đăng nhập với tư cách Admin">
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Chưa có tài khoản?</p>
                                            <a href="signup.php"><button type="button" class="btn btn-outline-danger" style="color:#e4a11b; border-color: #e4a11b">Tạo tài khoản mới</button></a>
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
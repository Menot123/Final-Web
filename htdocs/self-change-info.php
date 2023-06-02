
<?php
    session_start();
    $err = "";
    $complete = "";
    if(isset($_POST['btnChangePass']))
    {
        require_once ('api/connection.php');
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];
        $phone = $_POST['phone'];

        if(is_numeric($phone))
        {
            
            $sql = 'UPDATE users set name = ?,gender = ?,birth = ?,phone = ? where id = ?';
            try{
                $stmt = $dbCon->prepare($sql);
                $stmt->execute(array($name,$gender,$birth,$phone,$_SESSION['id']));
                $complete = "Thay đổi thông tin tài khoản thành công";
                $_SESSION['name'] = $name;
                $_SESSION['gender'] = $gender;
                $_SESSION['birth'] = $birth;
                $_SESSION['phone'] = $phone;
                $err = "";
            }
            catch(PDOException $ex){
                
            }
        }else{
            $err = "Số điện thoại không được chứa ký tự khác số";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta hoten="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Thay đổi thông tin</title>

</head>
<body>
    <div id="logreg-forms">

        <form action="" class="form-signup" method="post">
            <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Thay đổi thông tin</h1>
        
            <!-- ĐANG LÀM TỚI ĐÂY -->
            Họ và tên<input type="text" id="user-pass" class="form-control" required name="name" value="<?php echo $_SESSION['name'];?>">
            Giới tính &nbsp;&nbsp;
            <div class="form-check form-check-inline">
                <input required class="form-check-input" type="radio" name="gender" id="male" value="Nam" <?php if($_SESSION['gender']=="Nam") echo "checked"?>>
                <label class="form-check-label" for="male">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ" <?php if($_SESSION['gender']=="Nữ") echo "checked"?>>
                <label class="form-check-label" for="female">Nữ</label>
            </div><br>

            Ngày sinh<input type="date" id="user-repeatpass" class="form-control" required name="birth" value="<?php echo $_SESSION['birth'];?>">
            Số điện thoại<input type="text" id="user-repeatpass" class="form-control" required name="phone" value="<?php echo $_SESSION['phone'];?>">
            <br>
            <input type="submit" value="Xác nhận" class="btn btn-primary btn-block" name="btnChangePass">
            <div style="color: red;"><?php echo $err;?></div>
            <div style="color: green;"><?php echo $complete;?></div>
            
            <br>
            
            <a style="width: 35%;" href="index.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở về trang chủ</a>
        </form>
    </div>
</body>
</html>
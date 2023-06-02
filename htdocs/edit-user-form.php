<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa nhân viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg')">
<link rel="stylesheet" href="assets/css/style_admin_edit.css">
<style>
    
</style>


<?php
    $id = $_GET['id'];
    $name = "";
    $gender = "";
    $birth = "";
    $username = "";
    $password = "";
    $phone = "";

    require_once ('api/connection.php');
    $sql = 'SELECT * FROM users WHERE id='.$id;
    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $name = $row["name"];
        $gender = $row["gender"];
        $birth = $row["birth"];
        $username = $row["username"];
        $password = $row["password"];
        $phone = $row["phone"];
    }

?>


<div class="container bg-warning" style="width: 600px;">
    <h2>Sửa thông tin khách hàng</h2>
    <form action="api/edit-user.php" method="POST">
        <div class="form-group">
            <label for="id">Id:</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="<?=$id?>">
        </div>
        <div class="form-group">
            <label for="name">Tên:</label>
            <input required type="text" class="form-control" id="name" placeholder="Nhập tên" name="name" value="<?=$name?>">
        </div>
        <div class="form-group">
            <label>Giới tính:</label>&nbsp;&nbsp;
            <input required type="radio" name="gender" id="male" value="Nam" <?php if($gender=="Nam") echo "checked"?>>
            <label for="male">Nam</label>&nbsp;&nbsp;
            <input type="radio" name="gender" id="female" value="Nữ" <?php if($gender=="Nữ") echo "checked"?>>
            <label for="female">Nữ</label>
        </div>
        <div class="form-group">
            <label for="birth">Ngày sinh</label>
            <input required type="date" class="form-control" id="birth" name="birth" value="<?=$birth?>">
        </div>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input required type="text" class="form-control" id="username" placeholder="Nhập username" name="username" value="<?=$username?>">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input required type="text" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" value="<?=$password?>">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input required type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone" value="<?=$phone?>">
        </div>
        
        <a href="admin.php"><button type="button" class="btn btn-default">Trở về</button></a>
        <input type="submit" id="editBtn" class="btn btn-primary" value="Edit">
    </form>

    <br>
</div>

</body>
</html>
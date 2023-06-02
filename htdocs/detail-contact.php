<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem chi tiết phản hồi</title>
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
    $email = "";
    $subject = "";
    $message = "";

    require_once ('api/connection.php');
    $sql = 'SELECT * FROM contact WHERE id='.$id;
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
        $email = $row["email"];
        $subject = $row["subject"];
        $message = $row["message"]; 
    }

?>


<div class="container bg-warning" style="width: 600px;">
    <h2>Xem chi tiết phản hồi</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Tên người gửi:</label>
            <input disabled type="text" class="form-control" id="name" name="name" value="<?=$name?>">
        </div>
        <div class="form-group">
            <label for="email">Email người gửi:</label>
            <input disabled type="text" class="form-control" id="email" name="email" value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="subject">Chủ đề:</label>
            <input disabled type="text" class="form-control" id="subject" name="subject" value="<?=$subject?>">
        </div>
        <div class="form-group">
            <label for="message">Nội dung:</label>
            <textarea style="resize: vertical;" rows="3" disabled type="text" class="form-control" id="message" name="message"><?=$message?></textarea>
        </div>
        
        <a href="admin-contact-manager.php"><button type="button" class="btn btn-default">Trở về</button></a>
    </form>

    <br>
</div>

</body>
</html>
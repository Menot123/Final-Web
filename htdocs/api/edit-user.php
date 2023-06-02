<?php
    require_once ('connection.php');
    if (!isset($_POST['id'])) {
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
    }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];

    $sql = 'UPDATE users SET username = ?, password = ?, name = ?, gender = ?, birth = ?, phone = ? where id = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($username,$password,$name,$gender,$birth,$phone,$id));
        header("Location: ../admin.php");
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
?>
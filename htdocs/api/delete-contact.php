<?php
    require_once ('connection.php');

    if (!isset($_GET['id']) ) {
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
    }

    $id = $_GET['id'];

    $sql = 'DELETE FROM contact where id = ?';
    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($id));
        $count = $stmt->rowCount();
        header('location: ../admin-contact-manager.php');
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

?>
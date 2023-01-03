<?php
include "../connect.php";

$id = filterRequest('id');

$stmt = $con->prepare("SELECT * FROM `notes` WHERE `note_user` = $id ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
}else{
    echo json_encode(array("status" => "fail"));
}

?>
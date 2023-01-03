<?php
include "../connect.php";

$id = filterRequest('id');
$imageName = filterRequest('image_name');

$stmt = $con->prepare("DELETE FROM `notes` WHERE `note_id` = $id");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    deleteFile("../upload", $imageName);
   echo json_encode(array("status" => "deleted successfully"));
}else{
    echo json_encode(array("status" => "not deleted"));
}
?>
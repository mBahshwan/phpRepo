<?php
include "../connect.php";

$id = filterRequest('id');
$title = filterRequest('title');
$content = filterRequest('content');
$imageName = filterRequest('image_name');

if (isset($_POST['file'])) {
    deleteFile("../upload", $imageName);
   $imageName = uploadImage("file");
}

$stmt = $con->prepare("UPDATE `notes` SET `note_title` = '$title', `note_content` = '$content', `note_image` = '$imageName' WHERE `note_id` = $id");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
   echo json_encode(array("status" => "edit successfully"));
}else{
    echo json_encode(array("status" => "not editted"));
}
?>
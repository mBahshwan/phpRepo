<?php
include "../connect.php";

$imageName = uploadImage("file");

$userid = filterRequest('userid');
$title = filterRequest('title');
$content = filterRequest('content');

if ($imageName != "fail") {
    $stmt = $con->prepare("INSERT INTO `notes`(`note_user`, `note_title`, `note_content`, `note_image`) VALUES ('$userid', '$title', '$content', '$imageName') ");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success", ));
    }else{
        echo json_encode(array("status" => "fail"));
    }
}else{
    echo json_encode(array("status" => "fail")); 
}



?>
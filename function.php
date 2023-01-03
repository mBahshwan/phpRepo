<?php
define("MB" , 1048576);
function filterRequest($requestName){
    return htmlspecialchars(strip_tags($_POST[$requestName]));
}

function uploadImage($fileDetails){
    global $msgError ;
$imageName = rand(10, 10000) . $_FILES[$fileDetails]['name'];
$imageTmp  = $_FILES[$fileDetails]['tmp_name'];
$imageSize = $_FILES[$fileDetails]['size'];
$allowExt  = array("jpg" , "jpeg", "pdf", "mp3", "gif", "png");
$strToArr  = explode("." , $imageName);
$ext       = end($strToArr);
$ext       = strtolower($ext);
if (!empty($imageName) && !in_array($ext, $allowExt)) {
 $msgError = "Ext";
}
if ($imageSize > 2 *MB){
    $msgError[] = "Size";
}
if (empty($msgError)) {
    move_uploaded_file($imageTmp , "../upload/" . $imageName);
    return $imageName;
}else{
  "fail";
}
}
function deleteFile($dir, $imagename){
  if (file_exists($dir . "/" . $imagename)) {
    unlink($dir . "/" . $imagename);
  }
}


?>
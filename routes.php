<?php

require_once "./configs/config.php";
require_once "./modules/Get.php";
require_once "./modules/Post.php";

$db = new Connection();

$post = new Post($db);
$get = new Get();

if(isset($_REQUEST['request'])){
    $request = explode("/", $_REQUEST['request']);
}
else {
    echo "URL does not exist";
}



?>
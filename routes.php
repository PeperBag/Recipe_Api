<?php

require_once "./configs/db.php";
require_once "./modules/Get.php";
require_once "./modules/Post.php";


$db = new Connection();
$pdo = $db->connect();

$post = new Post($pdo);
$get = new Get($pdo);

if (isset($_REQUEST['request'])) {
    $request = explode("/", $_REQUEST['request']);
} else {
    echo "URL does not exist";
}


switch ($_SERVER['REQUEST_METHOD']) {

    case "GET";
        switch ($request[0]) {

            case "recipes":
                if (count($request) > 1) {
                    echo json_encode($get->getRecipes($request[1]));
                }
                else {
                    echo json_encode($get->getRecipes());
                }
                break;
            case "ingredients":
                echo json_encode($get->getIngredient());
                break;

            default:
                http_response_code(401);
                echo "this is invalid endponit";
                break;
        }

        break;

    case "POST":
        $body = json_decode(file_get_contents("php://input"));
        switch ($request[0]) {
            case "recipes":
                echo $post->postRecipes();
                break;
            case "ingredients":
                echo $post->postIngredients();
                break;

            default:
                http_response_code(401);
                echo "this is invalid endpoint";
                break;
        }
        break;

    default:
        http_response_code(400);
        echo "Invalid HTTP method";
}

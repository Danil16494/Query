<?php
use Controller\db\components\QueryHelper;
use Controller\models\PostData;

$postData=new PostData(new QueryHelper());

if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}
$post = $postData->getPostsID($_GET['id']);

if (isset($_POST['btnDel'])) {
    if (file_exists('Photo/' . $post->Photo)) {
        if ($post->Photo != "default.jpg") {
            unlink('Photo/' . $post->Photo);
        }
        $postData->deletePost($_GET['id']);
    }
    header("Location: /");
    exit;
}
require_once "App/views/posts/deletePost.view.php";

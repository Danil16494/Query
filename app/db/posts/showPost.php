<?php
use Controller\db\components\QueryHelper;
use Controller\models\PostData;

$postData=new PostData(new QueryHelper());

$title = "Просмотр информации";

$post = $postData->getOne($_GET['id']);


if (!$post) {
    header("Location: /");
    exit;
}

require_once "App/views/posts/showPost.view.php";
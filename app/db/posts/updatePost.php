<?php
use Controller\db\components\QueryHelper;
use Controller\models\PostData;

$postData=new PostData(new QueryHelper());

if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_GET['title']) || empty($_GET['title']))) {
    exit;
}

$post=$postData->getPostsID($_GET['id']);

if (count($_POST) > 0) {if (file_exists('Photo/'.$post->Photo)) {
    if ($post->Photo != "default.jpg") {
        unlink('Photo/'.$post->Photo);
    }
}
    $fileName = $_FILES['Photo']['name'];
    $fileTmpName = $_FILES['Photo']['tmp_name'];
    $fileType = $_FILES['Photo']['type'];
    $fileError = $_FILES['Photo']['error'];
    $fileSize = $_FILES['Photo']['size'];

    $fileExtension = strtolower(end(explode('.', $fileName)));

    $fileName = explode('.', $fileName)[0];

    $extensions = ['jpg', 'png', 'jpeg'];
    if (in_array($fileExtension, $extensions)) {
        if ($fileSize < 5000000) {
            if ($fileError === 0) {
                $_POST['Photo'] = implode('.', [$fileName, $fileExtension]);
            }
        }
    } else {
        $_POST['Photo'] = 'default.jpg';
    }
    $_POST['id']=$_GET['id'];
    $id = $postData->updatePost($_POST);
    if ($id != null) {
        $fileDestination = "Photo/" . $_POST['Photo'];
        move_uploaded_file($fileTmpName, $fileDestination);
    }
    header("Location: /");
    exit;
}
require_once "App/views/posts/updatePost.view.php";

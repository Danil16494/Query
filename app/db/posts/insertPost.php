<?php
use Controller\db\components\QueryHelper;
use Controller\models\PostData;

$postData=new PostData(new QueryHelper());

if (count($_POST) > 0) {
    $_POST["datePublication"] = date("Y-m-d");

    $fileName = $_FILES['Photo']['name'];
    $fileTmpName = $_FILES['Photo']['tmp_name'];
    $fileType = $_FILES['Photo']['type'];
    $fileError = $_FILES['Photo']['error'];
    $fileSize = $_FILES['Photo']['size'];

    $fileExtension = strtolower(end(explode('.', $fileName)));

    $_POST['id_user']=rand(1,3);
    $fileName = explode('.', $fileName)[0];
    $fileName2= implode('!',[$_POST['id_user'],$fileName]);

    $extensions = ['jpg', 'png', 'jpeg'];
    if (in_array($fileExtension, $extensions)) {
        if ($fileSize < 5000000) {
            if ($fileError === 0) {
                $_POST['Photo'] = implode('.', [$fileName2, $fileExtension]);
            }
        }
    } else {
        $_POST['Photo'] = 'default.jpg';
    }

    $id = $postData->insertPost($_POST);

    if ($id != null) {
        $fileDestination = "Photo/" . $_POST['Photo'];
        move_uploaded_file($fileTmpName, $fileDestination);
    }
    header("Location: /");
    exit;
}
require_once "App/views/posts/insertPost.view.php";
<?php
use Controller\models\PostData;
use Controller\db\components\QueryHelper;

$postData=new PostData(new QueryHelper());
$postData->getAllPosts();
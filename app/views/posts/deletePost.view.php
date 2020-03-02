<?php
$title = "Удаление поста";
echo "Hello";
require_once __DIR__ . "/../parts/header.php"
?>
    <form method="post" action="">
        <div class="row">
            <div class="card mt-3 p-2 col-md-4 col-sm-6">
                <img src="<?= $post->Photo?'/Photo/'.$post->Photo:' '?>"class="card-img-top img-small"
                     style="height:295px; object-fit: cover;"
                     alt=" ">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title ?></h5>
                    <p class="card-text"><?=date_format(new DateTime($post->datePublication),'d.m.Y')?></p>
                    <button type="submit" class="btn btn-danger" name="btnDel">Delete</button>
                </div>
            </div>
        </div>
    </form>
<?php require_once __DIR__ . "/../parts/footer.php" ?>
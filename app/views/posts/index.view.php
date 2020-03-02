<?php
require_once __DIR__ . "/../parts/header.php"
?>
    <h2>Посты</h2>
    <div class="row">
<!--        <a class="col-md-4 btn btn-primary mt-5 mb-3 p-3" href="../../insertPost.php">-->
<!--            Добавить новую запись-->
<!--        </a>-->
        <a class="col-md-4 btn btn-primary mt-5 mb-3 p-3" href="/insertpost">
            Добавить новую запись
        </a>
    </div>
    <div class="row">
        <?php $i = 1;
        foreach ($posts as $post):?>
            <div class="card mt-3 p-2 col-md-4 col-sm-6">
                <img src="<?= $post->Photo?'Photo/' . $post->Photo : ' ' ?>" class="card-img-top img-small"
                     style="height:295px; object-fit: cover;"
                     alt=" ">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title ?></h5>
                    <p class="card-text"><?= date_format(new DateTime($post->datePublication), 'd.m.Y') ?></p>
                    <a class="btn btn-info p-2" style="width:100%;" href="/showpost?id=<?=$post->id;?>">More information</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php require_once __DIR__ . "/../parts/footer.php" ?>
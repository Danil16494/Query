<?php
$title = "Добавление поста";
echo "dasda";
require_once __DIR__ . "/../parts/header.php";
?>
    <h2 class="offset-3">Post...</h2>
    <div class="card mt-3 col-8 offset-2">
        <img src="<?= $post->Photo ? '/Photo/' . $post->Photo : '' ?>" alt="" class="card-img-top img-big" alt="Photo">
        <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text">
                <?= date_format(new DateTime($post->datePublication), 'd.m.Y') ?></p>
            <a class="btn btn-outline-danger" href='../../deletePost?id=<?= $post->id; ?>'>Delete</a>
            <a class="btn btn-outline-danger" href='../../updatePost?id=<?= $post->id; ?>'>Update</a>
            <a class="btn btn-outline-danger" href='../../index.php?id=<?= $post->id; ?>'>Back</a>
        </div>
    </div>
<? require_once __DIR__ . "/../parts/footer.php"; ?>

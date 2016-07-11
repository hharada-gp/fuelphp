<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>掲示板</title>
    <?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>
  <?= $globalheader ?>
  <div class="container">
    <a href="/bbs/form/" class="btn btn-default">投稿する</a>
    <ul class="posts">
      <?php foreach($data as $comment){ ?><li class="post">
        <h2 class="post_title"><?= $comment['title'] ?></h2>
        <p class="post_comment"><?= $comment['body'] ?></p>
        <a href="/bbs/edit/<?= $comment['id']?>" class="btn btn-default btn-sm">編集する</a>
        <a href="/bbs/delete/<?= $comment['id']?>" class="btn btn-danger btn-sm">削除する</a>
      </li><?php } ?>
    </ul>
  </div>
</body>
</html>
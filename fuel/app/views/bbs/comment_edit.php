<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>掲示板</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('styles.css'); ?>
</head>
<body>
  <?= $globalheader ?>
  <div class="container">
    <form action="" method="post" name="bbs">
      <div class="form-group">
        <label for="comment_title">タイトル</label>
        <input type="text" class="form-control" id="comment_title" name="comment_title" value="<?= $currentcomment->title ?>">
      </div>
      <div class="form-group">
        <label for="comment_body">コメント</label>
        <textarea cols="30" rows="10" class="form-control" id="comment_body" name="comment_body"><?= $currentcomment->body ?></textarea>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button type="submit" class="btn btn-primary">編集する</button>
    </form>
  </div>
</body>
</html>
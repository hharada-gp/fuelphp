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
    <form action="/bbs/complete/" method="post" name="bbs">
      <div class="form-group">
        <p class="control-label">タイトル</p>
        <p>タイトル</p>
      </div>
      <div class="form-group">
        <p class="control-label">コメント</p>
        <p>コメント</p>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button class="btn btn-default">投稿する</button>
    </form>
  </div>
</body>
</html>
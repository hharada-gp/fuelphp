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
    <p><?php echo $message; ?></p>
    <a href="/bbs/" class="btn btn-default">掲示板に戻る</a>
  </div>
</body>
</html>
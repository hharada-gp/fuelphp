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
    <?= Form::open(array('method'=>'post', 'name'=>'bbs')); ?>
      <div class="form-group">
        <?= Form::label('タイトル', 'comment_title'); ?>
        <?= Form::input('comment_title', '', array('placeholder'=>'タイトルを入力してください。', 'class'=>'form-control', 'id'=>'comment_title')); ?>
      </div>
      <div class="form-group">
        <?= Form::label('コメント', 'comment_body'); ?>
        <?= Form::textarea('comment_body', '', array('placeholder'=>'コメントを入力してください。', 'class'=>'form-control', 'id'=>'comment_body', 'cols'=>'30', 'rows'=>'10')); ?>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <?= Form::button('comment_submit', '投稿する', array('type'=>'submit', 'class'=>'btn btn-primary')) ?>
    <?= Form::close(); ?>
  </div>
</body>
</html>
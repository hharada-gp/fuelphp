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
    <ul>
      <li>
        <h2 class="post_title"><?= $currentcomment->title ?></h2>
        <p class="post_comment"><?= $currentcomment->body ?></p>
        <ul class="reactions">
          <?php foreach($currentcomment->reactions as $reaction){ ?>
          <li class="reaction<?php if($reaction->id === $currentreaction->id){ echo ' is-current'; } ?>"><?= $reaction->body ?></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
    <?= Form::open(array('method'=>'post', 'name'=>'bbs')); ?>
      <div class="form-group">
        <?= Form::label('リアクション', 'reaction_body'); ?>
        <?= Form::textarea('reaction_body', $currentreaction->body, array('cols'=>'30', 'rows'=>'10', 'class'=>'form-control', 'id'=>'reaction_body', 'placeholder'=>'リアクションを入力してください。')); ?>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <?= Form::button('reaction_submit', '投稿する', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
    <?= Form::close(); ?>
  </div>
</body>
</html>
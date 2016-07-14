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
    <form action="" method="post" name="bbs">
      <div class="form-group">
        <label for="reaction_body">リアクション</label>
        <textarea cols="30" rows="10" class="form-control" id="reaction_body" name="reaction_body"><?= $currentreaction->body ?></textarea>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button type="submit" class="btn btn-primary">編集する</button>
    </form>
  </div>
</body>
</html>
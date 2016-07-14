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
        <h2 class="post_title"><?= $comment->title ?></h2>
        <p class="post_comment"><?= $comment->body ?></p>
        <?php if($comment->reactions): ?><ul class="reactions">
          <?php foreach($comment->reactions as $reaction){ ?>
          <li class="reaction"><?= $reaction->body ?></li>
          <?php } ?>
        </ul><?php endif; ?>
      </li>
    </ul>
    <form action="" method="post" name="bbs">
      <div class="form-group">
        <label for="reaction_body">リアクション</label>
        <textarea cols="30" rows="10" class="form-control" id="reaction_body" name="reaction_body" placeholder="リアクションを入力してください。"></textarea>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button type="submit" class="btn btn-primary">投稿する</button>
      <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
    </form>
  </div>
</body>
</html>
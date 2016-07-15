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
    <?= Form::open(array('method'=>'post', 'name'=>'bbs')); ?>
      <div class="form-group">
        <?= Form::label('リアクション', 'reaction_body'); ?>
        <?= Form::textarea('reaction_body', '', array('cols'=>'30', 'rows'=>'10', 'class'=>'form-control', 'id'=>'reaction_body', 'placeholder'=>'リアクションを入力してください。')); ?>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <?= Form::button('reaction_submit', '投稿する', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      <?= Form::hidden('comment_id', $comment->id, array('id'=>'comment_id')); ?>
    <?= Form::close(); ?>
  </div>
</body>
</html>
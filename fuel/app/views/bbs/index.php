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
    <?php
    $status = Session::get_flash('status');
    if($status === 'comment_created')
    {
      echo '<p class="status">コメントを投稿しました。</p>';
    }
    else if($status === 'comment_updated')
    {
      echo '<p class="status">コメントを編集しました。</p>';
    }
    else if($status === 'comment_deleted')
    {
      echo '<p class="status">コメントを削除しました。</p>';
    }
    else if($status === 'reaction_created')
    {
      echo '<p class="status">リアクションを投稿しました。</p>';
    }
    else if($status === 'reaction_updated')
    {
      echo '<p class="status">リアクションを編集しました。</p>';
    }
    else if($status === 'reaction_deleted')
    {
      echo '<p class="status">リアクションを削除しました。</p>';
    }
    ?>
    <a href="/bbs/new/" class="btn btn-default">投稿する</a>
    <ul class="comments">
      <?php foreach($comments as $comment){ ?><li class="comment">
        <h2 class="comment_title"><?= $comment->title ?></h2>
        <p class="comment_comment"><?= $comment->body ?></p>
        <p class="comment_menu">
          <a href="/bbs/reaction/<?= $comment->id ?>" class="btn btn-default btn-sm">リアクションを書く</a>
          <a href="/bbs/edit/<?= $comment->id ?>" class="btn btn-default btn-sm">編集する</a>
          <a href="/bbs/delete/<?= $comment->id ?>" class="btn btn-danger btn-sm">削除する</a>
        </p>
        <?php if($comment->reactions): ?><ul class="reactions">
          <?php foreach($comment->reactions as $reaction){ ?>
          <li class="reaction"><?= $reaction->body ?>
            <span class="reaction_menu">
              <a href="/bbs/editreaction/<?= $reaction->id ?>" class="btn btn-default btn-xs">編集する</a>
              <a href="/bbs/deletereaction/<?= $reaction->id ?>" class="btn btn-danger btn-xs">削除する</a>
            </span>
          </li>
          <?php } ?>
        </ul><?php endif;?>
      </li><?php } ?>
    </ul>
  </div>
</body>
</html>
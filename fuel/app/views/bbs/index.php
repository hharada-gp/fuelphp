<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>掲示板</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <style>
    .comment{
      margin-bottom: 40px;
    }
    .comment_menu{
      margin-bottom: 15px;
    }
    .reaction{
      margin-bottom: 10px;
    }
    .reaction_menu{
      margin: 0 5px;
    }
    </style>
</head>
<body>
  <?= $globalheader ?>
  <div class="container">
    <a href="/bbs/form/" class="btn btn-default">投稿する</a>
    <ul class="comments">
      <?php foreach($comments as $comment){ ?><li class="comment">
        <h2 class="comment_title"><?= $comment['title'] ?></h2>
        <p class="comment_comment"><?= $comment['body'] ?></p>
        <p class="comment_menu">
          <a href="/bbs/reaction/<?= $comment['id']?>" class="btn btn-default btn-sm">リアクションを書く</a>
          <a href="/bbs/edit/<?= $comment['id']?>" class="btn btn-default btn-sm">編集する</a>
          <a href="/bbs/delete/<?= $comment['id']?>" class="btn btn-danger btn-sm">削除する</a>
        </p>
        <ul class="reactions"><!-- reaction がなかったら ul 要素ごと消したいが… -->
          <?php foreach($reactions as $reaction){ if($comment['id'] === $reaction['comment_id']){ ?><!-- ここわかりにくいのでどうにかしたい -->
          <li class="reaction"><?= $reaction['body'] ?>
            <span class="reaction_menu">
              <a href="/bbs/editreaction/<?= $reaction['id'] ?>" class="btn btn-default btn-xs">編集する</a>
              <a href="/bbs/deletereaction/<?= $reaction['id'] ?>" class="btn btn-danger btn-xs">削除する</a>
            </span>
          </li>
          <?php } } ?>
        </ul>
      </li><?php } ?>
    </ul>
  </div>
</body>
</html>
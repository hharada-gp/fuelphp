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
    <?php if(isset($comment)){ ?><ul>
      <li>
        <h2 class="post_title"><?= $comment['title'] ?></h2>
        <p class="post_comment"><?= $comment['body'] ?></p>
      </li>
    </ul><?php } ?>
    <form action="<?php if(isset($comment)){ echo '/reaction/create/'; } else if(isset($reaction)) { echo '/reaction/update/'.$reaction->id; } ?>" method="post" name="bbs">
      <div class="form-group">
        <label for="reaction_body">リアクション</label>
        <textarea cols="30" rows="10" class="form-control" id="reaction_body" name="reaction_body" placeholder="リアクションを入力してください。"><?php if(isset($reaction)){ echo $reaction['body']; } ?></textarea>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button type="submit" class="btn btn-primary">投稿する</button>
      <input type="hidden" name="comment_id" value="<?php if(isset($comment)){ echo $comment['id']; } else if(isset($reaction)) { echo $reaction['comment_id']; } ?>">
      <?php if(isset($reaction)){ ?><input type="hidden" name="reaction_id" value="<?= $reaction['id'] ?>"><?php } ?>
      <input type="hidden" name="status" value="<?php if(isset($comment)){ echo 'create'; } else if(isset($reaction)){ echo 'update'; } ?>">
    </form>
  </div>
</body>
</html>
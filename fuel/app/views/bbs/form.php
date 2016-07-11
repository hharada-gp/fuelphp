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
        <label for="comment_title">タイトル</label>
        <input type="text" class="form-control" id="comment_title" name="comment_title" placeholder="タイトルを入力してください。"<?php if(isset($edit)){ echo 'value="'.$edit['title'].'"'; } ?>>
      </div>
      <div class="form-group">
        <label for="comment_body">コメント</label>
        <textarea cols="30" rows="10" class="form-control" id="comment_body" name="comment_body" placeholder="コメントを入力してください。"><?php if(isset($edit)){ echo $edit['body']; } ?></textarea>
      </div>
      <a href="/bbs/" class="btn btn-default">戻る</a>
      <button type="submit" class="btn btn-primary">投稿内容を確認する</button>
      <input type="hidden" name="comment_status" value="<?php if(isset($edit)){ echo 'update'; } else { echo 'create'; } ?>">
      <?php if(isset($edit)){ ?><input type="hidden" name="comment_id" value="<?php echo $edit['id'] ?>"><?php } ?>
    </form>
  </div>
</body>
</html>
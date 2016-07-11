<?php
class Controller_Bbs extends Controller
{
  public $ghpass = 'bbs/assets/globalheader';
  public function action_index()
  {
    $view = View::forge('bbs/index');
    $view->globalheader = View::forge($this->ghpass);
    $view->data = Model_Comment::find('all');
    return $view;
  }
  public function action_form()
  {
    $view = View::forge('bbs/form');
    $view->globalheader = View::forge($this->ghpass);
    return $view;
  }
  // public function action_confirm()
  // {
  //   $view = View::forge('bbs/confirm');
  //   $view->globalheader = View::forge($this->ghpass);

  //   return $view;
  // }
  public function action_complete()
  {
    $view = View::forge('bbs/complete');
    $view->globalheader = View::forge($this->ghpass);
    $status = Input::post('comment_status');
    if($status==='create'){
      $props = array(
        'title'=>Input::post('comment_title'),
        'body'=>Input::post('comment_body')
        );
      $new = new Model_Comment($props);
      $new->save();      
      $view->message = '投稿が完了しました。';
    } else if($status==='update') {
      $id = Input::post('comment_id');
      $comment = Model_Comment::find($id);
      $comment->title = Input::post('comment_title');
      $comment->body = Input::post('comment_body');
      $comment->save();
      $view->message = '投稿を編集しました。';
    }
    return $view;
  }
  public function action_edit($id){
    $view = View::forge('bbs/form');
    $view->globalheader = View::forge($this->ghpass);
    $view->edit = Model_Comment::find($id);
    return $view;
  }
  public function action_delete($id){
    $view = View::forge('bbs/complete');
    $view->globalheader = View::forge($this->ghpass);
    $comment = Model_Comment::find($id);
    $comment->delete();
    $view->message = '投稿を削除しました。';
    return $view;
  }
}
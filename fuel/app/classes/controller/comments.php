<?php
class Controller_Comments extends Controller
{
  public $ghpass = 'bbs/assets/globalheader';
  public function action_index()
  {
    $view = View::forge('bbs/index');
    $view->globalheader = View::forge($this->ghpass);
    $view->comments = Model_Comment::find('all');
    return $view;
  }
  public function action_new()
  {
    $view = View::forge('bbs/comment_new');
    $view->globalheader = View::forge($this->ghpass);
    return $view;
  }
  public function action_create()
  {
    $props = array(
      'title'=>Input::post('comment_title'),
      'body'=>Input::post('comment_body')
      );
    $new = new Model_Comment($props);
    $new->save();
    $status = Session::set_flash('status', 'comment_created');
    Response::redirect('/bbs/');
  }
  public function action_edit($id){
    $comment = Model_Comment::find($id);
    $method = Request::main()->get_method();
    if($method==='POST'){
      $comment->title = Input::post('comment_title');
      $comment->body = Input::post('comment_body');
      $comment->save();
      $status = Session::set_flash('status', 'comment_updated');
      Response::redirect('/bbs/');
    } else {
      $view = View::forge('bbs/comment_edit');
      $view->globalheader = View::forge($this->ghpass);
      $view->currentcomment = $comment;
      return $view;      
    }
  }
  public function action_delete($id){
    $comment = Model_Comment::find($id);
    $comment->delete();
    $status = Session::set_flash('status', 'comment_deleted');
    Response::redirect('/bbs/');
  }
}
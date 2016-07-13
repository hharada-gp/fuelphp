<?php

class Controller_Reaction extends Controller
{
  public $ghpass = 'bbs/assets/globalheader';
  public function action_index($id)
  {
    $view = View::forge('bbs/reaction');
    $view->globalheader = View::forge($this->ghpass);
    $view->comment = Model_Comment::find($id);
    return $view;
  }
  public function action_create()
  {
    $props = array(
      'body'=>Input::post('reaction_body')
      );
    $reaction = new Model_Reaction($props);
    $reaction->post = Model_Comment::find(Input::post('comment_id'));
    $reaction->save();
    $status = Session::set_flash('status', 'reaction_create');
    Response::redirect('/bbs/');
  }
  public function action_update($id)
  {
    $reaction = Model_Reaction::find(Input::post('reaction_id'));
    $reaction->body = Input::post('reaction_body');
    $reaction->save();
    $status = Session::set_flash('status', 'reaction_updated');
    Response::redirect('/bbs/');
  }
  public function action_edit($id){
    $view = View::forge('bbs/reaction');
    $view->globalheader = View::forge($this->ghpass);
    // $view->comment = Model_Comment::find($id); // 元スレッドのコメント内容を取り出したいけどどうしたらいいのかわからない
    $view->reaction = Model_Reaction::find($id);
    return $view;
  }
  public function action_delete($id){
    $reaction = Model_Reaction::find($id);
    $reaction->delete();
    $status = Session::set_flash('status', 'reaction_deleted');
    Response::redirect('/bbs/');
  }
}
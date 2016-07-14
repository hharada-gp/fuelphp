<?php

class Controller_Reactions extends Controller
{
  public $ghpass = 'bbs/assets/globalheader';
  public function action_new($id)
  {
    $method = Request::main()->get_method();
    if($method === 'POST'){
      $props = array(
        'body'=>Input::post('reaction_body')
        );
      $reaction = new Model_Reaction($props);
      $reaction->post = Model_Comment::find(Input::post('comment_id'));
      $reaction->save();
      $status = Session::set_flash('status', 'reaction_created');
      Response::redirect('/bbs/');
    } else {
      $view = View::forge('bbs/reaction_new');
      $view->globalheader = View::forge($this->ghpass);
      $view->comment = Model_Comment::find($id);
      return $view;      
    }
  }
  public function action_edit($id){
    $reaction = Model_Reaction::find($id);
    $method = Request::main()->get_method();
    if($method === 'POST'){
      $reaction->body = Input::post('reaction_body');
      $reaction->save();
      $status = Session::set_flash('status', 'reaction_updated');
      Response::redirect('/bbs/');
    } else {
      $view = View::forge('bbs/reaction_edit');
      $view->globalheader = View::forge($this->ghpass);
      $comment = $reaction->post;
      $view->currentreaction = $reaction;
      $view->currentcomment = $comment;
      return $view;      
    }
  }
  public function action_delete($id){
    $reaction = Model_Reaction::find($id);
    $reaction->delete();
    $status = Session::set_flash('status', 'reaction_deleted');
    Response::redirect('/bbs/');
  }
}
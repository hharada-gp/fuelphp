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
  public function action_complete(){
    $view = View::forge('bbs/complete');
    $view->globalheader = View::forge($this->ghpass);
    $status = Input::post('status');
    if($status === 'create'){ //view から input[type="hidden"] で status を送るようにしてるけどこれでいいのかわからない
      $props = array(
        'body'=>Input::post('reaction_body')
        );
      $reaction = new Model_Reaction($props);
      $reaction->post = Model_Comment::find(Input::post('comment_id')); //view から input[type="hidden"] で元スレッドの id を送るようにしてるけどこれでいいのかわからない
      $reaction->save();
      $view->message = 'リアクションを投稿しました。';
    } else if($status === 'update'){
      $reaction = Model_Reaction::find(Input::post('reaction_id')); //view から input[type="hidden"] で元スレッドの id を送るようにしてるけどこれでいいのかわからない
      $reaction->body = Input::post('reaction_body');
      $reaction->save();
      $view->message = 'リアクションを編集しました。';
    }
    return $view;
  }
  public function action_edit($id){
    $view = View::forge('bbs/reaction');
    $view->globalheader = View::forge($this->ghpass);
    // $view->comment = Model_Comment::find($id); // 元スレッドのコメント内容を取り出したいけどどうしたらいいのかわからない
    $view->reaction = Model_Reaction::find($id);
    return $view;
  }
  public function action_delete($id){
    $view = View::forge('bbs/complete');
    $view->globalheader = View::forge($this->ghpass); 
    $reaction = Model_Reaction::find($id);
    $reaction->delete();
    $view->message = 'リアクションを削除しました。';
    return $view;   
  }
}
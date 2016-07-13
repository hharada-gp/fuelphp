<?php

class Model_Reaction extends Orm\Model{
  protected static $_properties = array(
    'id','body','comment_id'
    );
  protected static $_table_name = 'reaction';
  protected static $_primary = array('id');
  protected static $_belongs_to = array(
      'post' => array(
          'key_from' => 'comment_id',
          'model_to' => 'Model_Comment',
          'key_to' => 'id',
          'cascade_save' => true,
          'cascade_delete' => false,
      )
  );
}
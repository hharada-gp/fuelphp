<?php

class Model_Comment extends Orm\Model{
  protected static $_properties = array(
    'id','title','body'
    );
  protected static $_table_name = 'comment';
  protected static $_primary = array('id');
  protected static $_has_many = array(
    'reactions' => array(
        'key_from' => 'id',
        'model_to' => 'Model_Reaction',
        'key_to' => 'comment_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    )
);
}
<?php

class Model_Comment extends Orm\Model{
  protected static $_properties = array(
    'id','title','body'
    );
  protected static $_table_name = 'comment';
  protected static $_primary = array('id');
}
<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
  'bbs' => 'comment',
  'bbs/form' => 'comment/form',
  'bbs/complete' => 'comment/complete',
  'bbs/edit/(:any)' => 'comment/edit/$1',
  'bbs/delete/(:any)' => 'comment/delete/$1',
  'bbs/reaction/(:any)' => 'reaction/index/$1',
  'bbs/editreaction/(:any)' => 'reaction/edit/$1',
  'bbs/deletereaction/(:any)' => 'reaction/delete/$1'

	//'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);

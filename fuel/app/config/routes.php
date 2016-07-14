<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
  'bbs' => 'comments',
  'bbs/new' => 'comments/new',
  'bbs/complete' => 'comments/complete',
  'bbs/edit/(:any)' => 'comments/edit/$1',
  'bbs/delete/(:any)' => 'comments/delete/$1',
  'bbs/reaction/(:any)' => 'reactions/new/$1',
  'bbs/editreaction/(:any)' => 'reactions/edit/$1',
  'bbs/deletereaction/(:any)' => 'reactions/delete/$1'

	//'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);

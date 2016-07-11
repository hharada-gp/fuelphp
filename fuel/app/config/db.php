<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
  'active' => 'development',
'development' => array(
    'type'           => 'mysql',
    'connection'     => array(
        'dsn'            => 'mysql:host=localhost;dbname=bbs;charset=utf8;unix_socket=/tmp/mysql.sock',
        'database'       => 'bbs',
        'username'       => 'bbs',
        'password'       => 'bbs',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '`',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => true,
    'profiling'      => false,
    'readonly'       => false,
),
 );

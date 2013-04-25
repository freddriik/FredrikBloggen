<?php

$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pass'] = '';
$config['db_name'] = 'bloggen';

//Connect to server
//$config['db_host'] = 'sql200.sitehostingfree.com';
//$config['db_user'] = 'shfre_12287302';
//$config['db_pass'] = 'hejhej1';
//$config['db_name'] = 'shfre_12287302_blog';


foreach ($config as $k => $v){
    define(strtoupper($k), $v);
    
}

?>

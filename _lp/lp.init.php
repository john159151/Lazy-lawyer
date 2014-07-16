<?php

if( !defined('AROOT') ) die('NO AROOT!');
if( !defined('DS') ) define( 'DS' , DIRECTORY_SEPARATOR );

// define constant
define( 'IN' , true );

define( 'ROOT' , dirname( __FILE__ ) . DS );
define( 'CROOT' , ROOT . 'core' . DS  );

// define 
error_reporting(E_ALL^E_NOTICE);
ini_set( 'display_errors' , true );

include_once( CROOT . 'lib' . DS . 'core.function.php' );
@include_once( AROOT . 'lib' . DS . 'app.function.php' );

include_once( CROOT . 'config' .  DS . 'core.config.php' );
include_once( AROOT . 'config' . DS . 'app.config.php' );



$c = $GLOBALS['c'] = v('c') ? v('c') : c('default_controller');
$a = $GLOBALS['a'] = v('a') ? v('a') : c('default_action');

$c = basename(strtolower( z($c) ));
$a =  basename(strtolower( z($a) ));

$post_fix = '.class.php';

$cont_file = AROOT . 'controller'  . DS . $c . $post_fix;
$class_name = $c .'Controller' ;
header("Content-type: text/html; charset=utf-8");
if( !file_exists( $cont_file ) )
{
	$cont_file = CROOT . 'controller' . DS . $c . $post_fix;
	if( !file_exists( $cont_file ) ) die('对不起，您所访问的页面不存在!' );
} 


require_once( $cont_file );
if( !class_exists( $class_name ) ) die('对不起，您所访问的页面不存在!' );


$o = new $class_name;
if( !method_exists( $o , $a ) ) die('对不起，您所访问的页面不存在!');


if(strpos('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']) !== FALSE)  ob_start("ob_gzhandler");
call_user_func( array( $o , $a ) );


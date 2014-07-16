<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class loginController extends appController
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = $data['top_title'] = '登录';
		render( $data , 'web' , 'login');
	}

	function checklogin()
	{
		header("Content-type: text/html; charset=utf-8");
		$username = v( 'username' );
		$password = v( 'password' );
		$user_info = get_master_info( $username );
		if ($user_info) {
			$realpass = md5($password);
			if ($realpass == $user_info['password']) {
				session_start();
				$_SESSION['user'] = $username;
				$_SESSION['pass'] = md5($realpass);
				echo "<script>";
		      	echo "window.location.href = '".c( $site_url )."?c=backedit'";
		      	echo "</script>";
			}
			else{
				echo "<script>";
				echo "alert('用户名或密码错误');";
		      	echo "window.location.href = '".c( $site_url )."?c=login'";
		      	echo "</script>";
			}
		}
		else{
			echo "<script>";
			echo "alert('用户名或密码错误');";
	      	echo "window.location.href = '".c( $site_url )."?c=login'";
	      	echo "</script>";
		}
	}

	function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		echo "<script>";
      	echo "window.location.href = '".c( $site_url )."?c=login'";
      	echo "</script>";
	}
}
<?php
function cat_to_name( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_casecat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}

function lawcat_to_name( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_lawcat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}

function filecat_to_name( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_filecat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}

function if_login()
{
	session_start();
	if (isset($_SESSION['user']) || isset($_SESSION['pass'])) {}
	else{
		echo "<script>";
      	echo "window.location.href = '".c( $site_url )."?c=login'";
      	echo "</script>";
	}
}

function get_master_info( $username )
{
	$sql_pre = "SELECT `username`  , `password` FROM `yxy_master` WHERE `username` = ?s";
	$array = array($username);
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}
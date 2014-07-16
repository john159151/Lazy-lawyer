<?php

function get_limit_filecat()
{
	$sql = "SELECT `id` , `catname` FROM `yxy_filecat` LIMIT 3";
	return get_data( $sql );
}

function get_files_by_cat( $filecat )
{
	$sql_pre = "SELECT `id` , `filecat`  , `filename`  , `filepath` FROM `yxy_downloadfile` WHERE `filecat` = ?i LIMIT 5 ";
	$array = array( $filecat );
	$sql = prepare( $sql_pre , $array );
	return get_data( $sql );
}

function get_filecatname( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_filecat` WHERE `id` = ?i";
	$array = array( $catid );
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}
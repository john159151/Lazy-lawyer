<?php
function get_all_file()
{
	$sql = "SELECT `id` , `filecat`  , `filename`  , `filepath` FROM `yxy_downloadfile` ORDER BY `filecat` ";
	return get_data( $sql );
}

function get_all_cat()
{
	$sql = "SELECT `id` , `catname` FROM `yxy_filecat` ";
	return get_data( $sql );
}

function get_files_by_cat( $filecat )
{
	$sql_pre = "SELECT `id` , `filecat`  , `filename`  , `filepath` FROM `yxy_downloadfile` WHERE `filecat` = ?i ";
	$array = array($filecat);
	$sql = prepare( $sql_pre , $array );
	return get_data( $sql );
}

function get_name_by_filecat( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_filecat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}
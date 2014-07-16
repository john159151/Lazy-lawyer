<?php
function show_cat( $cat_type )
{
	$sql = "SELECT `id` , `catname` FROM `$cat_type` ";
	return get_data( $sql );
}

function show_cases()
{
	$sql = "SELECT `id` , `title`  , `category`  , `time` , `description` FROM `yxy_cases` ORDER BY time DESC ";
	return get_data( $sql );
}

function show_laws()
{
	$sql = "SELECT `id` , `title`  , `lawcat`  , `time` , `description` FROM `yxy_laws` ORDER BY time DESC ";
	return get_data( $sql );
}

function show_files()
{
	$sql = "SELECT `id` , `filecat`  , `filename`  , `filepath` FROM `yxy_downloadfile` ORDER BY id DESC ";
	return get_data( $sql );
}

function get_all_casecat(){
	$sql  = "SELECT `id` ,`catname` FROM `yxy_casecat` ORDER BY id ";
	return get_data( $sql );
}

function get_all_lawcat(){
	$sql  = "SELECT `id` ,`catname` FROM `yxy_lawcat` ORDER BY id ";
	return get_data( $sql );
}

function get_all_filecat(){
	$sql  = "SELECT `id` ,`catname` FROM `yxy_filecat` ORDER BY id ";
	return get_data( $sql );
}

function cat_add( $catname , $cat_type )
{
	$sql_pre = "INSERT INTO `$cat_type` ( `catname` ) VALUES ( ?s ) ";
	$array = array( $catname );
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function cat_delete( $id , $cat_type)
{
	$sql_pre = "DELETE FROM `$cat_type` WHERE `id` = ?i ";
	$array = array( $id );
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function content_delete( $id , $cat_type )
{
	$sql_pre = "DELETE FROM `$cat_type` WHERE `id` = ?i ";
	$array = array( $id );
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function file_delete( $id )
{
	$sql_pre = "DELETE FROM `yxy_downloadfile` WHERE `id` = ?i ";
	$array = array( $id );
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function case_add( $array )
{
	$sql_pre = "INSERT INTO `yxy_cases` (`title`, `category`, `time` , `description` , `content`) VALUES ( ?s , ?i , ?s , ?s , ?s) ";
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function law_add( $array )
{
	$sql_pre = "INSERT INTO `yxy_laws` (`title`, `lawcat`, `time` , `description` , `content`) VALUES ( ?s , ?i , ?s , ?s , ?s) ";
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function file_add( $array )
{
	$sql_pre = "INSERT INTO `yxy_downloadfile` (`filecat`, `filename`, `filepath`) VALUES ( ?s , ?s , ?s) ";
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function get_case_by_id( $id )
{
	$sql_pre = "SELECT `id` , `title` , `category` , `time` , `description` , `content` FROM `yxy_cases` WHERE `id` = ?i ";
	$array = array( $id );
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}

function get_law_by_id( $id )
{
	$sql_pre = "SELECT `id` , `title` , `lawcat` , `time` , `description` , `content` FROM `yxy_laws` WHERE `id` = ?i ";
	$array = array( $id );
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}

function case_edit( $array )
{
	$sql_pre = "UPDATE `yxy_cases` SET `title` = ?s , `category` = ?i , `time` = ?s , `description` = ?s , `content` = ?s WHERE `id` = ?i ";
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function law_edit( $array )
{
	$sql_pre = "UPDATE `yxy_laws` SET `title` = ?s , `lawcat` = ?i , `time` = ?s , `description` = ?s , `content` = ?s WHERE `id` = ?i ";
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

function update_pass( $user , $pass )
{
	$sql_pre = "UPDATE `yxy_master` SET `password` = ?s WHERE `username` = ?s ";
	$array = array( $pass , $user );
	$sql = prepare( $sql_pre , $array );
	return run_sql( $sql );
}

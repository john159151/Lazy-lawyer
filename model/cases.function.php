<?php
function get_all_cases()
{
	$sql = "SELECT `id` , `title`  , `category`  , `time` , `description` FROM `yxy_cases` ORDER BY time DESC ";
	return get_data( $sql );
}

function get_all_category()
{
	$sql = "SELECT `id` , `catname` FROM `yxy_casecat` ";
	return get_data( $sql );
}

function get_case_by_id( $caseid )
{
	$sql_pre = "SELECT `id` , `title`  , `category`  , `time` , `content` FROM `yxy_cases` WHERE `id` = ?i ";
	$array = array($caseid);
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}

function get_cases_by_cat( $casecat )
{
	$sql_pre = "SELECT `id` , `title`  , `category`  , `time` , `description` FROM `yxy_cases` WHERE `category` = ?i ORDER BY time DESC ";
	$array = array($casecat);
	$sql = prepare( $sql_pre , $array );
	return get_data( $sql );
}

function get_catname_by_cat( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_casecat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}
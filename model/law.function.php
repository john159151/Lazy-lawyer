<?php
function get_all_laws()
{
	$sql = "SELECT `id` , `title`  , `lawcat`  , `time` , `description` FROM `yxy_laws` ORDER BY time DESC ";
	return get_data( $sql );
}

function get_all_lawcat()
{
	$sql = "SELECT `id` , `catname` FROM `yxy_lawcat` ";
	return get_data( $sql );
}

function get_law_by_id( $caseid )
{
	$sql_pre = "SELECT `id` , `title`  , `lawcat`  , `time` , `content` FROM `yxy_laws` WHERE `id` = ?i ";
	$array = array($caseid);
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}

function get_laws_by_cat( $casecat )
{
	$sql_pre = "SELECT `id` , `title`  , `lawcat`  , `time` , `description` FROM `yxy_laws` WHERE `lawcat` = ?i ORDER BY time DESC ";
	$array = array($casecat);
	$sql = prepare( $sql_pre , $array );
	return get_data( $sql );
}

function get_catname_by_cat( $catid )
{
	$sql_pre = "SELECT `catname` FROM `yxy_lawcat` WHERE `id` = ?i";
	$array = array($catid);
	$sql = prepare( $sql_pre , $array );
	return get_var( $sql );
}
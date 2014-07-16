<?php
function get_user_info_by_id( $uid )
{
	$sql_pre = "SELECT `username` ,`password` FROM `user` WHERE `id` = ?i AND username = ?s LIMIT 1 ";
	$array = array('1',"haixiao");
	$sql = prepare( $sql_pre , $array );
	return get_line( $sql );
}

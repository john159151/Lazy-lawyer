<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class defaultController extends appController
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = $data['top_title'] = '首页';
		$data['filecats'] = get_limit_filecat();
		$i = 1;
		foreach ($data['filecats'] as $key => $value) {
			$catid[$i] = $value['id'];
			$data['filecontent'][$i] = get_files_by_cat( $catid[$i] );
			$data['catname'][$i] = get_filecatname( $catid[$i] );
			$i++;
		}
		render( $data );
	}
	
	function contacts()
	{
		$data['title'] = $data['top_title'] = '联系方式';
		render( $data );
	}
	
}
	
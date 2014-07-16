<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class downloadfileController extends appController
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = $data['top_title'] = '文档下载';
		$data['allfile'] = get_all_file();
		$data['categorys'] = get_all_cat();
		render( $data );
	}

	function filescat()
	{
		$filecat = v( 'cat' );
		$data['filecat'] = $filecat;
		$data['catename'] = get_name_by_filecat( $filecat );
		$data['catfiles'] = get_files_by_cat( $filecat );
		$data['categorys'] = get_all_cat();
		$data['title'] = $data['top_title'] = $data['catename'];
		render( $data );
	}
}
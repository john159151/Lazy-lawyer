<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class lawController extends appController
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = $data['top_title'] = '法律法规';
		$data['allcase'] = get_all_laws();
		$data['categorys'] = get_all_lawcat();
		render( $data );
	}

	function lawcat()
	{
		$casecat = v( 'cat' );
		$data['catid'] = $casecat;
		$data['catname'] = get_catname_by_cat( $casecat );
		$data['casecat'] = get_laws_by_cat( $casecat );
		$data['categorys'] = get_all_lawcat();
		$data['title'] = $data['top_title'] = $data['catname'];
		render( $data );
	}

	function lawdetail()
	{
		$caseid = v( 'num' );
		$data['casecontent'] = get_law_by_id( $caseid );
		$data['categorys'] = get_all_lawcat();
		$data['catename'] = get_catname_by_cat( $data['casecontent']['category'] );
		$data['title'] = $data['top_title'] = $data['casecontent']['title'];
		render( $data );
	}
}
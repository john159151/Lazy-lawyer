<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class casesController extends appController
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = $data['top_title'] = '案例展示';
		$data['allcase'] = get_all_cases();
		$data['categorys'] = get_all_category();
		render( $data );
	}

	function casecat()
	{
		$casecat = v( 'cat' );
		$data['catid'] = $casecat;
		$data['catname'] = get_catname_by_cat( $casecat );
		$data['casecat'] = get_cases_by_cat( $casecat );
		$data['categorys'] = get_all_category();
		$data['title'] = $data['top_title'] = $data['catname'];
		render( $data );
	}

	function casedetail()
	{
		$caseid = v( 'num' );
		$data['casecontent'] = get_case_by_id( $caseid );
		$data['categorys'] = get_all_category();
		$data['catename'] = get_catname_by_cat( $data['casecontent']['category'] );
		$data['title'] = $data['top_title'] = $data['casecontent']['title'];
		render( $data );
	}
}
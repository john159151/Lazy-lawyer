<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class backeditController extends appController
{
	function __construct()
	{
		parent::__construct();
		if_login();
	}

	function index()
	{
		$data['title'] = $data['top_title'] = '网站后台';
		render( $data , 'web' , 'editcontent');
	}

	function lists(){
		$item = v('item');
		switch ($item) {
			case 'casecat':
				$data['contents'] = show_cat( 'yxy_casecat' );
				$data['h1title'] = '案例分类管理';
				break;
			
			case 'caseslist':
				$data['contents'] = show_cases();
				$data['h1title'] = '案例管理';
				break;

			case 'lawcat':
				$data['contents'] = show_cat( 'yxy_lawcat' );
				$data['h1title'] = '法律法规分类管理';
				break;
			
			case 'lawlist':
				$data['contents'] = show_laws();
				$data['h1title'] = '法律法规管理';
				break;
			
			case 'filecat':
				$data['contents'] = show_cat( 'yxy_filecat' );
				$data['h1title'] = '文档分类管理';
				break;
			
			case 'filelist':
				$data['contents'] = show_files();
				$data['filecat'] = get_all_filecat();
				$data['h1title'] = '文档管理';
				break;
			
			default:
				$data['contents'] = show_cases();
				break;
		}
		$data['title'] = $data['top_title'] = '网站后台';
		$data['itemname'] = $item;
		render( $data , 'web' , 'editcontent');
	}

	function deletecontent()
	{
		$type = v( 'type' );
		$catid = v( 'num' );
		switch ($type) {
			case 'casecat':
				$cat_type = 'yxy_casecat';
				break;
			case 'lawcat':
				$cat_type = 'yxy_lawcat';
				break;
			case 'filecat':
				$cat_type = 'yxy_filecat';
				break;
			case 'caseslist':
				$cat_type = 'yxy_cases';
				break;
			case 'lawlist':
				$cat_type = 'yxy_laws';
				break;
			case 'filelist':
				$cat_type = 'yxy_downloadfile';
				break;
			default:
				break;
		}

		$result = cat_delete( $catid , $cat_type );
		//header("Content-type: text/html; charset=utf-8");
		echo "<script>";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function addcat()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = v( 'type' );
		$catname = v( 'catname' );
		if ($type == 'casecat') {
			$cat_type = 'yxy_casecat';
		}
		else if($type == 'lawcat'){
			$cat_type = 'yxy_lawcat';
		}
		else if($type == 'filecat'){
			$cat_type = 'yxy_filecat';
		}
		$result = cat_add( $catname , $cat_type );
		echo "<script>";
		echo "alert('添加分类成功');";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function addcase()
	{
		$data['title'] = $data['top_title'] = '网站后台';
		$data['itemname'] = '添加案例';
		$data['casecat'] = get_all_casecat();
		render( $data , 'web' , 'editcontent');
	}

	function saveaddcase()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = 'caseslist';
		$title = v( 'title' );
		$casecat = v( 'casecat' );
		$time = v( 'time' );
		$description = v( 'description' );
		$content = v( 'content' );
		$array = array( $title , $casecat , $time , $description , $content);
		$result = case_add( $array );

		echo "<script>";
		echo "alert('添加案例成功');";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function editcase()
	{
		$num = v( 'num' );
		$data['title'] = $data['top_title'] = '网站后台';
		$data['itemname'] = '编辑案例';
		$data['casecat'] = get_all_casecat();
		$data['casenow'] = get_case_by_id( $num );
		render( $data , 'web' , 'editcontent');
	}

	function saveeditcase()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = 'caseslist';
		$num = v( 'num' );
		$title = v( 'title' );
		$casecat = v( 'casecat' );
		$time = v( 'time' );
		$description = v( 'description' );
		$content = v( 'content' );
		$array = array( $title , $casecat , $time , $description , $content ,$num);
		$result = case_edit( $array );

		echo "<script>";
		echo "alert('编辑案例成功');";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function addlaw()
	{
		$data['title'] = $data['top_title'] = '网站后台';
		$data['itemname'] = '添加法律主题';
		$data['casecat'] = get_all_lawcat();
		render( $data , 'web' , 'editcontent');
	}

	function saveaddlaw()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = 'lawlist';
		$title = v( 'title' );
		$lawcat = v( 'lawcat' );
		$time = v( 'time' );
		$description = v( 'description' );
		$content = v( 'content' );
		$array = array( $title , $lawcat , $time , $description , $content);
		$result = law_add( $array );

		echo "<script>";
		echo "alert('添加法律法规成功');";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function editlaw()
	{
		$num = v( 'num' );
		$data['title'] = $data['top_title'] = '网站后台';
		$data['itemname'] = '编辑法律主题';
		$data['casecat'] = get_all_lawcat();
		$data['casenow'] = get_law_by_id( $num );
		render( $data , 'web' , 'editcontent');
	}

	function saveeditlaw()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = 'lawlist';
		$num = v( 'num' );
		$title = v( 'title' );
		$lawcat = v( 'lawcat' );
		$time = v( 'time' );
		$description = v( 'description' );
		$content = v( 'content' );
		$array = array( $title , $lawcat , $time , $description , $content ,$num);
		$result = law_edit( $array );

		echo "<script>";
		echo "alert('编辑法律法规成功');";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
	}

	function addfile()
	{
		header("Content-type: text/html; charset=utf-8");
		$type = v( 'type' );
		$filename = v( 'filename' );
		$filecat = v( 'filecat' );

		$file_type = explode('.', $_FILES["file"]["name"]);
		$save_name = time() . '.' . $file_type[1];

		$path = AROOT."static/upload/" . $save_name;
		$data_path = "static/upload/" . $save_name;
		if (file_exists($path)) {
			echo "<script>";
	      	echo "alert('上传出错，存在同名文件！')";
	      	echo "</script>";
		}
		else{
			if($_FILES["file"]["error"] == 0) 
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], $path);
				$array = array( $filecat , $filename , $data_path);
				$result = file_add( $array );
			}
			else
			{
				echo "<script>";
		      	echo "alert('上传出错！')";
		      	echo "</script>";
			}
		}
		echo "<script>";
      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=lists&item=".$type."' ";
      	echo "</script>";
		
	}

	function changepass()
	{
		$data['title'] = $data['top_title'] = '网站后台';
		render( $data , 'web' , 'editcontent');
	}

	function checkpass()
	{
		header("Content-type: text/html; charset=utf-8");
		$oldpass = v( 'oldpassword' );
		$newpass = v( 'newpassword' );
		session_start();
		$username = $_SESSION['user'];
		$user_info = get_master_info( $username );

		$realpass = md5($oldpass);
		if ($realpass == $user_info['password']) {
			$final_pass = md5($newpass);
			$result = update_pass( $username , $final_pass );
			session_unset();
			session_destroy();
			echo "<script>";
			echo "alert('密码修改成功');";
	      	echo "window.location.href = '".c( $site_url )."?c=login'";
	      	echo "</script>";
		}
		else{
			echo "<script>";
			echo "alert('原密码输入错误！');";
	      	echo "window.location.href = '".c( $site_url )."?c=backedit&a=changepass'";
	      	echo "</script>";
		}
	}

}
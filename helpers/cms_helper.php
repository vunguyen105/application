<?php
function is_success_flashdata() {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'success' ) != false) ? true : false;
}
function is_warning_flashdata() {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'warning' ) != false) ? true : false;
}
function is_info_flashdata() {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'info' ) != false) ? true : false;
}
function is_error_flashdata() {
	$CI = & get_instance ();
	return ($CI->session->flashdata ( 'error' ) != false) ? true : false;
}
function is_login() {
        $CI = & get_instance ();
	$is_logged = $CI->session->userdata ( 'loggedin' );
	return (($is_logged) && $is_logged == true) ? true : false;
}
function is_login_front() {
        $CI = & get_instance ();
	$is_logged = $CI->session->userdata ( 'logged' );
	return (($is_logged) && $is_logged == true) ? true : false;
}
function build_menu() {
	$CI = & get_instance ();
	$CI->load->model ( 'menu_m' );
	$menu = $CI->menu_m->get ();
	$sub = '';
	if (empty ( $menu ))
		return false;
	foreach ( $menu as $key => $value ) {
		$sub .= '<li class="dd-item dd3-item"><span style="float: right"><i class="icon-plus"></i><i class="icon-pencil"></i>';
		$sub .= '<i class="icon-trash"></i>';
		$sub .= '</span>';
		$sub .= '<div class="dd-handle dd3-handle"></div>';
		$sub .= '<div data-menu-id="' . $value ['MenuID'] . '"class="dd3-content">' . $value ['MenuName'] . '</div>';
	}
	return $sub;
}

if ( ! function_exists('stripUnicode_slug'))
{
	function stripUnicode_slug($str) {
		if(!$str) return false;
   		$unicode = array(
      		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
      		'd'=>'đ',
      		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
      		'i'=>'í|ì|ỉ|ĩ|ị',
      		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
      		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
      		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                '-'=>' ',
   		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
			return $str;
	}
}


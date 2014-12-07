<?php
class menu extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'menu_m' );
		$this->load->model ( 'menucate_m' );
		$this->load->library ( 'pagination' );
		$this->load->library ( 'category_lib' );
		$this->new_nested_set = $this->category_lib->category_initialize ();
	}
	
	function index() {
		
		$cateInMenu = $this->menucate_m->getCateMenu(1);
		$inCat = array();
		foreach ($cateInMenu as $k => $v) {
			$inCat[] = $v['CateID'];
		}
		//var_dump($cateInMenu);die;
		$menu = $this->new_nested_set->build_menu_category( 1, $inCat, 1, $cateInMenu);
		echo $menu;
	}
	
	function show_menu() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$cateInMenu = $this->menucate_m->getCateMenu($post['id']);
			$inCat = array();
			foreach ($cateInMenu as $k => $v) {
				$inCat[] = $v['CateID'];
			}
			//var_dump($cateInMenu);die;
			$menu = $this->new_nested_set->build_menu_category( 1, $inCat, $post['id'], $cateInMenu);
			echo $menu;
		}
	}
	function view() {
		
		$this->template->add_title ( 'Categories' );
		
		$this->template->write ( 'title', 'Categories' );
		$this->template->write ( 'desption', 'Thư mục' );
		$data ['menu'] = $this->menu_m->get();
		$this->load->model('menucate_m');
		$data['menu_detail'] = $this->menucate_m->get_by('MenuID', 1);
		//var_dump($data['menu_detail']);die;
		
		$this->template->write_view ( 'content', 'menu/menu_view', $data, true );
		$this->template->render ();
	}
	function menu_new() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$insert = array(
							'MenuName' => $post['name'],		
					);
			$this->menu_m->save($insert);
			$data ['menu'] = build_menu ();
			echo $data ['menu'];
			die ();
		}
	}
	
	function menu_add_category() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$insert = array(
					'CateID' => $post['CateID'],
					'MenuID' => $post['MenuID'],
			);
			$this->load->model('menucate_m');
			$this->menucate_m->save($insert);
			$cateInMenu = $this->menucate_m->getCateMenu($post['MenuID']);
			$inCat = array();
			foreach ($cateInMenu as $k => $v) {
				$inCat[] = $v['CateID'];
			}
			$menu = $this->new_nested_set->build_menu_notID ( 1, $inCat, $post['MenuID']);
			echo $menu;
			die;
		}
	}
	public function category_load_menu_notID() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$this->load->model('menucate_m');
			$cateInMenu = $this->menucate_m->getCateMenu($post['id']);
			$inCat = array();
			foreach ($cateInMenu as $k => $v) {
				$inCat[] = $v['CateID'];
			}
			$menu = $this->new_nested_set->build_menu_notID ( 1, $inCat, $post['id']);
			echo $menu;
			die ();
		}
	}
	
	public function menu_update() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$data = array(
							'MenuName' => $post['name'],		
			);
			$where = array(
							'MenuID' => $post['id'],
			);
			$this->menu_m->save($data, TRUE, FALSE, $where );
		}
	}
}	
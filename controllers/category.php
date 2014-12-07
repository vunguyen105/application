<?php
class category extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
		$this->load->library ( 'category_lib' );
		$this->new_nested_set = $this->category_lib->category_initialize ();
	}
	public function view() {
		$this->template->add_title ( 'Categories' );
		$this->template->write ( 'title', 'Categories' );
		$this->template->write ( 'desption', 'Thư mục' );
		$data ['subs'] = $this->new_nested_set->getChildOfTree ();
		if (isset ( $data ['subs'] [0] )) {
			$data ['sub_menu'] = $this->new_nested_set->build_menu ( $data ['subs'] [0] ['id'] );
		}
		$this->template->write_view ( 'content', 'category/view_category', $data, true );
		$this->template->render ();
	}
	public function category_update() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$nodes = array (
					'id' => $post ['id'],
					'rgt' => $post ['right'],
					'lft' => $post ['left'] 
			);
			$name = array (
					'name' => $post ['name'] 
			);
			$this->load->model ( 'category_m' );
			$return = $this->category_m->save ( $name, TRUE, FALSE, $nodes );
			die ();
		}
	}
	public function category_del() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$node = array (
					'id' => $post ['id'],
					'rgt' => $post ['right'],
					'lft' => $post ['left'] 
			);
			$this->new_nested_set->deleteNode ( $node );
			$menu = $this->new_nested_set->build_menu ( $post ['menu_id'] );
			echo $menu;
		}
	}
	public function category_add() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$nodes = array (
					'id' => $post ['id'],
					'rgt' => $post ['left'],
					'lft' => $post ['right'] 
			);
			$return = $this->new_nested_set->appendNewChild ( $nodes, array (
					'name' => $post ['name'] 
			) );
			$menu = $this->new_nested_set->build_menu ( $post ['menu_id'] );
			echo $menu;
			die ();
		}
	}
	public function category_move() {
		if ($this->input->is_ajax_request ()) {
			$list = $this->input->post ( 'tmp' );
			$id_menu = ( int ) $this->input->post ( 'id_menu' );
			$nodes = $this->new_nested_set->getNodeFromId ( $id_menu );
			$root_nodes1 = $this->new_nested_set->getSubTree ( $nodes );
			$item_old = $this->new_nested_set->Item_List_Node ( $id_menu, $root_nodes1 );
			$root_nodes = $this->new_nested_set->getSubTree_int ( $nodes );
			$parents_old = $root_nodes ['parents'];
			$list_item_parent = json_decode ( $list, true );
			$parents_new = $this->category_lib->multiarray_children ( $list_item_parent, $id_menu );
			$item_new = $this->category_lib->multiarray_values ( $list_item_parent, 'id' );
			$khac = $this->category_lib->compare ( $item_old, $item_new );
			if ($khac != false) {
				$parents_compare = $this->category_lib->parents_compare ( $parents_old, $parents_new, $khac, $item_new );
				$update = $this->category_lib->update_cat ( $parents_compare );
				$nodes = $this->new_nested_set->getNodeFromId ( $update ['id'] );
				if (isset ( $update ['parents'] )) {
					$target = $this->new_nested_set->getNodeFromId ( $update ['parents'] );
					$this->new_nested_set->setNodeAsFirstChild ( $nodes, $target );
				}
				if (isset ( $update ['next'] )) {
					$target = $this->new_nested_set->getNodeFromId ( $update ['next'] );
					$this->new_nested_set->setNodeAsNextSibling ( $nodes, $target );
				}
			} else {
				unset ( $parents_old ['0'] );
				$tuan = $this->category_lib->children_compare ( $parents_old, $parents_new, $item_old );
				if (isset ( $tuan ["parent"] )) {
					$nodes = $this->new_nested_set->getNodeFromId ( $tuan ["id"] ['0'] );
					$target = $this->new_nested_set->getNodeFromId ( $tuan ["parent"] );
					$this->new_nested_set->setNodeAsFirstChild ( $nodes, $target );
				}
				if (isset ( $tuan ["next"] )) {
					$nodes = $this->new_nested_set->getNodeFromId ( $tuan ["id"] ['0'] );
					$target = $this->new_nested_set->getNodeFromId ( $tuan ["next"] );
					$this->new_nested_set->setNodeAsNextSibling ( $nodes, $target );
				}
			}
			$nodes = $this->new_nested_set->getNodeFromId ( $id_menu );
			$root_nodes1 = $this->new_nested_set->getSubTree ( $nodes );
			$class = array (
					'ol' => 'dd-list',
					'li' => 'dd-item',
					'div' => 'dd-handle' 
			);
			$data ['menu'] = $this->new_nested_set->Menu_Bootstrap ( $id_menu, $root_nodes1, $class );
			echo $data ['menu'];
			die ();
		}
	}
	public function menu_new() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$sub_menu = $this->new_nested_set->getRootNodes ();
			$return = $this->new_nested_set->insertNewTree ( array (
					'name' => $post ['name'] 
			) );
			$data ['subs'] = $this->new_nested_set->build_sub_menu ();
			echo $data ['subs'];
			die ();
		}
	}
	public function category_load_menu() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$menu = $this->new_nested_set->build_menu ( $post ['id'] );
			echo $menu;
			die ();
		}
	}
	
	public function category_load() {
		if ($this->input->is_ajax_request ()) {
			$data ['subs'] = $this->new_nested_set->build_sub_menu ();
			echo $data ['subs'];
			die ();
		}
	}
	public function children_new() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$data = array (
					'name' => $post ['name'] 
			);
			$nodes = array (
					'id' => ( int ) $post ['id'],
					'rgt' => ( int ) $post ['right'],
					'lft' => ( int ) $post ['left'] 
			);
			$node = $this->new_nested_set->appendNewChild ( $nodes, $data );
			$menu = $this->new_nested_set->build_menu ( $post ['id'] );
			echo $menu;
			die ();
		}
	}
	public function menu_del() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$node = array (
					'id' => $post ['id'],
					'rgt' => $post ['right'],
					'lft' => $post ['left'] 
			);
			$this->new_nested_set->deleteNode ( $node );
			$data ['subs'] = $this->new_nested_set->build_sub_menu ();
			echo $data ['subs'];
			die ();
		}
	}
}

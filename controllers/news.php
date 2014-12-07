<?php
class news extends Backend_Controller {
	function __construct() {
		parent::__construct ();
        $this->load->library ( 'session' );
		$this->load->model ( 'news_m' );
		$this->load->library ( 'pagination' );
	}
	public function view() {
		$this->template->add_title ( 'Thống kê tin tức' );
		$this->template->write ( 'title', 'Thống kê tin tức' );
		$this->template->write ( 'desption', 'Thống kê tin tức' );
		$config ['base_url'] = base_url () . "news/view?";
		$config ['per_page'] = PERPAGA;
		if ($this->input->is_ajax_request ()) {
			$data ['start'] = ($this->input->get ( 'page' ) == FALSE) ? 0 : ( int ) $this->input->get ( 'page' );
			$data ['count'] = $config ['total_rows'] = $this->news_m->get ( FALSE, TRUE );
			$this->news_m->set_start($data['start']);
            $data['news'] = $this->news_m->get();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$ajax = $this->load->view ( 'news/news_ajax_index', $data, true );
			echo $ajax;
		} else {
			$data ['count'] = $config ['total_rows'] = $this->news_m->get ( FALSE, TRUE );
			$this->news_m->set_start();
                        $data['news'] = $this->news_m->get();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$this->template->write_view ( 'content', 'news/view', $data, true );
			$this->template->render ();
		}
	}
	public function news_del() {
		if ($this->input->is_ajax_request ()) {
			$id = $this->input->post ( 'id' );
			$no = $this->input->post ( 'no' );
			$page = $this->input->post ( 'page' );
			$return = $this->news_m->delete ( $id );
			if ($return) {
				$config ['base_url'] = base_url () . "news/view?";
				$config ['per_page'] = PERPAGA;
				$data ['count'] = $config ['total_rows'] = $this->news_m->get ( FALSE, TRUE );
				$data ['start'] = 0;
				if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
				$this->news_m->set_start($data ['start']);
				$data ['news'] = $this->news_m->get ();
				$this->pagination->initialize ( $config );
				$data ['pagination'] = $this->pagination->create_links ();
				$ajax = $this->load->view ( 'news/news_ajax_index', $data, true );
				echo $ajax;
			}
		}
	}
	public function news_create() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$insert = array (
					'NewTitle' => $post ['NewTitle'],
					'NewContent' => $post ['NewContent']
			);
			$rules = $this->news_m->rules;
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run () == TRUE) {
				$return = $this->news_m->save ( $insert );
				if ($return)
					echo json_encode ( array (
							'msg' => 'Thêm bài viết mới thành công' 
					) );
				die ();
			} else {
				echo json_encode ( array (
						'msg' => 'Chưa nhập dữ liệu nhập vào hoặc nhập sai dữ liệu' ,
                                                'error' => validation_errors_array()
				) );
				die;
			}
			// $this->load->model ( 'news_m' );
			// $this->db->select_max ( 'proid' );
			// $id_max = $this->news_m->get ();
			// // var_dump($id_max);die;
			// if (! empty ( $post ['imgs'] )) {
			// $image = array ();
			// foreach ( $post ['imgs'] as $key => $value ) {
			// $img = array (
			// 'file_name' => $value,
			// 'id_pro' => ( int ) $id_max [0] ['id']
			// );
			// $image [] = $img;
			// }
			// $this->load->model ( 'files_m' );
			// $this->files_m->save ( $image, FALSE, TRUE );
			// }
		} else {
			$data = array ();
			$this->template->add_title ( 'Tạo Tin tức' );
			$this->template->write ( 'title', '' );
			$this->template->write ( 'desption', 'Tạo Tin tức' );
			$this->load->helper ( array (
					'url',
					'editor_helper' 
			) );
			$this->load->model ( 'category_m' );
			$this->db->order_by ( 'id' );
			$this->db->where ( 'parent_id <>', 0 );
			$data ['cats'] = $this->category_m->get ();
			$data ['ckediter'] = $this->ckeditor->replace ( "demo", editerGetEnConfig () );
			$this->template->write_view ( 'content', 'news/new_create', $data, true );
			$this->template->render ();
		}
	}
	public function edit($id) { 
		$data = array ();
		$data['news'] = $this->news_m->get($id);
		//var_dump($data['news']);die;
		//if($id == null || empty($data['news'])) redirect('news/view');
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'ProName' => $post ['proname'],
					'ProPrice' => $post ['price'],
					'ProQuantity' => $post ['quantity'],
					'CateID' => $post ['cat'],
					'ProDesc' => $post ['descr'] 
			);
			$rules = $this->news_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->news_m->save( $pro, $post['id']);
				if ($return)
					echo json_encode ( array (
							'msg' => 'update successfully' 
					) );
				die ();
			} else {
				echo json_encode ( array (
						'msg' => 'chưa nhập dữ liệu nhập vào hoặc nhập sai dữ liệu' 
				) );
				die ();
			}
		} else {
			$this->template->add_title ( 'Chỉnh sửa bài viết' );
			$this->template->write ( 'title', '' );
			$this->template->write ( 'desption', 'Chỉnh sửa bài viết' );
			$this->load->helper ( array ('url','editor_helper') );
			$data ['ckediter'] = $this->ckeditor->replace ( "demo", editerGetEnConfig () );
			$this->template->write_view ( 'content', 'news/news_edit', $data, true );
			$this->template->render ();
		}
	}
}

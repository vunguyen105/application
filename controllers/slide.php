<?php
class slide extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'slide_m' );
		$this->load->library ( 'pagination' );
	}
	public function view() {
		$this->template->add_title ( 'Thống kê Slide' );
		$this->template->write ( 'title', 'Thống kê Slide' );
		$this->template->write ( 'desption', 'Thống kê Slide' );
		$config ['base_url'] = base_url () . "slide/view?";
		$config ['per_page'] = PERPAGA;
		if ($this->input->is_ajax_request ()) {
			$data ['start'] = ($this->input->get ( 'page' ) == FALSE) ? 0 : ( int ) $this->input->get ( 'page' );
			$data ['count'] = $config ['total_rows'] = $this->slide_m->get ( FALSE, TRUE );
			$this->slide_m->set_start($data['start']);
                        $data['slides'] = $this->slide_m->get();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$ajax = $this->load->view ( 'slide/slide_ajax_index', $data, true );
			echo $ajax;
		} else {
			$data ['count'] = $config ['total_rows'] = $this->slide_m->get ( FALSE, TRUE );
			$this->slide_m->set_start();
                        $data['slides'] = $this->slide_m->get();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$this->template->write_view ( 'content', 'slide/view', $data, true );
			$this->template->render ();
		}
	}
	public function slide_del() {
		if ($this->input->is_ajax_request ()) {
			$id = $this->input->post ( 'id' );
			$no = $this->input->post ( 'no' );
			$page = $this->input->post ( 'page' );
			$return = $this->slide_m->delete ( $id );
			if ($return) {
				$config ['base_url'] = base_url () . "slide/view?";
				$config ['per_page'] = PERPAGA;
				$data ['count'] = $config ['total_rows'] = $this->slide_m->get ( FALSE, TRUE );
				$data ['start'] = 0;
				if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
				$this->slide_m->set_start($data ['start']);
				$data ['slides'] = $this->slide_m->get ();
				$this->pagination->initialize ( $config );
				$data ['pagination'] = $this->pagination->create_links ();
				$ajax = $this->load->view ( 'slide/slide_ajax_index', $data, true );
				echo $ajax;
			}
		}
	}
	public function slide_create() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();  
			$insert = array (
					'SlideTitle' => $post ['SlideTitle'],
					'SlideContent' => $post ['SlideContent'],
                                        'SlideStt' => $post ['SlideStt'],
                                        'SlideDate' => date("Y-m-d H:i:s"),
			);
                        if(!empty($post ['SlidePicName'][0]))  $insert['SlidePicName'] = $post ['SlidePicName'][0]; 
                        else $insert['SlidePicName'] = 'Images/default.jpg';
			$rules = $this->slide_m->rules;
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run () == TRUE) {
				$return = $this->slide_m->save ( $insert );
				if ($return)
					echo json_encode ( array (
							'msg' => 'Thêm slide mới thành công' 
					) );
				die ();
			} else {
				echo json_encode ( array (
						'msg' => 'Chưa nhập dữ liệu nhập vào hoặc nhập sai dữ liệu' ,
                                                'error' => validation_errors_array()
				) );
				die;
			}
		} else {
			$data = array ();
			$this->template->add_title ( 'Tạo Slide' );
			$this->template->write ( 'title', '' );
			$this->template->write ( 'desption', 'Tạo Slide' );
			$this->load->helper ( array (
					'url',
					'editor_helper' 
			) );
			$this->load->model ( 'category_m' );
			$this->db->order_by ( 'id' );
			$this->db->where ( 'parent_id <>', 0 );
			$data ['cats'] = $this->category_m->get ();
			$data ['ckediter'] = $this->ckeditor->replace ( "demo", editerGetEnConfig () );
			$this->template->write_view ( 'content', 'slide/slide_create', $data, true );
			$this->template->render ();
		}
	}
	public function edit($id) { 
		$data = array ();
		$data['slides'] = $this->slide_m->get($id);
		//var_dump($data['news']);die;
		//if($id == null || empty($data['news'])) redirect('news/view');
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'SlideTitle' => $post ['SlideTitle'],
					'SlideContent' => $post ['SlideContent'],
					'SlideStt' => $post ['SlideStt']
			);
			$rules = $this->slide_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->slide_m->save( $pro, $post['id']);
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
			$this->template->add_title ( 'Chỉnh sửa slide' );
			$this->template->write ( 'title', '' );
			$this->template->write ( 'desption', 'Chỉnh sửa slide' );
			$this->load->helper ( array ('url','editor_helper') );
			$data ['ckediter'] = $this->ckeditor->replace ( "demo", editerGetEnConfig () );
			$this->template->write_view ( 'content', 'slide/slide_edit', $data, true );
			$this->template->render ();
		}
	}
}

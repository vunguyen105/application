<?php
class size extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'size_m' );
		$this->load->library ( 'pagination' );
	}
	public function view() {
		$this->template->add_title ( 'Thống kê kích thước' );
		$this->template->write ( 'title', 'Thống kê kích thước' );
		$this->template->write ( 'desption', 'Thống kê kích thước' );
		$config ['base_url'] = base_url () . "size/view?";
		$config ['per_page'] = PERPAGA;
		if ($this->input->is_ajax_request ()) {
			$data ['start'] = ($this->input->get ( 'page' ) == FALSE) ? 0 : ( int ) $this->input->get ( 'page' );
			$data ['count'] = $config ['total_rows'] = $this->size_m->get ( FALSE, TRUE );
			$this->size_m->set_start($data ['start']);
			$data ['sizes'] = $this->size_m->get ();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$ajax = $this->load->view ( 'size/size_ajax', $data, true );
			echo $ajax;
		} else {
			$data ['count'] = $config ['total_rows'] = $this->size_m->get ( FALSE, TRUE );
			$this->size_m->set_start();
			$data ['sizes'] = $this->size_m->get ();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
            //print_r($data ['pagination']); die;
			$this->template->write_view ( 'content', 'size/view', $data, true );
			$this->template->render ();
		}
	}
	public function size_del() {
		if ($this->input->is_ajax_request ()) {
			$id = $this->input->post ( 'id' );
			$no = $this->input->post ( 'no' );
			$page = $this->input->post ( 'page' );
			$return = $this->size_m->delete( $id );
			if ($return) {
				$config ['base_url'] = base_url () . "size/view?";
				$config ['per_page'] = PERPAGA;
				$data ['count'] = $config ['total_rows'] = $this->size_m->get ( FALSE, TRUE );
				$data ['start'] = 0;
				if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
				$this->size_m->set_start( $data ['start'] );
				$data ['sizes'] = $this->size_m->get ();
				$this->pagination->initialize ( $config );
				$data ['pagination'] = $this->pagination->create_links ();
				$ajax = $this->load->view ( 'size/size_ajax', $data, true );
				echo $ajax;
			}
		}
	}
	public function create() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'SizeName' => $post ['SizeName']
			);
			$rules = $this->size_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->size_m->save( $pro);
				if ($return)
					echo json_encode ( array (
							'msg' => 'Tạo kích thước thành công' 
					) );
				die ();
			} else {
				echo json_encode ( array (
						'msg' => 'chưa nhập dữ liệu nhập vào hoặc nhập sai dữ liệu' ,
                                                'error' => validation_errors_array()
				) );
				die;
			}
		} else {
			$data = array ();
			$this->template->add_title ( 'Tạo kích thước' );
			$this->template->write ( 'title', 'Tạo kích thước' );
			$this->template->write ( 'desption', 'Tạo kích thước' ); 
			$this->template->write_view ( 'content', 'size/size_create', $data, true );
			$this->template->render ();
		}
	}
	public function edit($id) { 
		if(empty($id)) redirect('size/view');
		$data = array ();
        $id1 = $this->uri->segment(4);
		$data['sizes'] = $this->size_m->get($id);
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'SizeName' => $post ['SizeName'],
			);
			$rules = $this->size_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->size_m->save( $pro, $post ['SizeId']);
				if($return)
					echo json_encode ( array (
							'msg' => $id1 
					) );
				die ();
			} else {
				echo json_encode ( array (
						'msg' => 'chưa nhập dữ liệu nhập vào hoặc nhập sai dữ liệu' ,
                                                'error' => validation_errors_array()
				) );
				die;
			}
		} else {
			$this->template->add_title ( 'Chỉnh sửa kích thước' );
			$this->template->write ( 'title', 'Chỉnh sửa kích thước' );
			$this->template->write ( 'desption', 'Chỉnh sửa kích thước' );
			$this->load->helper ( array ('url','editor_helper') );
			$this->template->write_view ( 'content', 'size/size_edit', $data, true );
			$this->template->render ();
		}
	}
}

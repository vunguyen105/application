<?php
class customer extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'customer_m' );
		$this->load->library ( 'pagination' );
	}
	public function view() {
		$this->template->add_title ( 'Thống kê người dùng' );
		$this->template->write ( 'title', 'Thống kê người dùng' );
		$this->template->write ( 'desption', 'Thống kê người dùng' );
		$config ['base_url'] = base_url () . "customer/view?";
		$config ['per_page'] = PERPAGA;
		if ($this->input->is_ajax_request ()) {
			$data ['start'] = ($this->input->get ( 'page' ) == FALSE) ? 0 : ( int ) $this->input->get ( 'page' );
			$data ['count'] = $config ['total_rows'] = $this->customer_m->get ( FALSE, TRUE );
			$this->customer_m->set_start($data ['start']);
			$data ['customers'] = $this->customer_m->get ();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$ajax = $this->load->view ( 'customer/customer_ajax', $data, true );
			echo $ajax;
		} else {
			$data ['count'] = $config ['total_rows'] = $this->customer_m->get ( FALSE, TRUE );
			$this->customer_m->set_start();
			$data ['customers'] = $this->customer_m->get ();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$this->template->write_view ( 'content', 'customer/view', $data, true );
			$this->template->render ();
		}
	}
	public function customer_del() {
		if ($this->input->is_ajax_request ()) {
			$id = $this->input->post ( 'id' );
			$no = $this->input->post ( 'no' );
			$page = $this->input->post ( 'page' );
			$return = $this->customer_m->delete( $id );
			if ($return) {
				$config ['base_url'] = base_url () . "customer/view?";
				$config ['per_page'] = PERPAGA;
				$data ['count'] = $config ['total_rows'] = $this->customer_m->get ( FALSE, TRUE );
				$data ['start'] = 0;
				if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
				$this->customer_m->set_start( $data ['start'] );
				$data ['customers'] = $this->customer_m->get ();
				$this->pagination->initialize ( $config );
				$data ['pagination'] = $this->pagination->create_links ();
				$ajax = $this->load->view ( 'customer/customer_ajax', $data, true );
				echo $ajax;
			}
		}
	}
	public function create() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'CusUser' => $post ['CusUser'],
					'CusEmail' => $post ['CusEmail'],
					'CusAdd' => $post ['CusAdd'],
                                        'CusName' => $post ['CusName'],
                                        'CusPhone' => $post ['CusPhone'],
                                        'CusPass' => md5($post ['CusPass']),
			);
			$rules = $this->customer_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->customer_m->save( $pro);
				if ($return)
					echo json_encode ( array (
							'msg' => 'Tạo tài khoản thành công' 
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
			$this->template->add_title ( 'Tạo tài khoản người dùng' );
			$this->template->write ( 'title', 'Tạo tài khoản người dùng' );
			$this->template->write ( 'desption', 'Tạo tài khoản người dùng' ); 
			$this->template->write_view ( 'content', 'customer/customer_create', $data, true );
			$this->template->render ();
		}
	}
	public function edit($id) { 
		if(empty($id)) redirect('customer/view');
		$data = array ();
		$data['customers'] = $this->customer_m->get($id);
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'CusUser' => $post ['CusUser'],
					'CusEmail' => $post ['CusEmail'],
					'CusAdd' => $post ['CusAdd'],
                                        'CusName' => $post ['CusName'],
                                        'CusPhone' => $post ['CusPhone'],
                                        'CusPass' => md5($post ['CusPass']),
			);
			$rules = $this->customer_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->customer_m->savesave( $pro, $post['id']);
				if($return)
					echo json_encode ( array (
							'msg' => 'Sửa thông tin tài khoản thành công' 
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
			$this->template->add_title ( 'Chỉnh sửa tài khoản' );
			$this->template->write ( 'title', 'Chỉnh sửa tài khoản' );
			$this->template->write ( 'desption', 'Chỉnh sửa tài khoản' );
			$this->load->helper ( array ('url','editor_helper') );
			$this->template->write_view ( 'content', 'customer/customer_edit', $data, true );
			$this->template->render ();
		}
	}
}

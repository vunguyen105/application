<?php
class news extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'news_m' );
		$this->load->library ( 'pagination' );
	}
        
        function index() {
                $this->view();
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
			$this->news_m->set_start($data ['start']);
			$data ['news'] = $this->news_m->get ();
			$this->pagination->initialize ( $config );
			$data ['pagination'] = $this->pagination->create_links ();
			$ajax = $this->load->view ( 'news/news_ajax', $data, true );
			echo $ajax;
		} else {
			$data ['count'] = $config ['total_rows'] = $this->news_m->get ( FALSE, TRUE );
			$this->news_m->set_start();
			$data ['news'] = $this->news_m->get ();
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
			$return = $this->news_m->delete( $id );
			if ($return) {
				$config ['base_url'] = base_url () . "news/view?";
				$config ['per_page'] = PERPAGA;
				$data ['count'] = $config ['total_rows'] = $this->news_m->get ( FALSE, TRUE );
				$data ['start'] = 0;
				if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
				$this->news_m->set_start( $data ['start'] );
				$data ['news'] = $this->news_m->get ();
				$this->pagination->initialize ( $config );
				$data ['pagination'] = $this->pagination->create_links ();
				$ajax = $this->load->view ( 'news/news_ajax', $data, true );
				echo $ajax;
			}
		}
	}
	public function create() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post ();
			$pro = array (
					'NewTitle' => $post ['NewTitle'],
					'NewContent' => $post ['NewContent'],
					'NewDate' => $post ['NewDate'],
                    'NewPicName' => $post ['NewPicName'],
                    'NewSource' => $post ['NewSource'],
                    'NewDesc' => md5($post ['NewDesc']),
			);
			$rules = $this->news_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->news_m->save( $pro);
				if ($return)
					echo json_encode ( array (
							'msg' => 'Tạo tin tức thành công' 
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
			$this->template->add_title ( 'Tạo tin tức' );
			$this->template->write ( 'title', 'Tạo tin tức' );
			$this->template->write ( 'desption', 'Tạo tin tức' ); 
			$this->template->write_view ( 'content', 'news/news_create', $data, true );
			$this->template->render ();
		}
	}
	public function edit($id) { 
		if(empty($id)) redirect('news/view');
		$data = array ();
		$data['news'] = $this->news_m->get($id);
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
			$rules = $this->news_m->rules;
			$this->form_validation->set_rules ( $rules );
			if ($this->form_validation->run () == TRUE) { 
				$return = $this->news_m->savesave( $pro, $post['id']);
				if($return)
					echo json_encode ( array (
							'msg' => 'Sửa thông tin tin tức thành công' 
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
			$this->template->add_title ( 'Chỉnh sửa tin tức' );
			$this->template->write ( 'title', 'Chỉnh sửa tin tức' );
			$this->template->write ( 'desption', 'Chỉnh sửa tin tức' );
			$this->load->helper ( array ('url','editor_helper') );
			$this->template->write_view ( 'content', 'news/news_edit', $data, true );
			$this->template->render ();
		}
	}
}

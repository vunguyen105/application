<?php
class backend extends MY_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
	}
	public function index() {
	}
	public function login() {
		$admin = 'admin';
		$this->load->model('admin_m');
		$this->admin_m->loggedin() == FALSE || redirect($dashboard);
		
		// Set form
		$rules_login = $this->admin_m->rules_login;
		$this->form_validation->set_rules ( $rules_login );
		
		// Process form
		if ($this->form_validation->run () == TRUE) {
			// We can login and redirect
			$username = $this->input->post ( 'username' );
			$password = $this->input->post ( 'password' );
			if ($this->admin_m->verify_user ( $username, $password ) == TRUE) {
				$this->session->set_flashdata ( 'success', 'Đăng nhập thành công!' );
				redirect ( $admin );
			} else {
				$this->session->set_flashdata ( 'error', 'Tài khoản hoặc mật khẩu không hợp lệ' );
				redirect ( 'backend/login', 'refresh' );
			}
		}
		$this->load->view ( 'back/login' );
	}
	
	public  function logout(){
		$this->load->model('admin_m');
		$this->admin_m->logout();
		redirect('backend/login');
	}
}

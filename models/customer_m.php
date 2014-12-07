<?php
class customer_m extends MY_Model {
	public $table_name = 'Customer';
	public $primary_key = 'CusID';
	public $rules = array (
			'CusUser' => array (
					'field' => 'CusUser',
					'label' => 'Tài khoản',
					'rules' => 'trim|required|xss_clean|is_unique[Customer.CusUser]' 
			),
			'CusEmail' => array (
					'field' => 'CusEmail',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email|is_unique[Customer.CusEmail]' 
			),
			'CusName' => array (
					'field' => 'CusName',
					'label' => 'Họ Tên',
					'rules' => 'trim|required|xss_clean' 
			),
			'CusPhone' => array (
					'field' => 'CusPhone',
					'label' => 'Số điện thoại',
					'rules' => 'trim|required|integer|xss_clean|integer' 
			),
			'CusAdd' => array (
					'field' => 'CusAdd',
					'label' => 'Địa chỉ',
					'rules' => 'trim|required' 
			),
                        'CusPass' => array (
					'field' => 'CusPass',
					'label' => 'Mật khẩu',
					'rules' => 'trim|required|' 
			),
                        'CusPassC' => array (
					'field' => 'CusPassC',
					'label' => 'Mật khẩu confirm',
					'rules' => 'trim|required|matches[CusPass]' 
			) 
                        
	);
        
        public $rules_login = array (
			'username' => array (
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'trim|required|xss_clean' 
			),
			'password' => array (
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[4]' 
			) 
	);
	public function __construct() {
		parent::__construct ();
	}
        
        public function very($username, $password) {
		$user = $this->get_by ( array (
				'CusUser' => $username,
				'CusPass' => md5 ( $password ) 
		), FALSE );        
		if (count ( $user ) == 1) {
			// Log in user
			$data = array (
					'CusUser'  => $user [0] ['CusUser'],
					'CusName'  => $user [0] ['CusName'],
					'CusPhone' => $user [0] ['CusPhone'],
					'CusAdd'   => $user [0] ['CusAdd'],
                                        'CusEmail' => $user [0] ['CusEmail'],
                                        'logged' => TRUE 
			);
			$this->session->set_userdata ( $data );
			return $user [0];
		} else
			return FALSE;
        }
        public function loggedin() {
		return ( bool ) $this->session->userdata ( 'logged' );
	}
	public function logout() {
		$this->session->sess_destroy ();
	}
}
?>

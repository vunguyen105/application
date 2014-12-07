<?php
class admin_m extends MY_Model {
	public $table_name = 'Admin';
	public $primary_key = 'AdminID';
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
	public function verify_user($username, $password) {
		$user = $this->get_by ( array (
				'UserName' => $username,
				'Password' => md5 ( $password ) 
		), FALSE );
		if (count ( $user ) == 1) {
			// Log in user
			$data = array (
					'UserName' => $user [0] ['UserName'],
					'Password' => $user [0] ['Password'],
					'AdminID'  => $user [0] ['AdminID'],
					'loggedin' => TRUE 
			);
			$this->session->set_userdata ( $data );
			return $user [0];
		} else
			return false;
	}
	public function loggedin() {
		return ( bool ) $this->session->userdata ( 'loggedin' );
	}
	public function logout() {
		$this->session->sess_destroy ();
	}
}


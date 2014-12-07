<?php
class user extends Backend_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
	}
public function view() {
        $this->template->add_title('Thống kê tài khoản');
        $this->template->write('title', 'Thống kê tài khoản');
        $this->template->write('desption', 'Thống kê tài khoản');
        $this->load->model('user_m');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . "user/view?";
        $config['per_page'] = PERPAGA;
        if ($this->input->is_ajax_request()) {
            $data['start'] = ($this->input->get('page') == FALSE) ? 0 : (int) $this->input->get('page');
            $data['count'] = $config['total_rows'] = $this->user_m->get(FALSE, TRUE);
            $this->user_m->set_start($data['start']);
            $data['users'] = $this->user_m->get();
            //echo "<pre>";     var_dump($data['users']);die;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $ajax = $this->load->view('user/user_ajax_index', $data, true);
            echo $ajax;
        } else {
            $data['count'] = $config['total_rows'] = $this->user_m->get(FALSE, TRUE);
            //echo "<pre>";     var_dump($data['count']);die;
            //$data['start'] = 0;
            $this->user_m->set_start();
            $data['users'] = $this->user_m->get(); //echo "<pre>";     var_dump($data['users']);die;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $this->template->write_view('content', 'user/view', $data, true);
            $this->template->render();
        }
    }
}

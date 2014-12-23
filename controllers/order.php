<?php

class order extends Backend_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('category_lib');
        $this->new_nested_set = $this->category_lib->category_initialize();
    }

    public function Order() {
        $this->template->add_title('Danh sách Hóa đơn');
        $this->template->write('title', 'Hóa đơn');
        $this->template->write('desption', 'Danh sách ');
        $this->template->write_view('content', 'hoadon/test', '', true);
        $this->template->render();
    }

}

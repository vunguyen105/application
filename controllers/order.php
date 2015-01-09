<?php

class order extends Backend_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('category_lib');
        $this->load->model('order_m');
        $this->load->library('pagination');
        $this->new_nested_set = $this->category_lib->category_initialize();
    }

    public function view() {
        $data['orders'] = $this->order_m->get();
        $config ['base_url'] = base_url() . "order/view?";
        $config ['per_page'] = PERPAGA;
        if ($this->input->is_ajax_request()) {
            $data ['start'] = ($this->input->get('page') == FALSE) ? 0 : (int) $this->input->get('page');
            $data ['count'] = $config ['total_rows'] = $this->order_m->order(FALSE, TRUE);
            $this->order_m->set_start($data ['start']);
            $data ['orders'] = $this->order_m->order(); // echo "<pre>";var_dump($data ['orders']);die;
            $this->pagination->initialize($config);
            $data ['pagination'] = $this->pagination->create_links();
            $ajax = $this->load->view('order/order_ajax', $data, true);
            echo $ajax;
        } else {
            $this->template->add_title('Danh sách sản hóa đơn');
            $this->template->write('title', 'Danh sách hóa đơn');
            $data ['count'] = $config ['total_rows'] = $this->order_m->order(FALSE, TRUE);
            $this->order_m->set_start();
            $data ['orders'] = $this->order_m->order();         //   echo "<pre>";var_dump($data ['orders']);die;
            $this->pagination->initialize($config);
            $data ['pagination'] = $this->pagination->create_links();
            $this->template->write_view('content', 'order/view', $data, true);
            $this->template->render();
        }
    }

    public function orderdetail($id) {
        if (empty($id))
            redirect('order/view');
        $this->template->add_title('Chi tiết sản hóa đơn');
            $this->template->write('title', 'Chi tiết hóa đơn');
        $data['order'] = $this->order_m->order($id);
        $this->load->model('OrderDetail_m');
        $data['orderdetail'] = $this->OrderDetail_m->orderdetail($id);
        $this->template->write_view('content', 'order/orderdetail', $data, true);
        $this->template->render();
    }

}

<?php

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('customer_m');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        $product = 'home/product';
        $this->load->model('customer_m');
        $this->customer_m->loggedin() == FALSE || redirect($product);

        $post = $this->input->post();
        $rules_login = $this->customer_m->rules_login;
        $this->form_validation->set_rules($rules_login);

        // Process form
        if ($this->form_validation->run() == TRUE) {
            $return = $this->customer_m->very($post ['username'], $post ['password']);
            if ($return == TRUE) {
                $this->session->set_flashdata('success', 'Đăng nhập thành công');
                redirect($product);
            } else {
                $this->session->set_flashdata('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
                redirect('home/login');
            }
        }
        $data['content'] = $this->load->view('frontend/log_in', '', true);
        $this->load->view('frontend/layout', $data);
    }

    public function signup() {
        $product = 'home/login';
        $this->load->model('customer_m');
        $this->customer_m->loggedin() == FALSE || redirect($product);
        $rules = $this->customer_m->rules;
        $this->form_validation->set_rules($rules);

        // Process form
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post();
            $cus = array(
                'CusUser' => $post ['CusUser'],
                'CusEmail' => $post ['CusEmail'],
                'CusAdd' => $post ['CusAdd'],
                'CusName' => $post ['CusName'],
                'CusPhone' => $post ['CusPhone'],
                'CusPass' => md5($post ['CusPass']),
            );
            $return = $this->customer_m->save($cus);
            $this->session->set_flashdata('success', 'Đăng Ký thành công');
            redirect($product);
        }
        $data['content'] = $this->load->view('frontend/signup', '', true);
        $this->load->view('frontend/layout', $data);
    }

    public function product($id = null) {
        $this->load->model('product_m');
        $this->load->model('menucate_m');

        $this->load->library('category_lib');
        $this->new_nested_set = $this->category_lib->category_initialize();
        $idMenu = 4;
        $cateInMenu = $this->menucate_m->getCateMenu($idMenu);
        $inCat = array();
        foreach ($cateInMenu as $k => $v) {
            $inCat[] = $v['CateID'];
        }
        if ($id != null) {
            $data['product'] = $this->product_m->get($id);
//                        var_dump($data['product']);die;
            $data['menu'] = $this->new_nested_set->category_fronend(1, $inCat, $idMenu, $cateInMenu);
            // $data['slider'] = $this->load->view('frontend/slider', '', true);
            $data['left'] = $this->load->view('frontend/left', $data, true);
            $data['content'] = $this->load->view('frontend/product_detail', $data, true);
            $this->load->view('frontend/layout', $data);
        } else {
            $this->product_m->set_start(0, 6);
            $data['products_features'] = $this->product_m->get();
            $this->product_m->set_start(0, 3);
            $data['products'] = $this->product_m->get();
            $data['menu'] = $this->new_nested_set->category_fronend(1, $inCat, $idMenu, $cateInMenu);
            $data['slider'] = $this->load->view('frontend/slider', '', true);
            $data['left'] = $this->load->view('frontend/left', $data, true);
            $data['content'] = $this->load->view('frontend/content', $data, true);
            $this->load->view('frontend/layout', $data);
        }
    }

    public function blog() {
        $this->load->model('menucate_m');
        $this->load->model('product_m');
        $this->load->model('news_m');
        $this->load->library('category_lib');
        $this->new_nested_set = $this->category_lib->category_initialize();
        $idMenu = 4;
        $cateInMenu = $this->menucate_m->getCateMenu($idMenu);
        $inCat = array();
        foreach ($cateInMenu as $k => $v) {
            $inCat[] = $v['CateID'];
        }
        $data['menu'] = $this->new_nested_set->category_fronend(1, $inCat, $idMenu, $cateInMenu);
        $data['news'] = $this->news_m->get();
        $data['left'] = $this->load->view('frontend/left', $data, true);
        $data['content'] = $this->load->view('frontend/blog', $data, true);
        $this->load->view('frontend/layout', $data);
    }

    public function contact() {
        $data = '';
        $data['content'] = $this->load->view('frontend/contact_us', $data, true);
        $this->load->view('frontend/layout', $data);
    }

    public function logout() {
        $this->load->model('customer_m');
        $this->customer_m->logout();
        redirect('home/login');
    }

    public function category($id) {
        $config ['base_url'] = base_url() . "home/category/" . $id . "?";
        $config ['per_page'] = PERPAGA;
        $this->load->model('product_m');
        $this->load->library('pagination');
        if ($this->input->is_ajax_request()) {
            $data ['start'] = ($this->input->get('page') == FALSE) ? 0 : (int) $this->input->get('page');
            $data ['count'] = $config ['total_rows'] = $this->product_m->product_get_cat($id, FALSE, TRUE);
            $this->product_m->set_start($data ['start']);
            $data['products'] = $this->product_m->product_get_cat($id);
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $this->pagination->initialize($config);
            $data ['pagination'] = $this->pagination->create_links();
            $ajax = $this->load->view('frontend/shop_ajax', $data, true);
            echo $ajax;
        } else {
            $this->load->model('menucate_m');
            $this->load->library('category_lib');
            $this->new_nested_set = $this->category_lib->category_initialize();
            $idMenu = 4;
            $cateInMenu = $this->menucate_m->getCateMenu($idMenu);
            $inCat = array();
            foreach ($cateInMenu as $k => $v) {
                $inCat[] = $v['CateID'];
            }

            $this->product_m->set_start();
            $data['products'] = $this->product_m->product_get_cat($id);

            $data ['count'] = $config ['total_rows'] = $this->product_m->product_get_cat($id, FALSE, TRUE);
            $this->product_m->set_start();
            $data['products'] = $this->product_m->product_get_cat($id);
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';
            $this->pagination->initialize($config);
            $data ['pagination'] = $this->pagination->create_links();

            $data['menu'] = $this->new_nested_set->category_fronend(1, $inCat, $idMenu, $cateInMenu);
            $data['slider'] = $this->load->view('frontend/slider', '', true);
            $data['left'] = $this->load->view('frontend/left', $data, true);
            $data['content'] = $this->load->view('frontend/shops', $data, true);
            $this->load->view('frontend/layout', $data);
        }
    }

    public function shopping() {
        if ($this->input->is_ajax_request()) {

            $data = array(
                'id' => $this->input->post('proid'),
                'qty' => $this->input->post('quantity'),
                'pic' => $this->input->post('propic'),
                'name' => stripUnicode_slug($this->input->post('proname')),
                'price' => $this->input->post('proprice'),
            );
            $this->cart->insert($data);
        }
    }

    public function distroy_shop() {
        $this->cart->destroy();
    }

    public function cart() {
        $data = '';
        $data['content'] = $this->load->view('frontend/cart', $data, true);
        $this->load->view('frontend/layout', $data);
    }

    public function update_shop() {
        if ($this->input->is_ajax_request()) {
            $this->cart->update(array(
                'rowid' => $this->input->post('id'),
                'qty' => 0
            ));
        }
    }

    public function checkout() {
        $data = '';
        $data['content'] = $this->load->view('frontend/checkout', $data, true);
        $this->load->view('frontend/layout', $data);
    }

    public function update_cart() {
        if ($this->input->is_ajax_request()) {
            foreach ($_POST['row'] as $key => $value) {
                $update = array(
                    'rowid' => $value,
                    'qty' => $_POST['val'][$key]
                );
            }
            $this->cart->update($update);
        }
    }

    public function check_out() {
        if ($this->input->is_ajax_request()) {
            if (isset($_POST['row'])) {
                $post = $this->input->post();
                $update = array();
                foreach ($post['row'] as $key => $value) {
                    $update[] = array(
                        'rowid' => $value,
                        'qty' => $post['val'][$key]
                    );
                }
                $order = array(
                    'PayID' => 1,
                    'CusId' => $post['CusId'],
                    'OrdStt' => 1,
                    'OrdDate' => date("Y-m-d H:i:s"),
                    'OrdCus' => $post['OrdCus'],
                    'OrdAdd' => $post['OrdAdd'],
                    'OrdPhone' => $post['OrdPhone']
                );
                $this->load->model('order_m');
                $OrdID = $this->order_m->save($order);
                if (is_numeric($OrdID)) {
                    $OrderDetail = array();
                    foreach ($post['val'] as $key => $value) {
                        $OrderDetail[] = array(
                            'OrdID' => $OrdID,
                            'ProSizeID' => 1,
                            'OrdQuantity' => $value,
                            'OrdPrice' => $post['price'][$key]
                        );
                    }
                    $this->load->model('OrderDetail_m');
                    $OrdDetail = $this->OrderDetail_m->save($OrderDetail, FALSE, TRUE);
                    if ($OrdDetail) {
                        echo json_encode(array('msg' => 'Thêm đơn hàng thành công'));
                    } else {
                        echo json_encode(array('msg' => 'Thêm đơn hàng thất bại'));
                    }
                } else {
                    echo json_encode(array('msg' => 'Thêm đơn hàng thất bại'));
                };



                //$this->cart->update($update);
            }
        }
    }

}

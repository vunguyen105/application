<?php
    class size extends Backend_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->library('category_lib');
            $this->new_nested_set = $this->category_lib->category_initialize();            
         }
        function view(){
            $this->template->add_title('Thống kê kích thước');
            $this->template->write('title', 'Thống kê kích thước');
            $this->template->write('desption', 'Thống kê kích thước');
            $this->load->model('size_m');
            $this->load->library('pagination');
            $config['base_url'] = base_url() . "size/view?";
            $config['per_page'] = PERPAGA;
            if ($this->input->is_ajax_request()) {
                $data['start'] = ($this->input->get('page') == FALSE) ? 0 : (int) $this->input->get('page');
                $data['count'] = $config['total_rows'] = $this->size_m->get(FALSE, TRUE);
                $this->size_m->set_start($data['start']);
                $data['size'] = $this->size_m->get();
                //echo "<pre>";     var_dump($data['size']);die;
                $this->pagination->initialize($config);
                $data['pagination'] = $this->pagination->create_links();
                $ajax = $this->load->view('size/size_ajax_index', $data, true);
                echo $ajax;
            } else {
                $data['count'] = $config['total_rows'] = $this->size_m->get(FALSE, TRUE);
                //echo "<pre>";     var_dump($data['count']);die;
                //$data['start'] = 0;
                $data['test'] = $this->size_m->get();
                $this->size_m->set_start();
                $data['size'] = $this->size_m->get(); //echo "<pre>";     var_dump($data['size']);die;
                $this->pagination->initialize($config);
                $data['pagination'] = $this->pagination->create_links();
                $this->template->write_view('content', 'size/view', $data, true);
                $this->template->render();
            }
                    
        }
        public function del() {
            if ($this->input->is_ajax_request()) {
                $this->load->model('size_m');
                $id = $this->input->post('id');
                $no = $this->input->post ( 'no' );
                $page = $this->input->post ( 'page' );
                $return = $this->size_m->delete($id);
                if ($return) {
                    $post = $this->input->post();
                    //echo "<pre>";var_dump($post);die;
                    $this->load->library('pagination');
                    $config['per_page'] = PERPAGA;
                    $data['count'] = $config['total_rows'] = $this->size_m->get(FALSE, TRUE);
                    if ($data ['count'] > PERPAGA)
					$data ['start'] = (($no == ($page - 1) * PERPAGA + 1) && $no == $data ['count'] + 1) ? (($page >= 2) ? (($page - 2) * PERPAGA) : 0) : ($page - 1) * PERPAGA;
					// var_dump($no,$data ['start']);die; 
                    $config['base_url'] = base_url() . "size/view?";
                    
                    $this->size_m->set_start($data ['start']);
                    $data['size'] = $this->size_m->get();
                    $this->pagination->initialize($config);
                    $data['pagination'] = $this->pagination->create_links();
                    $ajax = $this->load->view('size/size_ajax_index', $data, true);
                    echo $ajax;
                }
            }
        }
        public function add() {
            if ($this->input->is_ajax_request()) {
                $post = $this->input->post();
                $nodes = array(
                    'id' => $post['id'],
                    'rgt' => $post['left'],
                    'lft' => $post['right'],
                        //'parent_id' => 0
                );
                $return = $this->new_nested_set->appendNewChild($nodes, array('name' => $post['name']));
                $menu = $this->new_nested_set->build_menu($post['menu_id']);
                echo $menu;
                die;
            }
        }                    
        
    }
?>
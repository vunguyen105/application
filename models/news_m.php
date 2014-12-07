<?php
    class news_m extends MY_Model{
        public $table_name='New';
        public $primary_key = 'NewID';
        public function __construct(){
            parent::__construct();
        }
        
        public $rules = array (
			'NewTitle' => array (
					'field' => 'NewTitle',
					'label' => 'Tiêu đề',
					'rules' => 'trim|required|xss_clean' 
			),
			'NewContent' => array (
					'field' => 'NewContent',
					'label' => 'Nội dung',
					'rules' => 'trim|required|xss_clean' 
			),
			'NewDesc' => array (
					'field' => 'NewDesc',
					'label' => 'Mô tả',
					'rules' => 'trim|required|xss_clean' 
			)
	);
    }
?>

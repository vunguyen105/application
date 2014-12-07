<?php
    class news_m extends MY_Model{
        public $table_name='New';
        public $primary_key = 'NewID';
        public function __construct(){
            parent::__construct();
        }
    }
?>
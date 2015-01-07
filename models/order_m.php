<?php
    class order_m extends MY_Model{
        public $table_name = 'order';
        public $primary_key = 'OrdID';
        public function __construct(){
            parent::__construct();
        }
    }
?>
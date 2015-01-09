<?php

class order_m extends MY_Model {

    public $table_name = 'order';
    public $primary_key = 'OrdID';

    public function __construct() {
        parent::__construct();
    }

    public function order($ids = FALSE, $single = FALSE) {
        $this->db->select('order.*, CusName');
        $this->db->join('customer', 'order.CusID = customer.CusID', 'left');
        return $this->get($ids, $single);
    }
    
    
}

?>
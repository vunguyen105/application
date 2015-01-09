<?php

class OrderDetail_m extends MY_Model {

    public $table_name = 'orderdetail';

    public function __construct() {
        parent::__construct();
    }

    public function orderdetail($id) {
        $this->db->select('*');
        $this->db->join('prosize', 'prosize.ProSizeID = orderdetail.ProSizeID');
        $this->db->join('product', 'product.ProID = prosize.ProID');
        $this->db->join('size', 'size.SizeID = prosize.SizeID');
        return $this->get_by('OrdID', $id);
    }

}

?>
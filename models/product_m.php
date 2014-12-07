<?php
class product_m extends MY_Model {
	public $table_name = 'Product';
	public $primary_key = 'ProID';
	// protected $_order_by = 'user_id';
	public $rules = array (
			'name' => array (
					'field' => 'proname',
					'label' => 'Tên sản phẩm',
					'rules' => 'trim|required|xss_clean' 
			),
			'price' => array (
					'field' => 'price',
					'label' => 'Giá',
					'rules' => 'trim|required|xss_clean|integer' 
			),
			'quantity' => array (
					'field' => 'quantity',
					'label' => 'quantity',
					'rules' => 'trim|required|integer|xss_clean' 
			),
			'cat' => array (
					'field' => 'cat',
					'label' => 'category',
					'rules' => 'trim|required|integer|xss_clean' 
			),
			'descr' => array (
					'field' => 'descr',
					'label' => 'descr',
					'rules' => 'required' 
			) 
	);
	public function __construct() {
		parent::__construct ();
	}
	public function show($start = 0) {
		$this->set_start ( $start );
		$this->db->select ( 'ProID, ProPicName, CateID, ProName, ProPrice, ProStt, ProQuantity,  ProDesc, ProStt2, Categories.name as CateName' );
		$this->db->join ( 'Categories', 'Product.CateID = Categories.id', 'left' );
		return $this->get ();
	}
}
?>

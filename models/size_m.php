<?php
class size_m extends MY_Model {
	public $table_name = 'Size';
	public $primary_key = 'SizeID';
	public $rules = array (
			'SizeName' => array (
					'field' => 'SizeName',
					'label' => 'Tên kích thước',
					'rules' => 'trim|required|xss_clean|is_unique[Size.SizeName]' 
			)
                        
	);
	public function __construct() {
		parent::__construct ();
	}
}
?>

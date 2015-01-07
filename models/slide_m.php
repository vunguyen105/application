<?php
class slide_m extends MY_Model {
	public $table_name = 'Slide';
	public $primary_key = 'SlideID';
	public $rules = array (
			'SlideTitle' => array (
					'field' => 'SlideTitle',
					'label' => 'Tên slide',
					'rules' => 'trim|required|xss_clean|is_unique[Slide.SlideTitle]' 
			)
                        
	);
	public function __construct() {
		parent::__construct ();
	}
}
?>

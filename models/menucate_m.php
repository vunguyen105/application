<?php
class menucate_m extends MY_Model {
	public $table_name = 'MenuCate';
	public $primary_key = 'MenuCateID';
	public function __construct() {
		parent::__construct ();
	}
	
	function getCateMenu($MenuID){
		$this->db->join('Categories','MenuCate.CateID = Categories.id','left');
		return $this->get_by('MenuID',$MenuID);
	}
}
?>

<?php
class category_m extends MY_Model {
	public $table_name = 'Categories';
	public $primary_key = 'id';
	public function __construct() {
		parent::__construct ();
	}
}

?>

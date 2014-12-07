<?php
class menu_m extends MY_Model {
	public $table_name = 'Menu';
	public $primary_key = 'MenuID';
	public function __construct() {
		parent::__construct ();
	}
}
?>

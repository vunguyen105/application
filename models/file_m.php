<?php
class file_m extends MY_Model {
	public $table_name = 'File';
	public $primary_key = 'FileID';
	public function __construct() {
		parent::__construct ();
	}
        
        public function get_file($proID) {
            return $this->get_by('ProID',$proID);
        }
}
?>

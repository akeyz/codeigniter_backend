<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct(){
		parent::__construct();
		
		$this->master = $this->load->database('master', TRUE);
		$this->slave = $this->load->database('slave', TRUE);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize_model extends MY_Model {

	private $TABLE_ACCESS = 'access';
	private $TABLE_API = 'api';
	private $TABLE_ACCESS_KEYS = 'access_keys';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function lists()
	{
		$query = $this->slave->get($this->TABLE_ACCESS);
		return $query->result_array();
	}

	public function add($data)
	{
		$this->master->insert($this->TABLE_ACCESS,$data);
		return $this->master->insert_id();
	}

	public function delete($id)
	{
		$this->master->delete($this->TABLE_ACCESS,array('id'=>$id));
		if ($this->master->affected_rows() == 1){
			return true;
		}
		return false;
	}

	public function update($data)
	{
		$this->master->where('id',$data['id']);
		$this->master->update($this->TABLE_ACCESS,$data);
		if ($this->master->affected_rows() == 1){
			return true;
		}
		return false;
	}

	public function get($id)
	{
		$this->slave->where('id',$id);
		$query = $this->slave->get($this->TABLE_ACCESS);
		return $query->row_array();
	}

	public function check($data)
	{
		$this->slave->where('key',$data['key']);
		$query = $this->slave->get($this->TABLE_ACCESS);
		return $query->result_array();
	}

	public function get_all_controller_lists()
	{
		$query = $this->slave->get($this->TABLE_API);
		return $query->result_array();
	}

	public function insert_key_to_access_keys($data)
	{
		$this->master->insert($this->TABLE_ACCESS_KEYS,$data);
		return $this->master->insert_id();
	}
}

/* End of file authorize_model.php */
/* Location: ./application/models/authorize/authorize_model.php */
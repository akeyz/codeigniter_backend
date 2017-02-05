<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends MY_Model {

	private $TABLE_API = 'api';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function lists()
	{
		$query = $this->slave->get($this->TABLE_API);

		return $query->result_array();
	}

	public function add($data)
	{
		$this->master->insert($this->TABLE_API,$data);
		return $this->master->insert_id();
	}

	public function delete($id)
	{
		$this->master->delete($this->TABLE_API,array('id'=>$id));
		if ($this->master->affected_rows() == 1){
			return true;
		}
		return false;
	}

	public function update($data)
	{
		$this->master->where('id',$data['id']);
		$this->master->update($this->TABLE_API,$data);
		if ($this->master->affected_rows() == 1){
			return true;
		}
		return false;
	}

	public function get($id)
	{
		$this->slave->where('id',$id);
		$query = $this->slave->get($this->TABLE_API);
		return $query->row_array();
	}

	public function check($data)
	{
		$this->slave->where('name',$data['name']);
		$this->slave->or_where('controller',$data['controller']);
		$query = $this->slave->get($this->TABLE_API);
		return $query->result_array();
	}

}

/* End of file api_model.php */
/* Location: ./application/models/api/api_model.php */
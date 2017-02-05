<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends MY_Model {

    private $TABLE_FILE = 'file';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function add($data)
    {
        $this->master->insert($this->TABLE_FILE,$data);
        return $this->master->insert_id();
    }

    public function get_latest_csv_file_by_type($type)
    {
        $this->slave->where('type',$type);
        $this->slave->order_by('id','DESC');

        $query = $this->slave->get($this->TABLE_FILE);

        return $query->row_array();
    }

}

/* End of file file_model.php */
/* Location: ./application/models/file/file_model.php */
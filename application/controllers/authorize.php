<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('authorize/authorize_model');
	}

	public function index()
	{
		$this->data['rows'] = $this->authorize_model->lists();
		$this->show('authorize/index');
	}

	public function create()
	{
		$this->data['controllers'] = $this->authorize_model->get_all_controller_lists();
		if ($this->input->post()) {
			$this->form_validation->set_rules('name','授权名称','trim|required');
			if($this->form_validation->run() == FALSE){
				$this->show('authorize/create');
			}else{
				$data = array(
					'name' => $this->input->post('name'),
					'key' => $this->input->post('key'),
					'controller' => implode("," ,$this->input->post('controller')),
				);

				$data_access_keys = array(
					'key' => $this->input->post('key'), 
					'level' => '0',
					'ignore_limits' => '0',
					'is_private_key' => '0',
					'ip_addresses' => '',
					'date_created' => '',
				);

				$key_data = $this->authorize_model->check($data);
				if (!empty($key_data)) {
					$this->data['message'] = 'key已存在';
					$this->show('authorize/create');
				}else{
					$this->authorize_model->add($data);
					$this->authorize_model->insert_key_to_access_keys($data_access_keys);
					redirect('authorize');
				}
			}
		}else{
			$this->show('authorize/create');
		}
	}

	public function edit($id)
	{
		$this->data['controllers'] = $this->authorize_model->get_all_controller_lists();
		$this->data['row'] = $this->authorize_model->get($id);
		if ($this->input->post()) {
			$this->form_validation->set_rules('name','授权名称','trim|required');
			if($this->form_validation->run() == FALSE){
				$this->show('authorize/edit');
			}else{
				$data = array(
					'id' => $id,
					'name' => $this->input->post('name'),
					'key' => $this->input->post('key'),
					'controller' => implode("," ,$this->input->post('controller')),
				);

				$this->authorize_model->update($data);
				redirect('authorize');
			}
		}else{
			$this->show('authorize/edit');
		}
	}

	public function delete($id)
	{
		$this->authorize_model->delete($id);
		redirect('admin/authorize');
	}

}

/* End of file authorize.php */
/* Location: ./application/controllers/authorize.php */
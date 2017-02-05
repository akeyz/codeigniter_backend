<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('api/api_model');
	}

	public function index()
	{
		$this->data['rows'] = $this->api_model->lists();

		$this->show('api/index');
	}

	public function create(){
		if($this->input->post()) {
			$this->form_validation->set_rules('name','API名称','trim|required');
			$this->form_validation->set_rules('controller','API控制器','trim|required');
			if($this->form_validation->run() == FALSE){
				$this->show('api/create');
			}else{
				$data = array(
					'name' => $this->input->post('name'),
					'controller' => $this->input->post('controller'),
				);
				$api_data = $this->api_model->check($data);
				if(!empty($api_data)){
					$this->data['message'] = '<em>API名称</em> 或 <em>API控制器</em> 已存在';
					$this->show('api/create');
				} else {
					$this->api_model->add($data);
					redirect('api');
				}
			}
		} else {
			$this->show('api/create');
		}
	}

	public function edit($id) {
		if($this->input->post()) {
			$this->form_validation->set_rules('name','API名称','trim|required');
			$this->form_validation->set_rules('controller','API控制器','trim|required');
			if($this->form_validation->run() == FALSE){
				$this->show('api/edit');
			}else{
				$data = array(
					'id' => $id,
					'name' => $this->input->post('name'),
					'controller' => $this->input->post('controller'),
				);
				$this->api_model->update($data);
				redirect('api');
			}
		} else {
			$this->data['row'] = $this->api_model->get($id);
			$this->show('api/edit');
		}
	}

	public function delete($id) {
		$this->api_model->delete($id);
		redirect('api');
	}

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */
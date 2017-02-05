<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property CI_Javascript $javascript
 * @property CI_Jquery $jquery
 * @property CI_Utf8 $utf8
 * @property CI_Security $security
 * @property CI_Migration $migration
 */

Class MY_Controller extends CI_Controller{
	
	/**
	 * 放进模版的数据
	 * @var array()
	 */
	public $data = array();
	
	function __construct(){
		parent::__construct();
		
		//加载常用的函数库
		$this->load_common_library();
		//加载常用的帮助类
		$this->load_common_helper();
		//加载常用的模型类
		$this->load_common_model();
		//检查登陆
		$this->check_login();
	}
	
	/**
	 * 加载通用的函数库
	 */
	private function load_common_library(){
		$this->load->library(array('form_validation', 'tank_auth', 'pagination'));
	}
	
	/**
	 * 加载通用的帮助类
	 */
	private function load_common_helper(){
		$this->load->helper(array('date', 'language', 'form', 'url'));
	}
	
	private function load_common_model(){
		$this->load->model(array('file/file_model'));
	}
	
	/**
	 * 检查登陆，如果没有登陆，则redirect('/auth/login/')
	 * 检查登录的用户的角色，根据用户的状态进行跳转
	 */
	public function check_login(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}
	
	/**
	 * 展示模版
	 * @param String $view 模版文件
	 */
	public function show($view){
		$this->load->view($view,$this->data);
	}
	
	/**
	 * 处理文件上传
	 * @param 上传文件的html表单id $input
	 * @param 区分上传事件 $upload_action
	 * @param 附加参数 $params (type 文件类型)
	 */
	public function do_upload($input,$upload_action,$params=array(),$version=0,$channel_id=0){
		
		$date = getdate(time());
		$year = $date['year'];
		$month = $date['mon'];
		$day = $date['mday'];
		$hours = $date['hours'];
		$minutes = $date['minutes'];
		$seconds = $date['seconds'];
		
		$file_save_path = './resource/file/app/'.$year.'/'.$month.'/'.$day;
		$file_save_name = md5($year.$month.$day.$hours.$minutes.$seconds);
		if (!is_dir($file_save_path)){
			//创建保存目录，该目录根据年月日即网站根目录下 /resource/file/app/2015/3/18
			mkdir($file_save_path, 0777, true);
		}
		$config['remove_spaces']= TRUE;
		$config['upload_path'] = $file_save_path;
		//$config['allowed_types'] = 'gif|jpg|png|apk';
		$config['allowed_types'] = '*';
		$config['file_name'] = $file_save_name;
		
		$this->load->library('upload',$config);
		$this->upload->do_upload($input);//从传入的$input获取该input框
		//打印错误
		//var_dump($_FILES["$input"]);
		//var_dump($this->upload->display_errors());exit();
		$file_data = $this->upload->data();
		//从附加参数中获得type
		$type = $params['type'];
		//组装文件数据
		$file['type'] = $type;
		$file['version'] = $version;
		$file['channel_id'] = $channel_id;
		$file['file_name'] = $file_data['file_name'];
		$file['raw_name'] = $file_data['raw_name'];//不包括扩展名在内的文件名部分
		$file['file_path'] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_data['file_path']);//保存文件的路径
		$file['full_path'] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_data['full_path']);//包括保存文件的路径和文件名
		$file['file_size'] = $file_data['file_size']*1024;//原来是KB，转换为B
		$file['client_name'] = $file_data['client_name'];//上传之前本地的文件名
		$file['file_ext'] = $file_data['file_ext'];//文件扩展名（包括‘.’）
		$file['is_image'] = $file_data['is_image'];
		$file['image_width'] = $file_data['image_width'];
		$file['image_height'] = $file_data['image_height'];
		$file['image_type'] = $file_data['image_type'];//文件类型，即文件扩展名（不包括‘.’）

		$file['id']= $this->file_model->add($file);
		
		return $file;
	}

	public function delete_file_by_id($file_id){
		$file = $this->file_model->get_by_id($file_id);
		$this->delete_file($file);
	}
	
	public function delete_file($file){
		if (!empty($file)){
			$this->file_model->delete_by_id($file['id']);
			if (file_exists('.'.$file['full_path'])){
				@unlink('.'.$file['full_path']);
			}
		}
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
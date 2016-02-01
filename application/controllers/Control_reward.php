<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control_reward extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model_reward','control_reward');
		$this->load->helper('url_helper');
	}

	public function add_reward(){
		$data=array(
			'id_reward'=>$this->input->post('id_reward'),
			'name'=>$this->input->post('name'),
			'date_create'=>$this->input->post('date_create'),
			'date_exp'=>$this->input->post('date_exp'),
			'available_qty'=>$this->input->post('available_qty'),
			'value'=>$this->input->post('value'),
			'like_this'=>$this->input->post('like_this'),
			'blue_thumb'=>$this->input->post('blue_thumb'),
			'like'=>$this->input->post('like'),
			'blue'=>$this->input->post('blue'),
			'description'=>$this->input->post('description'),
		);
		$insert=$this->control_reward->ajax_save_reward($data);
		echo json_encode(array("status"=>TRUE));
	}

	function control_delete_reward($id)
	{
		$this->control_reward->model_delete_reward($id);
		echo json_encode(array("status"=>TRUE));
	}

	public function control_edit_reward($id)
	{
		$data=$this->control_reward->get_by_id_reward($id);
		echo json_encode($data);
	}

	public function update_reward()
	{
		$data=array(
			'id_reward'=>$this->input->post('id_reward'),
			'name'=>$this->input->post('name'),
			'date_create'=>$this->input->post('date_create'),
			'date_exp'=>$this->input->post('date_exp'),
			'available_qty'=>$this->input->post('available_qty'),
			'value'=>$this->input->post('value'),
			'like_this'=>$this->input->post('like_this'),
			'blue_thumb'=>$this->input->post('blue_thumb'),
			'like'=>$this->input->post('like'),
			'blue'=>$this->input->post('blue'),
			'description'=>$this->input->post('description'),
		);

		$this->control_reward->model_update_reward(array('id'=>$this->input->post('id')),$data);
		echo json_encode(array("status"=>TRUE));
	}


}

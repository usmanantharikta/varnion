<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control_crud extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model_crud','control_crud');
		 $this->load->helper('url_helper');
	}

//get data employ from data bases
	public function ajax_list()
	{
		$list = $this->model_crud->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person)
		{
			$no++;
			$row = array();
			$row[] = $person->id_employ;
			$row[] = $person->name;
			$row[] = $person->gender;
			$row[] = $person->departement;
			$row[] = $person->division;
			$row[] = $person->location;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_employ('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_employ('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
			$row[]='<a class="btn btn-sm btn-success" href="javascript:void()" title="Like This!" onclick="like_this('."'".$person->id."'".')"><i class="glyphicon glyphicon-thumbs-up"></i> </a>
								<a class="btn btn-sm btn-primary" href="javascript:void()" title="Blue Thumbs" onclick="add_blue_thumbs('."'".$person->id."'".')"><i class="glyphicon glyphicon-thumbs-up"></i> </a>
								<a class="btn btn-sm btn-primary" href="javascript:void()" title="Dislike" onclick="add_dislike('."'".$person->id."'".')"><i class="glyphicon glyphicon-thumbs-down"></i> </a>';
			$data[] = $row;
		}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->model_crud->count_all(),
				"recordsFiltered" => $this->model_crud->count_filtered(),
				"data" => $data,
				);
		//output to json format
			echo json_encode($output);
	}

//add data employ to data bases
	public function ajax_add_employ()
	{
		$data = array(
			'id_employ'=> $this->input->post('id_employ'),
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'departement' => $this->input->post('departement'),
			'division' => $this->input->post('division'),
			'location' => $this->input->post('location'),
			);
		$insert = $this->model_crud->save_employ($data);
		echo json_encode(array("status"=>TRUE));
	}

	//update data employ
	public function ajax_update_employ()
	{
		$data = array(
			'id_employ'=> $this->input->post('id_employ'),
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'departement' => $this->input->post('departement'),
			'division' => $this->input->post('division'),
			'location' => $this->input->post('location'),
		);
		$this->model_crud->update_employ(array('id'=>$this->input->post('id')),$data);
		echo json_encode(array("status"=>TRUE));
	}

	// ajax for edit data employ
	public function ajax_edit_employ($id)
	{
		$data = $this->control_crud->get_by_id($id);
		echo json_encode($data);
	}

	//for view content Employ data
  public function add()
	{
    $this->load->view('header');
    $this->load->view('addemploy_view');
    $this->load->view('footer');
  }
	//View Poin Data
  public function addpoint_view()
	{
    $this->load->view('header');
    $this->load->view('addpoint_view');
    $this->load->view('footer');
  }
	//View Data Redeem
  public function addredeem_view()
	{
    $this->load->view('header');
    $this->load->view('addredeem_view');
    $this->load->view('footer');
  }
	//View content on home Page
  public function index()
	{
    $this->load->view('header');
    $this->load->view('admin_view');
    $this->load->view('footer');
  }
	//save redeem wil delete
  function saveredeem(){
    if($this->input->post('submit')){
      $this->model_crud->addredeem();
    }
    else {
      redirect('Control_crud/addredeem_view');
    }
  }
	//for delete data employ
	function ajax_delete_employ($id)
	{
		$this->model_crud->delete_employ_by_id($id);
		echo json_encode(array("status"=>TRUE));
	}

	//for add dislike by get id and name
	public function control_dislike($id)
	{
			$data=$this->control_crud->get_by_id($id);
			echo json_encode($data);
	}

//for fitur add poin
	//get id employ
	public function ajax_like_this($id)
	{
		$data=$this->control_crud->get_by_id($id);
		echo json_encode($data);
	}

	//add point like this
	public function ajax_add_like_this()
	{
		$value=$this->input->post('quantity');
		$status=$this->input->post('status');
		$avl;
		$rdm;
		if($status==="Available"||$status==="Redeemed"){
		if($status==="Available")
		{
			$avl=$value;
			$rdm=0;
		}
		else
		{
			$rdm=$value;
			$avl=0;
		}


		$data = array(
			'employ_id'=> $this->input->post('employ_id'),
			'name' => $this->input->post('name'),
			'date'=>$this->input->post('date'),
			'available' => $avl,
			'redeemed' =>$rdm,
			'remarks' => $this->input->post('remarks'),
		);
		$insert = $this->model_crud->save_like_this($data);
		echo json_encode(array("status"=>TRUE));
	}
	}
	//add point blue thumbs
	public function ajax_add_blue_thumb()
	{

		$value=$this->input->post('quantity');
		$status=$this->input->post('status');
		$avl;
		$rdm;
		if($status==="Available"||$status==="Redeemed"){
		if($status==="Available")
		{
			$avl=$value;
			$rdm=0;
		}
		else
		{
			$rdm=$value;
			$avl=0;
		}

		$data = array(
			'employ_id'=> $this->input->post('employ_id'),
			'name' => $this->input->post('name'),
			'date'=>$this->input->post('date'),
			'available' => $avl,
			'redeemed' => $rdm,
			'remarks' => $this->input->post('remarks'),
		);
		$insert = $this->model_crud->save_blue_thumb($data);
		echo json_encode(array("status"=>TRUE));
	}
	}

//page Poin data
// view like this
	public function list_like_this()
	{
		$list=$this->model_crud->get_data_like_this();
		$data= array();
		$no=$_POST['start'];
		foreach ($list as $poin)
		{
			$no++;
			$row=array();
			$row[]=$poin->employ_id;
			$row[]=$poin->name;
			$row[]=$poin->date;
			$row[]=$poin->available;
			$row[]=$poin->redeemed;
			$row[]=$poin->remarks;
			$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_poin_like_this('."'".$poin->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
								<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_poin('."'".$poin->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
			$data[]=$row;

		}
		$output=array(
			"draw"=>$_POST['draw'],
			"recordsTotal"=>$this->model_crud->count_all_like(),
			"recordsFiltered"=>$this->model_crud->count_filtered_like(),
			"data"=>$data,
		);
		echo json_encode($output);
	}

	//view blue Thumbs
	public function list_blue_thums()
	{
		$list=$this->model_crud->get_data_blue_thumbs();
		$data= array();
		$no=$_POST['start'];
		foreach ($list as $poin)
		{
			$no++;
			$row=array();
			$row[]=$poin->employ_id;
			$row[]=$poin->name;
			$row[]=$poin->date;
			$row[]=$poin->available;
			$row[]=$poin->redeemed;
			$row[]=$poin->remarks;

			$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_point_blue_thumb('."'".$poin->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
								<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_poin('."'".$poin->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
			$data[]=$row;
		}
		$output=array(
			"draw"=>$_POST['draw'],
			"recordsTotal"=>$this->model_crud->count_all_blue(),
			"recordsFiltered"=>$this->model_crud->count_filtered_blue(),
			"data"=>$data,
		);
		echo json_encode($output);
	}

	//get id point like This
	public function edit_poin_like_this_control($id){
		$data=$this->model_crud->get_id_like_this($id);
		echo json_encode($data);
	}

	//get id point blue thumbs
	public function edit_poin_blue_thumb_control($id)
	{
		$data=$this->model_crud->get_id_blue_thumbs($id);
		echo json_encode($data);
	}
	//update poin like This
	public function update_poin_like_this(){
		$data= array(
			'employ_id'=>$this->input->post('employ_id'),
			'name'=> $this->input->post('name'),
			'date'=>$this->input->post('date'),
			'available'=>$this->input->post('available'),
			'redeemed'=>$this->input->post('redeemed'),
			'remarks'=>$this->input->post('remarks'),
		);
		$this->model_crud->update_like_this(array('id'=>$this->input->post('id')),$data);
		echo json_encode(array("status"=>TRUE));
	}

	//update poin blue thumbs
	public function update_point_blue_thumb(){
		$data= array(
			'employ_id'=>$this->input->post('employ_id'),
			'name'=> $this->input->post('name'),
			'date'=>$this->input->post('date'),
			'available'=>$this->input->post('available'),
			'redeemed'=>$this->input->post('redeemed'),
			'remarks'=>$this->input->post('remarks'),
		);
		$this->model_crud->update_blue_thumb(array('id'=>$this->input->post('id')),$data);
		echo json_encode(array("status"=>TRUE));
	}

	public function delete_poin_like_this($id)
	{
		$this->model_crud->delete_point_like_this_by_id($id);
		echo json_encode(array("status"=>TRUE));

	}

	// delete blue thumbs
	public function delete_point_blue_thumb($id)
	{
		$this->model_crud->delete_point_blue_thumb_by_id($id);
		echo json_encode(array("status"=>TRUE));

	}

	//redeem
	public function redeem_list_view()
	{
		$list=$this->model_crud->get_redeem();
		$data=array();
		$no=$_POST['start'];
		foreach ($list as $key )
		{
			$no++;
			$row=array();
			$row[]=$key->id_reward;
			$row[]=$key->name;
			$row[]=$key->date_create;
			$row[]=$key->date_exp;
			$row[]=$key->available_qty;
			$row[]=$key->value;
			$row[]=$key->like_this;
			$row[]=$key->blue_thumb;
			$row[]=$key->like;
			$row[]=$key->blue;
			$row[]=$key->description;
			$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_reward('."'".$key->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
								<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_reward('."'".$key->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
			$data[]=$row;
		}
		$output=array(
				"draw"=>$_POST['draw'],
				"recordsTotal" => $this->model_crud->count_all_redeem(),
				"recordsFiltered" => $this->model_crud->count_filtered_redeem(),
				"data" => $data,
		);
		//print_r($outpu)
		echo json_encode($output);
		//return $data;
	}

	function uuh(){
	//	redeem_list_view();

	}

	public function get_point_like_this(){
		$result=$this->model_crud->get_saldo();
		$data=array();
		foreach ($result as $key) {
			array_push($data, array(
				$key['employ_id'],
				$key['name'],
				$key['available'],
				$key['redeemed'],
			));
		}
		echo json_encode(array('data'=>$data));
	}

	public function get_point_blue_thumb(){
		$result=$this->model_crud->get_saldo_blue();
		$data=array();
		foreach ($result as $key) {
			array_push($data, array(
				$key['employ_id'],
				$key['name'],
				$key['available'],
				$key['redeemed'],
			));
		}
		echo json_encode(array('data'=>$data));
	}

}

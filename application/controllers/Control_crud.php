<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control_crud extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('model_crud','control_crud');
	}

	public function ajax_list()
	{
		$list = $this->model_crud->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
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
			$row[]=' 					<a class="btn btn-sm btn-success" href="javascript:void()" title="Like This!" onclick="like_this('."'".$person->id."'".')"><i class="glyphicon glyphicon-thumbs-up"></i> </a>
								<a class="btn btn-sm btn-primary" href="javascript:void()" title="Blue Thumbs" onclick="add_blue_thumbs('."'".$person->id."'".')"><i class="glyphicon glyphicon-thumbs-up"></i> </a>';

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

	public function ajax_add_employ(){
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

public function ajax_edit_employ($id){
	$data = $this->control_crud->get_by_id($id);
	echo json_encode($data);
}


  public function add(){
    $this->load->view('header');
    $this->load->view('addemploy_view');
    $this->load->view('footer');
  }
  public function addpoint_view(){
    $this->load->view('header');
    $this->load->view('addpoint_view');
    $this->load->view('footer');
  }
  public function addredeem_view(){
    $this->load->view('header');
    $this->load->view('addredeem_view');
    $this->load->view('footer');
  }

  public function index(){
    $this->load->view('header');
    $this->load->view('admin_view');
    $this->load->view('footer');
  }

  function save(){
    if($this->input->post('mit')){
      $this->model_crud->add();
      //redirect('control')
    }
    else {
      redirect('Control_crud/add');
    }
  }

  function savepoint(){
    if($this->input->post('submit')){
      $this->model_crud->addpoint();
    }
    else {
      redirect('Control_crud/addpoint_view');
    }
  }

  function saveredeem(){
    if($this->input->post('submit')){
      $this->model_crud->addredeem();
    }
    else {
      redirect('Control_crud/addredeem_view');
    }
  }

	function ajax_delete_employ($id){
		$this->model_crud->delete_employ_by_id($id);
		echo json_encode(array("status"=>TRUE));
	}


//add point
public function ajax_like_this($id)
{
	$data=$this->control_crud->get_by_id($id);
	echo json_encode($data);
}

public function ajax_add_like_this()
{
	$data = array(
		'employ_id'=> $this->input->post('employ_id'),
		'name' => $this->input->post('name'),
		'date'=>$this->input->post('date'),
		'quantity' => $this->input->post('quantity'),
		'status' => $this->input->post('status'),
		'remarks' => $this->input->post('remarks'),
	);
	$insert = $this->model_crud->save_like_this($data);
	echo json_encode(array("status"=>TRUE));
}

public function ajax_add_blue_thumb()
{
	$data = array(
		'employ_id'=> $this->input->post('employ_id'),
		'name' => $this->input->post('name'),
		'date'=>$this->input->post('date'),
		'quantity' => $this->input->post('quantity'),
		'status' => $this->input->post('status'),
		'remarks' => $this->input->post('remarks'),
	);
	$insert = $this->model_crud->save_blue_thumb($data);
	echo json_encode(array("status"=>TRUE));
}

// like this
public function list_like_this(){
	$list=$this->model_crud->get_data_like_this();
	$data= array();
	$no=$_POST['start'];
	foreach ($list as $poin) {
		$no++;
		$row=array();
		$row[]=$poin->employ_id;
		$row[]=$poin->name;
		$row[]=$poin->date;
		$row[]=$poin->quantity;
		$row[]=$poin->status;
		$row[]=$poin->remarks;

		$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_employ('."'".$poin->employ_id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
				<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_employ('."'".$poin->employ_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
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

//blue Thumbs
public function list_blue_thums(){
	$list=$this->model_crud->get_data_blue_thumbs();
	$data= array();
	$no=$_POST['start'];
	foreach ($list as $poin) {
		$no++;
		$row=array();
		$row[]=$poin->employ_id;
		$row[]=$poin->name;
		$row[]=$poin->date;
		$row[]=$poin->quantity;
		$row[]=$poin->status;
		$row[]=$poin->remarks;

		$row[] = '<a class="btn btn-sm btn-default" href="javascript:void()" title="Edit" onclick="edit_employ('."'".$poin->employ_id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
				<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_employ('."'".$poin->employ_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
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

}

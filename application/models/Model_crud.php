<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class Model_crud extends CI_Model {

	var $table_person = 'person';
	var $column = array('id_employ','name','gender','departement','division','location'); //set column field database for order and search
  var $column_like=array('employ_id','name','date','quantity','status','remarks');
  var $order_person = array('id' => 'desc'); // default order
  var $table_like_this='like_this';
  var $table_blue_thumb='blue_thumbs';

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query(){
		$this->db->from($this->table_person);

		$i = 0;

		foreach ($this->column as $item)
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
				$column[$i] = $item;
				$i++;
		}

		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table_person);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table_person);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

public  function save_employ($data){
    $this->db->insert($this->table_person, $data);
    return $this->db->insert_id();
  }

public function save_like_this($data)
{
  $this->db->insert($this->table_like_this,$data);
  return $this->db->insert_id();
}
public function save_blue_thumb($data)
{
  $this->db->insert($this->table_blue_thumb,$data);
  return $this->db->insert_id();
}

public  function delete_employ_by_id($id){
    $this->db->where('id',$id);
    $this->db->delete($this->table_person);
  }

  public function update_employ($where,$data)
  {
    $this->db->update($this->table_person,$data,$where);
    return $this->db->affected_rows();
  }


 function add() {
  $id_employ= $this->input->post('id_employ');
  $name = $this->input->post('name');
  $gender = $this->input->post('gender');
  $departement = $this->input->post('departement');
  $division = $this->input->post('division');
  $location = $this->input->post('location');
  $data = array(
   'id_employ'=> $id_employ,
   'name' => $name,
   'gender' => $gender,
   'departement'=>$departement,
   'division' => $division,
   'location' => $location
  );
  $this->db->insert('person', $data);
 }

function addpoint(){
  $name_employ = $this->input->post('name');
  $date = $this->input->post('date');
  $blue_thumb = $this->input->post('blue_thumb');
  $like_this = $this->input->post('like_this');
  $status =$this->input->post('status');
  $award=$this->input->post('award');
  $data = array(
    'name_employ' => $name_employ,
    'date' =>$date,
    'blue_thumb'=>$blue_thumb,
    'like_this'=>$like_this,
    'status'=>$status,
    'award'=>$award
   );
   $this->db->insert('poin',$data);
}

function addredeem(){
  $code_redeem = $this->input->post('code_redeem');
  $name_redeem = $this->input->post('name_redeem');
  $periode = $this->input->post('periode');
  $quota = $this->input->post('quota');
  $blue_thumb = $this->input->post('blue_thumb');
  $like_this = $this->input->post('like_this');

  $redeem = array(
    'code_redeem'=>$code_redeem,
    'name_redeem'=>$name_redeem,
    'periode'=>$periode,
    'quota'=>$quota
  );

  $data = array(
    'blue_thumb'=>$blue_thumb,
    'like_this'=>$like_this,
   );
   $this->db->insert('redeems',$redeem);
   $this->db->insert('quantity',$data);
}

//get data point

private function _get_data_like_this()
{
  $this->db->from($this->table_like_this);
  $i=0;
  foreach ($this->column_like as $item) {
    if($_POST['search']['value'])
      ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
      $column_like[$i] = $item;
      $i++;
  }
  if(isset($_POST['order']))
  {
    $this->db->order_by($column_like[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
  }
  else if(isset($this->order))
  {
    $order = $this->order;
    $this->db->order_by(key($order), $order[key($order)]);
  }

}

function get_data_like_this()
{
  $this->_get_data_like_this();
  if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_like()
{
  $this->_get_data_like_this();
  $query = $this->db->get();
  return $query->num_rows();
}

public function count_all_like()
{
  $this->db->from($this->table_like_this);
  return $this->db->count_all_results();
}

// data blue Thumbs_________________________________________________________________

private function _get_data_blue_thumbs()
{
  $this->db->from($this->table_blue_thumb);
  $i=0;
  foreach ($this->column_like as $item) {
    if($_POST['search']['value'])
      ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
      $column_like[$i] = $item;
      $i++;
  }
  if(isset($_POST['order']))
  {
    $this->db->order_by($column_like[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
  }
  else if(isset($this->order))
  {
    $order = $this->order;
    $this->db->order_by(key($order), $order[key($order)]);
  }

}

function get_data_blue_thumbs()
{
  $this->_get_data_blue_thumbs();
  if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}

function count_filtered_blue()
{
  $this->_get_data_blue_thumbs();
  $query = $this->db->get();
  return $query->num_rows();
}

public function count_all_blue()
{
  $this->db->from($this->table_blue_thumb);
  return $this->db->count_all_results();
}

// sald

}

<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class Model_crud extends CI_Model {

	var $table_person = 'person';
	var $column = array('id_employ','name','gender','departement','division','location'); //set column field database for order and search
  var $column_like=array('employ_id','name','date','available','redeemed','remarks');
  var $order_person = array('id' => 'desc'); // default order
  var $table_like_this='like_this';
  var $table_blue_thumb='blue_thumbs';
  var $column_saldo=array('employ_id','name','available','redeemed');
  var $clm_redeem=array('id_reward','name','date_create','date_exp','available_qty','value','like_this','blue_thumb','like','blue','description');

  public function __construct()
  {
		parent::__construct();
		$this->load->database();
	}
  //get data from database
	private function _get_datatables_query()
  {
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
  //parent function untuk get data from data bases
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
	}

  //pengelompokan dalam datatable
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

  //Menghitung jumlah row data
	public function count_all()
	{
		$this->db->from($this->table_person);
		return $this->db->count_all_results();
	}

  //Select sesui id tertentu
	public function get_by_id($id)
	{
		$this->db->from($this->table_person);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

  public  function save_employ($data)
  {
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

// data blue Thumbs_____________________________________________________________

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

  //get data poin like this by id
  public function get_id_like_this($id)
  {
      $this->db->from('like_this');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->row();
  }
  // get data poin blue thumbs by id
  public function get_id_blue_thumbs($id)
  {
    $this->db->from('blue_thumbs');
    $this->db->where('id',$id);
    $query=$this->db->get();
    return $query->row();
  }

  //update poin like this to database
  public function update_like_this($where,$data)
  {
    $this->db->update('like_this',$data,$where);
    return $this->db->affected_rows();
  }
  //update poin blue thumbs to database
  public function update_blue_thumb($where,$data)
  {
    $this->db->update('blue_thumbs',$data,$where);
    return $this->db->affected_rows();
  }

  //delete poin like this by id in data base
  public function delete_point_like_this_by_id($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('like_this');
  }

  //delete poin blue thumbs by id in data base
  public function delete_point_blue_thumb_by_id($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('blue_thumbs');
  }

  //percobaan_get
  /*
  private function _get_redeem()
  {
    $this->db->from('reward');
    $i=0;

    foreach ($this->clm_redeem as $item) {
      if($_POST['search']['value'])
        ($i===0)?$this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item,$_POST['search']['value']);
        $clm_redeem[$i]=$item;
        $i++;
    }
    if(isset($_POST['order']))
    {
      $this->db->order_by($clm_redeem[$_POST['order']['0']['column']], $_POST['order']['0']);
    }
    else if(isset($this->order))
    {
      $order=$this->order;
      $this->db->order_by(key($order),$order[key($order)]);
    }
  }
  */
  private function _get_redeem()
  {
    $this->db->from('reward');

    $i = 0;

    foreach ($this->clm_redeem as $item)
    {
      if($_POST['search']['value'])
        ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
        $clm_redeem[$i] = $item;
        $i++;
    }

    if(isset($_POST['order']))
    {
      $this->db->order_by($clm_redeem[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_redeem()
  {
    $this->_get_redeem();
    if($_POST['length'] !=-1)
    {
      $this->db->limit($_POST['length'],$_POST['start']);
      $query=$this->db->get();
      return $query->result();
    }
    /*
    $this->db->select('r.*,n.like_this as like, n.blue_thumb as blue');
    $this->db->from('reward r, req_combi n');
    $this->db->where('r.id_reward=n.reward_id');
    $query=$this->db->get();
    return $query->result_array();
    */
  }

  function count_filtered_redeem()
  {
    $this->_get_redeem();
    $query=$this->db->get();
    return $query->num_rows();
  }


  function count_all_redeem()
  {
    $this->db->from('reward');
    return $this->db->count_all_results();
  }

  function get_saldo()
  {
      $this->db->select('employ_id, name, sum(available) as available, sum(redeemed) as redeemed');
      $this->db->group_by('employ_id');
      $query=$this->db->get('like_this');
      return $query->result_array();
  }


  public function get_saldo_blue()
  {
    $this->db->select('employ_id, name, sum(available) as available, sum(redeemed) as redeemed');
    $this->db->group_by('employ_id');
    $query=$this->db->get('blue_thumbs');
    return $query->result_array();
  }

}

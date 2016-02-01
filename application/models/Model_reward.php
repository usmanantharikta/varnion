<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');

class Model_reward extends CI_Model {

  public function ajax_save_reward($data)
  {
    $this->db->insert('reward',$data);
    return $this->db->insert_id();
  }
  public function model_delete_reward($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('reward');
  }

  public function get_by_id_reward($id)
  {
    $this->db->from('reward');
    $this->db->where('id',$id);
    $query=$this->db->get();
    return $query->row();
  }

  public function model_update_reward($where, $data)
  {
    $this->db->update('reward',$data,$where);
    return $this->db->affected_rows();
  }

}

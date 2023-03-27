<?php
class SoforlerModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }


    public function select()
    {
        $this->db->select("*");
        $this->db->from('tbl_soforler');
        $query = $this->db->get();
        return $query->result();
    }
    public function teksofor($x)
    {
      $this->db->select("*");
      $this->db->from('tbl_soforler');
      $this->db->where('id' , $x);
      $query = $this->db->get();
      return $query->result();
    }


    public function create($data)
    {
        $this->db->insert('tbl_soforler',$data);
        return $this->db->insert_id();
    }


    public function edit($where, $data)
    {
        $this->db->update('tbl_soforler', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete("tbl_soforler");

    }

}
?>


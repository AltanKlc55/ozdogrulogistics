<?php
class SubelerModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function select()
    {
        $this->db->select("*");
        $this->db->from('tbl_subeler');
        $query = $this->db->get();
        return $query->result();
    }

    public function teksube($x)
    {
        $this->db->select("*");
        $this->db->from('tbl_subeler');
        $this->db->where('id' , $x);
        $query = $this->db->get();
        return $query->result();
    }


    public function create($data)
    {
        $this->db->insert('tbl_subeler',$data);
        return $this->db->insert_id();
    }


    public function edit($where, $data)
    {
        $this->db->update('tbl_subeler', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete("tbl_subeler");

    }

}
?>

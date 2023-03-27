<?php
class BolgelerModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function select()
    {
        $this->db->select("*");
        $this->db->from('tbl_bolgeler');
        $query = $this->db->get();
        return $query->result();
    }

    public function tekbolge($x)
    {
        $this->db->select("*");
        $this->db->from('tbl_bolgeler');
        $this->db->where('id' , $x);
        $query = $this->db->get();
        return $query->result();
    }

    public function bolge_id($x)
    {
        $this->db->select("bolge_adi");
        $this->db->from('tbl_bolgeler');
        $this->db->where('id' , $x);
        $query = $this->db->get();
        return $query->result();
    }


    public function create($data)
    {
        $this->db->insert('tbl_bolgeler',$data);
        return $this->db->insert_id();
    }


    public function edit($where, $data)
    {
        $this->db->update('tbl_bolgeler', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete("tbl_bolgeler");

    }

}
?>

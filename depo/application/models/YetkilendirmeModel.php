<?php
class YetkilendirmeModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function select()
    {
        $this->db->select("*");
        $this->db->from('tbl_yetkiler');
        $query = $this->db->get();
        return $query->result();
    }

    public function tekyetki($x)
    {
        $this->db->select("*");
        $this->db->from('tbl_yetkiler');
        $this->db->where('id' , $x);
        $query = $this->db->get();
        return $query->result();
    }


    public function create($data)
    {
        $this->db->insert('tbl_yetkiler',$data);
        return $this->db->insert_id();
    }


    public function edit($where, $data)
    {
        $this->db->update('tbl_yetkiler', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete("tbl_yetkiler");

    }

}
?>

<?php
class EskiDatalarModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }


    public function getdatas()
    {
        $this->db->select("*");
        $this->db->from('eski_yazilim_musteri');
        $this->db->where('status',0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getdata_list()
    {
        $this->db->select("*");
        $this->db->from('eski_yazilim_musteri');
        $query = $this->db->get();
        return $query->result();
    }

    public function tek_eski_data($x)
    {
        $this->db->select("*");
        $this->db->from('eski_yazilim_musteri');
        $this->db->where('id',$x);
        $query = $this->db->get();
        return $query->result();
    }

    public function edit($where, $data)
    {
        $this->db->update('eski_yazilim_musteri', $data, $where);
        return $this->db->affected_rows();
    }


}
?>

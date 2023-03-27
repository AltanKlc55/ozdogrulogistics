<?php
class KargoStratejiModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function select()
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('konum_durum','TR');
        $query = $this->db->get();
        return $query->result();
    }


    public function sonkargostrateji()
    {
        $this->db->select("id");
        $this->db->from('tbl_kargo_strateji');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }



    public function select_eu()
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('konum_durum','EU');
        $query = $this->db->get();
        return $query->result();
    }

    public function select_tamam()
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('status',4);
        $query = $this->db->get();
        return $query->result();
    }

    public function select_admin()
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $query = $this->db->get();
        return $query->result();
    }

    public function tekstrateji($x)
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('id',$x);
        $query = $this->db->get();
        return $query->result();
    }


    public function ara_kargo_barkod_get($x)
    {
        $this->db->select("*");
        $this->db->from('ara_kargo');
        $this->db->where('barkod_no',$x);
        $query = $this->db->get();
        return $query->result();
    }




    public function kargo_id_get_by_ulke($x)
    {
        $this->db->select("*");
        $this->db->from('ara_kargo');
        $this->db->where('ulke',$x);
        $query = $this->db->get();
        return $query->result();
    }


    public function idget($x)
    {
        $this->db->select("*");
        $this->db->from('ara_kargo');
        $this->db->where('id',$x);
        $query = $this->db->get();
        return $query->result();
    }

    public function tekstrateji_get_tir($x)
    {

        $this->db->select("tir_icerisi");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('id',$x);
        $query = $this->db->get();
        return $query->result();
    }


    public function tekstrateji_eu($x)
    {

        $this->db->select("*");
        $this->db->from('tbl_kargo_strateji');
        $this->db->where('id',$x,'AND','kargo_durumu','EU');
        $query = $this->db->get();
        return $query->result();
    }


    public function create($data)
    {
        $this->db->insert('tbl_kargo_strateji',$data);
        return $this->db->insert_id();
    }

    public function edit($where, $data)
    {
        $this->db->update('tbl_kargo_strateji', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete("tbl_kargo_strateji");

    }

    public function delete_arakargo()
    {
        $this->db->where('kargo_id', $this->input->post('id'));
        return $this->db->delete("ara_kargo");

    }

}
?>

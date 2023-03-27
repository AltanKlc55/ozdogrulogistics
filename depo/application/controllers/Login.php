<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('panel/login/index');
    }





    public function giris_mobil()
    {

        echo $_POST['email'];
        die();


        $this->db->select('*,count(*) count');
        $this->db->from('tbl_personeller');
        $this->db->where(array('tel_no' => $_POST['telno'], 'sifre' => $_POST['sifre']));
        $query = $this->db->get();
        $user = $query->row();
        echo 2;
        if ($user->count > 0) {

            $_SESSION['user_logged'] = TRUE;
            $_SESSION['email'] = $user->email;
            $_SESSION['ad_soyad'] = $user->ad_soyad;
            $_SESSION['tel_no'] = $user->tel_no;
            $_SESSION['user_id'] = $user->id;

            $Message = "Success";


        } else {

            $Message = "No account yet";
        }
        $response[] = array("Message" => $Message);
        echo json_encode($response);

    }

    public function giris()
    {

        if (isset($_SESSION['user_logged']) != '') {

            redirect('panel');
        }


        $this->db->select('*,count(*) count');
        $this->db->from('tbl_personeller');
        $this->db->where(array('tel_no' => $_POST['telno'], 'sifre' => $_POST['sifre']));
        $query = $this->db->get();
        $user = $query->row();
        echo 2;
        if ($user->count > 0) {

            $_SESSION['user_logged'] = TRUE;
            $_SESSION['email'] = $user->email;
            $_SESSION['ad_soyad'] = $user->ad_soyad;
            $_SESSION['tel_no'] = $user->tel_no;
            $_SESSION['user_id'] = $user->id;

            redirect('panel');
        } else {

            $this->load->view('panel/login/index');
        }


    }





    public function logout()
    {
        session_destroy();

        $this->load->view('panel/login/index');
    }
}

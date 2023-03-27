<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Soforler extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('SoforlerModel');
        $this->load->model('SubelerModel');
    }

    public function ekle(){
        $data = array(
            'ad_soyad' =>  $_POST['ad_soyad'],
            'tel_no' =>  $_POST['tel_no'],
            'sube' => $_POST['sube'],
            'email' => $_POST['email'],
            'sifre' => $_POST['sifre'],
            'status' => 1
        );
        $insert = $this->SoforlerModel->create($data);
        if($insert) {
            echo 1;
        }else
        {
          echo 'no';
        }

    }

    public function index()
    {
        $data['soforler'] = $this->SoforlerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/soforler/index' , $data);
        $this->load->view('panel/include/footer');
    }





    public function sofor_ekle()
    {
        $data['soforler'] = $this->SoforlerModel->select();
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/soforler/sofor_ekle',$data);
        $this->load->view('panel/include/footer');
    }




    public function duzenle_sayfa()
    {
        $x = $_POST['id'];
        $data['teksofor'] = $this->SoforlerModel->teksofor($x);

        $this->load->view('panel/include/header');
        $this->load->view('panel/soforler/sofor_duzenle' , $data);
        $this->load->view('panel/include/footer');
    }



    public function sil()
    {
        $delete = $this->SoforlerModel->delete();


        if($delete)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
        }
    }



    public function duzenle()
    {
        $data['soforler'] = $this->SoforlerModel->select();

        $id = $_POST['id'];
        $udata = array(
            'ad_soyad' =>  $_POST['ad_soyad'],
            'tel_no' =>  $_POST['tel_no'],
            'sube' => $_POST['sube'],
            'email' => $_POST['email'],
            'sifre' => $_POST['sifre'],
            'status' => 1
        );


        $update = $this->SoforlerModel->edit(array('id' => $id),$udata);
        if($update)
        {
            echo 1;
        }
        else
        {
            echo 'no';
        }


    }



}
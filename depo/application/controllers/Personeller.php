<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personeller extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('AraclarModel');
        $this->load->model('SubelerModel');
        $this->load->model('PersonellerModel');
    }


    public function index()
    {
        $data['personeller'] = $this->PersonellerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/personeller/personel-listesi' , $data);
        $this->load->view('panel/include/footer');
    }


    public function ekle()
    {


        $data = array(
            'ad_soyad' =>  $_POST['ad_soyad'],
            'tel_no' =>  $_POST['tel_no'],
            'email' => $_POST['email'],
            'sifre' => $_POST['sifre'],
            'status' => 1
        );


        $insert = $this->PersonellerModel->create($data);

        if($insert)
        {

            echo 'ok';

        }
        else
        {


            echo 'no';


        }


    }


    public function personel_ekle()
    {
        $data['personeller'] = $this->PersonellerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/personeller/personel-ekle',$data);
        $this->load->view('panel/include/footer');
    }




    public function personel_duzenle()
    {
        $x = $_POST['id'];
        $data['tekpersonel'] = $this->PersonellerModel->tekpersonel($x);
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/personeller/personel-duzenle' , $data);
        $this->load->view('panel/include/footer');
    }



    public function sil()
    {
        $delete = $this->PersonellerModel->delete();


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
        $data['personeller'] = $this->PersonellerModel->select();

        $id = $_POST['id'];
        $udata = array(
            'ad_soyad' =>  $_POST['ad_soyad'],
            'tel_no' =>  $_POST['tel_no'],
            'email' => $_POST['email'],
            'sifre' => $_POST['sifre'],
            'status' => 1
        );



        $update = $this->PersonellerModel->edit(array('id' => $id),$udata);
        if($update)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
        }


    }





}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subeler extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('SubelerModel');
        $this->load->model('BolgelerModel');
    }


    public function index()
    {
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/subeler/index' , $data);
        $this->load->view('panel/include/footer');
    }


    public function ekle()
    {


        $data = array(
            'sube_adi' =>  $_POST['sube_adi'],
            'sube_bolgesi' =>  $_POST['sube_bolgesi'],
            'sube_konumu' => $_POST['sube_konumu'],
            'status' => 1
        );


        $insert = $this->SubelerModel->create($data);

        if($insert)
        {

            echo 'ok';

        }
        else
        {


            echo 'no';


        }


    }


    public function sube_ekle()
    {
        $data['subeler'] = $this->SubelerModel->select();
        $data['bolgeler'] = $this->BolgelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/subeler/sube_ekle',$data);
        $this->load->view('panel/include/footer');
    }








    public function duzenle_sayfa()
    {
        $x = $_POST['id'];
        $data['teksube'] = $this->SubelerModel->teksube($x);
        $data['bolgeler'] = $this->BolgelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/subeler/sube_duzenle' , $data);
        $this->load->view('panel/include/footer');
    }



    public function sil()
    {
        $delete = $this->SubelerModel->delete();


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
        $id = $_POST['id'];

        $data = array(
        'sube_adi' =>  $_POST['sube_adi'],
        'sube_bolgesi' =>  $_POST['sube_bolgesi'],
        'sube_konumu' => $_POST['sube_konumu'],
        'status' => 1
    );


        $update = $this->SubelerModel->edit(array('id' => $id),$data);
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
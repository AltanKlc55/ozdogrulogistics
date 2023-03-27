<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yetkilendirme extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('SubelerModel');
        $this->load->model('BolgelerModel');
        $this->load->model('PersonellerModel');
        $this->load->model('YetkilendirmeModel');

    }



    public function index(){
        $data['yetkiler'] = $this->YetkilendirmeModel->select();

        $this->load->view('panel/include/header');
        $this->load->view('panel/yetkiler/yetki-listesi' , $data);
        $this->load->view('panel/include/footer');

    }




    public function personel_yetkilendir()
    {
        $data['personeller'] = $this->PersonellerModel->select();


        $this->load->view('panel/include/header');
        $this->load->view('panel/yetkiler/personel-yetkilendir' , $data);
        $this->load->view('panel/include/footer');
    }


    public function ekle()
    {

        $yetkiler = $_POST['yetkiler'];
        $yetki_array = $yetkiler;
        $bolunmus = explode(",", $yetki_array);




        $data = array(

            'personel_id' => $_POST['personel_id']
        );


        $data['yetkiler'] = json_encode($bolunmus,true);

        $insert = $this->YetkilendirmeModel->create($data);

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
        $data['tekyetki'] = $this->YetkilendirmeModel->tekyetki($x);

        $this->load->view('panel/include/header');
        $this->load->view('panel/yetkiler/yetki-duzenle' , $data);
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
        $yetkiler = $_POST['yetkiler'];
        $yetki_array = $yetkiler;
        $bolunmus = explode(",", $yetki_array);

        $id = $_POST['id'];


        $data = array(

            'personel_id' => $_POST['personel_id']
        );


        $data['yetkiler'] = json_encode($bolunmus,true);


        $update = $this->YetkilendirmeModel->edit(array('id' => $id),$data);
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
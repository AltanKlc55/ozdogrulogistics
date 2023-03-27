<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bolgeler extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('BolgelerModel');
    }


    public function index()
    {
        $data['bolgeler'] = $this->BolgelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/bolgeler/index' , $data);
        $this->load->view('panel/include/footer');
    }


    public function ekle()
    {


        $data = array(
            'bolge_adi' =>  $_POST['bolge_adi'],
            'bolge_adresi' =>  $_POST['bolge_adresi'],
            'bolge_kodu' => $_POST['bolge_kodu'],
            'status' => 1
        );


        $insert = $this->BolgelerModel->create($data);

        if($insert)
        {

            echo 'ok';

        }
        else
        {


            echo 'no';


        }


    }


    public function bolge_ekle()
    {
        $data['bolgeler'] = $this->BolgelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/bolgeler/bolge_ekle',$data);
        $this->load->view('panel/include/footer');
    }


    public function barcode_check()
    {
        $bcode = $_POST['barcode'];

        $resp_data = $this->KargolarModel->barcode($bcode);

        foreach ($resp_data as $rd){
            echo $rd->ad." ".$rd->soyad;
        }
    }





    public function alici_adres_getir()
    {
        $id = $_POST['id'];
        $degisken = $this->MusteriModel->tekmusteri($id);

        foreach($degisken as $d){
            echo "Ülke :".$d->ulke."<br>";
            echo "Şehir :".$d->sehir."<br>";
            echo "İlçe :".$d->ilceler."<br>";
            echo "Mahalle :".$d->mahalle."<br>";
            echo "Sokak :".$d->sokak."<br>";
            echo "Kapı No :".$d->kapi_no."<br>";
            echo "Daire No :".$d->daire_no."<br>";

            echo "<textarea hidden name='acik_adres' id='acik_adres' cols='30' rows='10'>";



            echo "Ülke :".$d->ulke."<br>";
            echo "Şehir :".$d->sehir."<br>";
            echo "İlçe :".$d->ilceler."<br>";
            echo "Mahalle :".$d->mahalle."<br>";
            echo "Sokak :".$d->sokak."<br>";
            echo "Kapı No :".$d->kapi_no."<br>";
            echo "Daire No :".$d->daire_no."<br>";






            echo "</textarea>";


        }



    }


    public function alici_iletisim_getir()
    {
        $id = $_POST['id'];
        $degisken = $this->MusteriModel->tekmusteri($id);

        foreach($degisken as $d){
            echo "Telefon No :".$d->tel_no."<br>";
            echo "Email :".$d->email."<br>";

            echo "<input hidden id='iletisim_temel' name='iletisim_temel' type='text' value='".$d->tel_no." ".$d->email."'>";
        }
    }


    public function duzenle_sayfa()
    {
        $x = $_POST['id'];
        $data['tekbolge'] = $this->BolgelerModel->tekbolge($x);

        $this->load->view('panel/include/header');
        $this->load->view('panel/bolgeler/bolge_duzenle' , $data);
        $this->load->view('panel/include/footer');
    }



    public function sil()
    {
        $delete = $this->BolgelerModel->delete();


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
        $data['bolgeler'] = $this->BolgelerModel->select();

        $id = $_POST['id'];
        $udata = array(
            'bolge_adi' =>  $_POST['bolge_adi'],
            'bolge_adresi' =>  $_POST['bolge_adresi'],
            'bolge_kodu' => $_POST['bolge_kodu'],
            'status' => 1
        );


        $update = $this->BolgelerModel->edit(array('id' => $id),$udata);
        if($update)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
        }


    }




    public function ekleme_sayfasi()
    {

    }



    public function sehirler()
    {



    }





    public function ilceler()
    {



    }


    public function kaydet()
    {

    }


}
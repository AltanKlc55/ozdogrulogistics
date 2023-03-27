<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Araclar extends CI_Controller {


    public function __construct(){
        parent::__construct();

        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }

        $this->load->model('AraclarModel');
        $this->load->model('SubelerModel');
    }


    public function index()
    {
        $data['araclar'] = $this->AraclarModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/araclar/index' , $data);
        $this->load->view('panel/include/footer');
    }


    public function ekle()
    {


        $data = array(
            'marka' =>  $_POST['marka'],
            'model' =>  $_POST['model'],
            'metre_kup' => $_POST['metre_kup'],
            'plaka' => $_POST['plaka'],
            'sube' => $_POST['sube'],
            'status' => $_POST['status']
        );


        $insert = $this->AraclarModel->create($data);

        if($insert)
        {

            echo 'ok';

        }
        else
        {


            echo 'no';


        }


    }


    public function arac_ekle()
    {
        $data['araclar'] = $this->AraclarModel->select();
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/araclar/arac_ekle',$data);
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


    public function arac_duzenle()
    {
        $x = $_POST['id'];
        $data['tekarac'] = $this->AraclarModel->tekarac($x);
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/araclar/arac_duzenle' , $data);
        $this->load->view('panel/include/footer');
    }



    public function sil()
    {
        $delete = $this->AraclarModel->delete();


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
        $data['araclar'] = $this->AraclarModel->select();

        $id = $_POST['id'];
        $udata = array(
            'marka' =>  $_POST['marka'],
            'model' =>  $_POST['model'],
            'metre_kup' => $_POST['metre_kup'],
            'plaka' => $_POST['plaka'],
            'sube' => $_POST['sube'],
            'status' => $_POST['status']
        );



        $update = $this->AraclarModel->edit(array('id' => $id),$udata);
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
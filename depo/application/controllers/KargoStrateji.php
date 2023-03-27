<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KargoStrateji extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('MusteriModel');
        $this->load->model('KargoStratejiModel');
        $this->load->model('KargolarModel');
        $this->load->model('SubelerModel');
        $this->load->model('AraclarModel');
        $this->load->model('AdresModel');
        $this->load->model('SoforlerModel');
    }


    public function index()
    {

        $data['strateji'] = $this->KargoStratejiModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/strateji_list' , $data);
        $this->load->view('panel/include/footer');
    }

    public function index_eu()
    {

        $data['strateji'] = $this->KargoStratejiModel->select_eu();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/strateji_list_eu' , $data);
        $this->load->view('panel/include/footer');
    }


    public function index_tamamlanan()
    {

        $data['strateji'] = $this->KargoStratejiModel->select_tamam();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/kargo_tamamlanan' , $data);
        $this->load->view('panel/include/footer');
    }



    public function strateji_incele()
    {
        $id = $_POST['id'];
        $data['tekstrateji'] = $this->KargoStratejiModel->tekstrateji($id);


        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/strateji_incele' , $data);
        $this->load->view('panel/include/footer');
    }

    public function hizli_programla()
    {
        $data['kargolar'] = $this->KargolarModel->select_admin();
        $data['arac'] = $this->AraclarModel->select();
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $data['subeler'] = $this->SubelerModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/hizli_kargo_programla',$data);
        $this->load->view('panel/include/footer');
    }


    public function hizli_basla()
    {
        $data = array(
            'gidecegi_ulke' =>  $_POST['ulke'],
            'arac' => $_POST['arac'],
            'sube' => $_POST['sube'],
            'konum_durum' => $_POST['konum_durumu'],
            'status' => 0
        );



        $insert = $this->KargoStratejiModel->create($data);

        $datas = array();

        $datas['sondata']=$this->KargoStratejiModel->sonkargostrateji();

        if($insert)
        {
            $this->load->view('panel/include/header');
            $this->load->view('panel/kargo_strateji/hizli_kargo_programla2',$datas);
            $this->load->view('panel/include/footer');
        }
        else
        {
            echo 'no';
        }
    }

    public function barkoda_gore_ekle()
    {

        $id = $_POST['id'];
        $barkod = $_POST['barkod_kam'];

        $guncelleme_oncesi = $this->KargoStratejiModel->tekstrateji_get_tir($id);
        $kargo_id = $this->KargoStratejiModel->ara_kargo_barkod_get($barkod);

        foreach ($kargo_id as $kid);

        $cagirilan_kargo = $this->KargoStratejiModel->idget($kid->id);


        foreach ($cagirilan_kargo as $cg);
        foreach ($guncelleme_oncesi as $go);


        if($guncelleme_oncesi != ""){
            foreach ($cagirilan_kargo as $cs);
         $eski_tir_data=$go->tir_icerisi;


                 $tir_datasi = $cs->barkod_no.',';


                 $data = array(
                     'tir_icerisi' => $tir_datasi.$eski_tir_data
                 );



        } else{


                    $tir_datasi = $cg->id.',';


                    $data = array(
                        'tir_icerisi' => $tir_datasi
                    );

        }
        



        $update = $this->KargoStratejiModel->edit(array('id' => $id),$data);



        if($update)
        {

            $tekstrateji_musteri = $this->KargoStratejiModel->tekstrateji_get_tir($id);


            foreach ($tekstrateji_musteri as $item) {
                $tm_data = $item->tir_icerisi;
            }

            $tir_icerik_gets = explode(",",$tm_data);

            for($i = 0;$i < count($tir_icerik_gets); $i++){


                       if($tir_icerik_gets[$i]==NULL)   {
                          unset($tir_icerik_gets[$i]);
                       }else{

                               echo'                                                                     
                           <tr id="'.$tir_icerik_gets[$i].' '.$i.'">                                            
                           <td>'.$tir_icerik_gets[$i].'</td>                                             
                           <td>'.get_musteri(kargo_musteri(ara_kargodan_kargoya($tir_icerik_gets[$i]))).'</td>                  
                           <td>'.get_adress(ara_kargodan_kargoya($tir_icerik_gets[$i])).'</td>                                  
                           <td>'.get_iletisim_temel(ara_kargodan_kargoya($tir_icerik_gets[$i])).'</td>                          
                           <td>'.get_strateji_durum(kargo_nakliye_durumu(ara_kargodan_kargoya($tir_icerik_gets[$i]))).'</td>    
                           </tr>                                                                          
                                                                                                         
                          ';
                            }  
               }

        }
        else
        {
            echo 'no';
            print_r($data);
        }




    }


    public function sehirler()
    {
        $ulke_kodu = $_POST['ulke_kodu'];
        echo '<option> Şehir Seçiniz </option>';
        $sehirler = $this->AdresModel->sehirler($ulke_kodu);
        foreach($sehirler as $s){
            echo '<option value="'.$s->id.'" >'.$s->baslik.'</option>';
        }

    }


    public function ulkelere_gore_get(){

        $ulke_adi = $_POST['ulke'];

        $ulke_ara_kargo = $this->KargoStratejiModel->kargo_id_get_by_ulke($ulke_adi);
        $bir = 1;

        foreach ($ulke_ara_kargo as $uk){

            if(get_musteri(kargo_musteri($uk->kargo_id)) != ""){
            echo '
                                        
                           <tr>  
                           <td class="text-center"><input name="secim[]" class="form-check-input" type="checkbox" value="'.$uk->barkod_no.'" id="'.$uk->barkod_no.'"></td>                                                                                   
                           <td>'.$uk->id.'</td>
                           <td>'.get_musteri(kargo_musteri($uk->kargo_id)).'</td>                  
                           <td>'.get_adress($uk->kargo_id).'</td>                                  
                           <td>'.kargo_adet($uk->kargo_id).'</td>
                           <td>'.$uk->adet.'</td>
                           </tr> 
                                          
            ';
            }else{
                
            }
        }
    }


    public function ulkelere_gore_get_eu(){

        $ulke_adi = $_POST['ulke'];

        $ulke_ara_kargo = $this->KargoStratejiModel->kargo_id_get_by_ulke($ulke_adi);
        $bir = 1;

        foreach ($ulke_ara_kargo as $uk){

            if(get_musteri(kargo_musteri($uk->kargo_id)) != "" && $uk->status == 2){
                echo '
                                        
                           <tr id="'.$uk->barkod_no.'">  
                           <td class="text-center"><input name="secim[]" class="form-check-input" type="checkbox" value="'.$uk->barkod_no.'" id="'.$uk->barkod_no.'"></td>                                                                                   
                           <td>'.$uk->id.'</td>
                           <td>'.get_musteri(kargo_musteri($uk->kargo_id)).'</td>                  
                           <td>'.get_adress($uk->kargo_id).'</td>                                  
                           <td>'.kargo_adet($uk->kargo_id).'</td>
                           <td>'.$uk->adet.'</td>
                           </tr> 
                                          
            ';
            }else{

            }
        }
    }





    public function ilceler()
    {
        $sehir_kodu = $_POST['sehir_kodu'];
        echo '<option> İlçe Seçiniz </option>';

        $ilceler = $this->AdresModel->ilceler($sehir_kodu);

        foreach($ilceler as $i){
            echo '<option value="'.$i->id.'" >'.$i->baslik.'</option>';
        }


    }

    public function ekle()
    {


       $data = array(
           'gidecegi_ulke' =>  $_POST['ulke'],
           'tir_icerisi' => $_POST['tir_icerisi'],
           'arac' => $_POST['arac'],
           'sube' => $_POST['sube'],
           'konum_durum' => $_POST['konum_durumu'],
           'status' => 0
       );

        $araba = array(
            'arac' => $_POST['arac']
        );



        $tir_icerik =  $_POST['tir_icerisi'];
        $bolunmus = explode(",", $tir_icerik);

        for($i = 0; $i < count($bolunmus); ++$i){
            $update = $this->KargolarModel->edit(array('id' => $bolunmus[$i]),$araba);
        }


        $insert = $this->KargoStratejiModel->create($data);




        if($insert)
        {
          echo 'ok';
        }
          else
        {
          echo 'no';
        }


    }


    public function ekle_eu()
    {
          $data = array(
            'gidecegi_ulke' =>  $_POST['ulke'],
            'tir_icerisi' => $_POST['tir_icerisi'],
            'arac' => $_POST['arac'],
            'sube' => $_POST['sube'],
            'konum_durum' => $_POST['konum_durumu'],
            'sofor' => $_POST['sofor'],
            'status' => 2
          );

        $insert = $this->KargoStratejiModel->create($data);

        $araba = array(
            'arac' => $_POST['arac']
        );



        $tir_icerik =  $_POST['tir_icerisi'];
        $bolunmus = explode(",", $tir_icerik);

        for($i = 0; $i < count($bolunmus); ++$i){
            $update = $this->KargolarModel->edit(array('id' => $bolunmus[$i]),$araba);
        }

        if($insert)
        {echo 'ok';

        }
        else
        {
            echo 'no';
        }


    }


    public function toplu_yazdir()
    {
        $id = $_POST['id'];
        $tir = $_POST['tir'];
        $tir_icerik = $tir;
        $bolunmus = explode(",", $tir_icerik);

        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
        for($i = 0; $i < count($bolunmus); ++$i)
        {
            $musteri_get = get_musteri_id($bolunmus[$i]);

        echo '<div border-bottom:1px solid black;">
        <div style="padding-top: 10px; " class="text-center">
            <img style="padding-left: 10px; height: 80px; width: auto;" src="'.base_url('upload/').'odl.jpg">
        </div>
        <div class="row">
        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Name Surname :  '.get_musteri($musteri_get).'
        </div>

        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Contact (Phone / Email) :  '.get_iletisim_temel($bolunmus[$i]).'
        </div>
        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Adress :  '.get_adress($bolunmus[$i]).' <br>
            '.get_kod($bolunmus[$i]).'
        </div>
        </div>
        <div style="height:300px;" class="text-center">
            <img style="padding-left: 10px; height: 150px; width: auto;padding-top:10px;" src="'.base_url().get_qr_photo($bolunmus[$i]).'">
        </div> </div>';

        }

        echo '    <script src="'.base_url('assets/').'vendor/jquery/jquery.min.js"></script>
        <script>

           window.print();
           var delayInMilliseconds = 1000; //1 second
          
          setTimeout(function() {
                 window.location.href = "'.base_url('kargo-strateji').'";
          }, delayInMilliseconds);

        </script>';

    }

    public function yazdir()
    {
        $id = $_POST['id'];
        $barcode = get_qr_photo($id);
        $tekkargo = $this->KargolarModel->tekkargo($id);
        $barcode = $barcode;
        foreach ($tekkargo as $tk);


        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <div style="padding-top: 10px;" class="text-center">
            <img style="padding-left: 10px; height: 80px; width: auto;" src="'.base_url('upload/').'odl.jpg">
        </div>
        <div class="row">
        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Name Surname :  '.get_musteri($tk->musteri).'
        </div>

        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Contact (Phone / Email) :  '.$tk->iletisim_temel.'
        </div>
        <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
            Adress :  '.$tk->acik_adres.' <br>
            '.$tk->kod.'
        </div>
        </div>
        <div style="padding-top: 10px;padding-bottom: 10px;border:1px solid black;" class="text-center">
            <img style="padding-left: 10px; height: 150px; width: auto;padding-top:10px;" src="'.base_url().$barcode.'">
        </div>
        <script src="'.base_url('assets/').'vendor/jquery/jquery.min.js"></script>
        <script>

           window.print();
           var delayInMilliseconds = 1000; //1 second
          
          setTimeout(function() {
                 window.location.href = "'.base_url('kargolar').'";
          }, delayInMilliseconds);

        </script>';


    }

    public function kargo_programla()
    {
      $data['kargolar'] = $this->KargolarModel->select_admin();
      $data['arac'] = $this->AraclarModel->select();
      $data['ulkeler'] = $this->AdresModel->ulkeler();
      $data['subeler'] = $this->SubelerModel->select();
      $this->load->view('panel/include/header');
      $this->load->view('panel/kargo_strateji/kargo_programla',$data);
      $this->load->view('panel/include/footer');
    }


    public function kargo_programla_eu()
    {
      $data['soforler'] = $this->SoforlerModel->select();
      $data['kargolar'] = $this->KargolarModel->select_eu();
      $data['arac'] = $this->AraclarModel->select();
      $data['ulkeler'] = $this->AdresModel->ulkeler();
      $data['subeler'] = $this->SubelerModel->select();
      $this->load->view('panel/include/header');
      $this->load->view('panel/kargo_strateji/kargo_programla_eu',$data);
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

    public function alici_adres_getir_eski()
    {
        $id = $_POST['id'];
        $degisken = $this->EskiDatalarModel->tek_eski_data($id);

        echo 'Lütfen Açık Adres Verilerini Forma Aşşağıya Ekleyiniz (Bu İşlem Verilerin Tazelenmesi İçindir)!! <br><br><br>';

        $a = 0;
        foreach($degisken as $d){

            echo "<textarea hidden name='acik_adres_eski' id='acik_adres_eski' cols='30' rows='10'>";
            echo "Ülke :".$d->ulke."<br>";
            echo "Şehir :".$d->sehir."<br>";
            echo "İlçe :".$d->ilceler."<br>";
            echo "Mahalle :".$d->mahalle."<br>";
            echo "Sokak :".$d->sokak."<br>";
            echo "Kapı No :".$d->kapi_no."<br>";
            echo "Daire No :".$d->daire_no."<br>";
            echo "Daire No :".$d->posta_kodu."<br>";
            echo "</textarea>";
            if($a == 0){
                echo "<div id='eski_acik_adres'>";
                echo "Adres :".$d->adres;
                echo "</div>";
            }
            $a++;
        }

    }


    public function alici_iletisim_getir()
    {
        $id = $_POST['id'];
        $degisken = $this->MusteriModel->tekmusteri($id);
        $a = 0;

        foreach($degisken as $d){
            if($a == 0){
                echo "Telefon No :".$d->tel_no."<br>";
                echo "Email :".$d->email."<br>";

                echo "<input hidden id='iletisim_temel' name='iletisim_temel' type='text' value='".$d->tel_no." ".$d->email."'>";
            }
            $a ++;
        }
    }


    public function alici_iletisim_getir_eski()
    {
        $id = $_POST['id'];
        $degisken = $this->EskiDatalarModel->tek_eski_data($id);
        $a = 0;
        echo 'Bilgileriniz Aşşağıdaki Gibidir Lütfen Data Revizesi İçin Form İçerisine Dataları Giriniz. <br> Mail Opsiyoneldir <br><br>';

        foreach($degisken as $d){
            if($a == 0){
                echo "Telefon No :".$d->telefon."<br>";

                echo "<input hidden id='iletisim_temel' name='iletisim_temel' type='text' value='".$d->telefon." ".$d->email."'><br>";
            }
            $a ++;
        }
    }
    public function durum_degis()
    {
      $id = $_POST['id'];
      $status = $_POST['status'];

      if($status == 0){
          $data = array(
              'status' => 1
          );
      }else if($status == 1){
          $data = array(
              'status' => 2
          );
      }else if($status == 2){
          $data = array(
              'status' => 3
          );
      }else if($status == 3){
          $data = array(
              'status' => 4
          );
      }



        $tir_icerik = strateji_id_tir_icerik($id);
        $bolunmus = explode(",", $tir_icerik);

        for($i = 0; $i < count($bolunmus); ++$i)
        {
            $kupdate = $this->KargolarModel->edit_arakargo(array('barkod_no' => $bolunmus[$i]),$data);
            echo $bolunmus[$i];
        }


        $update = $this->KargoStratejiModel->edit(array('id' => $id),$data);


        if($update)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
        }

    }


    public function ana_starteji()
    {

        $x = $_POST['id'];
        $data['strateji'] = $this->KargoStratejiModel->tekstrateji($x);
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $data['arac'] = $this->AraclarModel->select();
        $data['subeler'] = $this->SubelerModel->select();



        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/strateji_duzenle',$data);
        $this->load->view('panel/include/footer');

    }


    public function ana_starteji_eu()
    {

        $x = $_POST['id'];
        $data['soforler'] = $this->SoforlerModel->select();
        $data['strateji'] = $this->KargoStratejiModel->tekstrateji_eu($x);
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $data['arac'] = $this->AraclarModel->select();
        $data['subeler'] = $this->SubelerModel->select();



        $this->load->view('panel/include/header');
        $this->load->view('panel/kargo_strateji/strateji_duzenle_eu',$data);
        $this->load->view('panel/include/footer');

    }


    public function sil()
    {
        $delete = $this->KargoStratejiModel->delete();


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
            'gidecegi_ulke' =>  $_POST['ulke'],
            'tir_icerisi' => $_POST['tir_icerisi'],
            'arac' => $_POST['arac'],
            'sube' => $_POST['sube'],
            'status' => $_POST['status']
        );

        $araba = array(
            'arac' => $_POST['arac']
        );



        $tir_icerik =  $_POST['tir_icerisi'];
        $bolunmus = explode(",", $tir_icerik);

        for($i = 0; $i < count($bolunmus); ++$i){
            $dupdate = $this->KargolarModel->edit(array('id' => $bolunmus[$i]),$araba);
        }

        $update = $this->KargoStratejiModel->edit(array('id' => $id),$data);

        if($update)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
            print_r($data);
        }

    }

    public function duzenle_eu()
    {

        $id = $_POST['id'];

        $data = array(
            'gidecegi_ulke' =>  $_POST['ulke'],
            'tir_icerisi' => $_POST['tir_icerisi'],
            'arac' => $_POST['arac'],
            'sube' => $_POST['sube'],
            'sofor' => $_POST['sofor'],
            'status' => $_POST['status']
        );


        $araba = array(
            'arac' => $_POST['arac']
        );



        $tir_icerik =  $_POST['tir_icerisi'];
        $bolunmus = explode(",", $tir_icerik);

        for($i = 0; $i < count($bolunmus); ++$i){
            $dupdate = $this->KargolarModel->edit(array('id' => $bolunmus[$i]),$araba);
        }


        $update = $this->KargoStratejiModel->edit(array('id' => $id),$data);

        if($update)
        {
            echo 'ok';
        }
        else
        {
            echo 'no';
            print_r($data);
        }

    }




    public function ekleme_sayfasi()
    {

    }




    public function kaydet()
    {

    }


}
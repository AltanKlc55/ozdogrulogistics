<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kargolar extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {

            redirect('login/index');
        }
        $this->load->model('AdresModel');
        $this->load->model('MusteriModel');
        $this->load->model('KargolarModel');
        $this->load->model('EskiDatalarModel');
        $this->load->model('AraclarModel');
    }


    public function index()
    {
        $data['kargolar'] = $this->KargolarModel->select();
        $data['musteris'] = $this->MusteriModel->sonmusteri();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargolar/list' , $data);
        $this->load->view('panel/include/footer');
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



            $kupdate = $this->KargolarModel->edit(array('id' => $id),$data);



        if($kupdate)
        {

            $kargo_id = $id;

            $y = '';
            $z = '';

            if(kargo_nakliye_durumu($kargo_id) == 0){
                $y = "Merkez Çıkışını Ver";
            }
             else if(kargo_nakliye_durumu($kargo_id) == 1){
                $y = "Dağıtım Öncesi Depoya Vardı";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 2){
                $y = "Dağıtıma Çıkart";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 3){
                 $y = "İşlem Yapılamaz";
                 $z = "İşlem Yapılamaz";
            }else if(kargo_nakliye_durumu($kargo_id) == 4){
                $y = "İşlem Yapılamaz";
                $z = "İşlem Yapılamaz";
            }


            echo'     
        <tr id="'.$kargo_id.'">
        <td>'.$kargo_id.'</td>
       <td>'.get_musteri(kargo_musteri($kargo_id)).'</td>
       <td>'.get_adress($kargo_id).'</td>
       <td>'.get_iletisim_temel($kargo_id).'</td>
       <td>'.get_strateji_durum(kargo_nakliye_durumu($kargo_id)).'</td>
       <td>'.get_arac(get_arac_kargo($kargo_id)).'</td>
       <td><button class="btn btn-primary durum_guncellemesi" name="'.kargo_nakliye_durumu($kargo_id).'" id="'.$kargo_id.'">'.$y.'</button></td>
       </tr>  
       
       ';


        }else{

        }



    }


    public function barkoda_gore_getir_ve_ekle()
    {
        $barcode = $_POST['barkod_kam'];

        $barkod_kontrol = $this->KargolarModel->kargoge_barkode($barcode);

        if($barkod_kontrol > 0){


            $kargo_id = barcode_get_id($barcode);

            $y = '';
            $z = '';
            if(kargo_nakliye_durumu($kargo_id) == 1){
                $y = "Dağıtım Öncesi Depoya Vardı";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 2){
                $y = "Dağıtıma Çıkart";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 3){
                $y = "Tamamla";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 4){
                $y = "İşlem Yapılamaz";
                $z = "durum_guncellemesi";
            }else if(kargo_nakliye_durumu($kargo_id) == 0){
                $y = "Merkez Çıkışını Ver";
            }


            echo'     
        <tr id="'.$kargo_id.'">
        <td >'.$kargo_id.'</td>
       <td>'.get_musteri(kargo_musteri($kargo_id)).'</td>
       <td>'.get_adress($kargo_id).'</td>
       <td>'.get_iletisim_temel($kargo_id).'</td>
       <td>'.get_strateji_durum(kargo_nakliye_durumu($kargo_id)).'</td>
       <td>'.get_arac(get_arac_kargo($kargo_id)).'</td>
       <td><button class="btn btn-primary durum_guncellemesi" name="'.kargo_nakliye_durumu($kargo_id).'" id="'.$kargo_id.'">'.$y.'</button></td>
       </tr>  
       
       ';
        }else{

        }

    }









    public function barkoda_gore_getir()
    {
        $barcode = $_POST['barkod_kam'];

        $barkod_kontrol = $this->KargolarModel->kargoge_barkode_ara_kargo($barcode);

        if($barkod_kontrol > 0){


            $kargo_id = barcode_get_id_ara_kargo($barcode);



        $y = '';
        $z = '';
        if(kargo_nakliye_durumu($kargo_id) == 1){
            $y = "Dağıtım Öncesi Depoya Vardı";
            $z = "durum_guncellemesi";
        }else if(kargo_nakliye_durumu($kargo_id) == 2){
            $y = "Dağıtıma Çıkart";
            $z = "durum_guncellemesi";
        }else if(kargo_nakliye_durumu($kargo_id) == 3){
            $y = "Tamamla";
            $z = "durum_guncellemesi";
        }else if(kargo_nakliye_durumu($kargo_id) == 4){
            $y = "İşlem Yapılamaz";
            $z = "durum_guncellemesi";
        }else if(kargo_nakliye_durumu($kargo_id) == 0){
            $y = "Merkez Çıkışını Ver";
        }


        echo'     
        <tr id="'.$kargo_id.'">
        <td >'.$kargo_id.'</td>
       <td>'.get_musteri(kargo_musteri($kargo_id)).'</td>
       <td>'.get_adress($kargo_id).'</td>
       <td>'.get_iletisim_temel($kargo_id).'</td>
       <td>'.get_strateji_durum(kargo_nakliye_durumu($kargo_id)).'</td>
       </tr>  
       
       ';
        }else{

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
        echo $_POST['ulke'];
        $idveri = $_POST['id']+1;
        $veri_kargo_id = array(
            'veri_id' => $idveri
        );
        $veri_ekle = $this->KargolarModel->kargo_sayim_ekle($veri_kargo_id);

        $kargo_adet = $_POST['kargo_adet'];
        $sonkargo = $this->KargolarModel->sonkargoveri();
        foreach ($sonkargo as $sk);
        $xveri = $idveri;
        if($_POST['ulke'] == ""){
            $ulkeveri = $_POST['eski_ulke'];
        }else{
            $ulkeveri = $_POST['ulke'];
        }

        for($i = 0;$i < $kargo_adet;++$i){
            $code[$i] = rand(100000, 99999999);
            $this->load->library('Zend');
            $this->zend->load('Zend/Barcode');
            $barcodeOptions[$i] = array('text'=>$code[$i]);
            $rendererOptions[$i] = array();
            $imageResource[$i] = Zend_Barcode::factory('code128', 'image',$barcodeOptions[$i] ,$rendererOptions[$i] )->draw();
            $path[$i] = "assets/barcode/barcode".$code[$i].".png";
            imagepng($imageResource[$i],$path[$i]);
            $adet = $i+1;
            $ekdata = array(
                'barkod_no' => $code[$i],
                'kargo_id' => $xveri,
                'adet' => $adet,
                'ulke' => $ulkeveri
            );

            $insert = $this->KargolarModel->ara_kargo_ekle($ekdata);
        }


        if($_POST['ic_dis_durumu'] == "yurt_disi"){
            $hesap_desi = 1000000;
        }



        if($_POST['en'] != ""){

            $en = $_POST['en'];
            $boy = $_POST['boy'];
            $yukseklik = $_POST['yukseklik'];
            $en = $_POST['en'];


            $sx = $en*$boy*$yukseklik/$hesap_desi;



            if($sx == 0){
                $sonuc_desi = $sx;

            }else{
                $sonuc_desi = "0";
            }

        }else{
            $sx = 0;
        }




        if($_POST['data_durumu'] == "eski"){
            // $acik_adres = get_ulke($_POST['ulke']).' '.get_sehirler($_POST['sehir']).' '.get_ilceler($_POST['ilceler']).' '.$_POST['mahalle'].' '.$_POST['sokak'].' '.$_POST['kapi_no'].' '.$_POST['daire_no'].' '.$_POST['posta_kodu'];


            $eski_veri_datası = array(
                'status' => 1
            );

            $esk_veri_update = $this->EskiDatalarModel->edit(array('id' => $this->input->post('musteri_eski')), $eski_veri_datası);


            $adsoyad = get_eski_musteri($_POST['musteri_eski']);
            $ad = explode (" ",$adsoyad);


            $ad1 = $ad[0];
            $soyad1 = $ad[1];

            $musteri_ekle = array(
                'ad' => $ad1,
                'soyad' => $soyad1,
                'adres_adi' => 0,
                'ulke' => $_POST['eski_ulke'],
                'sehir' => 0,
                'ilceler' => 0,
                'mahalle' => 0,
                'sokak' => 0,
                'kapi_no' => 0,
                'daire_no' => 0,
                'tel_no' => $_POST['telefon_no'],
                'email' => 0,
                'bolge' => $_POST['bolge'],
                'kod' => $_POST['kod'],
                'posta_kodu' => 0,
                'acik_adres' => $_POST['acik_adres_eski'],
            );





            $telnosu = $_POST['telefon_no'];

            $telkontrol = $this->MusteriModel->telefon_kontrol($telnosu);

            if($telkontrol == NULL){
                $insert = $this->MusteriModel->create($musteri_ekle);

                if($insert)
                {

                    echo 'ok';

                }
                else
                {


                    echo 'no';


                }
            }else{


                echo 'tel';

            }


            $dara = $this->MusteriModel->sonmusteri();
            $eskiden_yeniye = $dara[0]->id;
            $data = array(
                'kargo_ad' =>  0,
                'musteri' =>  $eskiden_yeniye,
                'kategori' => $_POST['kategori'],
                'arac' => 0,
                'acik_adres' => $_POST['acik_adres_eski'],
                'fotograf' => imageupload('fotograf','upload'),
                'fatura_gorseli' => imageupload('fatura_gorseli','upload'),
                'iletisim_temel' => $_POST['telefon_no'].' '.$_POST['email'],
                'barkod_no' => json_encode($code),
                'barkod' => json_encode($path),
                'fiyat' => $_POST['fiyat'],
                'kod' => $_POST['kod'],
                'adet' => $_POST['kargo_adet'],
                'toptanci' => $_POST['toptanci'],
                'bolge' => $_POST['bolge'],
                'desi' => $sx,
                'musteri_durumu' => $_POST['data_durumu'],
                'ic_dis_durumu' => $_POST['ic_dis_durumu'],
                'status' => 0,
                'eklenen_platform' => 'crm',
                'ebat_kilo' => $_POST['ebat_kilo'],
                'ulke' => $_POST['eski_ulke']
            );







        }
        else{

            $data = array(
                'kargo_ad' =>  0,
                'musteri' =>  $_POST['musteri'],
                'kategori' => $_POST['kategori'],
                'arac' => 0,
                'acik_adres' => $_POST['acik_adres'],
                'fotograf' => imageupload('fotograf','upload'),
                'fatura_gorseli' => imageupload('fatura_gorseli','upload'),
                'iletisim_temel' => $_POST['telefon_no'].' '.$_POST['email'],
                'barkod_no' => json_encode($code),
                'barkod' => json_encode($path),
                'fiyat' => $_POST['fiyat'],
                'kod' => $_POST['kod'],
                'adet' => $_POST['kargo_adet'],
                'toptanci' => $_POST['toptanci'],
                'bolge' => $_POST['bolge'],
                'desi' => $sx,
                'musteri_durumu' => $_POST['data_durumu'],
                'ic_dis_durumu' => $_POST['ic_dis_durumu'],
                'status' => 0,
                'eklenen_platform' => 'crm',
                'ebat_kilo' => $_POST['ebat_kilo'],
                'ulke' => $_POST['ulke']
            );




        }

        $insert = $this->KargolarModel->create($data);

        if($insert)
        {

            echo 'ok';
            header('Location:http://odldepo.altankilic.com/kargolar');
        }
        else
        {


            echo 'no';


        }


    }

    public function yazdir()
    {    $id = $_POST['id'];
        $barcode = get_qr_photo($id);
        $tekkargo = $this->KargolarModel->tekkargo($id);
        $barcode = $barcode;
        foreach ($tekkargo as $tk);
        $eklenen_platform = barcode_get_crm_status($id);

if ($eklenen_platform != 'crm') {
    $yenibarkod = 'https://odldepo.altankilic.com/' . $barcode;
} else {
    $yenibarkod = 'https://ozdogru.altankilic.com/' . $barcode;
}



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
            <img style="padding-left: 10px; height: 150px; width: auto;padding-top:10px;" src="'.$yenibarkod.'">
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

    public function kargo_ekle()
    {
        $data['sonkargo'] = $this->KargolarModel->sonkargoveri();
        $data['musteriler'] = $this->MusteriModel->select_admin();
        $data['eskimusteriler'] = $this->EskiDatalarModel->getdatas();
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $data['arac'] = $this->AraclarModel->select();
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargolar/ekle',$data);
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

            echo "<textarea class='form-control' name='acik_adres' id='acik_adres' cols='30' rows='3'>";
            echo $d->acik_adres;
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

            $ulkeskod = get_eski_ulke($d->kod);

            echo "<script>var data_kod_eski = '".$ulkeskod."';</script>";

            echo "<textarea name='acik_adres_eski' class='form-control' id='acik_adres_eski' cols='auto' rows='10'>";

            echo $d->adres;

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
        echo "<script>var telmusteski = $('#tel_musteri_eski').val();</script>";
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
                echo "Telefon No :".$d->telefon."<br> <input hidden type='text' value='".$d->telefon."' id='tel_musteri_eski'>";
                echo "<script>var telmusteski = $('#tel_musteri_eski').val();</script>";
                echo "<input hidden id='iletisim_temel' name='iletisim_temel' type='text' value='".$d->telefon." ".$d->email."'><br>";
            }
            $a ++;
        }
    }


    public function duzenle_sayfa()
    {

        $x = $_POST['id'];

        $data['musteriler'] = $this->MusteriModel->select_admin();
        $data['eskimusteriler'] = $this->EskiDatalarModel->getdatas();
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $data['arac'] = $this->AraclarModel->select();
        $data['tekkargo'] = $this->KargolarModel->tekkargo($x);
        $this->load->view('panel/include/header');
        $this->load->view('panel/kargolar/kargo_duzenle',$data);
        $this->load->view('panel/include/footer');


    }



    public function sil()
    {
        $delete = $this->KargolarModel->delete();
        $deletes = $this->KargolarModel->delete_arakargo();

        if($delete && $deletes)
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


        if($_POST['ulke'] == ""){
            $ulkeveri = $_POST['eski_ulke'];
        }else{
            $ulkeveri = $_POST['ulke'];
        }

        $eski_adet = $_POST['eski_adet'];



        if($_POST['ic_dis_durumu'] == "yurt_disi"){
            $hesap_desi = 1000000;
        }

        if($_POST['en'] != null && $_POST['boy'] != null && $_POST['yukseklik'] != null){
            $en = $_POST['en'];
            $boy = $_POST['boy'];
            $yukseklik = $_POST['yukseklik'];
            $en = $_POST['en'];

            $sonuc_desi = $en*$boy*$yukseklik/$hesap_desi;
        }

        else
        {
            $sonuc_desi = $_POST['desi'];
        }


        $adsoyad = get_musteri($_POST['musteri']);
        $ad = explode (" ",$adsoyad);

        $ad1 = $ad[0];
        $soyad1 = $ad[1];

        $data = array(
            'kargo_ad' =>  $_POST['kargo_ad'],
            'musteri' =>  $_POST['musteri'],
            'kategori' => $_POST['kategori'],
            'arac' => 0,
            'acik_adres' => $_POST['u_acik_adres'],
            'iletisim_temel' => $_POST['iletisim_temel'],
            'fiyat' => $_POST['fiyat'],
            'kod' => $_POST['kod'],
            'toptanci' => $_POST['toptanci'],
            'desi' => $sonuc_desi,
            'ebat_kilo' => $_POST['ebat_kilo'],
            'ulke' => $ulkeveri
        );

        if(imageupload('fatura_gorseli','upload') != ""){
            $data['fatura_gorseli'] = imageupload('fatura_gorseli','upload');
        }
        else
        {
            $data['fatura_gorseli'] = $_POST['eski_fatura'];
        }

        if(imageupload('fotograf','upload') != ""){
            $data['fotograf'] = imageupload('fotograf','upload');
        }
        else
        {
            $data['fotograf'] = $_POST['eski_foto'];
        }


        if($eski_adet != $_POST['kargo_adet']){
            $data['adet'] = $_POST['kargo_adet'];

            $idveri = $_POST['id']+1;
            $veri_kargo_id = array(
                'veri_id' => $idveri
            );
            $veri_ekle = $this->KargolarModel->kargo_sayim_ekle($veri_kargo_id);

            $kargo_adet = $_POST['kargo_adet'];
            $sonkargo = $this->KargolarModel->sonkargoveri();
            foreach ($sonkargo as $sk);
            $xveri = $idveri;


            for($i = 0;$i < $kargo_adet;++$i){
                $code[$i] = rand(100000, 99999999);
                $this->load->library('Zend');
                $this->zend->load('Zend/Barcode');
                $barcodeOptions[$i] = array('text'=>$code[$i]);
                $rendererOptions[$i] = array();
                $imageResource[$i] = Zend_Barcode::factory('code128', 'image',$barcodeOptions[$i] ,$rendererOptions[$i] )->draw();
                $path[$i] = "assets/barcode/barcode".$code[$i].".png";
                imagepng($imageResource[$i],$path[$i]);
                $adet = $i+1;
                $ekdata = array(
                    'barkod_no' => $code[$i],
                    'kargo_id' => $xveri,
                    'adet' => $adet,
                    'ulke' => $ulkeveri
                );


                $data['barkod_no'] = json_encode($code);
                $data['barkod'] = json_encode($path);

                $insert = $this->KargolarModel->ara_kargo_ekle($ekdata);
            }






        }else{
            $data['adet'] = $_POST['eski_adet'];
        }



        $update = $this->KargolarModel->edit(array('id' => $this->input->post('id')), $data);

        if($update)
        {

            echo 'ok';
            header('Location:http://odldepo.altankilic.com/kargolar');
        }
        else
        {


            echo 'no';


        }

    }






    public function ekleme_sayfasi()
    {

    }




    public function kaydet()
    {

    }


}
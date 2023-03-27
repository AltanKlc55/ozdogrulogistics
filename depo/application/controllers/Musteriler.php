<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteriler extends CI_Controller {


    public function __construct(){
        parent::__construct();
        if (@$_SESSION['user_logged'] == FALSE) {


            redirect('login/index');
        }
        $this->load->model('AdresModel'); 
        $this->load->model('MusteriModel'); 
    }


	public function index()
	{
        $data['musteriler'] = $this->MusteriModel->select();
        $this->load->view('panel/include/header');
		$this->load->view('panel/musteriler/musteri_list' , $data);
        $this->load->view('panel/include/footer');
	}

    public function incele()
	{
        $x = $_POST['id'];

        $data['tekmusteri'] = $this->MusteriModel->tekmusteri($x);
        $this->load->view('panel/include/header');
		$this->load->view('panel/musteriler/incele' , $data);
        $this->load->view('panel/include/footer');
	}

    public function duzenle_sayfa()
	{
        $x = $_POST['id'];
        $data['tekmusteri'] = $this->MusteriModel->tekmusteri($x);
        $data['ulkeler'] = $this->AdresModel->ulkeler();

        $this->load->view('panel/include/header');
		$this->load->view('panel/musteriler/duzenle' , $data);
        $this->load->view('panel/include/footer');
	}




    
    
    public function sil()
	{
        $delete = $this->MusteriModel->delete();
			
		  	
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
            'ad' =>  $_POST['ad'],
            'soyad' => $_POST['soyad'],
            'adres_adi' => $_POST['adres_adi'],
            'ulke' => $_POST['ulke'],
            'sehir' => $_POST['sehir'],
            'ilceler' => $_POST['ilceler'],
            'mahalle' => $_POST['mahalle'],
            'kapi_no' => $_POST['kapi_no'],
            'daire_no' => $_POST['daire_no'],
            'tel_no' => $_POST['tel_no'],
            'email' => $_POST['email'],
            'sokak' => $_POST['sokak']
    
         );


         $update = $this->MusteriModel->edit(array('id' => $id),$data);
         if($update)
         { 
            echo 'ok';
          }
          else
          { 
            echo 'no';		   
          }
     
         
 
        

          $dataview['tekmusteri'] = $this->MusteriModel->tekmusteri($id);

        $this->load->view('panel/include/header');
		$this->load->view('panel/musteriler/incele' , $dataview);
        $this->load->view('panel/include/footer');


	}
    



    public function ekleme_sayfasi()
	{   
        $data['ulkeler'] = $this->AdresModel->ulkeler();
        $this->load->view('panel/include/header');
		$this->load->view('panel/musteriler/musteri_ekle' , $data);
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





    public function ilceler()
	{   
        $sehir_kodu = $_POST['sehir_kodu'];
        echo '<option> İlçe Seçiniz </option>';
        
        $ilceler = $this->AdresModel->ilceler($sehir_kodu);
        
        foreach($ilceler as $i){
            echo '<option value="'.$i->id.'" >'.$i->baslik.'</option>';
        }
        

	}


    public function kaydet()
	{   
 
     $data = array(
        'ad' =>  $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'adres_adi' => $_POST['adres_adi'],
        'ulke' => $_POST['ulke'],
        'sehir' => $_POST['sehir'],
        'ilceler' => $_POST['ilceler'],
        'mahalle' => $_POST['mahalle'],
        'kapi_no' => $_POST['kapi_no'],
        'daire_no' => $_POST['daire_no'],
        'tel_no' => $_POST['tel_no'],
        'email' => $_POST['email'],
        'sokak' => $_POST['sokak']
        
     );

     
     $tel_no = $_POST['tel_no'];


     $telkontrol = $this->MusteriModel->telefon_kontrol($tel_no);

     if($telkontrol == NULL){
        $insert = $this->MusteriModel->create($data); 
     
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
     


    
	}
    

}
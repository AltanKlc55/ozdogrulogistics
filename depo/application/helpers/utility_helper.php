<?php

function asset_url(){
    return base_url().'assets/';
}

function get_bolge($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_bolgeler")
        ->row()
        ->bolge_adi;

    return $firma_adi;
}

function get_eski_ulke($x){

    $ulke_eski ='';

    if($x == 'A'){
        $ulke_eski ='DE';
    }else if($x == 'H'){
        $ulke_eski ='NL';
    }else if($x == 'F'){
        $ulke_eski ='FR';
    }else if($x == 'D'){
        $ulke_eski ='DK';
    }else if($x == 'B' || $x == 'b'){
        $ulke_eski ='BE';
    }else if($x == 'ISV' || $x == 'İSV'){
        $ulke_eski ='SE';
    }else if($x == 'ISP'){
        $ulke_eski ='ES';
    }else if($x == 'AV'){
        $ulke_eski ='AT';
    }else if($x == 'IT'){
        $ulke_eski ='IT';
    }

    return $ulke_eski;

}

function barcode_get_crm_status($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->eklenen_platform;

    return $firma_adi;
}



function ara_kargodan_kargoya($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("barkod_no",$x)
        ->get("ara_kargo")
        ->row()
        ->kargo_id;

    return $firma_adi;
}


function ara_kargo_get_by_kargoid($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("kargo_id",$x)
        ->get("ara_kargo")
        ->row()
        ->kargo_id;

    return $firma_adi;
}


function ara_kargodan_ulkeye_gore($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("ulke",$x)
        ->get("ara_kargo")
        ->row()
        ->kargo_id;

    return $firma_adi;
}



function barcode_get_id($x){

    $ci=get_instance();
    $str=$ci->db
        ->where("barkod_no",$x)
        ->get("tbl_kargolar")
        ->row()
        ->id;

    return $str;
}


function barcode_get_id_ara_kargo($x){

    $ci=get_instance();
    $str=$ci->db
        ->where("barkod_no",$x)
        ->get("ara_kargo")
        ->row()
        ->kargo_id;

    return $str;
}


function kargo_adet($x){

    $ci=get_instance();
    $str=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->adet;

    return $str;
}



function kargo_musteri($x){

    $ci=get_instance();
    $str=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->musteri;

    return $str;

}
function get_yetki($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("personel_id",$x)
        ->get("tbl_yetkiler")
        ->row()
        ->yetkiler;

    return $firma_adi;
}


function get_personel($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_personeller")
        ->row()
        ->ad_soyad;

    return $firma_adi;
}

function get_sube($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_subeler")
        ->row()
        ->sube_adi;

    return $firma_adi;
}

function get_arac($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_araclar")
        ->row()
        ->plaka;

    return $firma_adi;
}

function get_kargo_str_musteri($x){

    $ci=get_instance();
    $str=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->musteri;

    return $str;
}


function get_arac_marka($x){

    $ci=get_instance();
    $marka=$ci->db
        ->where("id",$x)
        ->get("tbl_araclar")
        ->row()
        ->marka;


    $model=$ci->db
        ->where("id",$x)
        ->get("tbl_araclar")
        ->row()
        ->model;

    $araba = $marka.' / '.$model;

    return $araba;
}




function get_strateji_durum($x){

    $y = '';

    if($x == 1){
        $y = "Türkiyeden Depo Çıkışı Yaptı";
    }else if($x == 2){
        $y = "Dağıtım Şubesine Vardı";
    }else if($x == 3){
        $y = "Kargo Dağıtımda";
    }else if($x == 4){
        $y = "Tamamlandı";
    }else if($x == 0){
        $y = "TR Depoda";
    }

    return $y;

}

function kargo_nakliye_durumu($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->status;

    return $firma_adi;

}

function strateji_id_tir_icerik($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargo_strateji")
        ->row()
        ->tir_icerisi;

    return $firma_adi;

}




function get_qr_photo($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->barkod;

    return $firma_adi;
}

function get_kod($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->kod;

    return $firma_adi;
}


function get_data_kargo($x){

    $ci=get_instance();
    $firma_adi=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->barkod;

    return $firma_adi;
}


function get_ulke($x){

    $ci=get_instance();
    $ulke=$ci->db
        ->where("id",$x)
        ->get("ulkeler")
        ->row()
        ->baslik;

    return $ulke;
}

function get_eski_musteri($x){

    $ci=get_instance();
    $musteri_eski=$ci->db
        ->where("id",$x)
        ->get("eski_yazilim_musteri")
        ->row()
        ->isimsoyisim;

    return $musteri_eski;
}

function get_sofor($x){

    $ci=get_instance();
    $musteri_eski=$ci->db
        ->where("id",$x)
        ->get("tbl_soforler")
        ->row()
        ->ad_soyad;

    return $musteri_eski;
}

function get_sofor_tel($x){

    $ci=get_instance();
    $sofor =$ci->db
        ->where("id",$x)
        ->get("tbl_soforler")
        ->row()
        ->tel_no;

    return $sofor;
}

function get_musteri_id($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->musteri;

    return $musteri_id;
}

function get_adress($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->acik_adres;

    return $musteri_id;
}

function get_kategori($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->kategori;

    return $musteri_id;
}


function get_ks_status($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->status;

    return $musteri_id;
}

function get_created_at($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->sisteme_girisi;

    return $musteri_id;
}

function get_iletisim_temel($x){
    $ci=get_instance();
    $musteri_id=$ci->db
        ->where("id",$x)
        ->get("tbl_kargolar")
        ->row()
        ->iletisim_temel;

    return $musteri_id;
}

function get_musteri($x){

    $ci=get_instance();
    $musteri_ad=$ci->db
        ->where("id",$x)
        ->get("tbl_musteriler")
        ->row()
        ->ad;

    $musteri_soyad=$ci->db
        ->where("id",$x)
        ->get("tbl_musteriler")
        ->row()
        ->soyad;

    $musteri = $musteri_ad." ".$musteri_soyad;

    return $musteri;
}

function get_sehirler($x){

    $ci=get_instance();
    $sehir=$ci->db
        ->where("id",$x)
        ->get("sehirler")
        ->row()
        ->baslik;

    return $sehir;
}

function get_ilceler($x){

    $ci=get_instance();
    $ilce=$ci->db
        ->where("id",$x)
        ->get("ilceler")
        ->row()
        ->baslik;

    return $ilce;
}

function imageupload($name,$path){
    $ci=get_instance();
    $config['upload_path']=$path.'/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|pdf|xls|doc|docx|xlsx|';
    $ci->upload->initialize($config);
    if($ci->upload->do_upload($name))
    {
        $image=$ci->upload->data();
        return $config['upload_path'].$image['file_name'];
    }
    return null;
}




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'panel';
$route['giris'] = 'login/index';
$route['musteriler'] = 'musteriler/index';
$route['kargolar'] = 'kargolar/index';
$route['musteri-ekle'] = 'musteriler/ekleme_sayfasi';
$route['kargo-ekle'] = 'kargolar/kargo_ekle';
$route['bolgeler'] = 'bolgeler/index';
$route['subeler'] = 'subeler/index';
$route['araclar'] = 'araclar/index';
$route['sube-ekle'] = 'subeler/sube_ekle';
$route['bolge-ekle'] = 'bolgeler/bolge_ekle';
$route['sube-ekle'] = 'subeler/sube_ekle';
$route['arac-ekle'] = 'araclar/arac_ekle';
$route['soforler'] = 'soforler/index';
$route['personel'] = 'personeller/index';
$route['yetki-listesi'] = 'yetkilendirme/index';
$route['sofor-ekle'] = 'soforler/sofor_ekle';
$route['personel-ekle'] = 'personeller/personel_ekle';
$route['personel-yetkilendir'] = 'yetkilendirme/personel_yetkilendir';
$route['kargo-programla'] = 'KargoStrateji/kargo_programla';
$route['kargo-programla-eu'] = 'KargoStrateji/kargo_programla_eu';
$route['kargo-strateji'] = 'KargoStrateji/index';
$route['kargo-strateji-eu'] = 'KargoStrateji/index_eu';
$route['kargo-strateji-tamamlanan'] = 'KargoStrateji/index_tamamlanan';
$route['old-datas'] = 'EskiDatalar/index';
$route['kargo-okut'] = 'barkod/okutma';
$route['hizli-programla'] = 'KargoStrateji/hizli_programla';
$route['404_override'] = '';


$route['translate_uri_dashes'] = FALSE;

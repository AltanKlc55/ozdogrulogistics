<?php foreach($tekstrateji as $str);?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kargo Listesini İncele (<?=$str->konum_durum?>)</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Şoför Bilgisi</h6>
                </div>
                <div class="card-body">
                    <form>
                        <?php if($str->konum_durum == 'EU'){?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tel_no">Ad Soyad :</label>
                                    <br>
                                    <label for=""><?=get_sofor($str->sofor);?></label>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tel_no">Telefon Numarası :</label>
                                    <br>
                                    <label for=""><?=get_sofor_tel($str->sofor);?></label>
                                </div>

                            </div>

                        <?php }else{echo 'Şöför Bilgileri (EU) Kargo Programla Kısmında Eklenmektedir';}?>


                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Araç Bilgisi</h6>
                </div>
                <div class="card-body">
                    <form>
                        <?php if($str->konum_durum == 'TR'){?>

                            <p>Araç bilgileri (EU) da değişmektedir. Bu araç bilgileri Merkezden dağıtım deposuna kargoları taşıyan araça aitdir. </p>



                            <div class="form-row">


                                <div class="form-group col-md-6">
                                    <label for="tel_no">Plaka :</label>
                                    <br>
                                    <label for=""><?=$str->arac;?></label>

                                </div>

                            </div>


                        <?php }else{?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tel_no">Marka / Model :</label>
                                    <br>
                                    <label for=""><?=get_arac_marka($str->arac);?></label>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tel_no">Plaka :</label>
                                    <br>
                                    <label for=""><?=get_arac($str->arac);?></label>

                                </div>

                            </div>
                        <?php }?>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kargolar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Barkod Numarası</th>
                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>Kategori</th>
                        <th>Sisteme Giriş Tarihi</th>
                        <th>İletişim</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Barkod Numarası</th>
                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>Kategori</th>
                        <th>Sisteme Giriş Tarihi</th>
                        <th>İletişim</th>
                        <th>Durum</th>
                    </tr>
                    </tfoot>
                    <tbody id="data_kargo">


                    <?php
                    $tir_icerik =  $str->tir_icerisi;
                    $bolunmus = explode(",", $tir_icerik);


                    for($i = 0; $i < count($bolunmus); ++$i)
                        if($bolunmus[$i]==NULL)   {
                            unset($bolunmus[$i]);
                        }else{
                            {?>
                                <tr>
                                    <td><?=$bolunmus[$i];?></td>
                                    <td><?php $musteri_get = get_musteri_id(ara_kargodan_kargoya($bolunmus[$i])); echo get_musteri($musteri_get);?></td>
                                    <td><?=get_adress(ara_kargodan_kargoya($bolunmus[$i]));?></td>
                                    <td><?=get_kategori(ara_kargodan_kargoya($bolunmus[$i]));?></td>
                                    <td><?=get_created_at(ara_kargodan_kargoya($bolunmus[$i]));?></td>
                                    <td><?=get_iletisim_temel(ara_kargodan_kargoya($bolunmus[$i]));?></td>
                                    <td><?php $mstatus = get_ks_status(ara_kargodan_kargoya($bolunmus[$i])); echo get_strateji_durum($mstatus);?></td>
                                </tr>


                            <?php }} ?>


                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</div>

</div>

</div>

</div>
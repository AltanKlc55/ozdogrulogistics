<?php foreach($tekkargo as $tk);?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kargo Düzenle</h1>
    </div>


    <form method="POST"  id="f_ekle" action="<?=base_url();?>kargolar/duzenle" class="wpcf7-form"   enctype="multipart/form-data">

        <div class="row">


            <div class="col-lg-12">

                <input hidden type="text" id="ic_dis_durumu" name="ic_dis_durumu" value="">
                <input hidden type="text" id="id" name="id" value="<?=$tk->id?>">
                <input hidden type="text" id="id" name="desi" value="<?=$tk->desi?>">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Alıcı Bilgileri</h6>
                    </div>
                    <div class="card-body">



                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="eski_data" id="eski_data">
                                    <label class="form-check-label" for="eski_data">
                                        Eski Veri
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="yeni_data" name="yeni_data" checked>
                                    <label class="form-check-label" for="yeni_data">
                                        Yeni Veri
                                    </label>
                                </div>
                            </div>


                            <div id="yeni_data_musteri" class="form-group col-md-12">
                                <label for="inputEmail4">Yeni Müşteri Seç</label>
                                <select class="selectpicker form-control" id="musteri" name="musteri" data-live-search="true">
                                    <option value="<?=$tk->musteri;?>"><?=get_musteri($tk->musteri);?> (Seçili) </option>
                                    <?php foreach($musteriler as $m){?>
                                        <option value="<?=$m->id?>"><?=$m->ad?> <?=$m->soyad?></option>
                                    <?php }?>
                                </select>
                            </div>


                            <div id="eski_data_musteri" class="form-group col-md-12">
                                <label for="inputEmail4">Eski Müşteri Seç</label>
                                <select class="selectpicker form-control" id="musteri_eski" name="musteri_eski" data-live-search="true">
                                    <option value=""> Seçim Yapın </option>
                                    <?php foreach($eskimusteriler as $em){?>
                                        <option value="<?=$em->id?>"><?=$em->isimsoyisim?></option>
                                    <?php }?>
                                </select>
                            </div>



                        </div>
                    </div>


                </div>
            </div>

        </div>






        <div class="row">

            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Adres Bilgisi</h6>
                    </div>
                    <div id="" class="card-body">

                        <div class="form-row">

                            <div id="" class="form-group col-md-12">
                                <textarea class="form-control" name="u_acik_adres" id="" cols="120" rows="3"><?=$tk->acik_adres?></textarea>
                            </div>
                            <div id="" class="form-group col-md-12">
                                <label for="inputEmail4">Kod</label>
                                <input type="text" class="form-control" name="kod" value="<?=$tk->kod?>" />
                            </div>





                            <div class="form-group col-md-12">
                                <label for="ulke">Ülkeler</label>
                                <select class="form-control" id="ulke" name="ulke" placeholder="Ülke" required>
                                    <option value="<?=$tk->ulke?>" >Seçili Olan (<?=get_ulke($tk->ulke);?>)</option>
                                    <?php foreach($ulkeler as $ulke){?>
                                        <option value="<?=$ulke->id?>"><?=$ulke->baslik?> (<?=$ulke->rewrite?>) </option>
                                    <?php }?>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div id="adres_alan" class="card-body">
                        <div id="adres">

                        </div>

                    </div>
                </div>
            </div>
        </div>






        <div class="row">

            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">İletişim Bilgisi</h6>
                    </div>


                    <div id="iletisim_alani_eski" class="card-body">


                        <div class="row">

                            <div id="" class="form-group col-md-12">
                                <textarea class="form-control" name="iletisim_temel" id="" cols="120" rows="3"><?=$tk->iletisim_temel?></textarea>
                            </div>

                        </div>
                    </div>



                </div>









                <div class="row">

                    <div class="col-lg-12">

                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kargo Bilgileri</h6>
                            </div>
                            <div class="card-body">


                                <div class="row">

                                    <div hidden class="form-group col-md-12">
                                        <label for="inputEmail4">Kargo Adı</label>
                                        <input type="text" class="form-control" id="kargo_ad" name="kargo_ad" placeholder="Ad" value="<?=$tk->kargo_ad?>" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Fiyat</label>
                                        <input type="text" class="form-control" id="fiyat" name="fiyat" placeholder="Fiyat" value="<?=$tk->fiyat?>" required>
                                    </div>


                                    <div hidden class="form-group col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="yurt_ici"  id="yurt_ici" <?php if($tk->ic_dis_durumu == "yurt_ici"){echo 'checked';}?>>
                                            <label class="form-check-label" for="yurt_ici">
                                                Yurt İçi
                                            </label>
                                        </div>
                                    </div>

                                    <div hidden class="form-group col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="yurt_disi" name="yurt_disi" <?php if($tk->ic_dis_durumu == "yurt_disi"){echo 'checked';}?>>
                                            <label class="form-check-label" for="yurt_disi">
                                                Yurt Dışı
                                            </label>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">En</label>
                                        <input type="text" class="form-control" id="en" name="en"  placeholder="En">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Boy</label>
                                        <input type="text" class="form-control" id="boy" name="boy" placeholder="Boy">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Yükseklik</label>
                                        <input type="text" class="form-control" id="yukseklik" name="yukseklik" placeholder="Yükseklik">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Kilo</label>
                                        <input type="text" class="form-control" id="kilo" name="kilo" placeholder="Kilo">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Desi Hesapla</label>
                                        <button type="button"  class="btn btn-warning" style="color:black; width: 100%;" id="desi_sonuc">Hesapla</button>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Desi Sonucu</label>
                                        <input type="text" class="form-control" value="<?=$tk->desi?>" name="hesaplanan_desi" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Fotoğraf (Opsiyonel)</label>
                                        <input type="file" class="form-control" id="fotograf" name="fotograf">
                                        <input hidden type="text" class="form-control"  name="eski_foto" value="<?=$tk->fotograf?>">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Fatura Görseli</label>
                                        <input type="file" class="form-control" id="fatura_gorseli"  name="fatura_gorseli">
                                        <input hidden type="text" class="form-control"  name="eski_fatura" value="<?=$tk->fatura_gorseli?>">
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <img style="height:200px; width:200px; border-radius:20px;" src="<?php if($tk->eklenen_platform != 'crm'){echo 'https://odldepo.altankilic.com/'.$tk->fotograf;}else{echo 'http://ozdogru.altankilic.com/'.$tk->fotograf;}?>" alt="">
                                    </div>


                                    <div class="col-md-6 text-center">
                                        <img style="height:200px; width:200px; border-radius:20px;" src="<?php if($tk->eklenen_platform != 'crm'){echo 'https://odldepo.altankilic.com/'.$tk->fatura_gorseli;}else{echo 'http://ozdogru.altankilic.com/'.$tk->fatura_gorseli;}?>" alt="">
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Toptancı Bilgileri</label>
                                        <input type="text" class="form-control" id="toptanci" name="toptanci" value="<?=$tk->toptanci?>" placeholder="Toptancı Bilgileri">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Kargo Adeti</label>
                                        <input type="text" class="form-control" id="kargo_adet" name="kargo_adet" value="<?=$tk->adet?>" placeholder="Kargo Adeti">
                                        <input hidden type="text" class="form-control" id="eski_adet" name="eski_adet" value="<?=$tk->adet?>" placeholder="Kargo Adeti">
                                    </div>

                                    <div id="" class="form-group col-md-12">
                                        <label for="inputEmail4">Ebat Kilo Bilgileri</label>
                                        <textarea class="form-control" name="ebat_kilo" id="ebat_kilo" cols="120" rows="3"><?=$tk->ebat_kilo?></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Ürün Kategori :</label>
                                        <select class="form-control" id="kategori" placeholder="Kategori" name="kategori" required>
                                            <option value="<?=$tk->kategori?>"> <?=$tk->kategori?> (Seçili) </option>
                                            <option value="mobilya">Mobilya</option>
                                            <option value="Giysi">Giysi</option>
                                            <option value="Beyaz Eşya">Beyaz Eşya</option>
                                            <option value="Evrak">Evrak</option>
                                            <option value="Kitap">Kitap</option>
                                            <option value="Teknoloji">Teknoloji</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <div style="padding-bottom:20px;" class="container">

                    <div class="row">
                        <div class="col text-center">
                            <button id="kaydet" type="submit" class="btn btn-info btn-lg">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

</div>
<script>
    $("#duzenle_adres").hide();
    $("#eski_data_musteri").hide();
    $('#yeni_data').click(function() {
        if ($(this).is(':checked')) {
            $("#eski_data").prop('checked', false);
            $("#eski_data_musteri").hide();
            $("#yeni_data_musteri").show();
            $("#data_durumu").attr('value', 'yeni');
        }
    });
    $('#eski_data').click(function() {
        if ($(this).is(':checked')) {
            $("#yeni_data").prop('checked', false);
            $("#yeni_data_musteri").hide();
            $("#eski_data_musteri").show();
            $("#data_durumu").attr('value', 'eski');
        }
    });




    if ($('#yurt_disi').is(':checked')) {
        $("#yurt_ici").prop('checked', false);
        $("#ic_dis_durumu").attr('value', 'yurt_disi');
    }


    if ($('#yurt_ici').is(':checked')) {
        $("#yurt_disi").prop('checked', false);
        $("#ic_dis_durumu").attr('value', 'yurt_ici');
    }


    $('#duzen_buton').click(function() {
        $("#duzenle_adres").show();

    });



    $('#desi_sonuc').click(function() {

        var en = $('#en').val();
        var boy = $('#boy').val();
        var yukseklik = $('#yukseklik').val();
        var durum_ic_dis = 1000000;
        var sonuc = en*boy*yukseklik/durum_ic_dis;
        $("#hesaplanan_desi").attr('value', sonuc);

    });




    $("#eski_adres_alan").hide();
    $("#adres_alan").hide();


    $('#musteri').on('change', function() {
        var data = "id="+$("#musteri").val();
        $.ajax({
            url: "<?=base_url();?>kargolar/alici_adres_getir",
            type: "post",
            data: data,
            success: function (response) {
                $("#adres_alan").show();
                $("#adres").html("");
                $("#adres").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });


    $('#musteri_eski').on('change', function() {
        var data = "id="+$("#musteri_eski").val();
        $("#iletisim_alani_eski").show();
        $.ajax({
            url: "<?=base_url();?>kargolar/alici_adres_getir_eski",
            type: "post",
            data: data,
            success: function (response) {
                $("#eski_adres_alan").show();
                $("#eski_adres").html("");
                $("#eski_adres").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });



    $('#musteri').on('change', function() {
        var data = "id="+$("#musteri").val();
        $.ajax({
            url: "<?=base_url();?>kargolar/alici_iletisim_getir",
            type: "post",
            data: data,
            success: function (response) {
                $("#iletisim_alan").show();
                $("#iletisim").html("");
                $("#iletisim").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });



    $('#musteri_eski').on('change', function() {
        var data = "id="+$("#musteri_eski").val();
        $.ajax({
            url: "<?=base_url();?>kargolar/alici_iletisim_getir_eski",
            type: "post",
            data: data,
            success: function (response) {
                $("#iletisim_alan_eski").show();
                $("#iletisim_eski").html("");
                $("#iletisim_eski").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });






    $('#kaydet').on('click', function() {


        //var data = "fatura_gorseli="+$("#fatura_gorseli")[0].files[0]+"&fotograf="+$("#fotograf")[0].files[0]+"&acik_adres="+$("#acik_adres").val()+"&arac="+$("#arac").val()+"&kategori="+$("#kategori").val()+"&kargo_ad="+$("#kargo_ad").val()+"&musteri_eski="+$("#musteri_eski").val()+"&musteri="+$("#musteri").val()+"&kod="+$("#kod").val()+"&posta_kodu="+$("#posta_kodu").val()+"&data_durumu="+$("#data_durumu").val()+"&fiyat="+$("#fiyat").val()+"&ulke="+$("#ulke").val()+"&sehir="+$("#sehir").val()+"&ilceler="+$("#ilceler").val()+"&mahalle="+$("#mahalle").val()+"&sokak="+$("#sokak").val()+"&kapi_no="+$("#kapi_no").val()+"&daire_no="+$("#daire_no").val()+"&telefon_no="+$("#telefon_no").val()+"&email="+$("#email").val();
        var data = "item="+1;
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>kargolar/ekle",
            type: "post",
            processData: false,
            contentType: false,
            data: data,
            success: function (response) {
                $(response).append(bos);
                if(response == "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>kargolar">Tamamdır..</a>'
                    });
                }

            },
            error: function(response) {
                $(response).append(bos);
                if(response == "no"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'İşlem Başarısız Kontrol Ediniz',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });

    });




    $('#ulke').on('change', function() {
        var data = "ulke_kodu="+$("#ulke").val();
        $.ajax({
            url: "<?=base_url();?>kargolar/sehirler",
            type: "post",
            data: data,
            success: function (response) {
                $("#sehir").html("");
                $("#sehir").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });


    $('#sehir').on('change', function() {
        var data = "sehir_kodu="+$("#sehir").val();
        $.ajax({
            url: "<?=base_url();?>kargolar/ilceler",
            type: "post",
            data: data,
            success: function (response) {
                $("#ilceler").html("");
                $("#ilceler").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });


</script>
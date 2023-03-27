<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ana Depo Kargo Programla</h1>
    </div>

        <div class="row">

            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kargo Bilgileri</h6>
                    </div>
                    <div class="card-body">



                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        Ülkelere Göre Ara :
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">

                                <select class="form-control" id="ulke" name="ulke" placeholder="Ülke" required>
                                    <option value="" >Ülke Seç</option>
                                    <?php foreach($ulkeler as $ulke){?>
                                        <option value="<?=$ulke->id?>"><?=$ulke->baslik?> (<?=$ulke->rewrite?>) </option>
                                    <?php }?>
                                </select>
                            </div>




                        </div>
                    </div>


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
                            <th>Seçim</th>
                            <th>ID</th>
                            <th>Müşteri</th>
                            <th>Açık Adres</th>
                            <th>Adet</th>
                            <th>Adet Sırası</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Seçim</th>
                            <th>ID</th>
                            <th>Müşteri</th>
                            <th>Açık Adres</th>
                            <th>Adet</th>
                            <th>Adet Sırası</th>

                        </tr>
                        </tfoot>
                        <tbody>










        </tbody>
        </table>
</div>
</div>

</div>


    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dağıtım Noktası & Gidecek Araç Bilgileri</h6>
                </div>
                <div class="card-body">



                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    Araç Seç :
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Araç Plakası</label>
                            <input type="text" class="form-control" id="arac" name="arac" placeholder="Araç Plakası">
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    Şube Seç :
                                </label>
                            </div>
                        </div>

                        <input hidden type="text" name="konum_durumu" id="konum_durumu" value="TR">

                        <div class="form-group col-md-6">
                            <select class="form-control" id="sube" name="sube" placeholder="Şube" required>
                                <?php foreach ($subeler as $s){?>
                                    <option value="<?=$s->id?>"><?=$s->sube_adi?></option>
                                <?php }?>
                            </select>
                        </div>



                    </div>
                </div>

                <div style="padding-bottom:20px;padding-left:15px;">
                    <button style="color:black;" class="btn btn-warning" id="kaydet"> Kaydet </button>
                </div>

            </div>
        </div>

    </div>




</div>
<script>


    $('#ilerle').hide();
    $("#iletisim_alan").hide();
    $("#yeni_data_musteri").hide();
    $("#eski_data_musteri").hide();
    $("#iletisim_alani_eski").hide();
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



    $('#yurt_disi').click(function() {
        if ($(this).is(':checked')) {
            $("#yurt_ici").prop('checked', false);
            $("#ic_dis_durumu").attr('value', 'yurt_disi');
        }
    });
    $('#yurt_ici').click(function() {
        if ($(this).is(':checked')) {
            $("#yurt_disi").prop('checked', false);
            $("#ic_dis_durumu").attr('value', 'yurt_ici');
        }
    });

    $('#desi_sonuc').click(function() {

        var en = $('#en').val();
        var boy = $('#boy').val();
        var yukseklik = $('#yukseklik').val();
        var ic_dis_durum = $("#ic_dis_durumu").val();

        if(ic_dis_durum =='yurt_ici'){
            var durum_ic_dis = 3000;
        }else{
            var durum_ic_dis = 5000;
        }

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


        var checkboxes = document.getElementsByName('secim[]');
        var vals = "";
        for (var i=0, n=checkboxes.length;i<n;i++)
        {
            if (checkboxes[i].checked)
            {
                vals += ","+checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);

        console.log(vals);

        //var data = "fatura_gorseli="+$("#fatura_gorseli")[0].files[0]+"&fotograf="+$("#fotograf")[0].files[0]+"&acik_adres="+$("#acik_adres").val()+"&arac="+$("#arac").val()+"&kategori="+$("#kategori").val()+"&kargo_ad="+$("#kargo_ad").val()+"&musteri_eski="+$("#musteri_eski").val()+"&musteri="+$("#musteri").val()+"&kod="+$("#kod").val()+"&posta_kodu="+$("#posta_kodu").val()+"&data_durumu="+$("#data_durumu").val()+"&fiyat="+$("#fiyat").val()+"&ulke="+$("#ulke").val()+"&sehir="+$("#sehir").val()+"&ilceler="+$("#ilceler").val()+"&mahalle="+$("#mahalle").val()+"&sokak="+$("#sokak").val()+"&kapi_no="+$("#kapi_no").val()+"&daire_no="+$("#daire_no").val()+"&telefon_no="+$("#telefon_no").val()+"&email="+$("#email").val();
        var data = "tir_icerisi="+vals+"&arac="+$("#arac").val()+"&ulke="+$("#ulke").val()+"&sube="+$("#sube").val()+"&konum_durumu="+$("#konum_durumu").val();
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>kargoStrateji/ekle",
            type: "post",
            data: data,
            success: function (response) {
                $(response).append(bos);
                if(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>kargo-strateji">Tamamdır..</a>'
                    });
                }

            },
            error: function(response) {
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
        var data = "ulke="+$("#ulke").val();
        $('#ilerle').show();
        $.ajax({
            url: "<?=base_url();?>KargoStrateji/ulkelere_gore_get",
            type: "post",
            data: data,
            success: function (response) {
                $("tbody").html("");
                $("tbody").html(response);
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
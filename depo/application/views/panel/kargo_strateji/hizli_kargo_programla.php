<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Teslimat Listelesi (TR)</h1>


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
                                    Ülke Seç:
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

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gidecek Tır Bilgileri</h6>
                </div>
                <div class="card-body">



                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    Araç Gir :
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
                        <div class="form-group col-md-6">
<button id="basla" class="btn btn-warning">Başla</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






</div>

<style>
    .durum_guncellemesi{

    }
</style>
<script>

    $('#basla').on('click', function() {


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
        var arac = $("#arac").val();
        var ulke = $("#ulke").val();
        var sube = $("#sube").val();
        var konum_durumu = $("#konum_durumu").val();
        var bos = '';


       $.redirect( "kargoStrateji/hizli_basla", {arac: arac,ulke: ulke,sube: sube,konum_durumu:konum_durumu} );


    });


</script>

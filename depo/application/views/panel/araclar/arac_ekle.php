<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Araç İşlemleri</h1>
    </div>



    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Araç Ekle</h6>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Marka</label>
                                <input type="text" class="form-control" id="marka" placeholder="Marka" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Model</label>
                                <input type="text" class="form-control" id="model" placeholder="Model" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Metre Küp</label>
                                <input type="text" class="form-control" id="metre_kup" placeholder="Metre Küp" required>
                            </div>

                            <!-- <div class="form-group col-md-12">
                                    <label for="inputEmail4">Araç Muayene Tarihi</label>
                                    <input type="date" class="form-control" id="muayene_tarihi" placeholder="Tarih" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Vergi Tarihi</label>
                                    <input type="date" class="form-control" id="vergi_tarihi" placeholder="Tarih" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Vergi Tarihi 2</label>
                                    <input type="date" class="form-control" id="vergi_tarihi2" placeholder="Tarih" required>
                                </div> -->

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Plaka</label>
                                <input type="text" class="form-control" id="plaka" placeholder="Plaka" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şube</label>
                                <select class="form-control" id="sube" placeholder="Şubeler" required>
                                    <option value="" >Şube Seç</option>
                                    <?php foreach($subeler as $s){?>
                                        <option value="<?=$s->id?>"><?=$s->sube_adi?> </option>
                                    <?php }?>
                                </select>
                            </div>


                        </div>
                </div>
            </div>
            </form>

        </div>
    </div>


    <div style="padding-bottom:20px;" class="container">

        <div class="row">
            <div class="col text-center">
                <button id="kaydet" type="button" class="btn btn-info btn-lg">Kaydet</button>
            </div>
        </div>
    </div>
</div>


<script>






    $('#kaydet').click(function(){

        var data = "marka="+$('#marka').val()+"&model="+$('#model').val()+"&metre_kup="+$('#metre_kup').val()+"&plaka="+$('#plaka').val()+"&sube="+$('#sube').val()+"&status="+"1";
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>araclar/ekle",
            type: "post",
            data: data,
            success: function (response) {
                $(response).append(bos);
                if(response == "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>araclar">Tamamdır..</a>'
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
</script>
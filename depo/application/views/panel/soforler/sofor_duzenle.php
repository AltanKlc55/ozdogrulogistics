<?php foreach($teksofor as $tek);?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Şoför İşlemleri</h1>
    </div>



    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Şoför Bilgileri</h6>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Ad Soyad</label>
                                <input type="text" class="form-control" id="ad_soyad" placeholder="Ad" value="<?=$tek->ad_soyad;?>" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Tel No</label>
                                <input type="text" class="form-control" id="tel_no" placeholder="Telefon Numarası" value="<?=$tek->tel_no;?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şube</label>
                                <select class="form-control" id="sube" placeholder="Şube"  required>
                                    <option value="<?=$tek->sube;?>"><?=get_sube($tek->sube);?> (Seçili)</option>
                                    <?php foreach($subeler as $s){?>
                                        <option value="<?=$s->id?>"><?=$s->sube_adi?> </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">E-Mail</label>
                                <input type="text" class="form-control" id="email"  placeholder="E-Mail" value="<?=$tek->email;?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şifre ( Şifreyi Şoför İle Paylaşmayı Unutmayın. )</label>
                                <input type="text" class="form-control" id="sifre" placeholder="Şifre" value="<?=$tek->sifre;?>" required>
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

        var data = "id="+<?=$tek->id;?>+"&ad_soyad="+$('#ad_soyad').val()+"&tel_no="+$('#tel_no').val()+"&sube="+$('#sube').val()+"&email="+$('#email').val()+"&sifre="+$('#sifre').val();
        var bos = 1;
        $.ajax({
            url: "<?=base_url();?>soforler/duzenle",
            type: "post",
            data: data,
            success: function (response) {
                $(response).append(bos);
                if(response == 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>soforler">Tamamdır..</a>'
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
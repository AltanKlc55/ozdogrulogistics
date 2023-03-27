<?php foreach($tekpersonel as $tp)?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Personel Düzenle</h1>
    </div>



    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personel Bilgileri</h6>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Ad Soyad</label>
                                <input type="text" class="form-control" id="ad_soyad" placeholder="Ad"  value="<?=$tp->ad_soyad;?>" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Tel No</label>
                                <input type="text" class="form-control" id="tel_no" placeholder="Telefon Numarası" value="<?=$tp->tel_no;?>" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">E-Mail</label>
                                <input type="text" class="form-control" id="email" placeholder="E-Mail" value="<?=$tp->email;?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şifre (Kullanıcı İle Paylaşmayı Unutmayın.)</label>
                                <input type="text" class="form-control" id="sifre" placeholder="Şifre" value="<?=$tp->sifre;?>" required>
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
                <button id="kaydet" type="button" class="btn btn-info btn-lg">Düzenle</button>
            </div>
        </div>
    </div>
</div>

<input hidden id="id" type="text" value="<?=$tp->id?>">

<script>


    $('#kaydet').click(function(){

        var data = "ad_soyad="+$('#ad_soyad').val()+"&tel_no="+$('#tel_no').val()+"&email="+$('#email').val()+"&sifre="+$('#sifre').val()+"&id="+$('#id').val();
        var bos = "0";
        $.ajax({
            url: "<?=base_url();?>personeller/duzenle",
            type: "post",
            data: data,
            success: function (response) {
                $(response).append(bos);
                if(response == 'ok'){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>personeller">Tamamdır..</a>'
                    });
                }
            }
        });

    });
</script>
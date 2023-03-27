<?php foreach($teksube as $tek);?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Şube İşlemleri</h1>
    </div>



    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Şube Bilgileri</h6>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">
                            <input hidden type="text" id="id" value="<?=$tek->id?>">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şube Adı</label>
                                <input type="text" class="form-control" id="sube_adi" placeholder="Ad" value="<?=$tek->sube_adi?>" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şube Bölgesi</label>
                                <select class="form-control" id="sube_bolgesi" placeholder="Ülke" required>
                                    <option value="<?=$tek->sube_bolgesi?>">Seçildi (<?=get_bolge($tek->sube_bolgesi);?>) </option>
                                    <?php foreach($bolgeler as $b){?>
                                        <option value="<?=$b->id?>"><?=$b->bolge_adi?> </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Şube Açık Adres</label>
                                <input type="text" class="form-control" id="sube_konumu" value="<?=$tek->sube_konumu?>" placeholder="Açık Adres" required>
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

        var data = "sube_adi="+$('#sube_adi').val()+"&sube_bolgesi="+$('#sube_bolgesi').val()+"&sube_konumu="+$('#sube_konumu').val()+"&id="+$('#id').val();
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>subeler/duzenle",
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
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>subeler">Tamamdır..</a>'
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
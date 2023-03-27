<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bölge İşlemleri</h1>
    </div>



            <div class="row">

                <div class="col-lg-12">

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bölge Bilgileri</h6>
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Bölge Adı</label>
                                        <input type="text" class="form-control" id="bolge_adi" placeholder="Ad" required>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Bolge Adresi</label>
                                        <input type="text" class="form-control" id="bolge_adresi" placeholder="Adres" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Bolge Kodu</label>
                                        <input type="text" class="form-control" id="bolge_kodu" placeholder="Kod" required>
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

        var data = "bolge_adi="+$('#bolge_adi').val()+"&bolge_adresi="+$('#bolge_adresi').val()+"&bolge_kodu="+$('#bolge_kodu').val();
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>bolgeler/ekle",
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
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>bolgeler">Tamamdır..</a>'
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
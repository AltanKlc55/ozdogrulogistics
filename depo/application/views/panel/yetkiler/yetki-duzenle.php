<?php foreach ($tekyetki as $ty);?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Yetki İşlemleri</h1>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yetkiler</h6>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="musteri" id="musteri">
                                    <label class="form-check-label" for="musteri">
                                        Müşteri Verilerine Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="depo" id="depo">
                                    <label class="form-check-label" for="depo">
                                        Depo Verilerine Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="personel" id="personel">
                                    <label class="form-check-label" for="personel">
                                        Personel Verilerine Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="kargostrateji" id="kargostrateji">
                                    <label class="form-check-label" for="kargostrateji">
                                        Strateji Verilerine Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="yan_veriler" id="yan_veriler">
                                    <label class="form-check-label" for="yan_veriler">
                                        Yan Verilere Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="eskidata" id="eskidata">
                                    <label class="form-check-label" for="eskidata">
                                        Eski Datalara Müdehale
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secim[]" value="finans" id="finans">
                                    <label class="form-check-label" for="finans">
                                        Finans Verilerine Müdehale
                                    </label>
                                </div>
                            </div>



                        </div>
                </div>
            </div>
            </form>

        </div>
    </div>


    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personeller</h6>
                </div>
                <div class="card-body">


                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Personeller</label>
                        <select class="form-control" id="personel_id" placeholder="personel_id" required>
                            <option value="<?=$ty->personel_id;?>"><?=get_personel($ty->personel_id);?> (Seçili)</option>
                            <?php foreach($personeller as $b){?>
                                <option value="<?=$b->id?>"><?=$b->ad_soyad?> </option>
                            <?php }?>
                        </select>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <input hidden id="id" type="text" value="<?=$ty->id?>">

    <div style="padding-bottom:20px;" class="container">

        <div class="row">
            <div class="col text-center">
                <button id="kaydet" type="button" class="btn btn-info btn-lg">Kaydet</button>
            </div>
        </div>
    </div>
</div>


<script>



    setTimeout(() => {
        <?php
         $tys = json_decode($ty->yetkiler);
         $i = 0;
        foreach ($tys as $tys_obj){
            echo "$('#".$tys_obj."').prop('checked', true);";

        }

        ?>
    }, 1000);



    $('#kaydet').click(function(){

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

        var data = "yetkiler="+vals+"&personel_id="+$('#personel_id').val()+"&id="+$('#id').val();
        var bos = '';
        $.ajax({
            url: "<?=base_url();?>yetkilendirme/duzenle",
            type: "post",
            data: data,
            success: function (response) {
                if(response == "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>yetki-listesi">Tamamdır..</a>'
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
</script>
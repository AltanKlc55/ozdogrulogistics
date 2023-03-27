<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Teslimat Listelesi (TR)</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kargo Stratejileri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gideceği Ülke</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Varış Şubesi</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Gideceği Ülke</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Varış Şubesi</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($strateji as $s){?>
                        <tr>
                            <td><?=$s->id;?></td>
                            <td><?=get_ulke($s->gidecegi_ulke);?></td>
                            <td><?=$s->created_at;?></td>
                            <td><?=get_sube($s->sube);?></td>
                            <td><?=get_strateji_durum($s->status);?></td>
                            <td>
                                <button id="<?=$s->id;?>" class="btn btn-info incele">İncele</button>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>



<script>


    $('.incele').click(function(){
        var data = $(this).attr('id');
        $.redirect( "kargoStrateji/strateji_incele", {id: data} );
    });


    $('.duzenle').click(function(){
        var data = $(this).attr('id');
        $.redirect( "kargoStrateji/ana_starteji", {id: data} );
    });

    $('.durum_degis').click(function(){

        var data = "id="+$(this).attr('id')+"&status="+$(this).attr('name');

        $.ajax({
            url: "<?=base_url();?>kargoStrateji/durum_degis",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
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
                if(response = "no"){
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


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>kargoStrateji/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
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
                if(response = "no"){
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



    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>kargoStrateji/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
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
                if(response = "no"){
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








    $('.yazdir').click(function(){

        var data = "id="+$(this).attr('id');

        $.redirect( "kargolar/yazdir", {id: data} );
    });

</script>

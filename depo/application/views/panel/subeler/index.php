<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Şube Listesi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Şubeler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Şube Adı</th>
                        <th>Şube Bölgesi</th>
                        <th>Şube Konumu</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Şube Adı</th>
                        <th>Şube Bölgesi</th>
                        <th>Şube Konumu</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($subeler as $b){?>
                        <tr>
                            <td><?=$b->id;?></td>
                            <td><?=$b->sube_adi;?></td>
                            <td><?=get_bolge($b->sube_bolgesi);?></td>
                            <td><?=$b->sube_konumu;?></td>
                            <td><?php if($b->status == 1){echo 'Aktif';}else{echo 'Pasif';}?></td>
                            <td>
                                <button id="<?=$b->id;?>" class="btn btn-warning duzenle">Düzenle</button>
                                <button id="<?=$b->id;?>" class="btn btn-danger sil">Sil</button>
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
        $.redirect( "katgolar/incele", {id: data} );
    });

    $('.duzenle').click(function(){
        var data = $(this).attr('id');
        $.redirect( "subeler/duzenle_sayfa", {id: data} );
    });


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>subeler/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
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

</script>

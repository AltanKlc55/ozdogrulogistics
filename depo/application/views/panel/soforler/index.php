<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Şoför Listesi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Şoförler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Tel No</th>
                        <th>Şube</th>
                        <th>E-Mail</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Tel No</th>
                        <th>Şube</th>
                        <th>E-Mail</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($soforler as $s){?>
                        <tr>
                            <td><?=$s->id;?></td>
                            <td><?=$s->ad_soyad;?></td>
                            <td><?=$s->tel_no;?></td>
                            <td><?=get_sube($s->sube);?></td>
                            <td><?=$s->email;?></td>
                            <td>
                                <button id="<?=$s->id;?>" class="btn btn-warning duzenle">Düzenle</button>
                                <button id="<?=$s->id;?>" class="btn btn-danger sil">Sil</button>
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


    $('.duzenle').click(function(){
        var data = $(this).attr('id');
        $.redirect( "soforler/duzenle_sayfa", {id: data} );
    });


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>soforler/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
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

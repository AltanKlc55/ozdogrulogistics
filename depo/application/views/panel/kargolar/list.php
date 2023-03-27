<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kargo Listesi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kargolar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>

                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>Kategori</th>
                        <th>Adet</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>

                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>Kategori</th>
                        <th>Adet</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($kargolar as $k){
                        if($k->id != 122){
                        ?>
                        <tr>
                            <td><?=$k->id;?></td>
                            <td><?php echo get_musteri($k->musteri);?></td>
                            <td><?=$k->acik_adres;?></td>
                            <td><?=$k->kategori;?></td>
                            <td><?=$k->adet;?></td>
                            <td><?=get_strateji_durum($k->status);?></td>
                            <td>
                                <button id="<?=$k->id;?>" class="btn btn-warning duzenle">Düzenle</button>
                                <button id="<?=$k->id;?>" class="btn btn-danger sil">Sil</button>
                                <form method="post" action="kargolar/yazdir">
                                    <input hidden name="id" type="text" value="<?=$k->id;?>" />
                                    <button type="submit" id="<?=$k->id;?>" class="btn btn-secondary yazdir">Yazdır</button>
                                </form>
                            </td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button class="btn btn-warning" id="ilerle"> İlerle </button>
        </div>
    </div>

</div>



<script>

    $('#ilerle').hide();

    $('.incele').click(function(){
        var data = $(this).attr('id');
        $.redirect( "kargolar/incele", {id: data} );
    });

    $('.duzenle').click(function(){
        var data = $(this).attr('id');
        $.redirect( "kargolar/duzenle_sayfa", {id: data} );
    });


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>kargolar/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>kargolar">Tamamdır..</a>'
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

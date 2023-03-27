<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Müşteri Listesi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Müşteriler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kod</th>
                        <th>Ad Soyad</th>
                        <th>Adres</th>
                        <th>Telefon</th>
                        <th>Mağza</th>
                        <th>Bölge</th>
                        <th>Posta Kodu</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Kod</th>
                        <th>Ad Soyad</th>
                        <th>Adres</th>
                        <th>Telefon</th>
                        <th>Mağza</th>
                        <th>Bölge</th>
                        <th>Posta Kodu</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($getdatas as $gd){?>
                        <tr>
                            <td><?=$gd->id;?></td>
                            <td><?=$gd->kod;?></td>
                            <td><?=$gd->isimsoyisim;?></td>
                            <td><?=$gd->adres;?></td>
                            <td><?=$gd->telefon;?></td>
                            <td><?=$gd->magza;?></td>
                            <td><?=$gd->bolge;?></td>
                            <td><?=$gd->postakodu;?></td>
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
        $.redirect( "musteriler/incele", {id: data} );
    });

    $('.duzenle').click(function(){
        var data = $(this).attr('id');
        $.redirect( "musteriler/duzenle_sayfa", {id: data} );
    });


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>musteriler/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>musteriler">Tamamdır..</a>'
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

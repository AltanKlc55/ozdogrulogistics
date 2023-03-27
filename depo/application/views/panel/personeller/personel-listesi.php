<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Personel Listelesi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personeller</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Telefon Numarası</th>
                        <th>Email</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Telefon Numarası</th>
                        <th>Email</th>
                        <th>İşlem</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($personeller as $p){?>
                        <tr>
                            <td><?=$p->id;?></td>
                            <td><?=$p->ad_soyad;?></td>
                            <td><?=$p->tel_no;?></td>
                            <td><?=$p->email;?></td>
                            <td>
                                <button id="<?=$p->id;?>" class="btn btn-warning duzenle">Düzenle</button>
                                <button id="<?=$p->id;?>" class="btn btn-danger sil">Sil</button>
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
        $.redirect( "personeller/personel_duzenle", {id: data} );
    });


    $('.sil').click(function(){

        var data = "id="+$(this).attr('id');

        $.ajax({
            url: "<?=base_url();?>personeller/sil",
            type: "post",
            data: data,
            success: function (response) {
                if(response = "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'İşlem Başarılı',
                        showConfirmButton: true,
                        confirmButtonText: '<a style="color:white;" href="<?=base_url();?>personel">Tamamdır..</a>'
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

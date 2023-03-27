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
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Tel No</th>
                        <th>Mail Adresi</th>
                        <th>Adres</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Tel No</th>
                        <th>Mail Adresi</th>
                        <th>Adres</th>
                        <th>İşlem</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($musteriler as $m){?>
                    <tr>
                        <td><?=$m->id;?></td>
                        <td><?=$m->ad;?></td>
                        <td><?=$m->soyad;?></td>
                        <td><?=$m->tel_no;?></td>
                        <td><?=$m->email;?></td>
                        <td><?=$m->acik_adres;?></td>
                        <td> 
                            <button id="<?=$m->id;?>" class="btn btn-info incele">İncele</button> 
                            <button id="<?=$m->id;?>" class="btn btn-warning duzenle">Düzenle</button>
                            <button id="<?=$m->id;?>" class="btn btn-danger sil">Sil</button> 
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

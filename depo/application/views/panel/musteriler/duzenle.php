<?php foreach($tekmusteri as $tm);?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Müşteri Düzenle</h1>
</div>




<div class="row">

    <div class="col-lg-12">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kişisel Bilgiler</h6>
            </div>
            <div class="card-body">
            <input hidden type="text" id="id" value="<?=$tm->id?>">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Ad</label>
                  <input type="text" class="form-control" id="ad" placeholder="Ad" value="<?=$tm->ad;?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Soyad</label>
                  <input type="text" class="form-control" id="soyad" placeholder="Soyad" value="<?=$tm->soyad;?>" required>
                </div>
              </div>
              </div>
           </form>

            </div>
        </div>

    </div>



 


    <div class="row">

    <div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
           <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Adres Bilgisi</h6>
            </div>
            <div class="card-body"> 
            <form>
              <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Adres Adı</label>
                  <input type="text" class="form-control" id="adres_adi" placeholder="Adres Adı" value="<?=$tm->adres_adi;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label for="ulke">Ülkeler</label>
                <select class="form-control" id="ulke" placeholder="Ülke" required>
                  <option value="" >Seçili (<?=$tm->ulke;?>)</option> 
               <?php foreach($ulkeler as $ulke){?>
                  <option value="<?=$ulke->id?>"><?=$ulke->baslik?> (<?=$ulke->rewrite?>) </option>
               <?php }?>
                </select>
                </div>

                <div class="form-group col-md-6">
                <label for="Sehir">Şehirler</label>
                <select class="form-control" id="sehir" placeholder="Şehirler" value="<?=$tm->sehir;?>" required>
                  <option value=""><?=$tm->sehir;?></option> 
    
                </select>
                </div>


               <div class="form-group col-md-6">
                <label for="ilceler">İlçeler</label>
                <select class="form-control" id="ilceler" placeholder="İlçeler" value="<?=$tm->ilceler;?>" required>
                <option value=""><?=$tm->ilceler;?></option> 
    
                </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputPassword4">Mahalle</label>
                  <input type="text" class="form-control" id="mahalle" placeholder="Mahalle" value="<?=$tm->mahalle;?>" required>
                </div>

  <div class="form-group col-md-6">
                  <label for="inputPassword4">Sokak</label>
                  <input type="text" class="form-control" id="sokak" placeholder="Sokak" value="<?=$tm->sokak;?>" required>

                </div>
                
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Kapı Numarası</label>
                  <input type="text" class="form-control" id="kapi_no" value="<?=$tm->kapi_no;?>" placeholder="Kapı Numarası" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Daire Numarası</label>
                  <input type="text" class="form-control" id="daire_no" value="<?=$tm->daire_no;?>" placeholder="Daire Numarası" required>
                </div>
              </div>
              </div>
           </form>
            </div>
        </div>
    </div>


  




    <div class="row">

<div class="col-lg-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İletişim Bilgisi</h6>
        </div>
        <div class="card-body"> 
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tel_no">Telefon Numarası</label>
              <input type="text" placeholder="Numaranız" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" name="tel_no" class="form-control" id="tel_no" value="<?=$tm->tel_no;?>" placeholder="" required>
            </div>

            <div class="form-group col-md-6">
              <label for="tel_no">E-Mail Adresi</label>
              <input type="text" name="email" class="form-control" id="email" value="<?=$tm->email;?>" placeholder="">
            </div>

          </div>
          </div>
       </form>
        </div>
    </div>
    <div style="padding-bottom:20px;" class="container">

    <div class="row">
    <div class="col text-center">
    <button id="kaydet" type="button" class="btn btn-info btn-lg">Değişiklikleri Kaydet</button>
    </div>
    </div>
    </div>
</div>
</div>









    </div>

</div>    

</div>

</div>
<script>

$('#ulke').on('change', function() {
  var data = "ulke_kodu="+$("#ulke").val();
$.ajax({
    url: "<?=base_url();?>musteriler/sehirler",
    type: "post",
    data: data,
    success: function (response) {
        $("#sehir").html("");
        $("#sehir").html(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
});
});


$('#sehir').on('change', function() {
  var data = "sehir_kodu="+$("#sehir").val();
$.ajax({
    url: "<?=base_url();?>musteriler/ilceler",
    type: "post",
    data: data,
    success: function (response) {
        $("#ilceler").html("");
        $("#ilceler").html(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
});
});


$('#kaydet').click(function(){

    var data = "id="+$('#id').val()+"&ad="+$('#ad').val()+"&soyad="+$('#soyad').val()+"&adres_adi="+$('#adres_adi').val()+"&ulke="+$( "#ulke option:selected" ).text()+"&sehir="+$( "#sehir option:selected" ).text()+"&ilceler="+$( "#ilceler option:selected" ).text()+"&mahalle="+$('#mahalle').val()+"&kapi_no="+$('#kapi_no').val()+"&daire_no="+$('#daire_no').val()+"&tel_no="+$('#tel_no').val()+"&email="+$('#email').val()+"&sokak="+$('#sokak').val();
    var bos = '';
    $.ajax({
    url: "<?=base_url();?>musteriler/duzenle",
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
<?php foreach($tekmusteri as $tm);?>


<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Müşteri İncele</h1>
</div>




<div class="row">

    <div class="col-lg-12">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kişisel Bilgiler</h6>
            </div>
            <div class="card-body">
            
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Ad: </label>
                  <label for=""><?=$tm->ad;?></label>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Soyad: </label>
                  <label for=""><?=$tm->soyad;?></label>
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
                  <label for="inputEmail4">Adres Adı : </label>
                  <label for=""><?=$tm->adres_adi;?></label>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail4">Ülke: </label>
                  <label for=""><?=$tm->ulke;?></label>
                </div>

                <div class="form-group col-md-6">
                <label for="Sehir">Şehir: </label>
                <label for=""><?=$tm->sehir;?></label>
                </div>


               <div class="form-group col-md-6">
                <label for="ilceler">İlçeler</label>
                <label for=""><?=$tm->ilceler;?></label>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputPassword4">Mahalle</label>
                  <label for=""><?=$tm->mahalle;?></label>
                </div>

                  <div class="form-group col-md-6">
                  <label for="inputPassword4">Sokak</label>
                  <label for=""><?=$tm->sokak;?></label>

                  </div>
                
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Kapı Numarası</label>
                  <label for=""><?=$tm->kapi_no;?></label>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Daire Numarası</label>
                  <label for=""><?=$tm->daire_no;?></label>
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
              <label for=""><?=$tm->tel_no;?></label>
            </div>

            <div class="form-group col-md-6">
              <label for="tel_no">E-Mail Adresi</label>
              <label for=""><?=$tm->email;?></label>

            </div>

          </div>
          </div>
       </form>
        </div>
    </div>
</div>
</div>









    </div>

</div>    

</div>

</div>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Özdoğru Lojistik Depo Uygulaması</title>

    <link href="<?php echo base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background-image:url('<?=base_url('upload/')?>odl.jpg'); background-repeat: no-repeat;background-position: center;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz</h1>
                                </div>
                                <form class="user" method="post" action="">

                                    <div class="form-group">
                                        <input type="email" id="telno"  name="telno" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Telefon No">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="sifre" id="sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Şifre">
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <button type="button" id="giris" class="btn btn-primary btn-user btn-block">Giriş</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/');?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url('assets/js/');?>redirect.js"></script>
<script src="<?php echo base_url('assets/js/');?>theme.js"></script>
<script>
    $('#giris').click(function(){
        var telno = $('#telno').val();
        var sifre = $('#sifre').val();
        $.redirect( "<?=base_url();?>login/giris", {telno: telno, sifre:sifre} );
    });

</script>

</body>

</html>
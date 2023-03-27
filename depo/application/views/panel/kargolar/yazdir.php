<?php foreach($tekkargo as $tk);?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div style="padding-top: 60px;" class="text-center">
<img style="padding-left: 10px; height: 80px; width: auto;" src="<?=base_url('upload/');?>odl.jpg">
</div>
<div class="row">
    <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
        Name Surname :  <?=get_musteri($tk->musteri);?>
    </div>

    <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
        Contact (Phone / Email) :  <?=$tk->iletisim_temel;?>
    </div>
    <div style="padding: 10px;border:1px solid black;" class="col-md-12 text-center">
        Adress :  <?=$tk->acik_adres;?> <br>
        <?=$tk->kod;?>
    </div>
</div>
<div style="padding-top: 10px;padding-bottom: 10px;border:1px solid black;" class="text-center">
    <img style="padding-left: 10px; height: 150px; width: auto;padding-top:10px;" src="<?=base_url().$barcode?>">
</div>
<script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script>

    window.print();

</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Barkod Okut</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kargo Doğrula</h6>
        </div>
        <div style="padding: 0px !important;" class="card-body">


            <div class="text-center">

                <div id="qr-reader" style="width:100%"></div>
                <div id="qr-reader-results"></div>


            </div>



        </div>
    </div>




    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Okutulan Kargolar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>İletişim</th>
                        <th>Durum</th>
                
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Müşteri</th>
                        <th>Açık Adres</th>
                        <th>İletişim</th>
                        <th>Durum</th>

                    </tr>
                    </tfoot>
                    <tbody id="taratilanlar">



                    </tbody>
                </table>
            </div>
        </div>
    </div>









</div>

<style>
    .durum_guncellemesi{

    }
</style>
<script>
    $("body").on("click", ".durum_guncellemesi", function(){

        var data = "id="+$(this).attr('id')+"&status="+$(this).attr('name');
        var ids = $(this).attr('id');
        var bos = "";
        $.ajax({
            url: "<?=base_url();?>kargolar/durum_degis",
            type: "post",
            data: data,
            success: function (response) {
                if(response){
                    var row = document.getElementById(ids);
                    row.parentElement.removeChild(row);
                    $('#taratilanlar').append(response);
                }
            }
        });

    });
</script>

<script src="<?php echo base_url('assets/');?>js/html5-qrcode.min.js"></script>
<script>





    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;

                console.log(`Scan result ${decodedText}`, decodedResult);

                var data = 'barkod_kam='+decodedText;




                $.ajax({
                    url: "<?=base_url();?>kargolar/barkoda_gore_getir",
                    type: "post",
                    data: data,
                    success: function (response) {
                    $("#taratilanlar").append(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                });

            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
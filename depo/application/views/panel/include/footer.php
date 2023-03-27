        <!-- Footer -->
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Çıkış Yapmak İstediğinize Eminmisiniz ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                    <button class="btn btn-primary" type="button" id="cikis_session">Çıkış</button>
                    <script>

                        $('#cikis_session').click(function(){
                            $.redirect( "<?=base_url();?>login/logout");
                        });

                    </script>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('assets/');?>js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url('assets/');?>js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('assets/');?>js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

</body>

</html>
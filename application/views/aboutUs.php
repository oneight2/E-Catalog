
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Departemen</h6>
        </div>
        <div class="card-body">
        <input type="text" name="about" id="about" class="form-control" placeholder="About">
        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram">
        <input type="text" name="shopee" id="shopee" class="form-control" placeholder="Shopee">
        <input type="text" name="siplah" id="siplah" class="form-control" placeholder="Siplah">

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- FOOTER -->
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Indonesia Heritage Foundation<?= date('Y'); ?></span>
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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
           <!--  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
            <script type="text/javascript" src="<?= base_url('assets/').'ajax/js/jquery-3.2.1.js'?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/').'ajax/js/bootstrap.js'?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/').'ajax/js/jquery.dataTables.js'?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/').'ajax/js/dataTables.bootstrap4.js'?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            


            <script>
              $(document).ready(function(){
                            show_product(); //call function show all product
                            
                            $('#mydata').dataTable();
                             
                            //function show all product
                            function show_product(){
                                $.ajax({
                                    type  : 'GET',
                                    url   : '<?php echo site_url('About/product_data')?>',
                                    async : false,
                                    dataType : 'json',
                                    contentType: "application/json",
                                    success : function(data){
                                        var html = '';
                                        var no = 1;
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += 
                                                    '<td>'+ no++ +'</td>'+
                                                    '<td>'+data[i].name_category+'</td>'+;
                                        }
                                        $('#show_data').html(html);
                                    }

                                });
                            }

                            //Save product
                            $('#btn_save').on('click',function(){
                                var nama_kategori= $('#nama').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('Category/save')?>",
                                    dataType : "JSON",
                                    data : {name_category:nama_kategori},
                                    success: function(data){
                                        $('[id="nama"]').val("");
                                        $('#Modal_Add').modal('hide');
                                        show_product();
                                    }
                                });
                                return false;
                            });

                            //get data for update record
                            $('#show_data').on('click','.item_edit',function(){
                                var id_kategori = $(this).data('id_kategori');
                                var nama_kategori = $(this).data('nama_kategori');
                                
                                $('#Modal_Edit').modal('show');
                                $('[id="id_kategori"]').val(id_kategori);
                                $('[id="nama_edit"]').val(nama_kategori);
                            });

                            //update record to database
                             $('#btn_update').on('click',function(){
                                var id_kategori = $('#id_kategori').val();
                                var nama_kategori = $('#nama_edit').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('Category/update')?>",
                                    dataType : "JSON",
                                    data : {id_category:id_kategori , name_category:nama_kategori},
                                    success: function(data){
                                        $('[id="id_kategori"]').val("");
                                        $('[id="nama_edit"]').val("");
                                        $('#Modal_Edit').modal('hide');
                                        show_product();
                                    }
                                });
                                return false;
                            });

                            //get data for delete record
                            $('#show_data').on('click','.item_delete',function(){
                                var id_kategori= $(this).data('id_kategori');
                                
                                $('#Modal_Delete').modal('show');
                                $('[id="id_delete"]').val(id_kategori);
                            });

                            //delete record to database
                             $('#btn_delete').on('click',function(){
                                var id_kategori = $('#id_delete').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('Category/delete')?>",
                                    dataType : "JSON",
                                    data : {id_category:id_kategori},
                                    success: function(data){
                                        $('[id="id_delete"]').val("");
                                        $('#Modal_Delete').modal('hide');
                                        show_product();
                                    }
                                });
                                return false;
                            });

                        });
            </script>

            </body>

            </html>
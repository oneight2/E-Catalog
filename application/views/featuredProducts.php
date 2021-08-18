
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Departemen</h6>
        </div>
        <div class="card-body">
        <a href="javascript:void(0);" class="btn btn-primary btn-sm ml-3 mb-4" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-striped" id="mydata">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Featured Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Name Featured</label>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Name Featured">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->
<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Name Featured</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Name Featured</label>
                        <div class="col-md-10">
                            <input type="text" id="id_featured" class="form-control"  hidden>
                            <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Name Featured">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL EDIT-->
<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Featured</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE-->


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
                                    url   : '<?php echo site_url('FeaturedProducts/product_data')?>',
                                    async : false,
                                    dataType : 'json',
                                    contentType: "application/json",
                                    success : function(data){
                                        var html = '';
                                        var no = 1;
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<tr>'+
                                                    '<td>'+ no++ +'</td>'+
                                                    '<td>'+data[i].name_featured+'</td>'+
                                                    '<td style="text-align:center;">'+
                                                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-name_featured="'+data[i].name_featured+'" data-id_featured='+data[i].id_featured+'><i class="fas fa-edit"></i></a>'+' '+
                                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_featured="'+data[i].id_featured+'" ><i class="fas fa-trash"></i></a>'+
                                                    '</td>'+
                                                    '</tr>';
                                        }
                                        $('#show_data').html(html);
                                    }

                                });
                            }

                            //Save product
                            $('#btn_save').on('click',function(){
                                var name_featured= $('#nama').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('FeaturedProducts/save')?>",
                                    dataType : "JSON",
                                    data : {name_featured:name_featured},
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
                                var id_featured = $(this).data('id_featured');
                                var name_featured = $(this).data('name_featured');
                                
                                $('#Modal_Edit').modal('show');
                                $('[id="id_featured"]').val(id_featured);
                                $('[id="nama_edit"]').val(name_featured);
                            });

                            //update record to database
                             $('#btn_update').on('click',function(){
                                var id_featured = $('#id_featured').val();
                                var name_featured = $('#nama_edit').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('FeaturedProducts/update')?>",
                                    dataType : "JSON",
                                    data : {id_featured:id_featured , name_featured:name_featured},
                                    success: function(data){
                                        $('[id="id_featured"]').val("");
                                        $('[id="nama_edit"]').val("");
                                        $('#Modal_Edit').modal('hide');
                                        show_product();
                                    }
                                });
                                return false;
                            });

                            //get data for delete record
                            $('#show_data').on('click','.item_delete',function(){
                                var id_featured= $(this).data('id_featured');
                                
                                $('#Modal_Delete').modal('show');
                                $('[id="id_delete"]').val(id_featured);
                            });

                            //delete record to database
                             $('#btn_delete').on('click',function(){
                                var id_featured = $('#id_delete').val();
                                $.ajax({
                                    type : "POST",
                                    url  : "<?php echo site_url('FeaturedProducts/delete')?>",
                                    dataType : "JSON",
                                    data : {id_featured:id_featured},
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
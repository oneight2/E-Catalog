<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
    <div class="card-body">
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Perhatian!</h4>
            <p>Apabila product category dihapus maka product dengan category tersebut akan terhide dari halaman depan</p>
            <hr>
            <p>ukuran icon category 500x500 download template <a href="<?= base_url('assets/templates/template-category.eps') ?>">disini</a></p>
        </div>
        <a href="javascript:void(0);" class="btn btn-primary btn-sm ml-3 mb-4" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Icon</th>
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

<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <Form method="post" enctype="multipart/form-data" action="Category/save">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control mb-3" placeholder="Nama Kategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Icon</label>
                        <div class="col-md-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon04" id="upload-icon" name="icon" required>
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </Form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->
<!-- MODAL EDIT -->
<form method="post" enctype="multipart/form-data" action="Category/update">
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-md-10">
                            <input type="text" name="id_category" id="id_category" class="form-control" hidden>
                            <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nama Kategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input id="drop" name="icon_category" id="icon_category" type="file" class="file" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <input type="hidden" name="icon" id="icon" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE-->


<!-- FOOTER -->
<?php $this->load->view('templates/footer'); ?>

<script>
    $(document).ready(function() {
        $('#upload-icon').on('change', function() {
            //get the file name
            var fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
        show_product(); //call function show all product
        // initialize with defaults

        $('#mydata').dataTable();

        //function show all product
        function show_product() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('Category/product_data') ?>',
                async: false,
                dataType: 'json',
                contentType: "application/json",
                success: function(data) {
                    var html = '';
                    var no = 1;
                    var base_url = window.location.origin;
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].name_category + '</td>' +
                            '<td><img src="' + base_url + '/e-catalog/assets/category/' + data[i].icon + '" height="100px" ></td>' +
                            '<td style="text-align:center;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-nama_kategori="' + data[i].name_category + '" data-id_kategori="' + data[i].id_category + '"><i class="fas fa-edit"></i></a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_kategori="' + data[i].id_category + '" data-icon="' + data[i].icon + '"><i class="fas fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }


        //get data for update record
        $('#show_data').on('click', '.item_edit', function() {
            var id_kategori = $(this).data('id_kategori');
            var nama_kategori = $(this).data('nama_kategori');

            $('#Modal_Edit').modal('show');
            $('[id="id_category"]').val(id_kategori);
            $('[id="nama_edit"]').val(nama_kategori);
        });

        //update record to database
        // $('#btn_update').on('click', function() {
        //     var id_kategori = $('#id_kategori').val();
        //     var nama_kategori = $('#nama_edit').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php echo site_url('Category/update') ?>",
        //         dataType: "JSON",
        //         data: {
        //             id_category: id_kategori,
        //             name_category: nama_kategori
        //         },
        //         success: function(data) {
        //             $('[id="id_kategori"]').val("");
        //             $('[id="nama_edit"]').val("");
        //             $('#Modal_Edit').modal('hide');
        //             show_product();
        //         }
        //     });
        //     return false;
        // });

        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var id_kategori = $(this).data('id_kategori');
            var icon = $(this).data('icon');

            $('#Modal_Delete').modal('show');
            $('[id="id_delete"]').val(id_kategori);
            $('[id="icon"]').val(icon);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id_kategori = $('#id_delete').val();
            var icon = $('#icon').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Category/delete') ?>",
                dataType: "JSON",
                data: {
                    id_category: id_kategori,
                    icon: icon
                },
                success: function(data) {
                    $('[id="id_delete"]').val("");
                    $('[id="icon"]').val("");
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
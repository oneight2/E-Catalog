<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url() ?>addProduct" class="btn btn-primary btn-sm ml-3 mb-4"><span class="fa fa-plus"></span> Tambah Produk</a>
        <div class="table-responsive">
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                    <?php $no = 1 ?>
                    <?php foreach ($products as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['name_product'] ?></td>
                            <td><?= $row['name_category'] ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

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
        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        // function show_product() {
        //     $.ajax({
        //         type: 'GET',
        //         url: '<?php echo site_url('Products/product_data') ?>',
        //         async: false,
        //         dataType: 'json',
        //         contentType: "application/json",
        //         success: function(data) {
        //             var html = '';
        //             var no = 1;
        //             var i;
        //             for (i = 0; i < data.length; i++) {
        //                 html += '<tr>' +
        //                     '<td>' + no++ + '</td>' +
        //                     '<td>' + data[i].name_category + '</td>' +
        //                     '<td style="text-align:center;">' +
        //                     '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-nama_kategori="' + data[i].name_category + '" data-id_kategori="' + data[i].id_category + '"><i class="fas fa-edit"></i></a>' + ' ' +
        //                     '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_kategori="' + data[i].id_category + '" ><i class="fas fa-trash"></i></a>' +
        //                     '</td>' +
        //                     '</tr>';
        //             }
        //             $('#show_data').html(html);
        //         }

        //     });
        // }

        //Save product
        $('#btn_save').on('click', function() {
            var nama_kategori = $('#nama').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Category/save') ?>",
                dataType: "JSON",
                data: {
                    name_category: nama_kategori
                },
                success: function(data) {
                    $('[id="nama"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });


        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var id_kategori = $(this).data('id_kategori');

            $('#Modal_Delete').modal('show');
            $('[id="id_delete"]').val(id_kategori);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id_kategori = $('#id_delete').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Category/delete') ?>",
                dataType: "JSON",
                data: {
                    id_category: id_kategori
                },
                success: function(data) {
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
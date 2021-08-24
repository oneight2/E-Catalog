<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
    </div>
    <div class="card-body" id="show_data">
        <a href="<?= base_url() ?>products/addProduct" class="btn btn-primary btn-sm ml-3 mb-4"><span class="fa fa-plus"></span> Tambah Produk</a>
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
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($products as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['name_product'] ?></td>
                            <td><?= $row['name_category'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>Products/update/<?= $row['id'] ?>" class="btn btn-info btn-sm item_edit" data-id_product="<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_product="<?= $row['id'] ?>" data-id_photos="<?= $row['id_photos'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
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
                    <input type="hidden" name="id_photos" id="id_photos" class="form-control">
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
        $('#mydata').dataTable();

        //get data for delete record
        $('.item_delete').on('click', function() {
            var id_product = $(this).data('id_product');
            var id_photos = $(this).data('id_photos');

            $('#Modal_Delete').modal('show');
            $('[id="id_delete"]').val(id_product);
            $('[id="id_photos"]').val(id_photos);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id_product = $('#id_delete').val();
            var id_photos = $('#id_photos').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Products/delete') ?>",
                dataType: "JSON",
                data: {
                    id_product: id_product,
                    id_photos: id_photos
                },
                success: function(data) {
                    $('[id="id_delete"]').val("");
                    $('[id="id_photos"]').val("");
                    $('#Modal_Delete').modal('hide');
                    location.reload()
                    new Toast({
                        message: 'Data Berhasil di Delete',
                        type: 'danger'
                    });
                }
            });
            return false;
        });

    });
</script>

</body>

</html>
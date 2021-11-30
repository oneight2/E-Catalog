<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($images as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><img src="<?= base_url() ?>assets/product/<?= $row['photo'] ?>" width="200px" alt=""></td>
                                        <td><a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_photo="<?= $row['id_photo'] ?>" data-photo="<?= $row['photo'] ?>"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <form method='post' action="<?= base_url() ?>Products/update_image" enctype='multipart/form-data'>
                            <!-- HIDDEN INPUT -->
                            <input type="hidden" name="id" value="<?= $product[0]['id'] ?>">
                            <input type="hidden" name="id_photos" value="<?= $product[0]['id_photos'] ?>">
                            <!-- HIDDEN INPUT -->
                            <input id="drop" name="files[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                            <button type="submit" class="btn btn-info btn-md btn-block my-3">Update image</button>
                        </form>
                    </div>
                    <form method='post' action="<?= base_url() ?>Products/update_data">
                        <!-- HIDDEN INPUT -->
                        <input type="hidden" name="id" value="<?= $product[0]['id'] ?>">
                        <input type="hidden" name="id_photos" value="<?= $product[0]['id_photos'] ?>">
                        <!-- HIDDEN INPUT -->
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nama Produk</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="name_product" name="name_product" value="<?= $product[0]['name_product'] ?>" required>
                            </div>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description Product"><?= $product[0]['description'] ?></textarea>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Harga</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="price" name="price" value="<?= $product[0]['price'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Stok</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="stok" name="stock" value="<?= $product[0]['stock'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Berat</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="Berat" name="weight" value="<?= $product[0]['weight'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="kategori">Kategori Produk</label>
                                        </div>
                                        <select class="custom-select" id="kategori" name="id_category" required>
                                            <?php foreach ($category as $row) : ?>
                                                <option value="<?= $row['id_category'] ?>" <?php echo ($row['id_category'] == $product[0]['id_category'] ? 'selected' : '') ?>>
                                                    <?= $row['name_category'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="featured">Feature Produk</label>
                                        </div>
                                        <select class="custom-select" id="featured" name="id_featured">
                                            <!-- <option selected disabled>Choose...</option> -->
                                            <?php foreach ($featured as $row) : ?>
                                                <option value="<?= $row['id_featured'] ?>" <?php echo ($row['id_featured'] == $product[0]['id_featured'] ? 'selected' : '') ?>>
                                                    <?= $row['name_featured'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text bg-warning text-white" id="inputGroup-sizing-default">Link Shopee</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="shopee" name="shopee" value="<?= $product[0]['shopee'] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text bg-info text-white" id="inputGroup-sizing-default">Link Siplah</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="siplah" name="siplah" value="<?= $product[0]['siplah'] ?>">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="show" <?= $product[0]['status'] == 'show' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Show
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="hide" <?= $product[0]['status'] == 'hide' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Hide
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-block my-3">Update Produk</button>
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
<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <input type="hidden" name="photo" id="photo" class="form-control">
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
    // initialize with defaults
    $("#drop").fileinput();

    function texteditor() {
        tinymce.init({
            selector: 'textarea#description',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
        tinymce.init({
            selector: 'textarea#review_edit',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    }
    texteditor()

    var rupiah = document.getElementById('price');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    //get data for delete record
    $('.item_delete').on('click', function() {
        var id_photo = $(this).data('id_photo');
        var photo = $(this).data('photo');

        $('#Modal_Delete').modal('show');
        $('[id="id_delete"]').val(id_photo);
        $('[id="photo"]').val(photo);
    });

    //delete record to database
    $('#btn_delete').on('click', function() {
        var id_photo = $('#id_delete').val();
        var photo = $('#photo').val();
        console.log(id_photo)
        console.log(photo)
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Products/deleteImages') ?>",
            dataType: "JSON",
            data: {
                id_photo: id_photo,
                photo: photo
            },
            success: function(data) {
                $('[id="id_delete"]').val("");
                $('[id="photo"]').val("");
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
</script>
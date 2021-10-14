<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container-fluid">
                <form method='post' action="save" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col">
                            <!-- <input type="file" class="filepond" id="filepond" name="filepond[]" multiple data-allow-reorder="true" data-max-file-size="3MB"> -->
                            <input id="drop" name="files[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..." required>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nama Produk</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="name_product" name="name_product" required>
                            </div>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description Product"></textarea>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Harga</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="price" name="price" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Stok</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="stok" name="stock" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group my-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Berat</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="Berat" name="weight">
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
                                            <option selected disabled value="">Choose...</option>
                                            <?php foreach ($category as $row) : ?>
                                                <option value="<?= $row['id_category'] ?>"><?= $row['name_category'] ?></option>
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
                                            <option selected disabled>Choose...</option>
                                            <?php foreach ($featured as $row) : ?>
                                                <option value="<?= $row['id_featured'] ?>"><?= $row['name_featured'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text bg-warning text-white" id="inputGroup-sizing-default">Link Shopee</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="shopee" name="shopee">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend color-warning">
                                    <span class="input-group-text bg-info text-white" id="inputGroup-sizing-default">Link Siplah</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="siplah" name="siplah">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="show" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Show
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="hide">
                                <label class="form-check-label" for="exampleRadios2">
                                    Hide
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-block my-3">Tambah Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
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
</script>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Departemen</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <span class="fa fa-plus"></span> Tambah Data
        </button>
        <div class="collapse" id="collapseExample">
            <div class="col-6 m-0 p-0">

                <div class="card card-body shadow-lg bg-white rounded">
                    <?= form_open_multipart('Carousel/index') ?>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload-carousel" aria-describedby="inputGroupFileAddon04" name="carousel">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn  btn-primary " type="submit" id="inputGroupFileAddon04">UPLOAD</button>
                        </div>
                    </div>
                </div>

                <?= form_close() ?>
            </div>
        </div>
        <div class="table-responsive mt-5">
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
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

<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <input type="hidden" name="img_delete" id="img_delete" class="form-control">
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
    $('#upload-carousel').on('change', function() {
        //get the file name
        var fileName = $(this).val().split('\\').pop();
        console.log(fileName)
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
    $(document).ready(function() {

        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_product() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('Carousel/product_data') ?>',
                async: false,
                dataType: 'json',
                contentType: "application/json",
                success: function(data) {
                    var html = '';
                    var base_url = window.location.origin;
                    var no = 1;
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td><img src="' + base_url + '/e-catalog/assets/carousel/' + data[i].image + '" height="100px" ></td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_carousel="' + data[i].id + '" data-img_carousel="' + data[i].image + '" ><i class="fas fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }


        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var id_carousel = $(this).data('id_carousel');
            var img_carousel = $(this).data('img_carousel');

            $('#Modal_Delete').modal('show');
            $('[id="id_delete"]').val(id_carousel);
            $('[id="img_delete"]').val(img_carousel);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id_carousel = $('#id_delete').val();
            var img_carousel = $('#img_delete').val();
            console.log(id_carousel)
            console.log(img_carousel)
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Carousel/delete') ?>",
                dataType: "JSON",
                data: {
                    id_carousel: id_carousel,
                    img_carousel: img_carousel,
                },
                success: function(data) {
                    $('[id="id_delete"]').val("");
                    $('[id="img_delete"]').val("");
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
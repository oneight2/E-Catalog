<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reviews Customer</h6>
    </div>
    <div class="card-body">
        <a href="javascript:void(0);" class="btn btn-primary btn-sm ml-3 mb-4" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Review Customer</th>
                        <th>Name Customer</th>
                        <th>Type Customer</th>
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
                        <label class="col-md-2 col-form-label">Review Customer</label>
                        <div class="col-md-10">
                            <textarea type="text" name="review" id="review" placeholder="Review Customer"></textarea>
                            <input type="text" name="name_customer" id="name_customer" class="form-control mt-3" placeholder="Name Customer" required>
                            <input type="text" name="jenis_customer" id="jenis_customer" class="form-control mt-2" placeholder="Kategori Costumer (bisa berupa jabatan atau nama perusahaan)" required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-md-10">
                            <input type="text" id="id_review" class="form-control" hidden>
                            <textarea type="text" name="review_edit" id="review_edit" placeholder="Review Customer"></textarea>
                            <input type="text" name="edit_name_customer" id="edit_name_customer" class="form-control mt-3" placeholder="Name Customer">
                            <input type="text" name="edit_customer" id="edit_customer" class="form-control mt-2" placeholder="Kategori Costumer (bisa berupa jabatan atau nama perusahaan)">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Review</h5>
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

        function texteditor() {
            tinymce.init({
                selector: 'textarea#review',
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

        //function show all product
        function show_product() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('Reviews/product_data') ?>',
                async: false,
                dataType: 'json',
                contentType: "application/json",
                success: function(data) {
                    var html = '';
                    var no = 1;
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].review + '</td>' +
                            '<td>' + data[i].name_customer + '</td>' +
                            '<td>' + data[i].type_customer + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-review="' + data[i].review + '" data-id_review="' + data[i].id_review + '" data-type_customer="' + data[i].type_customer + '" data-name_customer="' + data[i].name_customer + '" ><i class="fas fa-edit"></i></a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_review="' + data[i].id_review + '" ><i class="fas fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
            texteditor()
        }

        //Save product
        $('#btn_save').on('click', function() {
            var review = tinyMCE.activeEditor.getContent();
            var name_customer = $('#name_customer').val();
            var type_customer = $('#jenis_customer').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Reviews/save') ?>",
                dataType: "JSON",
                data: {
                    review: review,
                    name_customer: name_customer,
                    type_customer: type_customer
                },
                success: function(data) {
                    $('[id="review"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click', '.item_edit', function() {
            var id_review = $(this).data('id_review');
            var review = $(this).data('review');
            var name_customer = $(this).data('name_customer');
            var type_customer = $(this).data('type_customer');

            $('#Modal_Edit').modal('show');
            $('[id="id_review"]').val(id_review);
            tinymce.activeEditor.setContent(review);
            $('[id="edit_name_customer"]').val(name_customer);
            $('[id="edit_customer"]').val(type_customer);
        });

        //update record to database
        $('#btn_update').on('click', function() {
            var id_review = $('#id_review').val();
            var review = tinyMCE.activeEditor.getContent();
            var name_customer = $('#edit_name_customer').val();
            var type_customer = $('#edit_customer').val();
            console.log(review)
            console.log(id_review)
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Reviews/update') ?>",
                dataType: "JSON",
                data: {
                    id_review: id_review,
                    review: review,
                    name_customer: name_customer,
                    type_customer: type_customer
                },
                success: function(data) {
                    $('[id="id_review"]').val("");
                    $('[id="edit_name_customer"]').val("");
                    $('[id="edit_customer"]').val("");
                    $('[id="id_review"]').val("");
                    tinymce.activeEditor.setContent("")
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var id_review = $(this).data('id_review');

            $('#Modal_Delete').modal('show');
            $('[id="id_delete"]').val(id_review);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id_review = $('#id_delete').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Reviews/delete') ?>",
                dataType: "JSON",
                data: {
                    id_review: id_review
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
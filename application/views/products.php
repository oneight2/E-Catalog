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
                        <th>Status</th>
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
                                <span class="badge <?php echo ($row['status'] == 'show' ? 'badge-info' : 'badge-danger') ?>"><?= $row['status'] ?></span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm view" data-id_product="<?= $row['id'] ?>" data-id_photos="<?= $row['id_photos'] ?>" data-name_product="<?= $row['name_product'] ?>" data-description="<?= $row['description'] ?>" data-price="<?= $row['price'] ?>" data-stock="<?= $row['stock'] ?>" data-weight="<?= $row['weight'] ?>" data-category="<?= $row['name_category'] ?>" data-featured="<?= $row['name_featured'] ?>" data-shopee="<?= $row['shopee'] ?>">
                                    <i class="fas fa-eye"></i></a>
                                <a href="<?= base_url() ?>Products/update/<?= $row['id'] ?>/<?= $row['id_photos'] ?>" class="btn btn-info btn-sm item_edit" data-id_product="<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
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

<!--MODAL info-->
<form>
    <div class="modal fade" id="Modal_Info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div id="carousel-photos">
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-bold text-dark" id="name_product">Nama Product</h3>
                            <hr class="mb-1 mt-0">
                            <h4 class="text-danger font-weight-bold" id="price">Rp. 10.000</h4>
                            <div id="description"></div>
                            <hr>
                            <p class="mb-1">Stock: <b id="stock">12</b></p>
                            <p class="mb-1">Berat: <b id="weight">150</b> gr</p>
                            <p class="mb-1">Kategori: <span class="badge badge-primary" id="category">Primary</span></p>
                            <p class="mb-3">Feature: <span class="badge badge-info" id="featured">Info</span></p>
                            <a href="" id="shopee" class="btn btn-warning btn-block">Shopee</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="id_delete" id="id_delete" class="form-control">
                    <input type="text" name="id_photos" id="id_photos" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL info-->
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

        //get data for view data
        $('.view').on('click', function() {
            var id_product = $(this).data('id_product');
            var id_photos = $(this).data('id_photos');
            var name_product = $(this).data('name_product');
            var description = $(this).data('description');
            var price = $(this).data('price');
            var stock = $(this).data('stock');
            var weight = $(this).data('weight');
            var category = $(this).data('category');
            var featured = $(this).data('featured');

            var $desc = $('#description');
            html = $.parseHTML(description)

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Products/get_photos') ?>",
                dataType: "JSON",
                data: {
                    id_product: id_product,
                    id_photos: id_photos
                },
                success: function(data) {
                    var carousel = '';

                    carousel += '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">'+
                                    '<div class="carousel-inner">';
                                    var i;
                var i;
                for (i = 0; i < data.photos.length; i++) {
                    carousel +=
                        '<div class="carousel-item '+ (i == 0 ? "active":"")  +' "> '+
                            '<img class="d-block w-100" src="assets/product/'+ data.photos[i].photo +'" alt="First slide">'+
                        '</div>';
                }

                    carousel += '</div>'+
                                    '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">'+
                                        '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
                                        '<span class="sr-only">Previous</span>'+
                                    '</a>'+
                                    '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">'+
                                        '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
                                        '<span class="sr-only">Next</span>'+
                                    '</a>'+
                                '</div>';

                    $('#carousel-photos').html(carousel);
                    console.log(data.photos)
                }
            });

            $('#Modal_Info').modal('show');
            $('[id="id_delete"]').val(id_product);
            $('[id="id_photos"]').val(id_photos);
            $('[id="name_product"]').text(name_product);
            // $('[id="description"]').parseHTML(description);
            $desc.html(html)
            $('[id="price"]').text(price);
            $('[id="stock"]').text(stock);
            $('[id="weight"]').text(weight);
            $('[id="category"]').text(category);
            $('[id="featured"]').text(featured);
        });
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
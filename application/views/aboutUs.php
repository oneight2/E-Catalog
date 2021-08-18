<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
    </div>
    <div class="card-body">
        <div id="show_data">

        </div>
        <button type="button" type="submit" id="btn_update" class="btn btn-primary btn-block mt-3 right">Update</button>

        <!-- <input type="text" name="about" id="about" class="form-control" placeholder="About">
        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram">
        <input type="text" name="shopee" id="shopee" class="form-control" placeholder="Shopee">
        <input type="text" name="siplah" id="siplah" class="form-control" placeholder="Siplah"> -->

    </div>
</div>
</div>
<!-- /.container-fluid -->

<!-- FOOTER -->
<?php $this->load->view('templates/footer'); ?>


<script>
    $(document).ready(function() {
        show_product(); //call function show all product

        function texteditor() {
            tinymce.init({
                selector: 'textarea#about',
                height: 500,
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
                url: '<?php echo site_url('AboutUs/product_data') ?>',
                async: false,
                dataType: 'json',
                contentType: "application/json",
                success: function(data) {
                    var html = '';
                    html +=
                        '<textarea type="text" name="about" id="about" class="form-control" placeholder="About" value="">' + data[0].description + '</textarea>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<label for="instagram" class="form-label mt-2">Link Instagram</label>' +
                        '<input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram" value="' + data[0].instagram + '"/>' +
                        '<label for="shopee" class="form-label mt-2">Link Shopee</label>' +
                        '<input type="text" name="shopee" id="shopee" class="form-control" placeholder="shopee" value="' + data[0].shopee + '"/>' +
                        '</div> <div class="col-md-6">' +
                        '<label for="siplah" class="form-label mt-2">Link Siplah</label>' +
                        '<input type="text" name="siplah" id="siplah" class="form-control" placeholder="siplah" value="' + data[0].siplah + '"/>' +
                        '<label for="whatsapp" class="form-label mt-2">Nomor Whatsapp</label>' +
                        '<input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="whatsapp" value="' + data[0].whatsapp + '"/>';
                    '</div> </div>'
                    $('#show_data').html(html);
                }

            })

            texteditor();
        }



        //update record to database
        $('#btn_update').on('click', function() {
            var about = tinyMCE.activeEditor.getContent();
            var instagram = $('#instagram').val()
            var shopee = $('#shopee').val()
            var siplah = $('#siplah').val()
            var whatsapp = $('#whatsapp').val()
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('AboutUs/update') ?>",
                dataType: "JSON",
                data: {
                    about: about,
                    instagram: instagram,
                    shopee: shopee,
                    siplah: siplah,
                    whatsapp: whatsapp
                },
                success: function(data) {
                    show_product();
                    new Toast({
                        message: 'Data Berhasil di Update',
                        type: 'success'
                    });
                }
            });
            return false;
        });

    });
</script>

</body>

</html>
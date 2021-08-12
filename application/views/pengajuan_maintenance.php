<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                       
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Form Pengajuan Perbaikan</h1>
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Mohon diperhatikan!</h4>
                                    <p>Apabila perangkat memungkinkan diantar ke ruangan maintenance <b>mohon diantarkan</b>. Apabila tidak mohon menghubungi pihak IT & Multimedia (Pak Jumadi)</p>
                                </div>
                            </div>
                            <?= form_open_multipart('maintenance/project') ?>
                            <!-- <form class="user" method="post" action="<?= base_url('home/project'); ?>"> -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " id="exampleFirstName"
                                        placeholder="Nama" name="nama">
                                       <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="exampleFormControlSelect1" name="departemen" required>
                                            <option selected>Pilih Departemen</option>
                                            <?php foreach ($departemen as $row): ?>
                                            <option value="<?= $row['id_departemen'] ?>"><?= $row['nama_departemen'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                       <?= form_error('departemen', '<small class="text-danger pl-3">', '</small>'); ?> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail"
                                    placeholder="Nama Perangkat" name="nama_perangkat">
                                    <small class="text-info">Contoh: Laptop Acer Aspire 3 / Printer Epson L3310</small>
                                    <?= form_error('nama_perangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsikan Kerusakan" name="deskripsi"></textarea>
                                     <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+62</div>
                                            </div>
                                        <input type="number" class="form-control" id="exampleInputEmail" placeholder="No Whatsapp" name="no_telp">
                                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="custom-select" id="urgensitas" name="urgensitas" required>
                                            <option selected>Pilih Urgensitas</option>
                                            <option value="Tinggi">Tinggi</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Rendah">Rendah</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                    Ajukan Perbaikan
                                </button>
                                
                            <!-- </form> -->
                            <?= form_close(); ?>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
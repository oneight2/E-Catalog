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
                                <h1 class="h4 text-gray-900 mb-4">Form Pengajuan Project</h1>
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Mohon diperhatikan!</h4>
                                    <p>Pengajuan project harap disiapkan dengan matang, tergambar secara jelas dalam file <b class="text-danger">Story Board</b> yang sudah di <b>diskusikan bersama dan acc semua yang bersangkutan</b>.</p>
                                </div>
                            </div>
                            <?= form_open_multipart('home/project') ?>
                            <!-- <form class="user" method="post" action="<?= base_url('home/project'); ?>"> -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " id="exampleFirstName"
                                        placeholder="Nama" name="nama">
                                       <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="exampleFormControlSelect1" name="departemen" required>
                                            <option value="" >Pilih Departemen</option>
                                            <?php foreach ($departemen as $row): ?>
                                            <option value="<?= $row['id_departemen'] ?>"><?= $row['nama_departemen'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                       <?= form_error('departemen', '<small class="text-danger pl-3">', '</small>'); ?> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail"
                                    placeholder="Judul Project" name="judul_project">
                                    <?= form_error('judul_project', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi Project" name="deskripsi"></textarea>
                                     <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <small class="text-info">Upload Storyboard</small>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload-storyboard" aria-describedby="inputGroupFileAddon01" name="storyboard">
                                                <label class="custom-file-label" for="upload-storyboard">Pilih Berkas</label>
                                                <?= form_error('storyboard', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-info">Target Project</small>
                                        <input type="date" class="form-control"
                                        id="exampleRepeatPassword" placeholder="Target Project" name="waktu">
                                        <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail"
                                    placeholder="Link Contoh Project" name="link">
                                    <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row mt-0">
                                    <!-- <div class="col-sm-6">
                                        <small class="text-info">Pilih Eksikutor</small>
                                             <select class="custom-select" name="eksikutor">
                                                <?php foreach ($pegawai as $row): ?>
                                                    <option value="<?= $row['id_pegawai'] ?>"><?= $row['nama_pegawai'] ?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                    </div> -->
                                    <div class="col-sm-12">
                                        <small class="text-info">Tempat</small>
                                             <select class="custom-select" name="tempat">
                                                    <option value="Cimanggis">Cimanggis</option>
                                                    <option value="Tapos">Tapos</option>
                                            </select>
                                    </div>     
                                </div>
                                <?php
                                $no = 1;
                                $noo = 1;
                                foreach ($jenis_project as $row): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $row['jenis_project'] ?>" id="defaultCheck<?= $no++ ?>" name="jenis_project[]">
                                    <label class="form-check-label" for="defaultCheck<?= $noo++ ?>">
                                        <?= $row['jenis_project'] ?>
                                    </label>
                                </div>
                                <?php endforeach ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                    Ajukan Project
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
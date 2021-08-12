<body class="">
    <div class="jumbotron">
        <h1 class="display-5">Selamat Datang!</h1>
        <p class="lead">Klik button isi form pengajuan perbaikan untuk melakukan request perbaikan</p>
        <hr class="my-4">
        <p>Butuh bantuan tim multimedia? <button class="badge badge-warning" style="border:none" data-toggle="modal" data-target="#kontakModal">Hubungi disini</button></p>
        <a class="btn btn-primary btn-md" id="btn-pengajuan" href="<?= base_url('maintenance/project'); ?>" role="button">Isi Pengajuan Perbaikan</a>
    </div>
    <div class="container-fluid" id="container">
        <div class="row mt-2">
            <div class="col-xl-4 col-md-6 mb-2 card-status">
                <div class="card border-left-primary shadow h-100 py-2" id="card-menunggu">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Daftar Tunggu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statusMenunggu ?></div>
                            </div>
                            <div class="col-auto icon">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-2 card-status">
                <div class="card border-left-warning shadow h-100 py-2" id="card-dikerjakan">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Dikerjakan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statusDikerjakan ?></div>
                            </div>
                            <div class="col-auto icon">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-2 card-status">
                <div class="card border-left-success shadow h-100 py-2" id="card-selesai">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statusSelesai ?></div>
                            </div>
                            <div class="col-auto icon">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Perbaikan</h6>
            </div>
            <div class="card-body">
                <!-- <a href="<?= base_url('maintenance/project'); ?>" class="btn btn-primary btn-md mb-2 pulse-button border" id="btn-pengajuan">Isi Pengajuan Project</a> -->
                <?= $this->session->flashdata('message'); ?>
                <!-- TABS -->
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Menunggu & Diproses</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Selesai</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- tabel menunggu & proses -->
                        <div class="table-responsive" id="tabel-pengajuan">
                            <table class="table table-striped pengajuan" id="pengajuan" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Waktu Pengajuan</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Departemen</th>
                                        <th scope="col">Perangkat</th>
                                        <th scope="col">Urgensitas</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Eksekusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengajuan as $row) : ?>
                                        <tr>
                                            <td data-label="No"><?= $no++ ?></td>
                                            <td data-label="Waktu Pengajuan"><b class="text-danger"><?= $row['waktu_pengajuan']; ?></b></td>
                                            <td data-label="Nama Project"><?= $row['nama_pengaju'] ?></td>
                                            <td data-label="Departemen"><?= $row['nama_departemen'] ?></td>
                                            <td data-label="Target"><?= $row['nama_perangkat'] ?></td>
                                            <td data-label="Nama"><?= $row['urgensitas'] ?></td>
                                            <td data-label="Status">
                                                <p class="<?php
                                                            if ($row['status'] == 'Menunggu Diproses') {
                                                                echo 'badge badge-primary mb-0';
                                                            } else if ($row['status'] == 'Sedang Dikerjakan') {
                                                                echo 'badge badge-warning mb-0';
                                                            } else {
                                                                echo 'badge badge-success mb-0';
                                                            }
                                                            ?>" id="warna_status"><?= $row['status'] ?></p>
                                            </td>
                                            <td data-label="Eksekusi"><?= $row['nama_pegawai'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive" id="tabel-pengajuan">
                            <table class="table table-striped pengajuan" id="pengajuan-selesai" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Waktu Pengajuan</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Departemen</th>
                                        <th scope="col">Perangkat</th>
                                        <th scope="col">Urgensitas</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Eksekusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengajuan_selesai as $row) : ?>
                                        <tr>
                                            <td data-label="No"><?= $no++ ?></td>
                                            <td data-label="Waktu Pengajuan"><b class="text-danger"><?= $row['waktu_pengajuan']; ?></b></td>
                                            <td data-label="Nama Project"><?= $row['nama_pengaju'] ?></td>
                                            <td data-label="Departemen"><?= $row['nama_departemen'] ?></td>
                                            <td data-label="Target"><?= $row['nama_perangkat'] ?></td>
                                            <td data-label="Nama"><?= $row['urgensitas'] ?></td>
                                            <td data-label="Status">
                                                <p class="<?php
                                                            if ($row['status'] == 'Menunggu Diproses') {
                                                                echo 'badge badge-primary mb-0';
                                                            } else if ($row['status'] == 'Sedang Dikerjakan') {
                                                                echo 'badge badge-warning mb-0';
                                                            } else {
                                                                echo 'badge badge-success mb-0';
                                                            }
                                                            ?>" id="warna_status"><?= $row['status'] ?></p>
                                            </td>
                                            <td data-label="Eksekusi"><?= $row['nama_pegawai'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="kontakModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Chat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kontak as $row) : ?>
                                <tr>
                                    <td><?= $row['nama_pegawai'] ?></td>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=<?= $row['no_telp'] ?>" class="btn btn-success btn-circle" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
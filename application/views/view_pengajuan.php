<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">PROJECT : <?= $pengajuan['nama_project'] ?></h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Nama Departemen</h6>
                                <h6>Nama Pengaju</h6>
                                <h6>Target Project</h6>
                                <h6>Waktu Pengajuan</h6>
                                <h6>Contoh Project</h6>
                                <h6>Deskripsi</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>: <?= $pengajuan['id_departemen'] ?> </h6>
                                <h6>: <?= $pengajuan['nama'] ?> </h6>
                                <h6>: <b style="color: red;"><?= $pengajuan['target_project'] ?></b></h6>
                                <h6>: <?= date('d/m/Y - H:i', $pengajuan['waktu_pengajuan']) ?></h6>
                                <p class="card-text bg-light" style="transform: rotate(0);">
                                    : <a href="<?= $pengajuan['link'] ?>" class="text-warning stretched-link" target="_blank"><?= $pengajuan['link'] ?></a>
                                </p>
                                <div class="card-text bg-light">
                                    : <?= $pengajuan['deskripsi'] ?>
                                </div>
                                <div class="mt-3">
                                    <a href="<?= base_url('assets/storyboard/') . $pengajuan['storyboard'] ?>" class="btn btn-sm btn-warning" target="_blank">Download Storyboard</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Jenis Project</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>: <?= print_r (json_decode($pengajuan['id_jenis_project'], true))?>
                               </h6>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
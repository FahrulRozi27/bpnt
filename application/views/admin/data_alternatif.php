<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Alternatif</h1>
    </div>

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_alternatif">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Alternatif
    </button>

    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($alternatif as $a) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $a->kode ?></td>
                    <td><?php echo $a->nik ?></td>
                    <td><?php echo $a->nama ?></td>
                    <td><?php echo $a->alamat ?></td>

                    <!-- <td>
                    <img style="width:60px;" src="<?php echo base_url('uploads/'.$a->foto)?>" alt=""></td> -->
                    <td><?php echo anchor
                    (
                            'admin/data_alternatif/detail/' . $a->kode,
                            '<div class="btn btn-primary btn-sm">Detail</div>'
                    ) ?>
                    
                    <a href="<?= base_url('admin/data_alternatif/Hapus/' . $a->kode) ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan dihapus?')">
                    <i class="fas fa-trash"></i></button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambah_alternatif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH ALTERNATIF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_alternatif/tambah_aksi'; ?>" method="post" enctype="multipart/form-data"
                autocomplete="off">

                    <div class="form-grup">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?= set_value('nik') ?>" required>
                        <small><?= form_error('nik') ?></small>
                    </div>

                    <div class="form-grup">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" required>
                        <small><?= form_error('nama') ?></small>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" class="mr-2" name="jk" value="Laki - Laki">Laki - Laki
                            </label>

                            <label class="ml-5">
                                <input type="radio" class="mr-2" name="jk" value="Perempuan">Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-grup">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" required>
                        <small><?= form_error('alamat') ?></small>
                    </div>

                    <div class="form-grup">
                        <label>Foto</label><br>
                        <input type="file" name="foto" class="form-control" required>
                        <small><?= form_error('foto') ?></small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            </form>

        </div>
    </div>
</div>
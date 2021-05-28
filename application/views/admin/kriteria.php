<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kriteria</h1>
    </div>

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kriteria">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Kriteria
    </button>

    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th>Status</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($kriteria as $k) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $k->kode ?></td>
                    <td><?php echo $k->kriteria ?></td>
                    <td><?php echo $k->status ?></td>
                    <td><?php echo $k->bobot ?></td>
                    
                    <td><?php echo anchor
                    (
                            'admin/kriteria/edit/' . $k->kode,
                            '<div class="btn btn-primary btn-sm">Edit</div>'
                    ) ?>
                    
                    <a href="<?= base_url('admin/kriteria/Hapus/' . $k->kode) ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan dihapus?')">
                    <i class="fas fa-trash"></i></button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="tambah_kriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH KRITERIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/kriteria/tambah_aksi'; ?>" method="post" enctype="multipart/form-data"
                autocomplete="off">

                    <div class="form-grup">
                        <label>Nama Kriteria</label>
                        <input type="text" name="kriteria" class="form-control" value="<?= set_value('kriteria') ?>" required>
                        <small><?= form_error('kriteria') ?></small>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" class="mr-2" name="status" value="Benefit">Benefit
                            </label>

                            <label class="ml-5">
                                <input type="radio" class="mr-2" name="status" value="Cost">Cost
                            </label>
                        </div>
                    </div>

                    <div class="form-grup">
                        <label>Bobot</label>
                        <select type="text" name="bobot" class="form-control">
                            <option>---Pilih Bobot---</option>
                            <option>1 Sangat Kurang</option>
                            <option>2 Kurang</option>
                            <option>3 Cukup</option>
                            <option>4 Bagus</option>
                            <option>5 Sangat Bagus</option>
                        </select>
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
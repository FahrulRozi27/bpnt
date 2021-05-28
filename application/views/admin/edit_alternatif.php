<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA ALTERNATIF</h3>

    <?php foreach ($alternatif as $a) : ?>

        <form action="<?php echo base_url() . 'admin/data_alternatif/update' ?>" method="post" autocomplete="off">

        <div class="form-grup">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" value="<?php echo $a->kode ?>" readonly>
            </div>

            <div class="form-grup">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" value="<?php echo $a->nik ?>">
            </div>

            <div class="form-grup">
                <label>Nama Alternatif</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $a->nama ?>">
            </div>

            <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" class="mr-2" name="jk" value="Laki-Laki">Laki-Laki
                            </label>

                            <label class="ml-5">
                                <input type="radio" class="mr-2" name="jk" value="Perempuan">Perempuan
                            </label>
                        </div>
            </div>

            <div class="form-grup">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $a->alamat ?>">
            </div>

            <div class="form-grup">
                <label>Foto</label><br>
                <input type="file" name="foto" class="form-control" value="<?php echo $a->foto ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            <?php echo anchor('admin/data_alternatif/index', '
                        <div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>

        </form>

    <?php endforeach; ?>
</div>
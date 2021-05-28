<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA KRITERIA</h3>

    <?php foreach ($kriteria as $k) : ?>

        <form action="<?php echo base_url() . 'admin/kriteria/update' ?>" method="post" autocomplete="off">

        <div class="form-grup">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" value="<?php echo $k->kode ?>" readonly>
            </div>


            <div class="form-grup">
                <label>Nama Kriteria</label>
                <input type="text" name="kriteria" class="form-control" value="<?php echo $k->kriteria ?>">
            </div>

            <div class="form-grup">
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $k->status ?>">
            </div>

            <div class="form-grup">
                <label>Bobot</label>
                <input type="text" name="bobot" class="form-control" value="<?php echo $k->bobot ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            <?php echo anchor('admin/data_alternatif/index', '
                        <div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>

        </form>

    <?php endforeach; ?>
</div>
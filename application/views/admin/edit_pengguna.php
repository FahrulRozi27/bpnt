<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PENGGUNA</h3>

    <?php foreach ($pengguna as $p) : ?>

        <form action="<?php echo base_url() . 'admin/data_pengguna/update' ?>" method="post" autocomplete="off">

                <div class="form-grup">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo $p->nik ?>">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $p->nama_lengkap ?>">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $p->jk ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $p->email ?>">
                </div>

                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="no_hp" class="form-control" value="<?php echo $p->no_hp ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $p->jabatan ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="role_id" class="form-control" value="<?php echo $p->role_id ?>">
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" value="<?php echo $p->foto ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $p->password ?>"></div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            <?php echo anchor('admin/data_alternatif/index', '
                        <div class="btn btn-danger btn-sm mt-3">Kembali</div>') ?>

        </form>

    <?php endforeach; ?>
</div>
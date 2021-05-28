<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
    </div>

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_pengguna">
    <i class="fas fa-plus fa-sm"></i> Tambah Pengguna</button>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>No Hp</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th colspan="2">Aksi</th>
        </tr>

            <?php
                $no=1;
                foreach($pengguna as $p) :
            ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p->nik ?></td>
            <td><?php echo $p->nama_lengkap ?></td>
            <td><?php echo $p->jenis_kelamin ?></td>
            <td><?php echo $p->no_hp ?></td>
            <td><?php echo $p->jabatan ?></td>
            <td><?php echo $p->role_id ?></td>
            <td><?php echo anchor
                    (
                            'admin/data_pengguna/edit/' . $p->nik,
                            '<div class="btn btn-primary btn-sm">Edit</div>'
                    ) ?>
                    
                    <a href="<?php echo base_url('admin/data_pengguna/Hapus/' . $p->nik) ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan dihapus?')">
                    <i class="fas fa-trash"></i></button></a>
                    </td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>

<div class="modal fade" id="tambah_pengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PENGGUNA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url(). 'admin/data_pengguna/tambah_aksi'; ?>"
            method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="role_id" class="form-control">
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class=form-control>
                </div>
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>
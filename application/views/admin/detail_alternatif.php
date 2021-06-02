<div class="container-fluid">

    <style>
        .card-header {
            background-color: #00923F !important;
            color: white !important;
        }
    </style>
    <!-- cardbootstrap -->
    <div class="card">
        <h5 class="card-header">Detail Alternatif</h5>
        <div class="card-body">

            <?php foreach ($alternatif as $a) : ?>
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?php echo base_url() . '/uploads/' . $a->foto ?>" class="card-img-top">
                    </div>

                    <div class="col-md-8">
                        <table class="table">

                            <tr>
                                <td>Kode</td>
                                <td><strong><?php echo $a->kode ?></strong></td>
                            </tr>

                            <tr>
                                <td>NIK</td>
                                <td><strong><?php echo $a->nik ?></strong></td>
                            </tr>

                            <tr>
                                <td>Nama</td>
                                <td><strong><?php echo $a->nama ?></strong></td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><strong><?php echo $a->jk ?></strong></td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td><strong><?php echo $a->alamat ?></strong></td>
                            </tr>

                        </table>

                        <!-- kembali -->
                        <?php echo anchor('admin/data_alternatif', '
                        <div class="btn btn-sm btn-danger">Kembali</div>') ?>

                        <?php echo anchor(
                            'admin/data_alternatif/edit/' . $a->kode,
                            '<div class="btn btn-sm btn-primary">Edit</div>'
                        ) ?>


                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
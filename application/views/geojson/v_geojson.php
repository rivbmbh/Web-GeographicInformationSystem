<h3 style="text-align: center; margin-bottom:20px;"><strong> <?= $judul; ?></strong></h3>
<hr>
<?= $this->session->flashdata('info'); ?>
<a href="<?= base_url('geojson/add') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data
</a>

<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Objek</th>
                <th>Type Geojson</th>
                <th>Code Kolom Geojson</th>
                <th>Warna</th>
                <th>Marker</th>
                <th>File Geojson</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($geojson as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_objek ?></td>
                    <td><?= $value->type ?></td>
                    <td><?= $value->variabel ?></td>
                    <td><?= $value->color ?></td>
                    <td><?= $value->marker ?></td>
                    <td><?= $value->file_geojson ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('peta') ?>" class="btn btn-sm btn-primary"><i class="fas 
fa-eye"></i></a>
                        <a href="<?= base_url('geojson/get/' . $value->id) ?>" class="btn btn-sm btn-warning"><i class="fas 
fa-edit"></i></a>
                        <a href="<?= base_url('geojson/delete/' . $value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini..?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
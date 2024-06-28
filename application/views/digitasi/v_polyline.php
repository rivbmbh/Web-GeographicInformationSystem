<h3 style="text-align: center; margin-bottom:20px;"><strong> <?= $judul; ?></strong></h3>
<hr>
<?= $this->session->flashdata('info'); ?>
<a href="<?= base_url('Polyline/add') ?>" class="btn btn-sm btn-success"><i class="fas 
fa-plus"></i> Add Data</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Objek</th>
                <th>Weight</th>
                <th>Color</th>
                <th>Geojson</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($polyline as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_objek ?></td>
                    <td><?= $value->weight ?></td>
                    <td><?= $value->color ?></td>
                    <td><?= $value->geojson ?></td>
                    <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" Width="100px"></td>
                    <td class="text-center">
                        <a href="<?= base_url('peta') ?>" class="btn btn-sm btn-primary"><i class="fas 
fa-eye"></i></a>
                        <a href="<?= base_url('polyline/edit/' . $value->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Polyline/delete/' . $value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini..?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
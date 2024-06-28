<h3 style="text-align: center; margin-bottom:20px;"><strong> <?= $judul; ?></strong></h3>
<hr>
<?= $this->session->flashdata('info');?>
<a href="<?= base_url('point/tambah') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data
</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Objek Wisata</th>
                <th>Nama Kecamatan</th>
                <th>Nama Kampung</th>
                <th>Jenis Wisata</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Infrastruktur</th>
                <!-- <th>Keterangan</th> -->
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($point as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_objek ?></td>
                <td><?= $value->nama_kecamatan ?></td>
                <td><?= $value->n_kampung ?></td>
                <td><?= $value->jenis_wisata ?></td>
                <td><?= $value->longitude ?></td>
                <td><?= $value->latitude ?></td>
                <td><?= $value->infrastruktur ?></td>
                <!-- <td> $value->ket </td> -->
                <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" Width="100px"></td>
                <td class="text-center">
                    <a href="<?= base_url('peta') ?>" class="btn btn-sm btn-primary"><i class="fas 
fa-eye"></i></a>
                    <a href="<?= base_url('point/e_point/' . $value->id) ?>" class="btn btn-sm btn-warning"><i class="fas 
fa-edit"></i></a>
                    <a href="<?= base_url('point/delete/' . $value->id) ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini..?')"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
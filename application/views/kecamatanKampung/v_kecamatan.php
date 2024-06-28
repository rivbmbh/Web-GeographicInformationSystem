<h3 style="text-align: center; margin-bottom:20px;"><strong> <?= $judul; ?></strong></h3>
<hr>
<a href="<?= base_url('kecamatan/tambah') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data
</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Kecamatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kecamatan as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_kecamatan ?></td>
                <!-- <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" Width="100px"></td> -->
                <td class="text-center">
                    <a href="<?= base_url('kecamatan/edit/'. $value->id_kecamatan) ?>" class="btn btn-sm btn-warning"><i
                            class="fas 
fa-edit"></i></a>
                    <a href="<?= base_url('kecamatan/delete/'. $value->id_kecamatan) ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini..?')"><i
                            class="fas fa-trash"></i></a>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
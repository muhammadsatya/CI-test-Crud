 <!-- Begin Page Content -->
 <div class="container">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>


<a href="<?= base_url(); ?>data/tambah" class="tambahData btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data</a>

<div class="row mt-3">
    <div class="col-md-10">

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $dt) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $dt['nik']; ?></td>
                        <td><?= $dt['nama']; ?></td>
                        <td><?= $dt['jenis_kelamin']; ?></td>
                        <td><?= $dt['alamat']; ?></td>
                        <td><?= $dt['divisi']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>data/rubahData/<?= $dt['id']; ?>" class="tampilRubahData badge badge-success float-left mr-1" data-toggle="modal" data-target="#newSubMenuModal" data-id="<?= $dt['id']; ?>">Rubah</a>

                            <a href="<?= base_url(); ?>data/hapusData/<?= $dt['id']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="dataModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('data/index'); ?>" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama ">
                </div>
                <div class="form-group">
                    <select name="jk" id="jk" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Divisi">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
</div>
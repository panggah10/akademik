<?php include 'layout/header.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Mahasiswa</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="container">

        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from mahasiswa where id='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <form method="post" action="edit_aksi.php">

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="hidden" class="form-control" id="id" placeholder="id" name="id" value="<?php echo $d['id']; ?>">
                    <input type="number" class="form-control" id="nim" placeholder="NIM" name="nim" value="<?php echo $d['nim']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $d['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat"><?php echo $d['alamat']; ?></textarea>
                </div>
                <a href="index.php"><button type="button" class="btn btn-danger mb-2">BATAL</button></a>
                <button type="submit" class="btn btn-success mb-2">TAMBAH</button>

            </form>
        <?php
        }
        ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layout/footer.php'; ?>
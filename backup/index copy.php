<?php include 'layout/header.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <a href="tambah.php"><button type="button" class="btn btn-success mb-2">TAMBAH MAHASISWA</button></a>

        <table class="table table-striped" id="tabel-data">
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>OPSI</th>
            </tr>
            <?php
            //untuk menyambungkan dengan file koneksi.php
            include('koneksi.php');

            // PAGINATION
            $batas = 2;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($koneksi, "select * from mahasiswa");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mahasiswa = mysqli_query($koneksi, "select * from mahasiswa limit $halaman_awal, $batas");
            $nomor = $halaman_awal + 1;

            //jika kita klik cari, maka yang tampil query cari ini
            if (isset($_GET['kata_cari'])) {
                //menampung variabel kata_cari dari form pencarian
                $kata_cari = $_GET['kata_cari'];
                // mencari data dengan query
                $query = "SELECT * FROM mahasiswa WHERE nim like '%" . $kata_cari . "%' OR nama like '%" . $kata_cari .
                    "%' OR alamat like '%" .
                    $kata_cari . "%' ORDER BY nim ASC";
            } else {
                //jika tidak ada pencarian, default yang dijalankan query ini
                $query = "select * from mahasiswa limit $halaman_awal, $batas";
            }


            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            $nomor = $halaman_awal + 1;
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>"><button type="button" class="btn btn-warning ">EDIT</button></a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>"><button type="button" class="btn btn-danger ">HAPUS</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                                            echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                            echo "href='?halaman=$next'";
                                        } ?>>Next</a>
            </li>
        </ul>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layout/footer.php'; ?>
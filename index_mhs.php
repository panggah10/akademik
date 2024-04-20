<?php include 'layout/header_mhs.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50">
            </i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="container">
        <a href="tambah.php"><button type="button" class="btn btn-success mb-2">TAMBAH MAHASISWA</button></a>

        <table class="table table-striped " id="dataTable">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>OPSI</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>OPSI</th>
                </tr>
            </tfoot>

            <tbody>
                <?php

                include('koneksi.php');

                $query = "select * from mahasiswa ";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }
                $nomor =  1;
                //kalau ini melakukan foreach atau perulangan
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-warning ">EDIT</button></a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger ">HAPUS</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>


        </table>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layout/footer.php'; ?>
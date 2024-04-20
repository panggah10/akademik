<?php include 'layout/header.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "login") {
            echo "<div class='alert alert-success' role='alert'>Anda Berhasil Login</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Gagal</div>";
        }
    }
    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <!-- Content Row -->
    <div class="container">
        <?php
        if (isset($_GET['crud'])) {
            if ($_GET['crud'] == "delete") {
                echo "<div class='alert alert-success' role='alert'>Anda Berhasil Menghapus</div>";
            } elseif ($_GET['crud'] == "tambah") {
                echo "<div class='alert alert-success' role='alert'>Anda Berhasil Menambah</div>";
            } elseif ($_GET['crud'] == "update") {
                echo "<div class='alert alert-success' role='alert'>Anda Berhasil Update</div>";
            }
        }
        ?>
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


        <a href="mhs_pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50">
            </i> Generate PDF
        </a>
        <a href="mhs_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50">
            </i> Generate Excel</a>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layout/footer.php'; ?>
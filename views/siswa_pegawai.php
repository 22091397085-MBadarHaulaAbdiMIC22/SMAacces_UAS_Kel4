<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="?page=utama">SMAccess : Akses Terpadu untuk Pendidikan Menengah Atas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <li ><a href="?index_admin.php" style="font-family: cursive;">Home</a></li>

                <?php if(isset($_SESSION['level']) && $_SESSION['level']==4) { ?>
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: cursive;">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=siswa&actions=guru" style="font-family: cursive;">Data Pengajar</a></li>
                         <li><a href="?page=siswa&actions=pegawai" style="font-family: cursive;">Monitoring</a></li>
                          <li><a href="?page=siswa&actions=mapel" style="font-family: cursive;">Jadwal MAPEL</a></li>
                         <li><a href="?page=siswa&actions=niali" style="font-family: cursive;">Data Nilai</a></li>
                    </ul>
                </li>

                <?php } ?>


                <li><a href="?page=about&actions=tampil" style="font-family: cursive;">About</a></li>
                <li><a href="?page=kontak&actions=tampil" style="font-family: cursive;">Contact</a></li>


                    <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="logout.php" style="font-family: cursive;">Logout</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>

<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Pegawai</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No.</th><th>NIP</th><th>Nama Pegawai</th><th>Tempat/Tanggal Lahir</th><th>Jenis Kelamin</th><th>Agama</th><th>Alamat</th><th>Jabatan</th><th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM pegawai ORDER BY nip ASC";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
									<td><?= $data['nip'] ?></td>
									<td><?= $data['pegawai_nama'] ?></td>
                                    <?php
                                        $tgl = explode('-', $data['pegawai_tanggal']);
                                    ?>
                                    <td><?=$data['pegawai_tempat'];?>, <?=$tgl[2].'-'.$tgl[1].'-'.$tgl[0]?></td>
									<td><?= $data['pegawai_jk'] ?></td>
                                    <td><?= $data['pegawai_agama'] ?></td>
                                    <td><?= $data['pegawai_alamat'] ?></td>
                                    <td><?= $data['jabatan'] ?></td>
                                    <td>
                                        <a href="?page=siswapeg&actions=detail&id=<?= $data['id'] ?>" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-eye-open"></span>detail
                                        </a>
                                    </td>
                                     
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

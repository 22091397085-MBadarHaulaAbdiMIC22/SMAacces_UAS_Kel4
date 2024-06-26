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

                <?php if(isset($_SESSION['level']) && $_SESSION['level']==3) { ?>
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: cursive;">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a href="?page=pegawa&actions=siswatampil" style="font-family: cursive;">Data Siswa</a></li>
                        <li><a href="?page=pegawai&actions=gurutampil" style="font-family: cursive;">Data Pengajar</a></li>
                         <li><a href="?page=pegawai&actions=pegtampil" style="font-family: cursive;">Monitoring</a></li>
                         <li><a href="?page=peg&actions=jadwal" style="font-family: cursive;">Jadwal MAPEL</a></li> 
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

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Siswa</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM siswa WHERE id ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200" >NIS</td> <td>: <?= $data['nis'] ?></td>
                        </tr>
                        <tr>
                            <td>NAMA SISWA</td> <td>: <?= $data['siswa_nama'] ?></td>
                        </tr>
                        <tr>
                            <td>KELAS</td> <td>: <?= $data['siswa_kelas'] ?></td>
                        </tr>
                            <?php
                                $tgl = explode('-', $data['siswa_tanggal']);
                            ?>
                        <tr>
                            <td>TEMPAT/TANGGAL LAHIR</td>  <td>: <?=$data['siswa_tempat'];?>, <?=$tgl[2].'-'.$tgl[1].'-'.$tgl[0]?></td>
                        </tr>
                        <tr>
                            <td>JENIS KELAMIN</td> <td>: <?= $data['siswa_jk'] ?></td>
                        </tr>
                        <tr>
                            <td>AGAMA</td> <td>: <?= $data['siswa_agama'] ?></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td> <td>: <?= $data['siswa_alamat'] ?></td>
                        </tr>
                         <tr>
                            <td>EMAIL</td> <td>: <?= $data['email'] ?></td>
                        </tr>
                        <tr>
                            <td>NAMA AYAH</td> <td>: <?= $data['siswa_ayah'] ?></td>
                        </tr>
                        <tr>
                            <td>NAMA IBU</td> <td>: <?= $data['siswa_ibu'] ?></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td> <td>: <?= $data['ortu_kerja'] ?></td>
                        </tr>
                        <tr>
                            <td>ALAMAT ORTU</td> <td>: <?= $data['ortu_alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>NO. HANDPHONE</td> <td>: <?= $data['no_hp'] ?></td>
                        </tr>
                    </table>
                
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=pegawa&actions=siswatampil" class="btn btn-success btn-sm">
                        Kembali ke Data Siswa </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>


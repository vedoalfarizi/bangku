<?php
session_start();
$_SESSION['pesan'];
include_once '../fungsi/koneksi.php';
$id = $_SESSION['id'];
?>
<html>
<head>
<title>Bangku</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<!--Awal Menu Navigasi-->
<!--navigasi-->
<!--<nav>-->
<!--    <img src="../img/logo.png">-->
<!--    <span> <label>BANGKU</label><br>-->
<!--    <label class="dua">Sumbang Buku</label></span>-->
<!--    <ul>-->
<!--        <li><a href="../org/beranda.php">Beranda</a> </li>-->
<!--        <li><a href="profilorg.php"> Profil </a></li>-->
<!--        <li><a href="../index.php">Logout</a></li>-->
<!--    </ul>-->
<!--</nav>-->
<!--Akhir Menu Navigasi-->

<!--Awal Form Ambil-->
<div id="menu">
    <button id="b2" class="btn bt-flat" onclick="dua()">sumbangan</button>
    <button id="b1" class="btn bt-flat" onclick="satu()">sumbang buku</button>
    <button id="b3" class="btn bt-flat" onclick="tiga()">cari</button>
    <button id="b4" class="btn bt-flat" onclick="">kegiatan</button>
    <div class="kotak" id="a1" style="margin-top: 0%;">
        <button id="ambilbtn">ambil</button>
        <div class="modal" id="modal1">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">

                    <form action="../fungsi/proses.php" >

                        <table>
                            <tr><h1>Masukan tanggal pengambilan buku</h1></tr>
                            <tr>
                                <td>No Hp</td>
                                <td>0898 - 2628 - 920</td>
                            </tr>

                            <tr>
                                <td>Tanggal</td>
                                <td><input type="date" name="tgl_jemput"></td>
                            </tr>
                            <tr >
                                <td align="center" colspan="2">
                                    <button type="submit" name="kirimAmbil" value="Ambil" class="bt bt-birusoft"> Ambil </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!--Akhir Form Ambil-->



<!--Awal Penerimaan-->
<?php

$quer = "select donasi.tanggal, donasi.user_id_pemilik,donasi.jumlah from donasi, user WHERE donasi.user_id_pemilik = user.id_user AND user.jenis_user = 2";

$sel = $kon->query($quer);
echo "
<div class=\"kotak\">
	<div class=\"tabel\">
		<table class=\"tabel tabel-garis\"> 
		<th>No.</th>
		<th>Tanggal</th>
		<th>Pendonasi</th>
		<th>Jumlah</th>
		<th>Detail</th>
		<th>Konfirmasi</th>";


while ($del =  mysqli_fetch_assoc($sel)){
    $no = 1;
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$del['tanggal']."</td>";
    echo "<td>".$del['user_id_pemilik']."</td>";
    echo "<td>".$del['jumlah']."</td>";
    echo "<td><a href=''>detail</a></td>";
    echo "<td><a href=''>terima</a>&nbsp;<a href=''>batal</a></td>";
    echo "</tr>";
    $no++;
}

echo "</table>";

?>
<!--Akhir Penerimaan-->

<!--Awal kegiatan-->
<div>
    <div>Tambah Kegiatan</div>
    <div class="alert">
        <?php
        if($_SESSION['pesan']!=""){
            echo $_SESSION['pesan'];
        }
        ?>
    </div>
    <div>
        <form action="../fungsi/proses.php" method="post">
            <label>Nama Kegiatan</label>
            <input type="text" name="nkeg">
            <label>Alamat</label>
            <input type="text" name="alamat">
            <label>Deskripsi</label>
            <textarea name="desk"></textarea>
            <label>Katagori</label>
            <input type="checkbox" name="kat[]" value="fiksi">Fiksi
            <input type="checkbox" name="kat[]" value="nonf">Non Fiksi<br>
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tkeg">
            <input type="submit" value="Bagikan" name="tambahkegiatan">
        </form>
    </div>
</div>

<?php
    $tampil = $kon->query("SELECT id_kegiatan, nama_kegiatan, deskripsi, alamat, tanggal FROM kegiatan WHERE user_id='$id' ORDER BY tanggal ASC");
    $no = 1;
?>
<div>
    <div>List Kebutuhan</div>
    <div>
        <table>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Deskripsi</th>
            <th>Jadwal</th>
            <th>Alamat</th>
            <th colspan="2">Aksi</th>

            <?php
            while($hasil = $tampil->fetch_assoc()){
                echo    "<tr>
                            <td>$no</td>
                            <td>".$hasil['nama_kegiatan']."</td>
                            <td>".$hasil['deskripsi']."</td>
                            <td>".$hasil['tanggal']."</td>
                            <td>".$hasil['alamat']."</td>
                            <td><a href='edit_kegiatan.php?id=".$hasil['id_kegiatan']."'>Edit</a></td>
                            <td><a href='hapus_kegiatan.php?id=".$hasil['id_kegiatan']."'>Hapus</a></td>
                        </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</div>
<!--Akhir kegiatan-->
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
<?php
$_SESSION['pesan']="";
?>

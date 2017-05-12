<?php
    session_start();
?>
<html>
<head>
    <title>Sumbang Buku</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="tab-gaya">
    <div class="kotak">
        <button id="" onclick="">beranda</button>
        <button id="" onclick="">profil</button>
        <button id="" onclick="">logout</button>

    </div>
</div>
        <button id="b2" class="btn bt-flat" onclick="dua()">sumbangan</button>
        <button id="b1" class="btn bt-flat" onclick="satu()">sumbang buku</button>
        <button id="b3" class="btn bt-flat" onclick="tiga()">cari</button>
        <button id="b4" class="btn bt-flat" onclick="">kegiatan</button>
        <div class="kotak" id="a1" style="margin-top: 0%;">

            <div class="alert">
                <?php
                if($_SESSION['pesan']!=""){
                    echo $_SESSION['pesan'];
                }
                ?>
            </div>
            <form action="../fungsi/proses.php" method="post">
                <label for="tambah">Tambah Buku</label>
                <input type="text" name="jbuku"><br>
                <label for="kategori">Katagori</label>
                <input type="checkbox" name="kat[]" value="fiksi">Fiksi
                <input type="checkbox" name="kat[]" value="nonf">Non Fiksi<br>
                <input type="submit" value="Sumbang" name="sumbang">
            </form>
        </div>

<!--ini isi dari menu sumbangan-->
<div id="a2" class="kotak" style="margin-top: 0%;" >
<?php
    include_once '../fungsi/koneksi.php';

    $quer = "select donasi.tanggal, user.nama, donasi.jumlah from donasi, user WHERE donasi.user_id_penerima = user.id_user AND user.jenis_user = 1";

    $sel = $kon->query($quer);
    echo "
    <div class=\"kotak\">
	    <div class=\"tabel\">
		    <table class=\"tabel tabel-garis\"> 
		    <th>No.</th>
		    <th>Tanggal</th>
		    <th>organisasi</th>
		    <th>Jumlah</th>
		    <th>Detail</th>";


        while ($del =  mysqli_fetch_assoc($sel)){
            $no = 1;
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$del['tanggal']."</td>";
            echo "<td>".$del['nama']."</td>";
            echo "<td>".$del['jumlah']."</td>";
            echo "<td><a href=''>detail</a></td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
        ?>
    </div>

<div id="a3" class="kotak" style="margin-top: 0%;" ></div>
</body>
<script type="text/javascript" src="../js/script.js"></script>
</html>

<?php
    $_SESSION['pesan']="";
?>
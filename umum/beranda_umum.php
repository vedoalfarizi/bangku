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

    <div id="menu">
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
    </div>
<div id="a2" style="" ></div>
<div id="a3" style="" ></div>
</body>
<script type="text/javascript" src="../js/script.js"></script>
</html>

<?php
    $_SESSION['pesan']="";
?>
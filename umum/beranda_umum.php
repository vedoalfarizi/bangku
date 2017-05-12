<?php
    session_start();
?>
<html>
<head>
    <title>Sumbang Buku</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div class="tab-gaya">
    <div class="kotak">
        <button id="b1" onClick="satu()">Beranda</button>
        <button id="b2" onClick="dua()">Profil</button>
        <button id="b3" onClick="tiga()">LogOut</button>
        <div id="a1" style="" >
    </div>
</div>


</div>
    <div id="menu">
        <div class="kotak">
            <div class="alert"><?php if($_SESSION['pesan']!=""){
                    echo $_SESSION['pesan'];
                }?></div>
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
</div>
<div id="a2" style="" ></div>
<div id="a3" style="" ></div>
</body>
<script type="text/javascript" src="../js/script.js"></script>
</html>

<?php
    $_SESSION['pesan']="";
?>
<?php
    session_start();
?>
<html>
<head>
    <title>Sumbang Buku</title>
</head>
<body>
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
</body>
</html>

<?php
    $_SESSION['pesan']="";
?>
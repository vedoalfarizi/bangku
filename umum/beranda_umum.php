<html>
<head>
    <title>Sumbang Buku</title>
</head>
<body>
    <div id="menu">
        <div class="kotak">
            <form action="../fungsi/proses.php" method="post">
                <label for="tambah">Tambah Buku</label>
                <input type="text" name="jbuku"><br>
                <label for="kategori">Katagori</label>
                <input type="checkbox" name="kat" value="fiksi">Fiksi
                <input type="checkbox" name="kat" value="nonf">Non Fiksi<br>
                <input type="submit" value="Sumbang" name="sumbang">
            </form>
        </div>
    </div>
</body>
</html>
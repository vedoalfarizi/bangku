<html>
<head>
<title>Bangku</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div>
    <button id="penerimaan">1</button>
    <button id="kegiatan">1</button>
    <button id="cari">1</button>
    <button id="pend baru">1</button>
    <div style="width: 80%; height: 400px; "></div>
</div>
<button id="ambilbtn">ambil</button>
<div class="modal" id="modal1">
<div class="modal-content">
    <div class="modal-header">
        <span class="close">&times;</span>
    </div>
    <div class="modal-body">
        <form action="../fungsi/proses.php" method="post">
            <table>
                <tr>
                    <td>masukkan nomor hp</td>
                    <td><input type="text" name="no_hp"></td>
                </tr>
                <tr>
                    <td>masukkan nomor hp</td>
                    <td><input type="date" name="tgl_jemput"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="kirimAmbil"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

</div>
</body>
<script type="text/javascript" src="../js/script.js"></script>

<?php
include_once '../fungsi/koneksi.php';

$quer = "select donasi.tanggal, donasi.user_id_pemilik,donasi.jumlah from donasi, user WHERE donasi.user_id_pemilik = user.id_user AND user.jenis_user = 2";

$sel = $kon->query($quer);
echo "<table>
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

</html>

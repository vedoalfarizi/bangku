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
    <span class="close">&times;</span>
    <div class="modal-body">

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

<html>
<head>
<title>Bangku</title>
</head>
<body>
<div>
    <button>1</button>
</div>
</body>
</html>
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
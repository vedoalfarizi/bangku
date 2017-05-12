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



</div>
</body>
<script type="text/javascript" src="../js/script.js"></script>

<?php
include_once '../fungsi/koneksi.php';

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

</html>

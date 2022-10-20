<!DOCTYPE html>
<html lang="en"><head>
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
 
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
</style>

<h2 style="text-align:center">DATA REKAPTULASI SISWA KURSUS</h2>
<br><br>
</head><body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Jumlah Pembayaran</th>
            <th>Tanggal Pembayaran</th>
        </tr>
        <?php $no = 1;
        // var_dump($surat);
        // die();
        foreach($pembayaran as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['swa_nama'] ?></td>
            <td><?= $row['pby_spp'] ?></td>
            <td><?= $row['pby_tgl'] ?></td>
        </tr>  
        <?php endforeach ?>
    </table>
</body></html>
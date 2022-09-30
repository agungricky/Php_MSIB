<?php 
    $m1 = ['Nama'=>'Ricky', 'Nim'=>'2013020101', 'Nilai'=>'90'];
    $m2 = ['Nama'=>'Ika', 'Nim'=>'2013020085', 'Nilai'=>'95'];
    $m3 = ['Nama'=>'Xena', 'Nim'=>'2013020023', 'Nilai'=>'70'];
    $m4 = ['Nama'=>'Andi', 'Nim'=>'2013020081', 'Nilai'=>'90'];
    $m5 = ['Nama'=>'Putri', 'Nim'=>'190821900', 'Nilai'=>'60'];
    $m6 = ['Nama'=>'Cici', 'Nim'=>'1209865421', 'Nilai'=>'45'];
    $m7 = ['Nama'=>'John', 'Nim'=>'2013020987', 'Nilai'=>'60'];
    $m8 = ['Nama'=>'Alex', 'Nim'=>'2013020754', 'Nilai'=>'30'];
    $m9 = ['Nama'=>'Wahyu', 'Nim'=>'2013021092', 'Nilai'=>'95'];
    $m10 = ['Nama'=>'Afan', 'Nim'=>'201302987654', 'Nilai'=>'75'];
    $namaSiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];
    $judul = ['No' ,'Nama', 'Nim', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

?>
<h3 align="center">Data Pegawai</h3>
<table border="1" cellpadding="10" cellspacing="0" align="center" width="50%">
    <head>
        <tr>
            <?php 
            foreach ($judul as $jdl) {?>
            <th><?= $jdl; ?></th>
            <?php } ?>
        </tr>
    </head>
    <body>
        <?php 
        $no = 1;
        

        foreach ($namaSiswa as $siswa) {
        $nilai = ($siswa['Nilai'] >= 60)? 'Lulus' : 'Gagal';
        
        if($siswa['Nilai'] > 80 && $siswa['Nilai'] <= 100) $Grade = 'A';
        else if($siswa['Nilai'] > 70 && $siswa['Nilai'] <= 80) $Grade = 'B';
        else if($siswa['Nilai'] > 60 && $siswa['Nilai'] <= 70) $Grade = 'C';
        else if($siswa['Nilai'] > 40 && $siswa['Nilai'] <= 80) $Grade = 'D';
        else $Grade = 'E';
        
        switch ($Grade) {
            case 'A': $predikat = 'Memuaskan'; break;
            case 'B': $predikat = 'Baik'; break;
            case 'C': $predikat = 'Cukup'; break;
            case 'D': $predikat = 'Kurang'; break;
            case 'E': $predikat = 'Buruk'; break;
            default: ;break;
        }

        $jml_data = count($namaSiswa);
        $jml_nilai = array_column($namaSiswa, 'Nilai');
        $total = array_sum($jml_nilai);
        $max = max($jml_nilai);
        $min = min($jml_nilai);
        $rata2 = $total/$jml_data;

        $Keterangan = [
            'Nilai Tertinggi' => $max,
            'Nilai Terendah' => $min,
            'Nilai Rata-rata' => $rata2,
            'Jumlah Siswa' => $jml_data
        ];
            
        ?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $siswa['Nama'] ?></td>
            <td><?= $siswa['Nim'] ?></td>
            <td><?= $siswa['Nilai'] ?></td>
            <td><?= $nilai ?></td>
            <td><?= $Grade ?></td>
            <td><?= $predikat ?></td>
        </tr>

        <?php  $no ++; } ?>
    </body>
    <tfoot>
        <?php
            foreach ($Keterangan as $k => $hasil) {?>             
            <tr>
                <td colspan="2"><?= $k ?></td>
                <td colspan="5" align="center"><?= $hasil ?></td>
            </tr>
        <?php } ?>
    </tfoot>
</table>
<?php
    require_once 'lingkaran.php';
    require_once 'persegiPanjang.php';
    require_once 'Segitiga.php';


    $lingkaran = new Lingkaran();
    $persegiPanjang = new Persegipanjang();
    $segitiga = new Segitiga();

    $data = [$lingkaran, $persegiPanjang, $segitiga];
    $judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas', 'Keliling'];
?>

<h3 align="center">Bangun Datar</h3>
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
        $ket = [1 =>'Jari-Jari =  7', 
        'Panjang = 9 <br> Lebar = 2', 
        'alas = 10 <br> tinggi = 10 <br> <br> Keliling : 
        <br> sisi a = 10 
        <br> sisi b = 5
        <br> sisi c = 5'];
        
        foreach ($data as $d) {?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $d->NamaBidang() ?></td>
            <td><?= $ket[$no] ?></td>
            <td><?= $d->luasBidang() ?></td>
            <td><?= $d->kelilingBidang() ?></td>
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
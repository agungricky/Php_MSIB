<?php
require 'Pegawai.php';
$Ricky = new Pegawai('011', 'Ricky', 'manager', 'Islam', 'Belum');
$Ika = new Pegawai('085', 'ika', 'asmen', 'Islam', 'Belum');
$Xena = new Pegawai('022', 'Xena', 'kabag', 'Islam', 'Menikah');
$Kanita = new Pegawai('021', 'Kanita', 'staff', 'Islam', 'Menikah');
$Tia = new Pegawai('072', 'Tia', 'staff', 'Kristen', 'Belum');

$Ricky->cetak();
$Ika->cetak();
$Xena->cetak();
$Kanita->cetak();
$Tia->cetak();

echo '<br> Jumlah Pegawai :' . Pegawai::$total;

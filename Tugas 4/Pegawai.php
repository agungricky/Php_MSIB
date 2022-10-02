<?php
    class Pegawai{
        public $nim, $nama, $jabatan, $agama, $status;
        // public $gapok, $tunjab, $tunkel, $zProfesi, $total;
        const perusahaan = 'MAJUTERUS.COMPANY';
        static $total = 0;

        function __construct($nim, $nama, $jabatan, $agama, $status)
        {
            $this-> Nim = $nim;
            $this-> Nama = $nama;
            $this-> Jabatan = $jabatan;
            $this-> Agama = $agama;
            $this-> Status = $status;
            self::$total++;

        }

        public function gapok(){
            switch ($this->Jabatan) {
                case 'manager': $gapok = 15000000;break;
                case 'asmen': $gapok = 10000000;break;
                case 'kabag': $gapok = 7000000;break;
                case 'staff': $gapok = 4000000;break;         
                default: $gapok = 0;break;
            } return $gapok;
        }


        public function tunjab(){
           return $tunjab = 20/100 * $this->gapok();
        }

        public function tunkel(){
            return $tunkel = ($this->Status == 'Menikah')? 10/100 * $this->gapok() : 0;
        }
            
        public function gajikotor(){
           return $gajikotor = $this->gapok() + $this->tunjab() + $this->tunkel();
        }

        public function zProfesi(){
            return $zProfesi = ($this->Agama == 'Islam' && $this->gajikotor()>=6000000)? $this->gapok()* 2.5/100 : 0;

        }

        public function total(){
           return $total = $this->gajikotor() - $this->zProfesi();
        }

        public function cetak(){
            echo '<b><i>' .self::perusahaan. '</i></b> <br>';
            echo '<br> NIM : ' .$this->Nim;
            echo '<br> Nama : '.$this->Nama;
            echo '<br> Jabatan : ' .$this->Jabatan;
            echo '<br> Agama : ' .$this->Agama;
            echo '<br> Status : ' .$this->Status;
            echo '<br> Gaji Pokok : ' .number_format($this->gapok(), 2, ',', '.');
            echo '<br> Tunjangan Jabatan : ' .number_format($this->tunjab(), 2, ',', '.');
            echo '<br> Tunjangan Keluarga : ' .number_format($this->tunkel(), 2, ',', '.');
            echo '<br> Zakat Profesi : ' .number_format($this->zProfesi(), 2, ',', '.');
            echo '<br> Total Bersih : '.number_format($this->total(), 2, ',', '.');
            echo '<hr/>';
        }   
    }
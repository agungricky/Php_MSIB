<?php
    require_once 'bangundatar.php';
    class Segitiga extends Bangundatar{
        public $alas = 10, $tinggi = 10;
        public function NamaBidang(){
            echo 'Segitiga';
        }

        public function luasBidang(){
            return $Luas = 0.5 * $this->alas * $this->tinggi;
        }

        public function kelilingBidang(){
            $sisi_a = 10; 
            $sisi_b = 5;
            $sisi_c = 5; 
            
            return $Keliling = $sisi_a + $sisi_b + $sisi_c;
        }
    }
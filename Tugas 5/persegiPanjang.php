<?php
    require_once 'bangundatar.php';
    class Persegipanjang extends Bangundatar{
        public $Panjang = 9, $Lebar = 2;
        public function NamaBidang(){
            echo 'Persegi Panjang';
        }

        public function luasBidang(){
            return $Luas = $this->Panjang * $this->Lebar;
        }

        public function kelilingBidang(){
            return $Keliling = 2 * ($this->Panjang + $this->Lebar);
        }
    }
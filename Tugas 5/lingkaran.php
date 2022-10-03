<?php
    require_once 'bangundatar.php';
    class Lingkaran extends Bangundatar{
        public $jari2 = 7;    
        public function NamaBidang(){
            echo 'Lingkaran';
        }

        public function luasBidang(){
            return $luasLingkaran = 3.14* $this->jari2 * $this->jari2;
        }

        public function kelilingBidang(){
           return $kelilingLingkaran = 2 * 3.14 * $this->jari2;
        }
    }
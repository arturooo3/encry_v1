<?php

include('encry_v1.php');
include('encdb.php');

$encry = Encry_singleton::get();

echo $encry->encode('Your secret data.')."<br/>";
echo $encry->decode('NotC1nVaE1N_vUiolUOF6Nx_BOf61605I-_H6Ddr1ng')."<br/>";

echo $encry->decode( Encry_db::get()->getlogin() );

?>
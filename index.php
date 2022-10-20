<?php 

require 'OstiumDate.php';

$od = new OstiumDate();

// Menampilkan hari ini dengan format tanggal dan pemisah default
echo '<h1>halooooo</h1>';
echo $od->create();
echo '<br/>';

// Menambahkan 2 tahun 3 bulan 10 hari dari 1 Januari 2012
$add = $od->add('01-01-2012', ['y' => 2, 'm' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $add);

echo '<br/>';

// Mengurangi 4 hari dari hari ini
$sub = $od->sub('now', 4);
echo $od->format('DD-MM-y', $sub);

echo '<br/>';

// Menghitung selisih hari
echo $od->diff('01-01-2013', '02-05-2015', 'y-m-d');


echo '<br/><br/>';
echo strtotime('2009-11-11');
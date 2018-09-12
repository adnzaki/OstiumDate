<?php 

require_once 'OstiumDate.php';

$od = new OstiumDate();

// Menambahkan 1 bulan dari tanggal 1 Agustus 2012
$add = $od->add('01-01-2012', ['y' => 2, 'm' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $add);
// Output: Sabtu, 1 September 2012

echo '<br/>';

// Mengurangi 3 hari dari tanggal 1 Agustus 2012
$sub = $od->sub('now', 4);
echo $od->format('DD-MM-y', $sub);
// Output: Minggu, 29 Juli 2012

echo '<br/>';

// Menghitung selisih hari
echo $od->diff('01-01-2013', '02-05-2015', 'y-m-d');


echo '<br/><br/>';
echo strtotime('2009-11-11');
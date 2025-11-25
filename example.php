<?php

require 'OstiumDate.php';
function printLine($count = 100) {
    for ($i = 0; $i < $count; $i++) {
        echo '-';
    }
    echo '<br/>';
}

$od = new OstiumDate();
echo '<pre>$od = new OstiumDate();</pre>';

echo 'Menampilkan hari ini dengan format tanggal dan pemisah default:';
echo '<pre>$od->create()</pre>';
echo 'Output: ' . $od->create();
echo '<br/><br/>';
echo printLine();

echo 'Menambahkan 2 tahun 3 bulan 10 hari dari 1 Januari 2012 <br/>';
echo '<pre>';
echo '$od->add("2012-01-01", ["y" => 2, "m" => 3, "d" => 10])';
echo "<br/>\$od->create(\$add, 'DD-MM-y')";
echo '</pre>';

$add = $od->add('2012-01-01', ['y' => 2, 'm' => 3, 'd' => 10]);
echo 'Output: ' . $od->create($add, 'DD-MM-y');

echo '<br/><br/>';
echo printLine();

echo 'Mengurangi 4 hari dari hari ini <br/>';
echo '<pre>';
echo '$sub = $od->sub("now", 4);';
echo "<br/>\$od->create(\$sub, 'DD-MM-y');"; 
echo '</pre>';
$sub = $od->sub('now', 4);
echo 'Output: ' . $od->create($sub, 'DD-MM-y');

echo '<br/><br/>';
echo printLine();

echo 'Menghitung selisih hari antara 01-01-2013 dan 02-05-2015 <br/>';
echo '<pre>';
echo "\$od->diff('2013-01-01', '2015-05-02', 'y-m-d');";
echo '</pre>';
echo 'Output: ' . $od->diff('2013-01-01', '2015-05-02', 'y-m-d');


echo '<br/><br/>';

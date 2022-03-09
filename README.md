# OstiumDate
Perhitungan dan Pemformatan Tanggal PHP untuk Bahasa Indonesia

## Deskripsi
<strong>OstiumDate</strong> adalah sebuah library perhitungan dan pemformatan tanggal yang diperuntukkan khusus untuk Bahasa Indonesia. Fungsi perhitungan tanggal pada library ini menggunakan fungsi bawaan PHP yang disederhanakan agar lebih mudah digunakan.

## How-it-works
Buat object untuk class OstiumDate<br>
```
$od = new OstiumDate();
```
Mencetak tanggal dengan tampilan lengkap:<br>
```
$od->fullDate() # argumen kosong menampilkan hari ini
# Output: Rabu, 13 Juni 2018

$od->fullDate('', '', '', false) # menampilkan hari ini tanpa disertai nama hari
# Output: 13 Juni 2018

$od->fullDate(2, 3, 2017)
# Output: Kamis, 2 Maret 2017
```

Mencetak tanggal dengan tampilan ringkas:<br>
```
$od->shortDate() # argumen kosong menampilkan hari ini denga pemisah tanggal default '-'
# Output: 13-06-2018

$od->shortDate(2, 3, 2017, '/') # dengan pemisah tanggal sesuai input
# Output: 02/03/2017
```

Mencetak tanggal dengan <i>custom format:</i><br>
```
Format tanggal khusus dengan pilihan format d, D, DD, m, M, MM, Y
Contoh: 'd' = 26, 'D' = Sen, 26, 'DD' = Senin, 26
        'm' = 12, 'M' = Des, MM = Desember, y atau Y = 2016

Contoh eksekusi:
$od->format('D-M-Y', '1-9-2016', '-')
# Output: Kam, 1-Sep-2016

$od->format('DD-MM-Y', '1-9-2016', '-')
# Output: Kamis, 1-September-2016

$od->format('d-MM-Y', '1-9-2016') # dengan pemisah tanggal default menggunakan spasi
# Output: 1 September 2016
```

Menambahkan jumlah hari/bulan/tahun:<br/>
```
# Menambahkan 4 hari dari hari ini
$add = $od->add('now', 4);
echo $od->format('DD-MM-Y', $add);
# Output: Minggu, 17 Juni 2018

# Menambahkan 3 bulan 10 hari dari tanggal 1 Januari 2012
$add = $od->add('01-01-2012', ['m' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $add);
# Output: Rabu, 11 April 2012

# Menambahkan 2 tahun 3 bulan 10 hari dari tanggal 1 Januari 2012
$add = $od->add('01-01-2012', ['y' => 2, 'm' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $add);
# Output: Jumat, 11 April 2014
```

Mengurangi jumlah hari/bulan/tahun:<br/>
```
# Mengurangi 4 hari dari hari ini
$sub = $od->sub('now', 4);
echo $od->format('DD-MM-Y', $sub);
# Output: Sabtu, 9 Juni 2018

# Mengurangi 3 bulan 10 hari dari tanggal 1 Januari 2012
$sub = $od->sub('01-01-2012', ['m' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $sub);
# Output: Rabu, 21 September 2011

# Mengurangi 2 tahun 3 bulan 10 hari dari tanggal 1 Januari 2012
$sub = $od->sub('01-01-2012', ['y' => 2, 'm' => 3, 'd' => 10]);
echo $od->format('DD-MM-y', $sub);
# Output: Senin, 21 September 2009
```

Menghitung selisih hari/bulan/tahun: <br/>
```
Tipe output:
'pn-days' = positive-negative days, menghasilkan format output '%R%a hari'
'total-days' = '%a hari'
'num-only' = '%a'
'month' = '%m bulan'
'year' = '%y tahun'
'y-m-d' = '%y tahun, %m bulan, %d hari'
'm-d' = '%m bulan, %d hari'
'y-d' = '%y tahun, %d hari'
'y-m' = '%y tahun, %m bulan'
```
Detil format: http://php.net/manual/en/dateinterval.format.php <br/>
Eksekusi:<br/>
```
echo $od->diff('01-01-2013', '02-05-2015', 'pn-days', 'a-b');
# Output: +121 hari

echo $od->diff('01-01-2013', '02-05-2015', 'pn-days', 'b-a');
# Output: -121 hari

echo $od->diff('01-01-2013', '02-05-2015', 'total-days');
# Output: 121 hari

echo $od->diff('01-01-2013', '02-05-2015', 'y-m-d');
# Output: 2 tahun, 4 bulan, 1 hari
```

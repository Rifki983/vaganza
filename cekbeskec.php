<?php
// Fungsi untuk Bubble Sort (urutan terendah ke tertinggi)
function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n-1; $i++) {
        for ($j = 0; $j < $n-$i-1; $j++) {
            if ($arr[$j] < $arr[$j+1]) { // Perubahan terletak di sini (perbandingan kurang dari)
                // Tukar elemen jika perlu
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }
}

$prices = [440000000, 860000000, 480000000, 1500000000, 530000000, 436000000, 640000000, 540000000, 880000000, 810000000, 890000000, 580000000, 1550000000, 630000000, 570000000, 610000000, 590000000, 450000000, 490000000, 456000000];

// Waktu mulai eksekusi
$start_time = microtime(true);
 
bubbleSort($prices); // Memanggil fungsi Bubble Sort

// Waktu berakhir eksekusi
$end_time = microtime(true);

echo "Harga terurut (tertinggi ke terendah): ";
foreach ($prices as $price) {
    echo $price . " ";
}
echo "<br>";

// Menghitung waktu eksekusi dalam mikrodetik
$execution_time = ($end_time - $start_time) * 1000000;

echo "Waktu eksekusi: " . $execution_time . " mikrodetik";
?>

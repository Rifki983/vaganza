<?php
function bubbleSort($products, $order = 'ASC') {
    $n = count($products);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            $currentPrice = $products[$j]['harga'];
            $nextPrice = $products[$j + 1]['harga'];

            // Sesuaikan dengan urutan yang diinginkan (ASC atau DESC)
            if (($order == 'ASC' && $currentPrice > $nextPrice) ||
                ($order == 'DESC' && $currentPrice < $nextPrice)) {
                // Tukar posisi jika diperlukan
                $temp = $products[$j];
                $products[$j] = $products[$j + 1];
                $products[$j + 1] = $temp; 
                
            }
        }
    }
    return $products;
}

// Fungsi untuk mengeksekusi query dan mendapatkan hasil dalam bentuk array
function getProductsArray($conn) {
    $queryResult = mysqli_query($conn, "SELECT * FROM rumah");
    $products = array();

    // Ambil hasil query dan simpan dalam bentuk array
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $products[] = $row;
    }

    return $products;
}
?>

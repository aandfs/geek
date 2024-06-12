<?php
function highestPalindrome($s, $k) {
    $len = strlen($s); // Menghitung panjang string
    $s = str_split($s); // Memecah string menjadi array karakter
    
    // Langkah 1: Membuat palindrom dasar dengan perubahan minimal
    $changes = [];
    for ($left = 0, $right = $len - 1; $left < $right; $left++, $right--) {
        if ($s[$left] != $s[$right]) {
            $higher = max($s[$left], $s[$right]); // Memilih karakter yang lebih besar
            $s[$left] = $s[$right] = $higher; // Mengubah kedua karakter menjadi karakter yang lebih besar
            $changes[] = [$left, $right]; // Menyimpan pasangan indeks yang diubah
            $k--; // Mengurangi jumlah perubahan yang tersedia
        }
    }
    
    // Jika tidak cukup 'k' untuk membuat palindrom dasar
    if ($k < 0) {
        return '-1';
    }

    // Langkah 2: Memaksimalkan palindrom dengan mengubah karakter menjadi '9'
    for ($left = 0, $right = $len - 1; $left <= $right; $left++, $right--) {
        if ($left == $right && $k > 0) {
            // Menangani karakter tengah pada string dengan panjang ganjil
            $s[$left] = '9';
        }
        if ($s[$left] < '9') {
            if (in_array([$left, $right], $changes) && $k > 0) {
                $s[$left] = $s[$right] = '9'; // Mengubah karakter menjadi '9' jika pasangan indeks ada dalam daftar perubahan
                $k--;
            } elseif (!in_array([$left, $right], $changes) && $k > 1) {
                $s[$left] = $s[$right] = '9'; // Mengubah karakter menjadi '9' jika pasangan indeks tidak ada dalam daftar perubahan
                $k -= 2;
            }
        }
    }
    
    return implode('', $s); // Menggabungkan array karakter menjadi string
}

// Contoh input
echo highestPalindrome("3943", 1) . "\n\n"; // Output: 3993
echo highestPalindrome("932239", 2) . "\n\n"; // Output: 992299
?>

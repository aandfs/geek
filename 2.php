<?php
function isBalanced($string) {
    $stack = [];
    $brackets = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];
    
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];
        // Abaikan karakter selain bracket yang diperbolehkan
        if (!in_array($char, ['(', ')', '{', '}', '[', ']'])) {
            continue;
        }

        if (in_array($char, ['(', '{', '['])) {
            // push char k stack jika bracket merupakan bracket pembuka
            array_push($stack, $char);
        } else {
            // Jika karakter adalah bracket penutup
            // stack berisi bracket pembuka
            // sedangkan array brackets menggunakan tutup brackets sebagai key sehingga menghasilkan bracket pembuka
            if (empty($stack) || array_pop($stack) !== $brackets[$char]) {
                return "NO";
            }
        }
    }
    
    return empty($stack) ? "YES" : "NO";
}

// Sample inputs
$input1 = "{ [ ( ) ] }";
echo "Input: $input1\n" . "\n";
echo "Output: " . isBalanced($input1) . "\n\n";
echo "\n\n";

$input2 = "{ [ ( ] ) }";
echo "Input: $input2\n" . "\n";
echo "Output: " . isBalanced($input2) . "\n\n";
echo "\n\n";

$input3 = "{ ( ( [ ] ) [ ] ) [ ] }";
echo "Input: $input3\n" . "\n";
echo "Output: " . isBalanced($input3) . "\n\n";
echo "\n\n";
?>

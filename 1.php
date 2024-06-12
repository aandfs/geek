<?php
function calculateWeights($string) {
    $weights = [];
    $length = strlen($string);
    
    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];
        $char_weight = ord($char) - ord('a') + 1;
        $current_weight = $char_weight;
        
        // Tambahkan bobot karakter tunggal
        $weights[$current_weight] = true;
        
        // Cek karakter yang berulang
        for ($j = $i + 1; $j < $length; $j++) {
            if ($string[$j] == $char) {
                $current_weight += $char_weight;
                $weights[$current_weight] = true;
            } else {
                break;
            }
        }
    }
    
    return $weights;
}

function checkQueries($string, $queries) {
    $weights = calculateWeights($string);
    $results = [];

    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $results[] = "Yes";
        } else {
            $results[] = "No";
        }
    }

    return json_encode($results);
}

// Sample input
$string = "abbcccd";
$queries = [1, 3, 9, 8];

echo checkQueries($string, $queries);
?>

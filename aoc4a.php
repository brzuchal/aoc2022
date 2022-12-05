<?php declare(strict_types=1);

$totalScore = 0;
while (!feof(STDIN)) {
    $line = fgetcsv(STDIN);
    if (!$line) break;
//    var_dump($line);
    [$leftMin, $leftMax] = explode("-",$line[0]);
    [$rightMin, $rightMax] = explode("-",$line[1]);
//    var_dump($leftMin, $leftMax);
//    var_dump($rightMin, $rightMax);

    if ($rightMin >= $leftMin && $rightMin <= $leftMax && $rightMax >= $leftMin && $rightMax <= $leftMax) {
        $totalScore ++;
        echo $totalScore;
        continue;
    }
    if ($leftMin >= $rightMin && $leftMin <= $rightMax && $leftMax >= $rightMin && $leftMax <= $rightMax) {
        $totalScore ++;
        echo $totalScore;
    }
}

echo "Total score: {$totalScore}\n";

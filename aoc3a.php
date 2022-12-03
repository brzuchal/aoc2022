<?php declare(strict_types=1);

function priority(string $itemType): int {
    $ord = ord($itemType);
    if ($ord > 96) return $ord - 96;
    else return $ord - 65 + 27;
}

$totalScore = 0;
while (!feof(STDIN)) {
    $line = fgets(STDIN);
    if (!$line) break;
    $row = trim($line);
    $length = strlen($row);
    $leftCompartment = [];
    $rightCompartment = [];
    $divider = $length / 2;

    for ($i = 0; $i < $divider; $i++) {
        $leftCompartment[$row[$i]] ??= 0;
        $leftCompartment[$row[$i]] += 1;
    }

    for ($i = $divider; $i < $length; $i++) {
        $rightCompartment[$row[$i]] ??= 0;
        $rightCompartment[$row[$i]] += 1;
    }

    $intersect = array_intersect_key($leftCompartment, $rightCompartment);
    foreach ($intersect as $itemType => $count) {
        $totalScore += priority($itemType);
    }
}

echo "Total score: {$totalScore}\n";

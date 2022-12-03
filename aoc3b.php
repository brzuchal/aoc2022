<?php declare(strict_types=1);

function priority(string $itemType): int {
    $ord = ord($itemType);
    if ($ord > 96) return $ord - 96;
    else return $ord - 65 + 27;
}

$totalScore = 0;
$groupRucksacks = [];
while (!feof(STDIN)) {
    $line = fgets(STDIN);
    if (!$line) break;
    $groupRucksacks[] = str_split(trim($line));
    if (count($groupRucksacks) === 3) {
        $intersect = array_intersect(...$groupRucksacks);
        $totalScore += priority(array_shift($intersect));
        $groupRucksacks = [];
    }
}

echo "Total score: {$totalScore}\n";

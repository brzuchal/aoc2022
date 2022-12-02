<?php declare(strict_types=1);

$totalScore = 0;
while (!feof(STDIN)) {
    [$opponent, $our] = fgetcsv(STDIN, separator: ' ') ?? [];
    if (empty($opponent)) break;
//    if ($our === 'X') {
//        $totalScore += 1;
//    } elseif ($our === 'Y') {
//        $totalScore += 2;
//    } elseif ($our === 'Z') {
//        $totalScore += 3;
//    }
    $totalScore += match ($our) {
        'X' => 1,
        'Y' => 2,
        'Z' => 3,
    };
    $totalScore += match ($opponent) {
        'A' => match ($our) { // Kamień
            'X' => 3, // Kamień
            'Y' => 6, // Papier
            'Z' => 0, // Nożyce
        },
        'B' => match ($our) { // Papier
            'X' => 0, // Kamień
            'Y' => 3, // Papier
            'Z' => 6, // Nożyce
        },
        'C' => match ($our) { // Nożyce
            'X' => 6, // Kamień
            'Y' => 0, // Papier
            'Z' => 3, // Nożyce
        },
    };
//    echo "przeciwnik: {$opponent} my: {$our}\n";
}

echo "wynik: {$totalScore}\n";

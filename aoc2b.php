<?php declare(strict_types=1);

$totalScore = 0;
while (!feof(STDIN)) {
    [$opponent, $our] = fgetcsv(STDIN, separator: ' ') ?? [];
    if (empty($opponent)) break;
    $totalScore += match ($opponent) {
        'A' => match ($our) { // Kamień
            'X' => 3, // Przegrana nożycami
            'Y' => 1, // Remis kamieniem
            'Z' => 2, // Wygrana papierem
        },
        'B' => match ($our) { // Papier
            'X' => 1, // Przegrana kamieniem
            'Y' => 2, // Remis papierem
            'Z' => 3, // Wygrana nożycami
        },
        'C' => match ($our) { // Nożyce
            'X' => 2, // Przegrana papierem
            'Y' => 3, // Remis nożycami
            'Z' => 1, // Wygrana kamieniem
        },
    };
    $totalScore += match ($opponent) {
        'A' => match ($our) { // Kamień
            'X' => 0, // Przegrana
            'Y' => 3, // Remis
            'Z' => 6, // Wygrana
        },
        'B' => match ($our) { // Papier
            'X' => 0, // Przegrana
            'Y' => 3, // Remis
            'Z' => 6, // Wygrana
        },
        'C' => match ($our) { // Nożyce
            'X' => 0, // Przegrana
            'Y' => 3, // Remis
            'Z' => 6, // Wygrana
        },
    };
//    echo "przeciwnik: {$opponent} my: {$our}\n";
}

echo "wynik: {$totalScore}\n";

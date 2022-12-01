<?php declare(strict_types=1);

$max = 0;
$current = 0;
while (!feof(STDIN)) {
    [$calories] = fgetcsv(STDIN) ?? [];
    if (empty($calories)) {
        $max = max($max, $current);
        $current = 0;

        continue;
    }

    $current += (int) $calories;
}
echo $max . PHP_EOL;

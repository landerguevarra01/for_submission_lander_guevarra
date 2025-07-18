<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task 1 - Infinity Star Pattern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 p-6">
    <div class="max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Task 1: Infinity Star Pattern</h2>
        <p class="mb-4 text-gray-700">Generate a vertical infinity symbol pattern using minimal PHP logic.</p>

        <div class="bg-gray-100 p-4 rounded font-mono text-lg leading-6">
            <pre>
<?php
$rows = 13;
$cols = 7;
$cellWidth = 3;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $char = (
            ($i == 0 || $i == 12) && $j == 3 ||
            ($i == 1 || $i == 11) && ($j == 2 || $j == 4) ||
            ($i == 2 || $i == 10) && ($j == 1 || $j == 5) ||
            ($i == 3 || $i == 9) && ($j == 0 || $j == 6) ||
            ($i == 4 || $i == 8) && ($j == 1 || $j == 5) ||
            ($i == 5 || $i == 7) && ($j == 2 || $j == 4) ||
            $i == 6 && $j == 3
        ) ? '*' : ' ';

        echo str_pad($char, $cellWidth, ' ', STR_PAD_RIGHT);
    }
    echo "\n";
}
?>
          </pre>
        </div>
        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
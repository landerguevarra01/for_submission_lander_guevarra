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
$size = 11; // Must be odd for symmetry
$center = floor($size / 2);
$symbols = [0 => '1', 1 => '*', 2 => '3', 3 => '*', 4 => '5', 5 => '*']; // Mirror pattern

for ($i = 0; $i < $size; $i++) {
    $line = str_repeat('  ', $size); // Initialize line with spaces
    $dist = abs($center - $i);
    $char = $symbols[$dist] ?? '*';

    // Set character at both diagonal positions
    $line[$i * 2] = $char;
    $line[($size - $i - 1) * 2] = $char;

    echo $line . "\n";
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
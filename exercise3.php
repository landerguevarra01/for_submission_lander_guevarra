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
$max = 5;
$rows = array_merge(range(1, $max), range($max - 1, 1));

foreach ($rows as $i) {
    for ($j = 1; $j <= $i; $j++) {
        // Pad each number to width 4, right aligned
        echo str_pad($i * $j, 4, " ", STR_PAD_RIGHT);
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
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

        <div id="letterRow" class="grid grid-cols-11 gap-2 mb-2"></div>
        <div id="indexRow" class="grid grid-cols-11 gap-2"></div>

        <script>
            const letterRow = document.getElementById("letterRow");
            const indexRow = document.getElementById("indexRow");

            for (let i = 0; i <= 10; i++) {
                const letter = String.fromCharCode(97 + i); // ASCII 97 = 'a'
                letterRow.innerHTML += `<div class="text-center font-bold">${letter}</div>`;
                indexRow.innerHTML += `<div class="text-center">${i}</div>`;
            }
        </script>

        <div class="bg-gray-100 p-4 rounded font-mono text-lg leading-6">
            <pre>
<?php
$rows = 4;
$cols = 5;
$allChars = range('a', 'k'); // Index 0 to 10

echo "<table border='1' cellpadding='10' style='border-collapse: collapse; text-align: center;'>";

for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $cols; $j++) {
        $randIndex = rand(0, 10);
        $char = $allChars[$randIndex];

        // Check if the index is even (0, 2, 4, 6, 8, 10)
        if ($randIndex % 2 === 0) {
            echo "<td style='background-color: yellow;'>" . strtoupper($char) . "</td>";
        } else {
            echo "<td>$char</td>";
        }
    }
    echo "</tr>";
}

echo "</table>";
?>
          </pre>
        </div>
        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
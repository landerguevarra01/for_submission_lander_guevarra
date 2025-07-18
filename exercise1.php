<!-- task1.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task 1 - Infinity Star Pattern</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 p-6">
    <div class="max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Task 1: Infinity Star Pattern</h2>

        <!-- Task Instruction -->
        <p class="mb-4 text-gray-700">
            Generate a vertical infinity symbol pattern using minimal PHP logic.
        </p>

        <!-- Pattern Output -->
        <div class="bg-gray-100 p-4 rounded font-mono text-lg leading-6">
            <pre>
<?php
$rows = 13;
$cols = 7;
$cellWidth = 3;

// Loop through each row
for ($row = 0; $row < $rows; $row++) {
    for ($col = 0; $col < $cols; $col++) {
        $isStar = (
            ($row == 0 || $row == 12) && $col == 3 ||
            ($row == 1 || $row == 11) && ($col == 2 || $col == 4) ||
            ($row == 2 || $row == 10) && ($col == 1 || $col == 5) ||
            ($row == 3 || $row == 9) && ($col == 0 || $col == 6) ||
            ($row == 4 || $row == 8) && ($col == 1 || $col == 5) ||
            ($row == 5 || $row == 7) && ($col == 2 || $col == 4) ||
            $row == 6 && $col == 3
        );

        echo str_pad($isStar ? '*' : ' ', $cellWidth, ' ', STR_PAD_RIGHT);
    }
    echo "\n";
}
?>
      </pre>
        </div>


        <pre>
          *              
       *     *           
    *           *        
 *                 *     
    *           *        
       *     *           
          *              
       *     *           
    *           *        
 *                 *     
    *           *        
       *     *           
          *              
        </pre>

        <!-- Back Home Button -->
        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
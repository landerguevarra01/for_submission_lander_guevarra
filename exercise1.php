<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 1</title>
    <link rel="icon" href="assets/LNDR%20LOGO@4x-8%201.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-[768px] max-w-full p-6">
        <?php
        $href = 'index.php';
        include __DIR__ . '/components/BackButton.php';
        ?>
        <div class="space-y-4 mb-8 text-start">
            <h1 class="text-2xl sm:text-3xl font-bold">Task 1</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Create a PHP program that prints a vertical infinity star
                pattern (∞ - like shape) in a 13x7 grid.
            </h2>
        </div>
        <div class="bg-transparent border-2 border-[#30363d] rounded-[20px] px-6 py-8 ">
            <div class="space-y-4 mb-8 text-start">
                <div class="flex justify-between items-center">
                    <h1 class="text-[18px] font-bold">Infinite Loop Patterns</h1>
                    <div class="w-3 h-3 rounded-full bg-[#E7C73B] glow-yellow"></div>
                </div>
                <h2 class="text-[14px] text-gray-400">
                    Develop a PHP script that generates a vertically symmetrical
                    infinity-shaped pattern using asterisks (*) inside a 13×7 grid.
                </h2>
            </div>
            <div
                class="bg-gray-100 rounded-[20px] font-mono text-xl text-black text-center px-8 flex justify-center items-center">
                <pre class="mt-8 ml-[20px]">
<?php
$rows = 13;
$cols = 7;
$cellWidth = 3;

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
        </div>
    </div>
</body>

</html>
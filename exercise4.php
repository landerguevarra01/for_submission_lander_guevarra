<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 4</title>
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

        <div class="space-y-4 mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold">Task 4</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Develop a PHP script that displays a 6×5 table where each row starts from its index and increases based
                on a unique multiplier per row, forming exponential sequences.
            </h2>
        </div>

        <div class="bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6">
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-lg font-bold">Exponential Matrix</h1>
                    <div class="w-3 h-3 rounded-full bg-[#4993E2] glow-blue"></div>
                </div>
                <h2 class="text-sm text-gray-400">
                    A grid of values powered by row-specific growth ratios
                </h2>
            </div>

            <div class="bg-gray-100 rounded-xl p-4 overflow-auto w-full max-w-full">
                <pre
                    class="text-sm sm:text-base md:text-lg lg:text-xl text-black font-mono leading-relaxed whitespace-pre">
<?php
$rows = 6;
$cols = 5;

for ($i = 1; $i <= $rows; $i++) {
    $value = $i;
    $ratio = $i + 1;

    for ($j = 1; $j <= $cols; $j++) {
        echo str_pad($value, 8, " ", STR_PAD_RIGHT);
        $value *= $ratio;
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
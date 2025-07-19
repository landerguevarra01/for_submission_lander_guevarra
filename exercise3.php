<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 3</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 3</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Develop a PHP script that prints a symmetrical triangle pattern by
                multiplying row and column values. The output should form a mirrored cascade of multiplication tables,
                expanding from 1 to 5 and then contracting back to 1.
            </h2>
        </div>

        <div class="bg-transparent border-2 border-[#30363d] rounded-[20px] px-6 py-8 ">
            <div class="space-y-4 mb-8 text-start">
                <div class="flex justify-between items-center">
                    <h1 class="text-[18px] font-bold">Multiplicative Pyramid</h1>
                    <div class="w-3 h-3 rounded-full bg-[#AEFA62] glow-green"></div>
                </div>
                <h2 class="text-[14px] text-gray-400">
                    Develop a PHP script that generates a mirrored triangular pattern
                    using multiplication values in ascending and descending order.
                </h2>
            </div>
            <div
                class="bg-gray-100 rounded-[20px] font-mono text-xl text-black pt-8 px-8 flex justify-center items-center">
                <pre>
<?php
$max = 5;
$rows = array_merge(range(1, $max), range($max - 1, 1));

foreach ($rows as $i) {
    for ($j = 1; $j <= $i; $j++) {
        echo str_pad($i * $j, 4, " ", STR_PAD_RIGHT);
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
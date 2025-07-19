<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 2</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 2</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Create a PHP program that prints a symmetrical X-shaped pattern. The
                pattern should display different characters (1, 3, 5, and *) along the diagonals,
                changing based on their distance from the center row.
            </h2>
        </div>

        <div class="bg-transparent border-2 border-[#30363d] rounded-[20px] px-6 py-8 ">
            <div class="space-y-4 mb-8 text-start">
                <div class="flex justify-between items-center">
                    <h1 class="text-[18px] font-bold">Crisscross Echoes</h1>
                    <div class="w-3 h-3 rounded-full bg-[#FA3ABF] glow-pink"></div>
                </div>
                <h2 class="text-[14px] text-gray-400">
                    Develop a PHP script that prints a mirrored X-shaped pattern using
                    a combination of numbers and asterisks (*) arranged symmetrically.
                </h2>
            </div>
            <div class="bg-gray-100 rounded-[20px] font-mono text-xl text-black text-center pt-8">
                <pre>
<?php
$size = 11;
$center = floor($size / 2);
$symbols = [0 => '1', 1 => '*', 2 => '3', 3 => '*', 4 => '5', 5 => '*'];

for ($i = 0; $i < $size; $i++) {
    $line = str_repeat('  ', $size);
    $dist = abs($center - $i);
    $char = $symbols[$dist] ?? '*';

    $line[$i * 2] = $char;
    $line[($size - $i - 1) * 2] = $char;

    echo $line . "\n";
}
?>
          </pre>
            </div>
        </div>
    </div>
</body>

</html>
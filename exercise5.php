<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 5</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 5</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Develop a PHP script that generates a 4×5 table filled with random lowercase letters from a to k.
                If the character’s index in the source array is even, display it in uppercase with a yellow background.
                Otherwise, display it in lowercase without styling.
            </h2>
        </div>

        <div class="bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6">
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-lg font-bold">Alphabet Matrix</h1>
                    <div class="w-3 h-3 rounded-full bg-[#E44756] glow-red"></div>
                </div>
                <h2 class="text-sm text-gray-400">
                    A grid of random letters styled by index-based rules
                </h2>
            </div>

            <div id="letterRow" class="grid grid-cols-11 gap-2 mb-2"></div>
            <div id="indexRow" class="grid grid-cols-11 gap-2"></div>

            <form method="post" class="mt-8 flex justify-end">
                <button type="submit"
                    class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    Regenerate Table
                </button>
            </form>

            <form method="post">
                <div
                    class="bg-gray-100 rounded-[20px] font-mono text-xl text-black py-8 px-8 flex flex-col justify-center items-center mt-10 space-y-6">
                    <?php
                    $rows = 4;
                    $cols = 5;
                    $allChars = range('a', 'k');

                    echo "<table border='1' cellpadding='10' style='border-collapse: collapse; text-align: center;'>";

                    for ($i = 0; $i < $rows; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $cols; $j++) {
                            $randIndex = rand(0, 10);
                            $char = $allChars[$randIndex];

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
                </div>
            </form>

        </div>
    </div>
    <script>
        const letterRow = document.getElementById("letterRow");
        const indexRow = document.getElementById("indexRow");

        for (let i = 0; i <= 10; i++) {
            const letter = String.fromCharCode(97 + i);
            letterRow.innerHTML += `<div class="text-center font-bold">${letter}</div>`;
            indexRow.innerHTML += `<div class="text-center">${i}</div>`;
        }
    </script>
</body>

</html>
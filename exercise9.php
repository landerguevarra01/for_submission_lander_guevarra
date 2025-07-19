<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 9</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 9</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Using a PHP POST method, ask the user to input 2 numbers
                <ul class="list-disc list-inside">
                    <li>
                        Create a Grid using 2 inputs as the length and width
                    </li>
                    <li>
                        Insert random CONSONANT letters into the grid
                    </li>
                    <li>
                        Display the grid in table
                    </li>
                </ul>
            </h2>
        </div>
        <div class="bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-base sm:text-lg font-bold">PHP POST</h1>
                <div class="w-3 h-3 rounded-full bg-[#AEFA62] glow-green"></div>
            </div>
            <p class="text-sm sm:text-base text-gray-400 mb-4">Enter two numbers to generate a grid filled with random
                consonants.</p>

            <form method="POST" class="mb-6 space-y-4">
                <div>
                    <label for="rows" class="block font-semibold">Number of Rows:</label>
                    <input type="number" id="rows" name="rows" required min="1"
                        class="w-full border px-3 py-2 rounded text-black">
                </div>
                <div>
                    <label for="cols" class="block font-semibold">Number of Columns:</label>
                    <input type="number" id="cols" name="cols" required min="1"
                        class="w-full border px-3 py-2 rounded text-black">
                </div>
                <button type="submit"
                    class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    Generate Grid
                </button>
            </form>


        </div>
        <div class="overflow-x-auto">
            <?php
            function getRandomConsonant()
            {
                $consonants = str_split("BCDFGHJKLMNPQRSTVWXYZ");
                return $consonants[rand(0, count($consonants) - 1)];
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rows = isset($_POST["rows"]) ? (int) $_POST["rows"] : 0;
                $cols = isset($_POST["cols"]) ? (int) $_POST["cols"] : 0;

                if ($rows > 0 && $cols > 0) {
                    $grid = [];
                    for ($i = 0; $i < $rows; $i++) {
                        for ($j = 0; $j < $cols; $j++) {
                            $grid[$i][$j] = getRandomConsonant();
                        }
                    }

                    session_start();
                    $_SESSION['grid'] = $grid;
                    $_SESSION['rows'] = $rows;
                    $_SESSION['cols'] = $cols;

                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            }

            session_start();
            if (isset($_SESSION['grid'])) {
                $rows = $_SESSION['rows'];
                $cols = $_SESSION['cols'];
                $grid = $_SESSION['grid'];

                echo "<h3 class='text-xl font-semibold my-8'>Generated Grid ($rows x $cols):</h3>";
                echo "<table class='table-auto border-collapse border border-gray-400'>";
                for ($i = 0; $i < $rows; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $cols; $j++) {
                        $letter = $grid[$i][$j];
                        echo "<td class='border border-gray-400 px-4 py-2 text-center font-bold text-lg'>$letter</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                unset($_SESSION['grid']);
                unset($_SESSION['rows']);
                unset($_SESSION['cols']);
            }

            ?>
        </div>
    </div>
</body>

</html>
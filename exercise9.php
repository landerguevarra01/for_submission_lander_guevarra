<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task 1 - Consonant Grid Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 p-6">
    <div class="max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Task 1: Consonant Grid Generator</h2>
        <p class="mb-4 text-gray-700">Enter two numbers to generate a grid filled with random consonants.</p>

        <form method="POST" class="mb-6 space-y-4">
            <div>
                <label for="rows" class="block font-semibold">Number of Rows:</label>
                <input type="number" id="rows" name="rows" required min="1" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label for="cols" class="block font-semibold">Number of Columns:</label>
                <input type="number" id="cols" name="cols" required min="1" class="w-full border px-3 py-2 rounded">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Generate
                Grid</button>
        </form>

        <?php
        function getRandomConsonant()
        {
            $consonants = str_split("BCDFGHJKLMNPQRSTVWXYZ");
            return $consonants[rand(0, count($consonants) - 1)];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rows = isset($_POST["rows"]) ? (int) $_POST["rows"] : 0;
            $cols = isset($_POST["cols"]) ? (int) $_POST["cols"] : 0;

            // Store data in session or temp file if needed (optional)
            if ($rows > 0 && $cols > 0) {
                // Store generated letters temporarily
                $grid = [];
                for ($i = 0; $i < $rows; $i++) {
                    for ($j = 0; $j < $cols; $j++) {
                        $grid[$i][$j] = getRandomConsonant();
                    }
                }

                // Save to session
                session_start();
                $_SESSION['grid'] = $grid;
                $_SESSION['rows'] = $rows;
                $_SESSION['cols'] = $cols;

                // Redirect to clear POST and display result
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }

        // After redirection, check for grid in session
        session_start();
        if (isset($_SESSION['grid'])) {
            $rows = $_SESSION['rows'];
            $cols = $_SESSION['cols'];
            $grid = $_SESSION['grid'];

            echo "<h3 class='text-xl font-semibold mb-2'>Generated Grid ($rows x $cols):</h3>";
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

            // Clear session after displaying
            unset($_SESSION['grid']);
            unset($_SESSION['rows']);
            unset($_SESSION['cols']);
        }

        ?>

        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
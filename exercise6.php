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

        <div class="inline-block border p-4 bg-white rounded shadow">
            <table class="table-auto border-collapse text-center">
                <tbody>
                    <?php
                    $rows = 4;
                    $cols = 4;
                    $used = [];
                    $grid = [];

                    // Generate 4x4 grid with unique random numbers from 1–100
                    for ($i = 0; $i < $rows; $i++) {
                        $grid[$i] = [];
                        for ($j = 0; $j < $cols; $j++) {
                            do {
                                $num = rand(1, 100);
                            } while (in_array($num, $used));
                            $used[] = $num;
                            $grid[$i][$j] = $num;
                        }
                    }

                    // Print grid with row sums
                    for ($i = 0; $i < $rows; $i++) {
                        echo "<tr>";
                        $rowSum = 0;
                        for ($j = 0; $j < $cols; $j++) {
                            $val = $grid[$i][$j];
                            $rowSum += $val;
                            echo "<td class='border px-4 py-2'>$val</td>";
                        }
                        echo "<td class='border px-4 py-2 bg-yellow-100 font-bold'>$rowSum</td>"; // row sum
                        echo "</tr>";
                    }

                    // Column sums
                    echo "<tr class='font-bold bg-yellow-100'>";
                    for ($j = 0; $j < $cols; $j++) {
                        $colSum = 0;
                        for ($i = 0; $i < $rows; $i++) {
                            $colSum += $grid[$i][$j];
                        }
                        echo "<td class='border px-4 py-2'>$colSum</td>";
                    }
                    echo "<td class='border px-4 py-2 bg-gray-200'></td>"; // blank corner
                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 6</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 6</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Displays a 4×4 grid filled with unique random numbers ranging from 1 to 100.
                The rightmost column of each row shows the total sum of that row.
                Likewise, the bottom row displays the total sum for each column.
            </h2>
        </div>

        <div class="bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6">
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-lg font-bold">Summation Grid</h1>
                    <div class="w-3 h-3 rounded-full bg-[#7069F6] glow-purple"></div>
                </div>
                <h2 class="text-sm text-gray-400">
                    A dynamic matrix of unique values with calculated row and column totals
                    <br />
                    <br />
                    Manipulation of multidimensional array
                    <ul class="list-disc list-inside">
                        <li>
                            Create a 4x4 table
                        </li>
                        <li>
                            Generate a random number from 1 - 100
                        </li>
                        <li>
                            The number generated should always be unique
                        </li>
                        <li>
                            Sum up the number per column and row
                        </li>
                    </ul>
                </h2>
            </div>

            <form method="post" class="mb-4 flex justify-end">
                <button type="submit"
                    class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    Generate New Grid
                </button>
            </form>

            <div class="bg-gray-100 rounded-xl overflow-auto w-full p-4">
                <table class="table-auto border-collapse text-center text-black w-full min-w-max">
                    <tbody>
                        <?php
                        $rows = 4;
                        $cols = 4;
                        $used = [];
                        $grid = [];

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

                        for ($i = 0; $i < $rows; $i++) {
                            echo "<tr>";
                            $rowSum = 0;
                            for ($j = 0; $j < $cols; $j++) {
                                $val = $grid[$i][$j];
                                $rowSum += $val;
                                echo "<td class='border px-4 py-2 text-sm sm:text-base'>$val</td>";
                            }
                            echo "<td class='border px-4 py-2 bg-yellow-100 font-bold text-sm sm:text-base'>$rowSum</td>";
                            echo "</tr>";
                        }

                        echo "<tr class='font-bold bg-yellow-100'>";
                        for ($j = 0; $j < $cols; $j++) {
                            $colSum = 0;
                            for ($i = 0; $i < $rows; $i++) {
                                $colSum += $grid[$i][$j];
                            }
                            echo "<td class='border px-4 py-2 text-sm sm:text-base'>$colSum</td>";
                        }
                        echo "<td class='border px-4 py-2 bg-gray-200'></td>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
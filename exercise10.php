<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['arrayInput'])) {
    $input = urlencode(trim($_POST['arrayInput']));
    header("Location: " . $_SERVER['PHP_SELF'] . "?array=$input");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 10</title>
    <link rel="icon" href="assets/LNDR%20LOGO@4x-8%201.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-[1020px] max-w-full p-6">
        <?php
        $href = 'index.php';
        include __DIR__ . '/components/BackButton.php';
        ?>
        <h1 class="text-2xl sm:text-3xl font-bold mb-8">Task 10</h1>

        <p class="mb-6 text-gray-300">
            This page compares the incorrect and corrected versions of a PHP
            <code class="bg-gray-800 px-1 rounded text-yellow-300">bubbleSort()</code> function.
            The left column shows the buggy code, while the right column displays the correct implementation.
        </p>

        <div class="flex flex-col lg:flex-row gap-6">
            <div class="bg-red-900 border border-red-500 rounded-lg p-4 flex-1 overflow-auto">
                <div class="text-red-300 font-semibold mb-2">Wrong Code</div>
                <pre class="text-sm whitespace-pre-wrap text-white">
<code>
function bubbleSort($lists)
{
    $length = count($lists);
    for ($parent = 0; $parent < $length; $parent++) {
        for ($child = 0; $child < $length - $parent - 1; $child++) {
            if ($lists[$child] > $lists[$child + 1]) {
                $temp = $lists[$child + 1]; // Incorrect: should store current, not next
                $lists[$child] = $lists[$child + 1];
                $lists[$child + 1] = $temp;
            }
        }
    }
    // No return statement
}
</code>
            </pre>
            </div>

            <div class="bg-green-900 border border-green-500 rounded-lg p-4 flex-1 overflow-auto">
                <div class="text-green-300 font-semibold mb-2">Correct Code</div>
                <pre class="text-sm whitespace-pre-wrap text-white">
<code>
function bubbleSort($lists)
{
    $length = count($lists);
    for ($parent = 0; $parent < $length; $parent++) {
        for ($child = 0; $child < $length - $parent - 1; $child++) {
            if ($lists[$child] > $lists[$child + 1]) {
                $temp = $lists[$child]; // Correct: store current element before swapping
                $lists[$child] = $lists[$child + 1];
                $lists[$child + 1] = $temp;
            }
        }
    }
    return $lists;
}
</code>
            </pre>
            </div>
        </div>
        <p class="mt-10">
            There are two main issues in the original code. First, it stores the next item in the temporary variable
            before swapping, which ends up putting the same value in both positions. To fix
            it, we should store the current item instead before doing the swap.

            Second, the function doesn’t return anything. We need to add return $lists; at the end so the sorted array
            can actually be used outside the function.
        </p>

        <h2 class="text-2xl font-bold mt-10 mb-4 text-blue-300">Try It Yourself</h2>

        <form method="POST" id="sortForm" class="mb-8">
            <label for="arrayInput" class="block mb-2 font-semibold text-gray-200">Enter numbers separated by
                commas:</label>
            <input type="text" name="arrayInput" id="arrayInput" placeholder="e.g., 5,3,8,1,2"
                class="w-full p-2 border border-gray-600 rounded mb-4 bg-gray-800 text-white placeholder-gray-400"
                required>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">
                Sort Array
            </button>
        </form>


        <?php
        function bubbleSortWithSteps($lists)
        {
            $length = count($lists);
            for ($parent = 0; $parent < $length; $parent++) {
                echo "<div class='mb-2 text-gray-400'><strong>Pass " . ($parent + 1) . ":</strong></div>";
                $swapped = false;

                for ($child = 0; $child < $length - $parent - 1; $child++) {
                    echo "<div class='ml-4'>Comparing {$lists[$child]} and {$lists[$child + 1]}";

                    if ($lists[$child] > $lists[$child + 1]) {
                        $temp = $lists[$child];
                        $lists[$child] = $lists[$child + 1];
                        $lists[$child + 1] = $temp;
                        $swapped = true;
                        echo " → swapped → [" . implode(", ", $lists) . "]</div>";
                    } else {
                        echo " → no change</div>";
                    }
                }

                if (!$swapped) {
                    echo "<div class='ml-4 text-gray-600'>No swaps needed, array is sorted early.</div>";
                    break;
                }

                echo "<div class='ml-4 text-white'>Array after Pass " . ($parent + 1) . ": [" . implode(", ", $lists) . "]</div><br>";
            }

            echo "<div class='mt-4 text-white'><strong>Final Sorted Array:</strong> [" . implode(", ", $lists) . "]</div>";
        }

        if (isset($_GET['array'])) {
            $input = trim($_GET['array']);
            $array = array_filter(array_map('trim', explode(",", $input)), fn($val) => is_numeric($val));
            $array = array_map('intval', $array);

            if (empty($array)) {
                echo "<div class='text-red-600 font-semibold'>Invalid input. Please enter numbers separated by commas.</div>";
            } else {
                echo "<h3 class='text-xl font-bold mb-2'>Sorting the array: <code class='px-1 rounded'>" . implode(", ", $array) . "</code></h3>";
                echo "<div class='bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6 text-gray-600 rounded-lg font-mono text-sm'>";
                bubbleSortWithSteps($array);
                echo "</div>";
            }
        }
        ?>
    </div>


    <script>
        if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            if (window.location.search.includes('array=')) {
                window.location.href = window.location.pathname;
            }
        }
    </script>

</body>

</html>
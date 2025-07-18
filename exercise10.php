<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bubble Sort Explanation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-8">

    <h1 class="text-3xl font-bold mb-4 text-blue-900">Bubble Sort Explanation</h1>

    <p class="mb-6">
        This page compares the incorrect and corrected versions of a PHP <code
            class="bg-gray-200 px-1 rounded">bubbleSort()</code> function.
        The left column shows the buggy code, while the right column displays the correct implementation.
    </p>

    <div class="flex flex-col lg:flex-row gap-6">
        <!-- ❌ Wrong Code -->
        <div class="bg-red-100 border border-red-300 rounded-lg p-4 flex-1 overflow-auto">
            <div class="text-red-600 font-semibold mb-2">❌ Wrong Code</div>
            <pre class="text-sm whitespace-pre-wrap">
<code>
function bubbleSort($lists)
{
    $length = count($lists);
    for ($parent = 0; $parent < $length; $parent++) {
        for ($child = 0; $child < $length - $parent - 1; $child++) {
            if ($lists[$child] > $lists[$child + 1]) {
                $temp = $lists[$child + 1];
                $lists[$child] = $lists[$child + 1];
                $lists[$child + 1] = $temp;
            }
        }
    }
    // No return statement!
}
</code>
            </pre>
        </div>

        <!-- ✅ Correct Code -->
        <div class="bg-green-100 border border-green-300 rounded-lg p-4 flex-1 overflow-auto">
            <div class="text-green-600 font-semibold mb-2">✅ Correct Code</div>
            <pre class="text-sm whitespace-pre-wrap">
<code>
function bubbleSort($lists)
{
    $length = count($lists);
    for ($parent = 0; $parent < $length; $parent++) {
        for ($child = 0; $child < $length - $parent - 1; $child++) {
            if ($lists[$child] > $lists[$child + 1]) {
                $temp = $lists[$child];
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

    <h2 class="text-2xl font-bold mt-10 mb-4 text-blue-800">🧪 Try It Yourself</h2>

    <!-- Input Form -->
    <form method="POST" id="sortForm" class="mb-8">
        <label for="arrayInput" class="block mb-2 font-semibold">Enter numbers separated by commas:</label>
        <input type="text" name="arrayInput" id="arrayInput" placeholder="e.g., 5,3,8,1,2"
            class="w-full p-2 border border-gray-300 rounded mb-4" required>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">Sort
            Array</button>
    </form>

    <?php
    // Redirect after POST (PRG Pattern)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['arrayInput'])) {
        $input = urlencode(trim($_POST['arrayInput']));
        header("Location: " . $_SERVER['PHP_SELF'] . "?array=$input");
        exit();
    }

    // Bubble sort with steps
    function bubbleSortWithSteps($lists)
    {
        $length = count($lists);
        for ($parent = 0; $parent < $length; $parent++) {
            echo "<div class='mb-2'><strong>Pass " . ($parent + 1) . ":</strong></div>";
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
                echo "<div class='ml-4 text-green-800'>No swaps needed, array is sorted early.</div>";
                break;
            }

            echo "<div class='ml-4 text-blue-800'>Array after Pass " . ($parent + 1) . ": [" . implode(", ", $lists) . "]</div><br>";
        }

        echo "<div class='mt-4'><strong>✅ Final Sorted Array:</strong> [" . implode(", ", $lists) . "]</div>";
    }

    // Handle redirected GET display
    if (isset($_GET['array'])) {
        $input = trim($_GET['array']);
        $array = array_filter(array_map('trim', explode(",", $input)), fn($val) => is_numeric($val));
        $array = array_map('intval', $array);

        if (empty($array)) {
            echo "<div class='text-red-600 font-semibold'>❗ Invalid input. Please enter numbers separated by commas.</div>";
        } else {
            echo "<h3 class='text-xl font-bold mb-2'>Sorting the array: <code class='bg-gray-200 px-1 rounded'>" . implode(", ", $array) . "</code></h3>";
            echo "<div class='bg-green-200 text-green-900 rounded-lg p-4 font-mono text-sm'>";
            bubbleSortWithSteps($array);
            echo "</div>";
        }
    }
    ?>
    <div class="mt-6">
        <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
    </div>

    <script>
        // On refresh, clear query parameters
        if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            if (window.location.search.includes('array=')) {
                window.location.href = window.location.pathname;
            }
        }
    </script>
</body>

</html>
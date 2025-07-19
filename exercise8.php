<?php
session_start();

if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = [];
    $_SESSION['front'] = 0;
    $_SESSION['rear'] = -1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['push'])) {
        $value = intval($_POST['value']);
        $_SESSION['rear']++;
        $_SESSION['queue'][$_SESSION['rear']] = $value;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['pop']) && $_SESSION['rear'] >= $_SESSION['front']) {
        unset($_SESSION['queue'][$_SESSION['front']]);
        $_SESSION['front']++;
        if ($_SESSION['front'] > $_SESSION['rear']) {
            $_SESSION['queue'] = [];
            $_SESSION['front'] = 0;
            $_SESSION['rear'] = -1;
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['reset'])) {
        $_SESSION['queue'] = [];
        $_SESSION['front'] = 0;
        $_SESSION['rear'] = -1;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander Guevarra | Task 8</title>
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
            <h1 class="text-2xl sm:text-3xl font-bold">Task 8</h1>
            <h2 class="text-sm sm:text-base text-gray-400">
                Create a queue of integers using arrays (first in first out )
                <ul class="list-disc list-inside">
                    <li>
                        Create input fields and push a button to insert a new value
                    </li>
                    <li>
                        Create a pop button to remove the old value
                    </li>
                    <li>
                        Always display the existing queue content
                    </li>
                    <li>
                        Do not use pre-defined PHP array function like array_pop
                    </li>
                </ul>
            </h2>
        </div>
        <div class="bg-transparent border-2 border-[#30363d] rounded-2xl px-4 sm:px-6 py-6">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-base sm:text-lg font-bold">Queue of Integers (FIFO)</h1>
                <div class="w-3 h-3 rounded-full bg-[#FA3ABF] glow-pink"></div>
            </div>

            <form method="POST" class="flex gap-2 mb-4">
                <input id="value" name="value" type="number" inputmode="numeric" pattern="[0-9]*" required
                    class="border p-2 rounded w-full text-black" placeholder="Enter value to enqueue">
                <button type="submit" name="push"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enqueue</button>
            </form>

            <form method="POST" class="flex gap-2 mb-4">
                <button type="submit" name="pop"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Dequeue</button>
                <button type="submit" name="reset"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Reset</button>
            </form>

            <div>
                <h2 class="text-lg font-semibold mb-2">Queue Content:</h2>
                <ul class="border rounded p-3 space-y-1 bg-gray-50">
                    <?php
                    if (!isset($_SESSION['queue']) || $_SESSION['rear'] < $_SESSION['front']) {
                        echo "<li class='text-gray-500'>Queue is empty.</li>";
                    } else {
                        for ($i = $_SESSION['front']; $i <= $_SESSION['rear']; $i++) {
                            echo "<li class='text-black'>Index $i: <strong>{$_SESSION['queue'][$i]}</strong></li>";
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>
<?php
session_start();

// Initialize queue
if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = [];
    $_SESSION['front'] = 0;
    $_SESSION['rear'] = -1;
}

// Handle enqueue
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['push'])) {
        $value = intval($_POST['value']);
        $_SESSION['rear']++;
        $_SESSION['queue'][$_SESSION['rear']] = $value;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Handle dequeue
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

    // Handle reset
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
    <title>PHP Queue (FIFO)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Queue of Integers (FIFO)</h1>

        <form method="POST" class="flex gap-2 mb-4">
            <input type="number" name="value" required class="border p-2 rounded w-full"
                placeholder="Enter value to enqueue">
            <button name="push" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enqueue</button>
        </form>

        <form method="POST" class="flex gap-2 mb-4">
            <button name="pop" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Dequeue</button>
            <button name="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Reset</button>
        </form>

        <div>
            <h2 class="text-lg font-semibold mb-2">Queue Content:</h2>
            <ul class="border rounded p-3 space-y-1 bg-gray-50">
                <?php
                if ($_SESSION['rear'] < $_SESSION['front']) {
                    echo "<li class='text-gray-500'>Queue is empty.</li>";
                } else {
                    for ($i = $_SESSION['front']; $i <= $_SESSION['rear']; $i++) {
                        echo "<li>Index $i: <strong>{$_SESSION['queue'][$i]}</strong></li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class="mt-6">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>

</html>
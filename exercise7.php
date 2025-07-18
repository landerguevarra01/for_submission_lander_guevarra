<?php
session_start();

// Initialize stack
if (!isset($_SESSION['stack'])) {
    $_SESSION['stack'] = [];
    $_SESSION['top'] = -1;
}

// Handle push
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['push'])) {
        $value = intval($_POST['value']);
        $_SESSION['top']++;
        $_SESSION['stack'][$_SESSION['top']] = $value;
    }

    // Handle pop
    if (isset($_POST['pop']) && $_SESSION['top'] >= 0) {
        unset($_SESSION['stack'][$_SESSION['top']]);
        $_SESSION['top']--;
    }

    // Handle reset
    if (isset($_POST['reset'])) {
        $_SESSION['stack'] = [];
        $_SESSION['top'] = -1;
    }

    // Redirect to avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task 1 - Stack Implementation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 p-6">
    <div class="max-w-xl mx-auto">

        <h1 class="text-2xl font-bold mb-4">PHP Stack (First In Last Out)</h1>

        <form method="POST" class="flex gap-2 mb-4">
            <input name="value" type="number" required class="border p-2 rounded w-full"
                placeholder="Enter value to push">
            <button name="push" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Push</button>
        </form>

        <form method="POST" class="flex gap-2 mb-4">
            <button name="pop" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Pop</button>
            <button name="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Reset</button>
        </form>

        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">Stack Content:</h2>
            <ul class="border rounded p-3 space-y-1 bg-gray-50">
                <?php
                if ($_SESSION['top'] < 0) {
                    echo "<li class='text-gray-500'>Stack is empty.</li>";
                } else {
                    for ($i = $_SESSION['top']; $i >= 0; $i--) {
                        echo "<li>Index $i: <strong>{$_SESSION['stack'][$i]}</strong></li>";
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
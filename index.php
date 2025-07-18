<?php
$tasks = [
  "exercise1.php" => "Task 1: Infinite loop pattern",
  "exercise2.php" => "Task 2: X pattern",
  "exercise3.php" => "Task 3: Pyramid pattern",
  "exercise4.php" => "Task 4: Exponent pattern table",
  "exercise5.php" => "Task 5: A - K even highlights",
  "exercise6.php" => "Task 6: Row and column totals",
  "exercise7.php" => "Task 7: FILO",
  "exercise8.php" => "Task 8: FIFO",
  "exercise9.php" => "Task 9: POST method",
  "exercise10.php" => "Task 10: Code explanation",
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo "Lander Guevarra"; ?>
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 p-6">
  <div class="max-w-3xl mx-auto">
    <h1 class="text-4xl font-bold text-center mb-6">
      <?php echo "Lander Guevarra"; ?>
    </h1>
    <h2 class="text-2xl mb-4">Table of Contents</h2>
    <ul class="list-disc list-inside space-y-2">
      <?php foreach ($tasks as $href => $title): ?>
        <li>
          <a href="<?php echo $href; ?>" class="text-blue-600 hover:underline">
            <?php echo $title; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>

</html>
<?php
$tasks = [
  "exercise1.php" => [
    "title" => "Orbitals: A Pattern of Perpetuity",
    "subtitle" => "A vertical loop infinity star shape",
    "note" => "TASK 1"
  ],
  "exercise2.php" => [
    "title" => "Axis of Echoes",
    "subtitle" => "Reflected X Pattern",
    "note" => "TASK 2"
  ],
  "exercise3.php" => [
    "title" => "Multiplicative Cascade",
    "subtitle" => "Symmetrical triangle of multiplication values",
    "note" => "TASK 3"
  ],
  "exercise4.php" => [
    "title" => "Progressive Cascade",
    "subtitle" => "Geometric sequences with varying row ratios.",
    "note" => "TASK 4"
  ],
  "exercise5.php" => [
    "title" => "Alphabet Mosaic",
    "subtitle" => "A randomized grid of characters with highlighted vowels and cases",
    "note" => "TASK 5"
  ],
  "exercise6.php" => [
    "title" => "Unique Number Grid with Totals",
    "subtitle" => "A 4×4 matrix of non-repeating random numbers with calculated row and column sums",
    "note" => "TASK 6"
  ],
  "exercise7.php" => [
    "title" => "FILO",
    "subtitle" => "Stack logic: First In, Last Out",
    "note" => "TASK 7"
  ],
  "exercise8.php" => [
    "title" => "FIFO",
    "subtitle" => "Queue logic: First In, First Out",
    "note" => "TASK 8"
  ],
  "exercise9.php" => [
    "title" => "POST method",
    "subtitle" => "Demonstration of handling form data",
    "note" => "TASK 9"
  ],
  "exercise10.php" => [
    "title" => "TASK 10: Code explanation",
    "subtitle" => "Visual and written walkthrough",
    "note" => "TASK 10"
  ],
];

$bgColors = ['#E7C73B', '#FA3ABF', '#AEFA62', '#4993E2', '#E44756', '#7069F6'];
$glowClasses = ['glow-yellow', 'glow-pink', 'glow-green', 'glow-blue', 'glow-red', 'glow-purple'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lander Guevarra</title>
  <link rel="icon" href="assets/LNDR%20LOGO@4x-8%201.png" type="image/png">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="text-center mb-12 space-y-2">
      <h1 class="text-3xl sm:text-4xl font-bold">Task Documentation</h1>
      <h2 class="text-md sm:text-lg text-gray-400">A compilation of PHP exercises</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php
      $i = 0;
      foreach ($tasks as $href => $data):
        $bgColor = $bgColors[$i % count($bgColors)];
        $glowClass = $glowClasses[$i % count($glowClasses)];
        $i++;
        ?>
        <a href="<?= $href ?>" class="hover:no-underline">
          <div
            class="bg-[#0f1115] border-2 border-[#30363d] rounded-2xl px-6 py-6 hover:scale-[102%] hover:shadow-[0_0_8px_#30363d] transition duration-300 ease-in-out space-y-4 h-full flex flex-col justify-between">

            <div class="flex items-center gap-3">
              <div class="w-3 h-3 rounded-full <?= $glowClass ?> bg-[<?= $bgColor ?>]"></div>
              <p class="text-sm font-semibold text-gray-400"><?= $data['note'] ?></p>
            </div>

            <div>
              <h2 class="text-lg sm:text-xl font-semibold text-gray-100"><?= $data['title'] ?></h2>
              <p class="text-sm sm:text-base text-gray-400"><?= $data['subtitle'] ?></p>
            </div>

            <div class="flex justify-end mt-4">
              <img src="assets/LNDR LOGO@4x-8 1.png" alt="Logo" class="w-6 sm:w-8 h-auto" />
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>
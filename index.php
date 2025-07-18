<?php
$tasks = [
  "exercise1.php" => [
    "title" => "Orbitals: A Pattern of Perpetuity",
    "subtitle" => "A vertical looping infinity star shape",
    "note" => "TASK 1"
  ],
  "exercise2.php" => [
    "title" => "TASK 2: X pattern",
    "subtitle" => "Cross-shaped output using stars",
    "note" => "TASK 2"
  ],
  "exercise3.php" => [
    "title" => "TASK 3: Pyramid pattern",
    "subtitle" => "A classic pyramid made with loops",
    "note" => "TASK 3"
  ],
  "exercise4.php" => [
    "title" => "TASK 4: Exponent pattern table",
    "subtitle" => "Rows of numbers with exponential growth",
    "note" => "TASK 4"
  ],
  "exercise5.php" => [
    "title" => "TASK 5: A - K even highlights",
    "subtitle" => "Alphabet matrix with even columns highlighted",
    "note" => "TASK 5"
  ],
  "exercise6.php" => [
    "title" => "TASK 6: Row and column totals",
    "subtitle" => "Tabular data with total sums",
    "note" => "TASK 6"
  ],
  "exercise7.php" => [
    "title" => "TASK 7: FILO",
    "subtitle" => "Stack logic: First In, Last Out",
    "note" => "TASK 7"
  ],
  "exercise8.php" => [
    "title" => "TASK 8: FIFO",
    "subtitle" => "Queue logic: First In, First Out",
    "note" => "TASK 8"
  ],
  "exercise9.php" => [
    "title" => "TASK 9: POST method",
    "subtitle" => "Demonstration of handling form data",
    "note" => "TASK 9"
  ],
  "exercise10.php" => [
    "title" => "TASK 10: Code explanation",
    "subtitle" => "Visual and written walkthrough",
    "note" => "TASK 10"
  ],
];
$bgColors = ['#63431B', '#47102D', '#202F12', '#1A2A45', '#751F30', '#302089'];
$borderColors = ['#E7C73B', '#FA3ABF', '#AEFA62', '#4993E2', '#E44756', '#7069F6'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Lander Guevarra</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6">
  <div class="max-w-3xl mx-auto">
    <div class="space-y-4 mb-4">
      <h1 class="text-[28px] font-bold text-center">Task Documentation</h1>
      <h2 class="text-[14px] text-center text-gray-600">A compilation of PHP exercises</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <?php
      $i = 0;
      foreach ($tasks as $href => $data):
        $bgColor = $bgColors[$i % count($bgColors)];
        $borderColor = $borderColors[$i % count($borderColors)];
        $i++;
        ?>
        <a href="<?= $href ?>" class="hover:no-underline">
          <div style="background-color: #FFFFFF;"
            class="border px-4 py-8 rounded shadow hover:opacity-90 transition space-y-4">
            <div class="flex justify-start items-center gap-4">
              <div style="background-color: <?= $bgColor ?>;" class="w-2 h-2 rounded-full"></div>
              <p class="text-[12px] font-semibold">
                <?= $data['note'] ?>
              </p>
            </div>
            <div>
              <h2>
                <?= $data['title'] ?>
              </h2>
              <p class="text-[12px] text-gray-600">
                <?= $data['subtitle'] ?>
              </p>
            </div>
          </div>
        </a>
      <?php endforeach; ?>

    </div>
  </div>
</body>

</html>
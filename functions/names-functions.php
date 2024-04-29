<?php

function load_full_names($fileName) {
  $lineNumber = 0;

  // Load up the array
  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);

  while (!feof($FH)) {
    if ($lineNumber % 2 == 0) {
      $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }

    $lineNumber++;
    $nextName = fgets($FH);
  }
  return $fullNames;
}

function load_first_names($fullNames) {
  // Get all first names
  foreach ($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function load_valid_first_names($firstNames)
{
  // Get valid last names
  for ($i = 0; $i < sizeof($firstNames); $i++) {
    if (ctype_alpha($firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
    }
  }
  return $validFirstNames;
}

function load_last_names($fullNames) {
  // Get all last names
  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}

function load_valid_last_names($lastNames) {
  // Get valid last names
  for ($i = 0; $i < sizeof($lastNames); $i++) {
    if (ctype_alpha($lastNames[$i])) {
      $validLastNames[$i] = $lastNames[$i];
    }
  }
  return $validLastNames;
}

function load_valid_names($fullNames, $firstNames, $lastNames) {
  // Get valid names
  for ($i = 0; $i < sizeof($fullNames); $i++) {
    // jam the first and last name toghether without a comma, then test for alpha-only characters
    if (ctype_alpha($lastNames[$i] . $firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
      $validLastNames[$i] = $lastNames[$i];
      $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
  }
  return $validFullNames;
}

function common_names($array) {
  $nameCounts = array_count_values($array);
  $maxCount = max($nameCounts);

  $mostCommonNames = array_keys($nameCounts, $maxCount);
  $mostCommonName = $mostCommonNames[0];

  return $mostCommonName;
}

function max_occurrences($array) {
  $nameCounts = array_count_values($array);

  foreach($nameCounts AS $nameCount) {
    $highestCounts[] = $nameCount;
  }
  $highestCount = max($highestCounts);
  return $highestCount;
}

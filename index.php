<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names-short-list.txt';
$fullNames = load_full_names($fileName);

$firstNames = load_first_names($fullNames);
$validFirstNames = load_valid_first_names($firstNames);
$lastNames = load_last_names($fullNames);
$validLastNames = load_valid_last_names($lastNames);
$validFullNames = load_valid_names($fullNames, $firstNames, $lastNames);

$uniqueValidNames = (array_unique($validFullNames));
$uniqueValidLastNames = (array_unique($validLastNames));
$uniqueValidFirstNames = (array_unique($validFirstNames));

$mostCommonLastName = common_names($lastNames);
$lastNameOccurrences = max_occurrences($lastNames);

$mostCommonFirstName = common_names($firstNames);
$firstNameOccurrences = max_occurrences($firstNames);

// $findMe = ',';
// echo $fullNames[0] . '<br>';
// echo strpos($fullNames[0], $findMe) . '<br>';
// echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
// exit();

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Full Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique full names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidLastNames) . " Unique last names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidLastNames as $uniqueValidLastNames) {
        echo "<li>$uniqueValidLastNames</li>";
    }
echo "</ul>";

echo '<h2>Unique First Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidFirstNames) . " Unique first names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidFirstNames as $uniqueValidFirstNames) {
        echo "<li>$uniqueValidFirstNames</li>";
    }
echo "</ul>";

echo '<h2>Most Common Last Names</h2>';
echo ("<p>The most common last name in this file is $mostCommonLastName.</p>");
echo ("<p>It appears $lastNameOccurrences time(s).</p>");

echo '<h2>Most Common First Names</h2>';
echo ("<p>The most common first name in this file is $mostCommonFirstName.</p>");
echo ("<p>It appears $firstNameOccurrences time(s).</p>");
?>

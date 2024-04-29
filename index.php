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
echo '<body style="background: linear-gradient(to bottom, #aaaaaa 0%,#333333 100%);margin: 0">';
echo '<section style="background-color: #000; max-width: 85%; margin: 0 auto; padding: 2rem 0">';
echo '<h1 style="color: #fff; font-size: 4rem; text-align:center; text-decoration: underline">Names - Results</h1>';

echo '<section style="color: #fff; display: flex; gap: 4rem; justify-content: center">';
echo '<section>';
echo '<h2 style="text-decoration: underline">All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";
echo '</section>';

echo '<section>';
echo '<h2 style="text-decoration: underline">All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";
echo '</section>';
echo '</section>';

echo '<section style="color: #fff; display: flex; gap: 4rem; justify-content: center">';
echo '<section>';
echo '<h2 style="text-decoration: underline">Unique Full Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique full names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidName) {
        echo "<li>$uniqueValidName</li>";
    }
echo "</ul>";
echo '</section>';

echo '<section>';
echo '<h2 style="text-decoration: underline">Unique Last Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidLastNames) . " Unique last names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidLastNames as $uniqueValidLastName) {
        echo "<li>$uniqueValidLastName</li>";
    }
echo "</ul>";
echo '</section>';

echo '<section>';
echo '<h2 style="text-decoration: underline">Unique First Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidFirstNames) . " Unique first names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidFirstNames as $uniqueValidFirstName) {
        echo "<li>$uniqueValidFirstName</li>";
    }
echo "</ul>";
echo '</section>';
echo '</section>';

echo '<section style="color: #fff; display: flex; gap: 4rem; justify-content: center">';
echo '<section>';
echo '<h2 style="text-decoration: underline">Most Common Last Names</h2>';
echo ("<p>The most common last name in this file is $mostCommonLastName.</p>");
echo ("<p>It appears $lastNameOccurrences time(s).</p>");
echo '</section>';

echo '<section>';
echo '<h2 style="text-decoration: underline">Most Common First Names</h2>';
echo ("<p>The most common first name in this file is $mostCommonFirstName.</p>");
echo ("<p>It appears $firstNameOccurrences time(s).</p>");
echo '</section>';
echo '</section>';
echo '</section>';
echo '</body>';
?>

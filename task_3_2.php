<!DOCTYPE html>
<html>
<head>
    <title>CSV to HTML Table</title>
</head>
<body>

<h2>CSV Data as HTML Table</h2>

<?php
$csvFile = 'user.csv';

if (($handle = fopen($csvFile, 'r')) !== false) {
    echo '<table border="1">';
    
    while (($row = fgetcsv($handle)) !== false) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    
    fclose($handle);
    
    echo '</table>';
} else {
    echo 'CSV file not found.';
}
?>

</body>
</html>

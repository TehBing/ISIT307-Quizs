<!DOCTYPE html>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="zyStyle.css">
<html>
<body>

<!-- Create Data Variables -->
<?php 
 $Leaderboard_array = array(
    "Tommy" => "90",
    "Jim Hank" => "19",
    "Mao Zhe Dong" => "30",
    "Mary Zhang" => "76",
    "Arabella Mulan" => "45",
 );
?>

<!-- Leaderboard -->
<div class="leader-f-col">
<h1>Leaderboard</h1>

<!-- Sorting Button -->
<form action="" method="post">
<div class="leader-f-row">
 <input type="submit" name="sort_by_name" value="Sort by Name" class="result-button">
 <input type="submit" name="sort_by_score" value="Sort by Score"
 class="result-button">
</div>
</form>

<?php
 if (isset($_POST['sort_by_name'])) {
    asort($Leaderboard_array);
 }
 else if (isset($_POST['sort_by_score'])) {
    rsort($Leaderboard_array);
 }
?>

<!-- Score Table -->
<table class="leader-table">
 <tr>
    <th class="leader-th">Name</th>
    <th class="leader-th">Score</th>
 </tr>

<?php foreach ($Leaderboard_array as $name => $score){
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$score</td>";
    echo "</tr>";
}
?>
</table>

</div>

</body>
</html>
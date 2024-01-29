<?php 
// Start the session
session_start();
session_destroy();
include 'global.php';
$Leaderboard_array = array();
$Leaderboard_array = getAllRecord();

// function sortTablebyName($Leaderboard_array) {
//     // Sort by name
//     uasort($Leaderboard_array, function($a, $b) {
//         return strcmp($a["name"], $b["name"]);
//     });
//         return $Leaderboard_array;
// }

// function sortTablebyScore($Leaderboard_array){
//     // Sort by score
//     uasort($Leaderboard_array, function($a, $b) {
//         return $a["score"] <=> $b["score"];
//     });

//     return $Leaderboard_array;
// }

if (isset($_POST['sort_by_name'])) {
    asort($Leaderboard_array);
}
 else if (isset($_POST['sort_by_score'])) {
    rsort($Leaderboard_array);
}

//Function destorySession
function unsetSession() {
   unset($_SESSION['_nickname']);
}

//Call storeSession
if (isset($_POST['_quit'])) {
    unsetSession();
}
?>

<!DOCTYPE html>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="zyStyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">
<html>
<body>


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

<!-- Score Table -->
<div>
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


<div id="options">
		<a href="index.php"><button id="quit" class="result-button" name="_quit">Home</button></a>
</div>

</div>


</body>
</html>
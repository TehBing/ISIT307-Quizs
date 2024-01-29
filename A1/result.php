<?php
// Start the session
session_start();
include 'global.php';
$totalScore = getTotalScore($_SESSION['_nickname']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
    $answer3 = $_POST["answer3"];

    header("Location: result.php");
    exit();
}
?>

<!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="zyStyle.css">
	<link rel="stylesheet" type="text/css" href="style.css">
<html>
<head>
	<title>Result page</title>

</head>
<body>
	<div class="result-f-col">
		<h2><?php echo $_SESSION['_nickname'] . ' current score is: ' .$_SESSION['_score'];?></h2>

    <h2><?php echo $_SESSION['_nickname'] . ' total score is: ' .$totalScore; ?></h2>


    <div id="options" class="result-f-row">
		<button id="retry" class="result-button">Retry</button>
		<a href="exitpage.php"><button id="quit" class="result-button">Quit</button></a>
    	<a href="leaderboard.php"><button id="quit" class="result-button">Leaderboard</button></a>
	  </div>
	
		
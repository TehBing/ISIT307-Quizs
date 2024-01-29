<?php
// Start the session
session_start();
include 'global.php';
setSessionScore();

//Button click
if (isset($_POST['_submit'])) {
    recordScore($_SESSION['_nickname'], $_SESSION['_score']);
    header("Location: result.php");
}

// Function to load quiz questions
function loadquiz($filename) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        // Handle the case where the file couldn't be loaded
        die('Error loading questions file.');
    }

    $questions = [];

    foreach ($lines as $line) {
        // explode the line into 2 parts. array pad ensures that there are 2 elements inside
        list($question, $answer) = array_pad(explode('|', $line, 2), 2, null);

        $questions[] = [
            'question' => filter_var(trim($question), FILTER_SANITIZE_STRING),
            'answer' => filter_var(trim($answer), FILTER_SANITIZE_STRING),
        ];
    }

    return $questions;
}
    // Load countries questions
    $countriesquestiontextfile = 'countries.txt';
    $countriesquiz = loadquiz($countriesquestiontextfile); //use the function to load the txt file
    shuffle($countriesquiz); //randomly arrange the questions
    $givencountriesquestions = array_slice($countriesquiz, 0, 3); //select first 3 elements from the shuffled array
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries Quiz Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Welcome to the Countries quiz! Choose the correct answer with either True or False!</h2>

    <form action="result.php" method="post"> 
    <?php // Loop through each question and answer pair in the given array ?>
    <?php foreach ($givencountriesquestions as $index => $qna): ?> 
        <div class="question-container">
            <label for="question<?= $index + 1; ?>"><?= $qna['question']; ?></label>
            <select name="question<?= $index + 1; ?>" required>
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>
    <?php endforeach; ?>

        <a href="index.php" class="index-link">Go back to Home Page</a>
        <a href="leaderboard.php" class="index-link">Go to leaderboard page!</a>
        <a href="result.php" class="index-link">Go to result page!</a>

        <button type="submit" class="submit-button" name="_submit">Submit Answers!</button>
    </form>
</body>
</html>

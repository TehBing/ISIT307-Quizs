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
        // explode the line into 3 parts. array pad ensures that there are 3 elements inside
        list($imagesource, $question, $answer) = array_pad(explode('|', $line, 3), 3, null);

        // set empty string if imageurl not around
        $imagesource = isset($imagesource) ? trim($imagesource) : '';

        $questions[] = [
            'imagesource' => $imagesource,
            'question' => filter_var($question, FILTER_SANITIZE_STRING), 
            'answer' => filter_var($answer, FILTER_SANITIZE_STRING), 
        ];
    }

    return $questions;
}

    // Load music questions
    $musicquestiontextfile = 'music.txt';
    $musicquiz = loadquiz($musicquestiontextfile); //use the function to load the txt file
    shuffle($musicquiz); //randomly arrange the questions
    $givenmusicquestions = array_slice($musicquiz, 0, 3); //select first 3 elements from the shuffled array
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Music Quiz Page</title>
</head>
<body>
    <h2>Welcome to the Music Quiz Page!</h2>

    <form method="post">
        <?php foreach ($givenmusicquestions as $questionindex => $question) { ?>
            <div class="question-container">
                <?php
                $imagesource = 'band/' . basename($question['imagesource']); //source path of the image
                echo '<img src="' . $imagesource . '" alt="Music Pic ' . ($questionindex + 1) . '">';
                echo "<label for='answer$questionindex'>Guess the band!:</label>"; //question for user to view
                echo "<input type='text' name='answers[$questionindex]' required>"; // a space for user to key in their required answer
                ?>
            </div>
        <?php } ?>
    </form> 
    <button type="submit" class="submit-button" name="_submit">Submit Answers!</button>
    <a href="index.php" class="questionindex-link">Go back to Home Page</a>

   
</body>
</html>


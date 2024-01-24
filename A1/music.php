<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectedTopic = $_POST["submit"];

    switch ($selectedTopic) {
        case "Music":
            header("Location: music.php"); 
            exit();
            break;
        case "Countries":
            header("Location: countries.php"); 
            exit();
            break;
    }
}
?>

<p><?php echo "Today's date and time is: " . date("F j, Y g:i a"); ?></p>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Quiz Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Welcome to the Music quiz! Fill in the blanks of the given band!</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="question-container">
            <img src="band/oasis.jpeg" alt="Artist 1">
            <label for="answer1">Enter the name of the artist/band:</label>
            <input type="text" name="answer1" required>
    </div>

    <div class="question-container">
            <img src="band/thesmiths.jpeg" alt="Artist 2">
            <label for="answer2">Enter the name of the artist/band:</label>
            <input type="text" name="answer2" required>
    </div>

    <div class="question-container">
            <img src="band/The-Beatles.jpg" alt="Artist 3">
            <label for="answer3">Enter the name of the artist/band:</label>
            <input type="text" name="answer3" required>
    </div>


    <a href="index.php" class="index-link">Go back to Home Page</a>

    <button type="submit" class="submit-button">Submit Answers!</button>
    </form>
</body>
</html>



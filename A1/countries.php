<p><?php echo "Today's date and time is: " . date("F j, Y g:i a"); ?></p>



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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="question-container">
            <label for="question1">There are no mosquitoes in Iceland:</label>
            <select name="question1" required>
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>

        <div class="question-container">
            <label for="question2">The smallest denomination of banknote used in Hong Kong is a 10-dollar bill:</label>
            <select name="question2" required>
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>

        <div class="question-container">
            <label for="question3">There are no McDonald's restaurants in Jamaica:</label>
            <select name="question3" required>
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>

        <a href="index.php" class="index-link">Go back to Home Page</a>

        <button type="submit" class="submit-button">Submit Answers!</button>
    </form>
</body>
</html>
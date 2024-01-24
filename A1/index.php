<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectedTopic = $_POST["topic"];

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="zyStyle.css">
    <title>Index page</title>
</head>
<body>
    <div class="index-f-col ">
        <h1>Welcome to the Quiz App</h1>

         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="index-f-row">
            <label for="nickname">What's Your Name?</label>
            <input type="text" name="nickname" required>
        </div>

        <div class="index-f-row">
            <label for="topic">Choose Your Questions:</label>
            <select class="index-option" name="topic" required>
                <option value="Music">Music</option>
                <option value="Countries">Countries</option>
            </select>
        </div>

        <div class= "index-f-row">
            <button class="index-start" type="submit">Lets begin!</button>
        </div>



    </div>

   

       
    </form>
</body>
</html>

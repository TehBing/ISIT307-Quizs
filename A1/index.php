<?php
// Start the session
session_start();


//Function storeSession
function setSessioName() {
    $nickname = $_POST["_nickname"];
    $_SESSION["_nickname"] = $nickname;
}

//Button click
if (isset($_POST['_begin'])) {
    setSessioName();
    recordName();
}

//Function recordName
function recordName(){
    //Decalre Name
    $nickname = $_POST["_nickname"] .PHP_EOL;

   
    // Check if name exist
    $fileContents = file_get_contents($filename);
    if (strpos($fileContents, $nickname) !== false) {

        //Write file
        $file = fopen($filename, "a");
        fwrite($file, $nickname);
        fclose($file);
    }
    else{
        echo "Name Exist"
    }
}




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
        <h1>Welcome <?php 
            if (isset($_SESSION['_nickname']))
                    if ($_SESSION['_nickname'] != NULL){
                        echo "back ", $_SESSION['_nickname'];
                }

            else 
                echo "";
            ?> 
        to the Quiz App</h1>

         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="index-f-row">
            <label for="_nickname">What's Your Name?</label>
            <input type="text" name="_nickname" required>
        </div>

        <div class="index-f-row">
            <label for="topic">Choose Your Questions:</label>
            <select class="index-option" name="topic" required>
                <option value="Countries">Countries</option>
                <option value="Music">Music</option>
            </select>
        </div>

        <div class= "index-f-row">
            <form action="index.php" method="post">
            <button class="index-start" type="submit" name="_begin">Lets begin!</button>
        </div>

    </div>     
    </form>
</body>
</html>

<?php 

//Function storeSession
//Change submit button 'name' = '_submit'
function setSessionScore() {
    $score = "2";
    $_SESSION["_score"] = $score;
}

function recordScore($nickname, $score) {
    // Declare file path
    $filename = "record.txt";

    // Check if file exists
    if (file_exists($filename)) {
        // Read file contents
        $fileContents = file_get_contents($filename);

        // Extract file by line 
        $newFileContents = "";
        $lines = explode(PHP_EOL, $fileContents);
        foreach ($lines as $line) {
            if (strpos($line, $nickname) !== false) {
                // Replace the line with the updated score
                list($currentname, $currentScore) = explode(":", $line);
                $currentScore += $score;
                // $totalScore =  intval($currentScore) + intval($score);
                $newline = str_replace($line, $currentname . ":" . $currentScore, $line);
            }
            else{
               $newline = str_replace($line, $line, $line);
            }
            $newFileContents .= $newline . PHP_EOL;
        }

        // Open file
        $file = fopen($filename, "w");

        // Check if file is opened successfully
        if ($file) {

            // Append new content
            fwrite($file, $newFileContents);

            // Close file
            fclose($file);

            echo "Score updated successfully.";
        }
    } else {
        echo "File does not exist.";
    }
}

function getTotalScore($nickname) {
// Declare file path
    $filename = "record.txt";
    $totalScore = 0 ;

    // Check if file exists
    if (file_exists($filename)) {
        // Read file contents
        $fileContents = file_get_contents($filename);

        // Extract file by line
        $lines = explode(PHP_EOL, $fileContents);
        foreach ($lines as $line) {
        if (strpos($line, $nickname) !== false) {
            list($currentname, $currentScore) = explode(":", $line);
            $totalScore = $currentScore;
          }
        }
      }
      return $totalScore;
    }

function getAllRecord(){
    $recordArray = array();
    $filename = "record.txt";

    //Get all record
    $fileContents = file_get_contents($filename);
    //Extract file by line 
    $lines = explode(PHP_EOL, $fileContents);
    foreach ($lines as $line) {
      // Check if the line is not empty
      if (!empty($line)) { 
      list($name, $score) = explode(":", $line);
      $recordArray[$name] = $score;
      }
    }
    return $recordArray;
}


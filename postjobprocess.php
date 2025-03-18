<!DOCTYPE html>
<html lang ="en">
<meta name="author" content="Dimitrios Moros 103598757">

<?php
include_once 'taskbar.php'
?>

<body>
    <div class="PostProccess">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = []; // empty array to collect all the errors



    // Validate Position ID
    $positionID = trim($_POST['positionID']); //delete white spaces from the string using 'trim'
    if(empty($positionID)){
        $errors[] = "Postion ID is empty.";
    } elseif (!preg_match("/^ID\d{3}$/", $positionID)) { //check if the string is in the correct format'ID' followed by three digits.
        $errors[]= "Invalid Position ID, Postion ID must be in the format of 'ID' followed by 3 digits.";
    }



    // Validate Title
    $title = trim($_POST['title']);

    if(empty($title)){
        $errors[] = "job Title is empty. ";
    }elseif (strlen($title) > 10) { // strlen checks the strings length, making sure it doesnt exceeds 10 characters.
        echo "Title exceeds the maximum length.";
    }


    // Validate Description

    $description =trim($_POST['description']);
    if(empty($description)){
        $errors[] = "The description is empty. ";   
    }elseif(strlen($description) > 250){
        $errors[] = "The description can only contain a maximum of 250 characters. ";
    }


    // Validate Closing Date
    $closingDate = trim($_POST['closingDate']);
    if(empty($closingDate)){
        $errors[] = "the Closing Date is empty. ";
    }
    else{
        $date = DateTime::createFromFormat('d/m/y', $closingDate);
        if (!$date || $date->format('d/m/y') !== $closingDate) {
            $errors[] =  "Invalid Date format. ";
        }
    } 
    
    
    // Validate Position
    if(empty($_POST['positionType'])){
        $errors[] = "postion type is empty. Please select a type.";
    } else {
        $positionType = $_POST['positionType'];
    }

    // Validate Contract
    if(empty($_POST['contractType'])){
        $errors[] = "Contract type is empty. Please select a type.";
    } else {
        $contractType = $_POST['contractType'];
    }

    // Validate Location
    if(empty($_POST['location'])){
        $errors[] = "location is empty. Please select a location.";
    } else {
        $location = $_POST['location'];
    }

    // Validate Aplication Type
    $applicationTypes = isset($_POST['applicationType']) ? implode(", ", $_POST['applicationType']) : ""; // use implode incase both types are chosen to convert into a single string
    if(empty($applicationTypes)) {
        $errors[] = "Application Type is empty, Please select at least one option.";
    }


    // Error handling
    if (!empty($errors)) {
        echo "<h2>Errors occurred:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='postjobform.php'>Return to Post Job Vacancy page</a>";
        exit(); // Stop further processing if there are errors
    }





    // Check if positions.txt file exists, if not create it
    $directory = "../../data/jobs";
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    $filePath = "$directory/positions.txt";

    // Check for unique Position ID
    if (file_exists($filePath)) {
        $fileContent = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($fileContent as $line) {
            list($existingPositionID) = explode("\t", $line);
            if ($existingPositionID == $positionID) {
                echo "<br><br>Position ID already exists.<br> <a href='postjobform.php'>Return to Post Job Vacancy page</a>";
                exit();
            }
        }
    }

    // Save job posting to file
    $newRecord = "$positionID\t$title\t$description\t$closingDate\t$positionType\t$contractType\t$location\t$applicationTypes\n";
    file_put_contents($filePath, $newRecord, FILE_APPEND);

    // Confirmation message
    echo "<br><br>Job vacancy has been successfully posted.<br> <a href='index.php'>Return to Home Page</a>";
}
?>
</div>
</body>
</html>
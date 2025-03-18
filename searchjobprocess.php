<!DOCTYPE html>
<html lang="en">
<meta name="author" content="Dimitrios Moros 103598757">
<?php
include_once 'taskbar.php';
?>
<br>
<br>
<br>

<body>
<div class="searchProcess">
<?php
// File path for the stored jobs
$directory = '../../data/jobs/positions.txt';


if (!file_exists($directory)) { //if no jobs found in txt, promote to go to home page
    echo "No jobs have been listed.";
    echo "<a href='index.php'>Return to Home Page</a><br>";
    echo "<a href='searchjobform.php'>Return to Search</a>";
    exit();
}

//read file
$results = file($directory, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Search options from form
$searchTitle = isset($_POST['title']) ? trim($_POST['title']) : '';
$searchPosition = isset($_POST['positionType']) ? trim($_POST['positionType']) : '';
$searchContract = isset($_POST['contractType']) ? trim($_POST['contractType']) : '';
$searchApplicationType = isset($_POST['applicationType']) ? $_POST['applicationType'] : []; //if nothing was submitted, assign empty array
$searchLocation = isset($_POST['location']) ? trim($_POST['location']) : '';

// check if no input
$noOption = empty($searchTitle) && empty($searchPosition) && empty($searchContract) && empty($searchLocation) && empty($searchApplicationType);

// Display matching jobs
$resultsFound = false;

foreach ($results as $jobs) {

    $data = explode("\t", $jobs);
    
    $positionID = $data[0];
    $title = $data[1];
    $description = $data[2];
    $closingDate = $data[3];
    $positionType = $data[4];
    $contractType = $data[5];
    $location = $data[6];
    $applicationTypes = explode(", ", $data[7]);    

    
    $match = true; //set true by default

    // Check Title
    if (!empty($searchTitle) && stripos($title, $searchTitle) === false) { 
        $match = false;
    }

    // Check Position, check as a match if its only as the same as the users input
    if (!empty($searchPosition) && $positionType !== $searchPosition) { 
        $match = false;
    }

    // Check Contract,check as a match if its only as the same as the users input
    if (!empty($searchContract) && $contractType !== $searchContract) { 
        $match = false;
    }

    // Check Location, check as a match if its only as the same as the users input
    if (!empty($searchLocation) && $location !== $searchLocation) {
        $match = false;
    }

    // Check Application Type
    if (!empty($searchApplicationType) && !array_intersect($searchApplicationType, $applicationTypes)) {
        $match = false;
    }

    // diplay jobs
    if ($match || $noOption) { //display if no or some options are chosen
        $resultsFound = true;
        echo "<h3>Job Title: $title</h3>";
        echo "<p><strong>Position ID:</strong> $positionID</p>";
        echo "<p><strong>Description:</strong> $description</p>";
        echo "<p><strong>Closing Date:</strong> $closingDate</p>";
        echo "<p><strong>Position Type:</strong> $positionType</p>";
        echo "<p><strong>Contract Type:</strong> $contractType</p>";
        echo "<p><strong>Location:</strong> $location</p>";
        echo "<p><strong>Application Types:</strong> " . implode(", ", $applicationTypes) . "</p>";
        echo "<hr>";
    }
}

// If no results are found, show a message
if (!$resultsFound) {
    echo "<p>No jobs match your search.</p>";
}

// Provide a link to go back to the search form
echo "<a href='index.php'>Return to Home Page</a><br>";
echo "<a href='searchjobform.php'>Return to Search</a>";
?>

</div>
   
</body>
</html>
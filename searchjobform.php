<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Dimitrios Moros 103598757">

    <title>Search Job Vacancy</title>
<?php
include_once 'taskbar.php';
?>
</head>
<body>
    <div class="searchForm">
    <h1>Search Job Vacancies</h1>
    <form action="searchjobprocess.php" method="POST">

        <label for="title">Job Title:</label>
        <input type="text" id="title" name="title"><br><br>

        <label for="positionType">Position Type:</label>
        <input type="radio" id="fullTime" name="positionType" value="Full Time">
        <label for="fullTime">Full Time</label>
        <input type="radio" id="partTime" name="positionType" value="Part Time">
        <label for="partTime">Part Time</label><br><br>

        <label for="contractType">Contract Type:</label>
        <input type="radio" id="ongoing" name="contractType" value="On-going">
        <label for="ongoing">On-going</label>
        <input type="radio" id="fixedTerm" name="contractType" value="Fixed term">
        <label for="fixedTerm">Fixed term</label><br><br>

        <label>Application Type:</label>
        <input type="checkbox" id="post" name="applicationType[]" value="Post">
        <label for="post">Post</label>
        <input type="checkbox" id="email" name="applicationType[]" value="Email">
        <label for="email">Email</label><br><br>
    
        <label for="location">Location:</label>
        <input type="radio" id="onSite" name="location" value="On site">
        <label for="onSite">On site</label>
        <input type="radio" id="remote" name="location" value="Remote">
        <label for="remote">Remote</label><br><br>

        <input type="submit" value="Search">
    </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<meta name="author" content="Dimitrios Moros 103598757">

<?php
include_once 'taskbar.php';
?>
<body>
    <div class="postForm">
    <h1>Post Job Vacancy</h1>
    <form action="postjobprocess.php" method="post">
        <label for="positionID">Position ID:</label>
        <input type="text" id="positionID" name="positionID"><br><br>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" maxlength="10"><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" maxlength="250"></textarea><br><br>

        <label for="closingDate">Closing Date:</label>
        <input type="text" id="closingDate" name="closingDate" value="<?php echo date('d/m/y'); ?>"><br><br>

        <label>Position:</label>
        <input type="radio" id="fullTime" name="positionType" value="Full Time">
        <label for="fullTime">Full Time</label>
        <input type="radio" id="partTime" name="positionType" value="Part Time">
        <label for="partTime">Part Time</label><br><br>

        <label>Contract:</label>
        <input type="radio" id="ongoing" name="contractType" value="On-going">
        <label for="ongoing">On-going</label>
        <input type="radio" id="fixedTerm" name="contractType" value="Fixed term">
        <label for="fixedTerm">Fixed term</label><br><br>

        <label>Location:</label>
        <input type="radio" id="onSite" name="location" value="On site">
        <label for="onSite">On site</label>
        <input type="radio" id="remote" name="location" value="Remote">
        <label for="remote">Remote</label><br><br>

        <label>Accept Application by:</label>
        <input type="checkbox" id="post" name="applicationType[]" value="Post">
        <label for="post">Post</label>
        <input type="checkbox" id="email" name="applicationType[]" value="Email">
        <label for="email">Email</label><br><br>

        <input type="submit" value="Submit">
    </form>

    <a href="index.php">Return to Home Page</a>
    </div>
</body>
</html>

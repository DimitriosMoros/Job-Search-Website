<!DOCTYPE html>
<html lang="en">
<meta name="author" content="Dimitrios Moros 103598757">
<?php
include_once 'taskbar.php'
?>
<body>
<div class="about-body">
    <header>
    <h1 class="about">About Page</h1> 
    </header>

        <section>
            <h1>Requirements</h1>
            <ul>
                <li><strong>PHP Version Installed:</strong> 
                    <?php
                    echo phpversion();
                    ?>
                </li>
                <li><strong>Special Features:</strong>
                    <ul>
                        <p>Added an inclusive file called 'taskbar.php'
                        <br>to save space and time
                        </p>
                        <!-- Add more features as needed -->
                    </ul>
                </li>
            </ul>
        </section>

        <section>
            <h2>Discussion Board Participation</h2>
            <p>
                I had an insue when linking the folder, the program didnt have permision to write
                <br> i firgured it out and posted on a Discussion thread.
                <br>
                </p>
                <img src="style/example2.png" alt="example">
                <br>
                <img src="style/example.png" alt="example2">
        </section>

        <section>
            <h2>Return to Home Page</h2>
            <a href="index.php">Return to Home Page</a>
        </section>

</body>
</div>
</html>
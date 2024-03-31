<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <div class="title-header">
        <h1>Student Resources</h1>
    </div>

    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Share course materials here:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>
    </div>

    <div class="container" id="resourcesList">

        <?php
        $dir = "uploads/";

        // Check if the directory exists and is a directory
        if (is_dir($dir)){
            // Open the directory
            if ($dh = opendir($dir)){
                // Read files from the directory, skipping '.', '..', and hidden files
                echo "School files and course materials:<br>";
                while (($file = readdir($dh)) !== false){
                    if ($file != "." && $file != ".." && !is_dir($dir.$file)) {
                        // Create a link to the file
                        echo "<a href='".$dir.$file."'>" . htmlspecialchars($file) . "</a><br>";
                    }
                }
                // Close the directory handle
                closedir($dh);
            }
        } else {
            echo "<p>No uploaded files found.</p>";
        }
        ?>
    </div>

    <div class="tutorial">
            <h2>CSS Wiki</h2>
            <p>A detailed wiki of all necessary and useful resources and information regarding courses, careers, academics, newsletters related to
                 Computer Science at the University of Windsor.
            </p>
            <br>
            <a href="https://uwindsorcss.github.io/wiki/" target="_blank"><center>Wiki</center></a>
        </div>

        <div class="tutorial">
            <h2>E-Book Resources</h2>
            <p>A useful website highlighting the different catalogs of e-books available to all uwindsor students to access.
            </p>
            <br>
            <a href="https://leddy.uwindsor.ca/e-books" target="_blank"><center>Visit</center></a>
        </div>

        <div class="tutorial">
            <h2>UWindsor Support Page</h2>
            <p>A university portal allowing users to access commonly asked questions, problems, and useful materials for their academics.
            </p>
            <br>
            <a href="https://ask.uwindsor.ca/" target="_blank"><center>Visit</center></a>
        </div>

        <div class="tutorial">
            <h2>UWindsor CSS Discord</h2>
            <p>An official discord server for the University's Computer Science Society where you can talk with other CS students on specific
                courseware, events and more.
            </p>
            <br>
            <a href="https://css.uwindsor.ca/discord" target="_blank"><center>Join!</center></a>
        </div>

</body>
</html>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$target_dir = "uploads/";
$uploadOk = 1;

// Check if a file has been uploaded
if (isset($_FILES["fileToUpload"]) && is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "pdf" && $imageFileType != "ppt" && $imageFileType != "docx" && $imageFileType != "pptx") {
        echo "Sorry, only PDF, PPT, DOCX files are allowed.";
        $uploadOk = 0;
    }

} else {
    echo "No file was uploaded.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<?php
// Verify whether the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate the format of the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("The email format is not valid");
    }

    // Manage file upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Ensure the file is a valid image
    $validExtensions = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $validExtensions)) {
        die("Sorry! Only JPG, JPEG, and PNG files are allowed.");
    }

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "File has been upload successful! :)";
    } else {
        echo "An error while upload the file!";
    }
}
?>
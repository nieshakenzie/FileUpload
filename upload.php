<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $fileType = $_FILES["file"]["type"];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    
    if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
        die("Only JPEG and PNG files are allowed.");
    }
    
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    
    if (move_uploaded_file($_FILES["file"]["recycle"], $targetFile)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}
?>

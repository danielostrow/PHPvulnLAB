<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    exit;
}

// Allow certain file formats
$allowed_formats = array("pdf", "docx", "txt", "php"); // Allow PHP files too
if (!in_array($fileType, $allowed_formats)) {
    echo "Sorry, only PDF, DOCX, TXT, and PHP files are allowed.";
    exit;
}

// Check for errors during file upload
if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
    echo "Sorry, there was an error uploading your file.";
    exit;
}

// Move the uploaded file to the target directory
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Notify the client side using JSON response
    echo json_encode(["success" => true, "message" => "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded."]);
} else {
    echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
}
?>
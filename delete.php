<?php

session_start(); // Start the session


// Define the directory path
$directory = 'uploads/';

$fileToDelete = isset($_POST['fileToDelete']) ? $_POST['fileToDelete'] : '';
// Construct the full path to the file
$filePath = $directory . basename($fileToDelete);

// Check if the file exists and delete it
if (file_exists($filePath)) {
    if (unlink($filePath)) {
        echo '<p>File ' . htmlspecialchars($fileToDelete) . " has been deleted.</p>";
    } else {
        echo "<p class='error'>Sorry, there was an error deleting your file.</p>";
    }
} else {
    echo "<p class='error'>File does not exist.</p>";
}
// Redirect back to the file list
header("Location: index.php");
exit();
?>

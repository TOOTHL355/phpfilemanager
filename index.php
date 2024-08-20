<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #0056b3;
    }

    form {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    input[type="file"] {
        display: inline-block;
        margin-right: 10px;
    }

    input[type="submit"] {
        background-color: #0056b3;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #003f7f;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        background-color: #fff;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    a {
        color: #0056b3;
        text-decoration: none;
        margin-right: 10px;
    }

    a:hover {
        text-decoration: underline;
    }

    .confirm {
        color: #d9534f;
    }
</style>

<body>
    <h1>File Management System</h1>

    <!-- Upload Form -->
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
    </form>


    <h2>Uploaded Files</h2>
    <ul>
        <?php
        $files = scandir('uploads');
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "<li>
                        <a href='uploads/$file'>$file</a>
                        | <a href='download.php?file=$file'>Download</a>
                        | <a href='delete.php?file=$file' class='confirm' onclick=\"return confirm('Are you sure you want to delete this file?');\">Delete</a>
                      </li>";
            }
        }
        ?>
    </ul>
</body>

</html>
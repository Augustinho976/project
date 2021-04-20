<?php

$title = "Upload new image";

$content = '<div class="wrappe"> <form action="" method="post" enctype="multipart/form-data">
    <label class="text-dark font-weight-bolder font" for="file">Filename: </label>
    <input type="file" required class="form-control-file border" name="file" id="file"><br/>
    <input class="btn btn-dark " type="submit" name="submit" value="submit">
</form></div>';

//Check if filetype is a valid format
if (isset($_POST["submit"])) {
    $fileType = $_FILES["file"]["type"];

    if (($fileType == "image/gif") ||
        ($fileType == "image/jpeg") ||
        ($fileType == "image/jpg") ||
        ($fileType == "image/png")) {
        //Check if file exists
        if (file_exists("Images/Coffee/" . $_FILES["file"]["name"])) {
            echo "File already exists";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "Images/Coffee/" . $_FILES["file"]["name"]);
            echo "Uploaded in " . "Images/Coffee/" . $_FILES["file"]["name"];
        }
    }
}

include 'template.php';


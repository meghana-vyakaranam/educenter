<?php
session_start();
?>
<html>
    <head>
        <style type="text/css">
            body
            {
                //font-family: "Lato", sans-serif;
                //background-image:url("bg5-1.jpg");
                background-color:#1b2347;
                background-repeat: repeat;
            }
            #p
            {
                position:relative;
                left:20px;
                top:20px;
                font-family:Arial;
                font-size:20px;
                color:#e7e7e7;
            }
        </style>
    </head>
    <body>
        <?php
$target_dir = "uploads/"; 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is a document - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "<p id='p'>Sorry, file already exists. Click back.</p>";
    $uploadOk = 0;
}

// Allow certain file formats
else if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf")
    {
    echo "<p id='p'> Sorry, only .doc, .txt , .pdf files are allowed. Click back.</p>";
    $uploadOk = 0;
}

// if everything is ok, try to upload file
if($uploadOk) 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
       header("Location:teacher22.php");
    } 
    else 
    {
        echo "<p id='p'>Sorry, there was an error uploading your file. Click back.</p>";
    }
}
?>

    </body>
</html>


<?php
include '../dbconfig.php';//Database connection
$database->connectionCheck();
//Upload configurations
    $target_dir = "../musiclibrary/"; //Upload target directory.
    $target_dir_artwork = "../artwork/";

    if(isset($_POST['submit'])){ //Triggers if pressed submit.
        $songname=$_POST['songname'];
        $artist=$_POST['artist'];
        $author=$_POST['author'];
        $gener=$_POST['gener'];
        $duration=$_POST['duration'];
        $language=$_POST['language'];
        //$artwork=$_POST['artworks'];
        $target_file_artwork=$target_dir_artwork . basename($_FILES["artwork"]["name"]);
        $target_file = $target_dir . basename($_FILES["upload"]["name"]);
        $artworkurl='artwork/'. basename($_FILES["artwork"]["name"]); //Creates directory path for file.
        $musicurl='musiclibrary/'. basename($_FILES["upload"]["name"]);
        if(file_exists($target_file)){ 
            echo "Sorry,file already exists."; //Check file exist 
        }
        else{
           $result= $database->query("INSERT INTO `musiclibrary`(`songname`, `author`, `artist`, `gener`, `language`, `duration`, `musicurl`,`artwork`/*musicurl for other pc*/ ) VALUES ('$songname','$author','$artist','$gener','$language','$duration','$musicurl','$artworkurl')");
           //Check if query is inserted or not
           if($result){
            if(move_uploaded_file($_FILES['upload']['tmp_name'],$target_file)){
                if(move_uploaded_file($_FILES['artwork']['tmp_name'],$target_file_artwork)){
                    echo "Successfully uploaded.";
                }
            }
            else{
                echo 'Error uploading';
            }
           }
           else{
               echo "error uploading";
           };
        }
    }
//$fileTypeCkeck=strtolower(pathinfo($target_dir,PATHINFO_EXTENSION));
//Check if upload file is a actual mp3 or fake mp3




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body data-theme='dark'>
    <h1>This is admin panel</h1>
    <form name='myforms' action=""  method="POST" enctype="multipart/form-data" >
        <label for="songname">Song Name</label>
        <input type="tel" name="songname" id="songname">
        <label for="artist">Artist</label>
        <input type="text" name="artist" id="artist">
        <label for="author">Author</label>
        <input type="text" name="author" id="author">
        <label for="gener">Gener</label>
        <input type="text" name="gener" id="gener">
        <label for="language">Language</label>
        <input type="text" name="language" id="language">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration">
        <!--<label for="artworks">Artwork filename</label>
        <input type="text" name="artworks" id="artworks">-->
        <label for="upload">MusicFile:</label>
        <input type="file" name='upload' id='upload' onchange='validate()'>
        <label for="artwork">Artwork:</label>
        <input type="file" name="artwork" id="artwork">
        <input type="submit" id='submit' name='submit' onchange="validateImage()" value="submit">
    </form>
    <h1 id='validate'>sdfs</h1>
    <script src="admin.js">    </script>
    
</body>
</html>

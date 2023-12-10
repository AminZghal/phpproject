
<?php 
include_once "connect.php";
session_start();

/*if (empty($_SESSION['username'])) {
    header("Location: login.php");
}*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST["name"];
    $unit_price = $_POST["price"];
    $Designiation = $_POST["Designiation"];

    // File upload handling
    $targetDirectory = "../images/"; // Create a directory to store uploaded files
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO `products` (`name`, `price`,`Designiation`, `image`)
            VALUES ('$product_name', $unit_price,'$Designiation', '$targetFile')";
    
    $res = $pdo->query($sql);

    header("Location: crudProduit.php");
}

?>


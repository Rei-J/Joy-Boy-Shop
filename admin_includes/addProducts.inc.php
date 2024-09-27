<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    // 500000kb = 500mb
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $fileNameNew = $fileName;
                $fileDestination = 'upload_img_products/' . $fileNameNew;

                require_once '../includes/dbh.php';
                $stmt = $pdo->prepare("INSERT INTO products (name, price, image) VALUES (:name, :price, :image)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':image', $fileNameNew);

                if ($stmt->execute()) {
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ../admin_products.php?uploadsuccess");
                    exit();
                } else {
                    header("Location: ../admin_products.php?ProductCouldNotBeAdded!");
                    exit();
                }
            } else {
                header("Location: ../admin_products.php?YourFileIsToBig!");
                exit();
            }
        } else {
            header("Location: ../admin_products.php?ThereWasAnErrorUploadingYourFile!");
            exit();
        }
    } else {
        header("Location: ../admin_products.php?YouCannotUploadFilesOfThisType!");
        exit();
    }
}else{
    header("Location: ../admin_products.php");
    die();
}

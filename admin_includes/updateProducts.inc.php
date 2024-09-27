<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_old_image = $_POST['update_old_image'];

    require_once '../includes/dbh.php';
    // Update product information
    $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
    $stmt->bindParam(':name', $update_name);
    $stmt->bindParam(':price', $update_price);
    $stmt->bindParam(':id', $update_p_id);

    if ($stmt->execute()) {

        $update_image = $_FILES['update_image']['name'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_folder = 'upload_img_products/' . $update_image;

        if (!empty($update_image)) {
            // Check image size and update the image
            if ($update_image_size > 2000000) {
                header("Location: ../admin_products.php?YourFileIsToBig!");
                exit();
            } else {
                $stmt = $pdo->prepare("UPDATE products SET image = :image WHERE id = :id");
                $stmt->bindParam(':image', $update_image);
                $stmt->bindParam(':id', $update_p_id);
                $stmt->execute();

                // Move the new image to the folder and delete the old one
                move_uploaded_file($update_image_tmp_name, $update_folder);
                unlink('upload_img_products/' . $update_old_image);
            }
        }

        header('location: ../admin_products.php');
        exit();
    }
}else{
    header("Location: ../admin_products.php");
    die();
}
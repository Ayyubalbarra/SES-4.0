<?php
session_start();
include 'includes/db.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['admin'])) {
    die("Access denied");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        
        if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
            
            $stmt = $conn->prepare("INSERT INTO products (name, category, price, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $name, $category, $price, $imageData);
        } else {
            throw new Exception("Image is required");
        }
        
        if ($stmt->execute()) {
            header("Location: manageProducts.php?success=true");
            exit();
        } else {
            throw new Exception($stmt->error);
        }
        
    } catch (Exception $e) {
        header("Location: manageProducts.php?error=" . urlencode($e->getMessage()));
        exit();
    }
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            throw new Exception($stmt->error);
        }
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
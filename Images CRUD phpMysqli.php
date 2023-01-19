<?php

// Insert image
$stmt = $conn->prepare("INSERT INTO images (image) VALUES (?)");
$stmt->bind_param("b", $image);
$image = file_get_contents($_FILES['image']['tmp_name']);
$stmt->send_long_data(0, $image);
$stmt->execute();

// Read image
$stmt = $conn->prepare("SELECT image FROM images WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
header("Content-type: image/jpeg");
echo $row['image'];

// Update image
$stmt = $conn->prepare("UPDATE images SET image = ? WHERE id = ?");
$stmt->bind_param("bi", $image, $id);
$image = file_get_contents($_FILES['image']['tmp_name']);
$stmt->send_long_data(0, $image);
$stmt->execute();

// Delete image
$stmt = $conn->prepare("DELETE FROM images WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
?>

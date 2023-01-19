<?php

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = 'password';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
);
$pdo = new PDO($dsn, $username, $password, $options);

// Create
$sql = 'INSERT INTO users (username, email) VALUES (?, ?)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['johndoe', 'johndoe@example.com']);

// Read
$sql = 'SELECT * FROM users WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);
$user = $stmt->fetch();

// Update
$sql = 'UPDATE users SET username = ? WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute(['janedoe', 1]);

// Delete
$sql = 'DELETE FROM users WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);

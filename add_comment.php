<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_id = $_POST['project_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare('INSERT INTO comments (project_id, username, comment) VALUES (?, ?, ?)');
    $stmt->execute([$project_id, $username, $comment]);

    header('Location: project.php?id=' . $project_id);
    exit;
}
?>

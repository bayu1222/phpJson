<!-- delete.php -->
<?php
$userId = $_GET['id'] ?? '';

$data = file_get_contents('data.json');
$users = json_decode($data, true);

$newUsers = array_filter($users, function ($user) use ($userId) {
    return $user['id'] !== $userId;
});

$jsonData = json_encode($newUsers, JSON_PRETTY_PRINT);
file_put_contents('data.json', $jsonData);

header('Location: index.php');
exit;

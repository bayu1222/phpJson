<!-- edit.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>

    <?php
    $userId = $_GET['id'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = file_get_contents('data.json');
        $users = json_decode($data, true);

        foreach ($users as &$user) {
            if ($user['id'] === $userId) {
                $user['name'] = $_POST['name'];
                $user['email'] = $_POST['email'];
                break;
            }
        }

        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $jsonData);

        echo "<p>Pengguna telah diperbarui.</p>";
    } else {
        $data = file_get_contents('data.json');
        $users = json_decode($data, true);

        $currentUser = null;

        foreach ($users as $user) {
            if ($user['id'] === $userId) {
                $currentUser = $user;
                break;
            }
        }

        if ($currentUser === null) {
            echo "<p>Pengguna tidak ditemukan.</p>";
        } else {
            ?>
            <form action="" method="post">
                <label for="name">Nama:</label>
                <input type="text" name="name" value="<?php echo $currentUser['name']; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $currentUser['email']; ?>" required><br>

                <input type="submit" value="Perbarui">
            </form>
            <?php
        }
    }
    ?>

    <p><a href="index.php">Kembali ke Daftar Pengguna</a></p>
</body>
</html>

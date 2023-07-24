<!-- add.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna Baru</title>
</head>
<body>
    <h1>Tambah Pengguna Baru</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = file_get_contents('data.json');
        $users = json_decode($data, true);

        $newUser = [
            'id' => uniqid(),
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];

        $users[] = $newUser;

        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $jsonData);

        echo "<p>Pengguna baru telah ditambahkan.</p>";
    }
    ?>

    <form action="" method="post">
        <label for="name">Nama:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Tambahkan">
    </form>

    <p><a href="index.php">Kembali ke Daftar Pengguna</a></p>
</body>
</html>

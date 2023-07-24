<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Proyek PHP dengan JSON</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>

    <?php
    $data = file_get_contents('data.json');
    $users = json_decode($data, true);

    if (empty($users)) {
        echo "<p>Tidak ada pengguna yang tersimpan.</p>";
    } else {
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>{$user['name']} - {$user['email']} (<a href='edit.php?id={$user['id']}'>Edit</a> | <a href='delete.php?id={$user['id']}'>Hapus</a>)</li>";
        }
        echo "</ul>";
    }
    ?>

    <p><a href="add.php">Tambah Pengguna Baru</a></p>
</body>
</html>
